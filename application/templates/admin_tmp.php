<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard - Cultura FK</title>
  <!--<base href="<?php echo site_url();?>">-->
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="<?php echo site_url().'static/cms/css/animate.min.css';?>">
  <script src="https://unpkg.com/feather-icons"></script>
  <script type="text/javascript">
    var site = '<?php echo site_url();?>';
  </script>
  <script src="<?php echo site_url().'static/cms/js/core/bootbox.all.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/bootstrap.min.js';?>"></script>
</head>

<body class="layout-6" style="background-image: url('<?php echo site_url().'static/page_front/images/header_image.jpg';?>'); background-size: cover;">
  <nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
    <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
          <a href="<?php echo site_url().'course';?>" class="b-brand">
          <div class="b-bg">
              <img src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" alt="Logo" width="35"/>
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
            $panel_syle = "";
            $activaciones_syle = "";
            $pagos_syle = "";
            $mantenimiento_syle = "";
            
            switch ($nav) {
                case "panel":
                    $panel_syle = "active";
                    break;
                case "activaciones":
                    $activaciones_syle = "active";
                    break;
                case "activar_pagos":
                    $pagos_syle = "active";
                    break;
                case "document":
                    $document_syle = "active";
                    break;
                default:
                    $mantenimiento_syle = "active";
                    break;
            }
          ?>
          <li class="nav-item">
              <a href="<?php echo site_url().'dashboard/panel';?>" class="nav-link <?php echo $panel_syle;?>">
                  <span class="pcoded-micon">
                       <i data-feather="home"></i>
                  </span>
                  <span class="pcoded-mtext">Panel</span>
              </a>
        </li>
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="<?php echo $mantenimiento_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="sliders"></i>
                </span>
                <span class="pcoded-mtext">Mantenimientos</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/bonos";?>"><i class="icon-large icon-th"></i>Bonos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/categorias";?>"><i class="icon-large icon-th"></i>Categórías</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/catalogo";?>"><i class="icon-large icon-th"></i>Catalogo</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/clientes";?>"><i class="icon-large icon-th"></i>Clientes</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/comentarios";?>"><i class="icon-large icon-th"></i>Comentarios</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/comisiones";?>"><i class="icon-large icon-th"></i>Comisiones</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/facturas";?>"><i class="icon-large icon-th"></i>Facturas</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/videos";?>"><i class="icon-large icon-th"></i>Videos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/membresias";?>"><i class="icon-large icon-th"></i>Pack</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/pagos";?>"><i class="icon-large icon-th"></i>Pagos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/puntos";?>"><i class="icon-large icon-th"></i>Puntos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/rangos";?>"><i class="icon-large icon-th"></i>Rangos</a></li>
                <?php if($_SESSION['usercms']['privilage'] == 2){ ?>
                <li class="pcoded-hasmenu" ><a href="<?php echo site_url()."dashboard/usuarios";?>"><i class="icon-large icon-th"></i>Usuarios</a></li>
                <?php } ?>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url()."dashboard/activaciones";?>" class="nav-link <?php echo $activaciones_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="check-circle"></i>
                </span>
                <span class="pcoded-mtext">Activaciones</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url()."dashboard/activar_pagos";?>" class="nav-link <?php echo $pagos_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="dollar-sign"></i>
                </span>
                <span class="pcoded-mtext">Pagos</span>
            </a>
        </li>
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="">
                <span class="pcoded-micon">
                    <i data-feather="book-open"></i>
                </span>
                <span class="pcoded-mtext">Reportes</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/panel";?>"><i class="icon-large icon-th"></i>Panel</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/videos";?>"><i class="icon-large icon-th"></i>Videos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/bonos";?>"><i class="icon-large icon-th"></i>Bonos</a></li>
            </ul>
        </li>
    </ul>
    </div>
    </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="<?php echo site_url().'course';?>" class="b-brand">
        <div class="b-bg">
            <img src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" alt="Logo" width="35"/>
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
                  <span><?php echo $_SESSION['usercms']['name'];?></span>
              </div>
              <ul class="pro-body">
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
  <script src="<?php echo site_url().'static/course/js/pcoded.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/ekko-lightbox.min.js';?>"></script>
  <script src="<?php echo site_url().'static/course/js/ac-lightbox.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/datatables.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/tbl-datatable-custom.js';?>"></script>
  
  

<script src="<?php echo site_url().'static/cms/js/core/amcharts.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/gauge.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/serial.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/light.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/pie.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/ammap.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/usaLow.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/radar.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/worldLow.js';?>"></script>

<script src="<?php echo site_url().'static/cms/js/core/jquery.flot.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.flot.categories.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/curvedLines.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.flot.tooltip.min.js';?>"></script>

<script src="<?php echo site_url().'static/cms/js/core/dashboard-analytics.js';?>"></script>
  
  
  <script>
      feather.replace()
  </script>
</body>

</html>