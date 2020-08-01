<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Universidad Imparable - Plataforma de Cursos</title>
        <!--[if lt IE 10]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
        <meta name="author" content="Cultura Imparable">
        <meta name="keyword" content="Cultura Imparable, Movimiento Imparable, Imparable Perú, embajadores, Imparable social, red social, mlm, mmn, culturaimprable.com, desarrollo personal, catalogo de productos, productos, plataforma de cursos online">
        <meta name="robots" content="Index, Follow">
        <!--//STAR FAVICON-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() . 'static/page_front/images/logo/favico/apple-touch-icon.png'; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-32x32.png'; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-16x16.png'; ?>">
        <link rel="manifest" href="<?php echo site_url() . 'static/page_front/images/logo/favico/site.webmanifest'; ?>">
        <!--//END FAVICON-->
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/style.css'; ?>">
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/gallery.css'; ?>">
        <script src="https://unpkg.com/feather-icons"></script>
    </head>

    <body class="layout-6" style="background-image: url('<?php echo site_url() . 'static/page_front/images/sc-step-bg-2.png'; ?>'); background-size: cover;">
        <nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
            <div class="navbar-wrapper">
                <div class="navbar-brand header-logo">
                    <a href="<?php echo site_url() . 'course'; ?>" class="b-brand">
                        <img src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" alt="Logo" width="35"/>
                        <span class="b-title">Cursos</span>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a></div>
                <div class="navbar-content scroll-div">
                    <ul class="nav pcoded-inner-navbar">
                        <li class="nav-item pcoded-menu-caption"><label>Navegación</label></li>
                        <?php
                        $url = explode("/", uri_string());
                        if (isset($url[1])) {
                            $nav = "course";
                        } else {
                            $nav = "";
                        }

                        $course_syle = "";
                        $home_syle = "";

                        switch ($nav) {
                            case "course":
                                $course_syle = "active";
                                break;
                            default:
                                $home_syle = "active";
                                break;
                        }
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo site_url() . 'backoffice'; ?>" class="nav-link">
                                <span class="pcoded-micon">
                                    <i data-feather="arrow-left"></i>
                                </span>
                                <span class="pcoded-mtext">Mi Oficina</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo site_url() . 'course'; ?>" class="nav-link <?php echo $home_syle; ?>">
                                <span class="pcoded-micon">
                                    <i data-feather="home"></i>
                                </span>
                                <span class="pcoded-mtext">Inicio</span>
                            </a>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#!" class="<?php echo $course_syle; ?>">
                                <span class="pcoded-micon">
                                    <i data-feather="airplay"></i>
                                </span>
                                <span class="pcoded-mtext">Mis Cursos</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <?php foreach ($obj_category_videos as $value) { ?>
                                    <li><a href='<?php echo site_url() . "course/$value->slug"; ?>' class=""><?php echo $value->name; ?></a></li>          
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url() . 'login/logout'; ?>" class="nav-link">
                                <span class="pcoded-micon">
                                    <i data-feather="log-out"></i>
                                </span>
                                <span class="pcoded-mtext">Salir</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="navbar pcoded-header navbar-expand-lg navbar-light">
            <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
                <a href="<?php echo site_url() . 'course'; ?>" class="b-brand">
                    <img src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" alt="Logo" width="35"/>
                    <span class="b-title">Universidad Imparable</span></a>
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
            </div>
        </header>
    </li>
</ul>
</div>
</div>
</li>
</ul>
<?php echo $body; ?>
<!--[if lt IE 11]> <div class="ie-warning"> <h1>Warning!!</h1> <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website. </p> <div class="iew-container"> <ul class="iew-download"> <li> <a href="http://www.google.com/chrome/"> <img src="../assets/images/browser/chrome.png" alt="Chrome"> <div>Chrome</div> </a> </li> <li> <a href="https://www.mozilla.org/en-US/firefox/new/"> <img src="../assets/images/browser/firefox.png" alt="Firefox"> <div>Firefox</div> </a> </li> <li> <a href="http://www.opera.com"> <img src="../assets/images/browser/opera.png" alt="Opera"> <div>Opera</div> </a> </li> <li> <a href="https://www.apple.com/safari/"> <img src="../assets/images/browser/safari.png" alt="Safari"> <div>Safari</div> </a> </li> <li> <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"> <img src="../assets/images/browser/ie.png" alt=""> <div>IE (11 & above)</div> </a> </li> </ul> </div> <p>Sorry for the inconvenience!</p> </div> <![endif]-->
<script src="<?php echo site_url() . 'static/course/js/vendor-all.min.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/course/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/course/js/pcoded.min.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/course/js/ekko-lightbox.min.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/course/js/ac-lightbox.js'; ?>"></script>


<script>
                            var BP_Nouveau = {"ajaxurl": "", "object_nav_parent": "#buddypress", "objects": {"0": "activity", "1": "members", "4": "xprofile", "7": "settings", "8": "notifications"}, "nonces": {"activity": "fcd5ecf43e", "members": "9af41e8848", "xprofile": "10dfc2af2b", "settings": "8d89e10911"}};
</script>
<script>
    window.lazySizesConfig = window.lazySizesConfig || {};
    window.lazySizesConfig.lazyClass = 'lazyload';
    window.lazySizesConfig.loadingClass = 'lazyloading';
    window.lazySizesConfig.loadedClass = 'lazyloaded';
    lazySizesConfig.loadMode = 1;
</script>
<script>
    lazySizes.init();
</script>
<script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
<script>
    WebFont.load({google: {families: ['Roboto:400,300']}});
</script>
<script defer src="<?php echo site_url() . 'static/page_front/js/autoptimize_282.js'; ?>"></script>

<script>
    feather.replace()
</script>
</body>

</html>