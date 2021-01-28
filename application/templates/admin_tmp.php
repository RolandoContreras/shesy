<!DOCTYPE html>
<html lang="es">
<head>
  <title>Administración - Cultura Imparable</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
  <meta name="author" content="Cultura Imparable">
  <meta name="keyword" content="Cultura Imparable, Movimiento Imparable, Imparable Perú, embajadores, Imparable social, Imparable corporación, mlm, mmn, culturaimprable.com">
   <!--//STAR FAVICON-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-touch-icon.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/site.webmanifest';?>">
    <!--//END FAVICON-->
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/style.css';?>">
  <link rel="stylesheet" href="<?php echo site_url().'static/cms/css/mystyle.css';?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="<?php echo site_url().'static/cms/css/animate.min.css';?>">
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    var site = '<?php echo site_url();?>';
  </script>
  <script src="<?php echo site_url().'static/cms/js/core/bootbox.all.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/core/bootstrap.min.js';?>"></script>
  <link rel="stylesheet" href="<?php echo site_url().'static/cms/css/core/bootstrap-datepicker3.min.css';?>">
  <link rel="stylesheet" href="<?php echo site_url().'static/cms/css/mystyle.css';?>">
  <!----- LIGHTBOX  ---->
  <link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/lightbox.min.css';?>">
  <!----- SWEET ALER  ---->
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <script>
        var page = {
            bootstrap: 3
        };

        function swap_bs() {
            page.bootstrap = 3;
        }
    </script>
    <style>
        .datepicker>.datepicker-days {
            display: block;
        }
        ol.linenums {
            margin: 0 0 0 -8px;
        }
    </style>
  <!--//swetaler2-->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
</head>

