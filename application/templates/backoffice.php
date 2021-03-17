<!DOCTYPE html>
<html lang="es">
    <?php $this->load->view("backoffice/head"); ?>
    <body>
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <?php
        $url = explode("/", uri_string());
        if (isset($url[1])) {
            $nav = $url[1];
        } else {
            $nav = "";
        }
        $home_syle = "";
        $perfil_syle = "";
        $planes_syle = "";
        $finanzas_syle = "";
        $facturas_syle = "";
        $carrera_syle = "";
        $red_syle = "";
        $cobro_syle = "";
        $files = "";
        switch ($nav) {
            case "profile":
                $perfil_syle = "active";
                break;
            case "plan":
                $planes_syle = "active";
                break;
            case "history":
                $finanzas_syle = "active";
                break;
            case "invoice":
                $finanzas_syle = "active";
                break;
            case "pay":
                $cobro_syle = "active";
                break;
            case "referred":
                $red_syle = "active";
                break;
            case "unilevel":
                $red_syle = "active";
                break;
            case "carrera":
                $carrera_syle = "active";
                break;
            case "files":
                $files = "active";
                break;
            default:
                $home_syle = "active";
                break;
        }
        ?>
        <nav class="pcoded-navbar navbar-image-3" style="overflow-y:auto">
            <div class="navbar-wrapper">
                <div class="navbar-brand header-logo">
                    <div class="b-bg padding-top-10">
                        <a href="<?php echo site_url() . 'backoffice/profile'; ?>">
                            <?php if (!empty($obj_profile->img)) { ?>
                                <img alt="avatar" clas="radius-50" src="<?php echo site_url() . "static/backoffice/images/profile/$obj_profile->customer_id/$obj_profile->img"; ?>" width="60" height="60" style="border">
                            <?php } else { ?>
                                <img alt="avatar" class="radius-50" src="<?php echo site_url() . 'static/backoffice/images/avatar.png'; ?>" width="60" style="border">
                            <?php } ?>
                            &nbsp;&nbsp;<span class="b-title">IMPARABLES</span>
                        </a>
                    </div>

                </div>
                <div class="navbar-content scroll-div">
                    <ul class="nav pcoded-inner-navbar">
                        <li class="nav-item pcoded-menu-caption text-center">
                            <div class="font-size-11">Hola, <?php echo $_SESSION['customer']['name']; ?></div>
                            <div>
                                <?php if ($_SESSION['customer']['active_month'] == 1) { ?>
                                    <a class="badge badge-success-inverted font-size-10">Activo</a>
                                <?php } else { ?>
                                    <a class="badge badge-danger font-size-10">Inactivo</a>
                                <?php } ?>
                            </div>
                            <hr class="border-color-white">
                        </li>
                        <?php 
                        if($_SESSION['customer']['kit_id'] != 0 && $_SESSION['customer']['active_month'] != 0){ ?>
                             <li data-username="Tablero" class="nav-item">
                                <a href="#" class="btn">
                                    <div class="access-dam-yellow" align="center"> 
                                        <span><i class="fa fa-university" aria-hidden="true"></i>&nbsp; ACADEMIA</span>                
                                    </div>
                                </a>
                            </li>   
                        <?php } ?>            
                        <li data-username="Tablero" class="nav-item">
                            <a href="<?php echo site_url()."backoffice/cursos";?>" class="btn" style="width: 100%">
                                <div class="access-dam-purple" align="center"> 
                                    <span><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp; CURSOS</span>                
                                </div>
                            </a>
                        </li>
                        <li data-username="Tablero" class="nav-item">
                            <a href="<?php echo site_url() . 'mi_catalogo'; ?>" class="btn" style="width: 100%">
                                <div class="access-dam-green" align="center"> 
                                    <span><i class="fa fa-building" aria-hidden="true"></i>&nbsp; EMPRESAS</span>
                                </div>
                            </a>
                        </li>
                        <li data-username="Tablero" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice/inversiones' ?>" class="btn" style="width: 100%">
                                <div class="access-dam-black" align="center"> 
                                    <span>PORTAFOLIO DE INVERSIÓN</span>
                                </div>
                            </a>
                        </li>
                        <li data-username="Tablero" class="nav-item">
                            <a href="javascript:void(0);" class="btn" style="width: 100%">
                                <div class="access-dam-blue" align="center"> 
                                    <span><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp; CAMPAÑAS (Pronto)</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item pcoded-menu-caption"><label>Navegación</label></li>
                        <li data-username="Tablero" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice' ?>" class="nav-link <?php echo $home_syle; ?>">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Tablero</span>
                            </a>
                        </li>
                        <li class="nav-item pcoded-menu-caption"><label>Información</label></li>
                        <li data-username="Datos Personales" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice/profile'; ?>" class="nav-link <?php echo $perfil_syle; ?>">
                                <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                <span class="pcoded-mtext">Datos Personales</span>
                            </a>
                        </li>
                        <li data-username="Planes" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice/plan'; ?>" class="nav-link <?php echo $planes_syle; ?>">
                                <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                <span class="pcoded-mtext">Planes</span>
                            </a>
                        </li>
                        <li class="nav-item pcoded-menu-caption"><label>Finanzas</label></li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link <?php echo $finanzas_syle; ?>">
                                <span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span>
                                <span class="pcoded-mtext">Finanzas</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li>
                                    <a href="<?php echo site_url() . 'backoffice/history'; ?>">Comisiones</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() . 'backoffice/invoice'; ?>">Facturas</a>
                                </li>
                            </ul>
                        </li>
                        <li data-username="Cobros" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice/pay'; ?>" class="nav-link <?php echo $cobro_syle; ?>">
                                <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                                <span class="pcoded-mtext">Cobros</span>
                            </a>
                        </li>

                        <?php 
                        if($_SESSION['customer']['kit_id'] != 0 && $_SESSION['customer']['active_month'] != 0){ ?>

                        <li class="nav-item pcoded-menu-caption"><label>Red</label></li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link <?php echo $red_syle; ?>">  
                                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                <span class="pcoded-mtext">Red</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?php echo site_url() . 'backoffice/referred'; ?>" class="">Referidos Directos</a></li>
                                <li><a href="<?php echo site_url() . 'backoffice/unilevel'; ?>" class="">Unilevel</a></li>
                            </ul>
                        </li>
                        <li data-username="Plan Carrera" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice/carrera'; ?>" class="nav-link <?php echo $carrera_syle; ?>">
                                <span class="pcoded-micon"><i class="feather icon-map"></i></span>
                                <span class="pcoded-mtext">Plan Carrera</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li data-username="Materiales" class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice/files'; ?>" class="nav-link <?php echo $files; ?>">
                                <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                                <span class="pcoded-mtext">Materiales</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="navbar pcoded-header navbar-expand-lg navbar-light">
            <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
                    <div class="b-bg">
                        <?php if (!empty($obj_profile->img)) { ?>
                            <img alt="avatar" class="radius-50" src="<?php echo site_url() . "static/backoffice/images/profile/$obj_profile->customer_id/$obj_profile->img"; ?>" width="60" height="60" style="border">
                        <?php } else { ?>
                            <img alt="avatar" class="radius-50" src="<?php echo site_url() . 'static/backoffice/images/avatar.png'; ?>" width="60" style="border">
                        <?php } ?>
                        &nbsp;&nbsp;<span class="b-title">IMPARABLES</span>
                    </div>
            </div><a class="mobile-menu" id="mobile-header" href="#!"><i class="feather icon-more-horizontal"></i></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown drp-user"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon feather icon-settings"></i></a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <span>Hola, <?php echo $_SESSION['customer']['name']; ?></span>
                                </div>
                                <ul class="pro-body">
                                    <li><a href="<?php echo site_url() . 'backoffice/perfil'; ?>" class="dropdown-item"><i class="feather icon-user"></i> Mi Perfil</a></li>
                                    <li><a href="<?php echo site_url() . 'salir'; ?>" class="dropdown-item"><i class="feather icon-lock"></i> Salir</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
<?php echo $body ?>
        <!--[if lt IE 11]> <div class="ie-warning"> <h1>Warning!!</h1> <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website. </p> <div class="iew-container"> <ul class="iew-download"> <li> <a href="http://www.google.com/chrome/"> <img src="../assets/images/browser/chrome.png" alt="Chrome"> <div>Chrome</div> </a> </li> <li> <a href="https://www.mozilla.org/en-US/firefox/new/"> <img src="../assets/images/browser/firefox.png" alt="Firefox"> <div>Firefox</div> </a> </li> <li> <a href="http://www.opera.com"> <img src="../assets/images/browser/opera.png" alt="Opera"> <div>Opera</div> </a> </li> <li> <a href="https://www.apple.com/safari/"> <img src="../assets/images/browser/safari.png" alt="Safari"> <div>Safari</div> </a> </li> <li> <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"> <img src="../assets/images/browser/ie.png" alt=""> <div>IE (11 & above)</div> </a> </li> </ul> </div> <p>Sorry for the inconvenience!</p> </div> <![endif]-->
        <script src="<?php echo site_url() . 'static/backoffice/js/core/vendor-all.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/backoffice/js/core/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/backoffice/js/core/menu-setting.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/backoffice/js/core/pcoded.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/backoffice/js/core/bootstrap-growl.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/backoffice/js/core/datatables.min.js.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/backoffice/js/script/home.js'; ?>"></script>
    </body>
</html>