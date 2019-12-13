<!DOCTYPE html>
<html lang="es">
<head>
  <title>Cursos Online - Forex & Markting digital</title>
  <!--[if lt IE 10]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Multiplica tu dinero en el mercado financiero con nosotros. BCA CAPITAL una empresa financiera que te ayudará a aumentar tus finanzas, Clic en el siguiente enlace.">
  <meta name="author" content="Cevolution Web">
  <meta name="keyword" content="bca capital, bca, cursos, cursos de forex, cursos de marketing digital, bca networkmarketing">
  <meta name="robots" content="Index, Follow">
   <!--START FAVICON-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-57x57.png';?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-60x60.png';?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-72x72.png';?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-76x76.png';?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-114x114.png';?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-120x120.png';?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-144x144.png';?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-152x152.png';?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-180x180.png';?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo site_url().'static/page_front/images/logo/favico/android-icon-192x192.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-96x96.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/manifest.json';?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo site_url().'static/page_front/images/logo/favico/ms-icon-144x144.png';?>">
    <meta name="theme-color" content="#ffffff">
  <!--END FAVICON-->
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/style.css';?>">
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="layout-6" style="background-image: url('<?php echo site_url().'static/page_front/images/header_image.jpg';?>'); background-size: cover;">
  <nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
    <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
          <a href="<?php echo site_url().'course';?>" class="b-brand">
          <div class="b-bg">
              <img src="<?php echo site_url().'static/page_front/images/logo/icono-negro.png';?>" alt="Logo" width="35"/>
          </div>
              <span class="b-title">BCA CAPITAL</span>
          </a>
          <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a></div>
      <div class="navbar-content scroll-div">
        <ul class="nav pcoded-inner-navbar">
          <li class="nav-item pcoded-menu-caption"><label>Navegación</label></li>
          <?php
          $url = explode("/",uri_string());
            if(isset($url[1])){
                $nav = $url[1];
            }else{
                $nav = "";
            }
            $profile_syle = "";
            $course_syle = "";
            $document_syle = "";
            $home_syle = "";
            
            switch ($nav) {
                case "profile":
                    $profile_syle = "active";
                    break;
                case "forex":
                    $course_syle = "active";
                    break;
                case "mkt":
                    $course_syle = "active";
                    break;
                case "document":
                    $document_syle = "active";
                    break;
                default:
                    $home_syle = "active";
                    break;
            }
          ?>
          
          
          <li class="nav-item">
              <a href="<?php echo site_url().'course';?>" class="nav-link <?php echo $home_syle;?>">
                  <span class="pcoded-micon">
                       <i data-feather="home"></i>
                  </span>
                  <span class="pcoded-mtext">Dashboard</span>
              </a>
        </li>
        <?php $kid_id = $_SESSION['customer']['kit_id'];
            if($kid_id >= 2){ ?>
        
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="<?php echo $course_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="airplay"></i>
                </span>
                <span class="pcoded-mtext">Mis Cursos</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="pcoded-hasmenu"><a href="#!" class="">Inversiones y Forex</a>
                  <ul class="pcoded-submenu">
                    <li><a href="<?php echo site_url().'course/forex/basic';?>" class="">Básico</a></li>
                    <?php  if($kid_id > 2){ ?>
                                <li><a href="<?php echo site_url().'course/forex/intermediate';?>" class="">Intermedio</a></li>
                                    <?php  if($kid_id > 3){ ?>
                                            <li><a href="<?php echo site_url().'course/forex/advancing';?>" class="">Avanzado</a></li>
                                    <?php } ?>
                    <?php } ?>
                  </ul>
                </li>
                <li class="pcoded-hasmenu"><a href="#!" class="">Marketing</a>
                  <ul class="pcoded-submenu">
                    <li><a href="<?php echo site_url().'course/mkt/basic';?>" class="">Básico</a></li>
                    <?php  if($kid_id > 2){ ?>
                                <li><a href="<?php echo site_url().'course/mkt/intermediate';?>" class="">Intermedio</a></li>
                                    <?php  if($kid_id > 3){ ?>
                                            <li><a href="<?php echo site_url().'course/mkt/advancing';?>" class="">Avanzado</a></li>
                                    <?php } ?>
                    <?php } ?>
                  </ul>
                </li>
                <?php $kid_id = $_SESSION['customer']['kit_id'];
                    if($kid_id >= 3){ ?>
                        <li class=""><a href="#" class="">Sistemas</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a href="<?php echo site_url().'course/document';?>" class="nav-link <?php echo $document_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="archive"></i>
                </span>
                <span class="pcoded-mtext">Documentos</span>
            </a>
        </li>
    </ul>
    </div>
    </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="<?php echo site_url().'course';?>" class="b-brand">
        <div class="b-bg">
            <img src="<?php echo site_url().'static/page_front/images/logo/icono-negro.png';?>" alt="Logo" width="35"/>
        </div>
            <span class="b-title">BCA CAPITAL</span></a>
    </div>
      <a class="mobile-menu" id="mobile-header" href="#!">
          <i class="feather icon-more-horizontal"></i>
      </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li>
            <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()">
                <i data-feather="maximize"></i>
            </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li>
          <div class="dropdown drp-user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i data-feather="settings"></i>
              </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
                  <img src="<?php echo site_url().'static/backoffice/images/avatar.png';?>" class="img-radius" alt="User-Profile-Image">
                  <span><?php echo $_SESSION['customer']['name'];?></span>
              </div>
              <ul class="pro-body">
                <li>
                    <a href="<?php echo site_url().'course/profile';?>" class="dropdown-item"><i data-feather="user-plus"></i> Perfil</a>
                </li>
                <li>
                    <a href="<?php echo site_url().'login/logout';?>" class="dropdown-item"><i data-feather="power"></i> Salir</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
  <?php echo $body;?>
  <!--[if lt IE 11]> <div class="ie-warning"> <h1>Warning!!</h1> <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website. </p> <div class="iew-container"> <ul class="iew-download"> <li> <a href="http://www.google.com/chrome/"> <img src="../assets/images/browser/chrome.png" alt="Chrome"> <div>Chrome</div> </a> </li> <li> <a href="https://www.mozilla.org/en-US/firefox/new/"> <img src="../assets/images/browser/firefox.png" alt="Firefox"> <div>Firefox</div> </a> </li> <li> <a href="http://www.opera.com"> <img src="../assets/images/browser/opera.png" alt="Opera"> <div>Opera</div> </a> </li> <li> <a href="https://www.apple.com/safari/"> <img src="../assets/images/browser/safari.png" alt="Safari"> <div>Safari</div> </a> </li> <li> <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"> <img src="../assets/images/browser/ie.png" alt=""> <div>IE (11 & above)</div> </a> </li> </ul> </div> <p>Sorry for the inconvenience!</p> </div> <![endif]-->
  <script src="<?php echo site_url().'static/course/js/vendor-all.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/bootstrap.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/pcoded.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/ekko-lightbox.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/ac-lightbox.js';?>"></script>
  <script>
      feather.replace()
  </script>
</body>

</html>