<body class="layout-6" style="background-image: url('<?php echo site_url().'static/page_front/images/sc-step-bg-2.png';?>'); background-size: cover;">
  <nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
    <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
          <a href="<?php echo site_url().'course';?>" class="b-brand">
              <img src="<?php echo site_url().'static/page_front/images/logo/logo-fuego.png';?>" alt="Logo" width="40"/>
              <span class="b-title">Administración</span>
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
            $inversiones_syle = "";
            $mantenimiento_syle = "";
            $report_syle = "";
            $recargas_syle = "";
            $contra_entrega_syle = null;
            $enlace_compra = null;
            switch ($nav) {
                case "panel":
                    $panel_syle = "active";
                    break;
                case "activaciones":
                    $activaciones_syle = "active";
                    break;
                case "contra-entrega":
                    $contra_entrega_syle = "active";
                    break;
                case "enlace-compra":
                    $enlace_compra = "active";
                    break;
                case "inversiones":
                    $inversiones_syle = "active";
                    break;
                case "activar_pagos":
                    $pagos_syle = "active";
                    break;
                case "recargas":
                    $recargas_syle = "active";
                    break;
                case "report_global":
                    $report_syle = "active";
                    break;
                case "report_customer":
                    $report_syle = "active";
                    break;
                case "report_invoice":
                    $report_syle = "active";
                    break;
                case "report_pay":
                    $report_syle = "active";
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
        <li class="nav-item pcoded-menu-caption"><label>Mantenimientos</label></li>
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
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/embassy";?>"><i class="icon-large icon-th"></i>Embajadores</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/facturas";?>"><i class="icon-large icon-th"></i>Facturas Pack</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/facturas_catalogo";?>"><i class="icon-large icon-th"></i>Facturas Catalogo</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/videos";?>"><i class="icon-large icon-th"></i>Videos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/membresias";?>"><i class="icon-large icon-th"></i>Pack</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/pagos";?>"><i class="icon-large icon-th"></i>Pagos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/puntos";?>"><i class="icon-large icon-th"></i>Puntos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/rangos";?>"><i class="icon-large icon-th"></i>Rangos</a></li>
                <?php if($_SESSION['usercms']['privilage'] > 1){ ?>
                <li class="pcoded-hasmenu" ><a href="<?php echo site_url()."dashboard/usuarios";?>"><i class="icon-large icon-th"></i>Usuarios</a></li>
                <?php } ?>
            </ul>
        </li>
        <li class="nav-item pcoded-menu-caption"><label>Activar</label></li>
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link <?php echo $activaciones_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="check-circle"></i>
                </span>
                <span class="pcoded-mtext">Activaciones</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/activaciones";?>"><i class="icon-large icon-th"></i>Pack</a></li>
            </ul>
        </li>
        <li class="nav-item pcoded-hasmenu">
            <a href="<?php echo site_url()."dashboard/contra-entrega";?>" class="nav-link <?php echo $contra_entrega_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="user-check"></i>
                </span>
                <span class="pcoded-mtext">Contra Entrega / Ganancia Disponible</span>
            </a>
        </li>
        <li class="nav-item pcoded-hasmenu">
            <a href="<?php echo site_url()."dashboard/enlace-compra";?>" class="nav-link <?php echo $enlace_compra;?>">
                <span class="pcoded-micon">
                    <i data-feather="shopping-cart"></i>
                </span>
                <span class="pcoded-mtext">Enlace de Compra</span>
            </a>
        </li>
        <li class="nav-item pcoded-menu-caption"><label>Cursos</label></li>
        <li class="nav-item">
            <a href="<?php echo site_url()."dashboard/mis-cursos";?>" class="nav-link <?php echo $pagos_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="dollar-sign"></i>
                </span>
                <span class="pcoded-mtext">Cursos</span>
            </a>
        </li>
        <li class="nav-item pcoded-menu-caption"><label>Pagos</label></li>
        <li class="nav-item">
            <a href="<?php echo site_url()."dashboard/activar_pagos";?>" class="nav-link <?php echo $pagos_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="dollar-sign"></i>
                </span>
                <span class="pcoded-mtext">Pagos</span>
            </a>
        </li>
        <li class="nav-item pcoded-menu-caption"><label>Portafolio de Inversión</label></li>
        <li class="nav-item">
            <a href="<?php echo site_url()."dashboard/inversiones";?>" class="nav-link <?php echo $inversiones_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="dollar-sign"></i>
                </span>
                <span class="pcoded-mtext">Inversiones</span>
            </a>
        </li>
        <li class="nav-item pcoded-menu-caption"><label>Recargas</label></li>
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link <?php echo $recargas_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="credit-card"></i>
                </span>
                <span class="pcoded-mtext">Recargas</span>
            </a>
            <ul class="pcoded-submenu">
                <!--<li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/recargas";?>"><i class="icon-large icon-th"></i>Puntos</a></li>-->
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/recargas_comisiones";?>"><i class="icon-large icon-th"></i>Comisiones</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/recargas_compras";?>"><i class="icon-large icon-th"></i>Compras</a></li>
            </ul>
        </li>
        <li class="nav-item pcoded-menu-caption"><label>Reportes</label></li>
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link <?php echo $report_syle;?>">
                <span class="pcoded-micon">
                    <i data-feather="printer"></i>
                </span>
                <span class="pcoded-mtext">Reportes</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/report_global";?>"><i class="icon-large icon-th"></i>Datos</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/report_customer";?>"><i class="icon-large icon-th"></i>Clientes</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/report_invoice";?>"><i class="icon-large icon-th"></i>Ventas</a></li>
                <li class="pcoded-hasmenu"><a href="<?php echo site_url()."dashboard/report_pay";?>"><i class="icon-large icon-th"></i>Pagos</a></li>
            </ul>
        </li>
    </ul>
    </div>
    </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="<?php echo site_url().'course';?>" class="b-brand">
            <img src="<?php echo site_url().'static/page_front/images/logo/logo-fuego.png';?>" alt="Logo" width="40"/>
            <span class="b-title">Administración</span></a>
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
  feather.replace();
</script>
<script src="<?php echo site_url().'static/cms/js/core/bootstrap-datepicker.min.js';?>"></script>    
<script src="<?php echo site_url().'static/cms/js/core/ac-datepicker.js';?>"></script>  
</body>
</html>