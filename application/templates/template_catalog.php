<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Catalogo de Productos - Cultura Imparable</title>
        <!--[if lt IE 10]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
        <meta name="author" content="Cultura Imparable">
        <meta name="keyword" content="Cultura Imparable, Movimiento Imparable, Imparable Perú, embajadores, Imparable social, red social, mlm, mmn, culturaimprable.com, desarrollo personal, catalogo de productos, productos, plataforma de cursos online">
        <!--//STAR FAVICON-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() . 'static/page_front/images/logo/favico/apple-touch-icon.png'; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-32x32.png'; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-16x16.png'; ?>">
        <link rel="manifest" href="<?php echo site_url() . 'static/page_front/images/logo/favico/site.webmanifest'; ?>">
        <!--//END FAVICON-->
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/style.css'; ?>">
        <!--//CUSTOMER CSS-->
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/my_style.css'; ?>">
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/gallery.css'; ?>">
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/ekko-lightbox.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/lightbox.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo site_url() . 'static/course/css/dark.css'; ?>">
        <script src="https://unpkg.com/feather-icons"></script>
        <script type="text/javascript">
            var site = '<?php echo site_url(); ?>';
        </script>
        <!-- Incluyendo Culqi Checkout -->
        <script src="https://checkout.culqi.com/js/v3"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <!--//swetaler2-->
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet" media="none" onload="if (media != 'all')
                    media = 'all'">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    </head>
    <body class="layout-6" style="background-image: url('<?php echo site_url() . 'static/course/img/bg1.jpg'; ?>'); background-size: cover;">
        <nav class="pcoded-navbar menu-light brand-lightblue menupos-static">
            <div class="navbar-wrapper">
                <div class="navbar-brand header-logo">
                    <a href="<?php echo site_url() . 'mi_catalogo'; ?>" class="b-brand">
                        <img src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" alt="Logo" width="35"/>
                        <span class="b-title">Catalogo Empresas</span>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a></div>
                <div class="navbar-content scroll-div">

                    <ul class="nav pcoded-inner-navbar">
                        <center>
                            <li class="nav-item" style="padding:5px;">
                                <?php if (!empty($obj_profile->img)) { ?>
                                    <img alt="avatar" class="radius-50" src="<?php echo site_url() . "static/backoffice/images/profile/$obj_profile->customer_id/$obj_profile->img"; ?>" width="80" style="border">
                                <?php } else { ?>
                                    <img alt="avatar" class="radius-50" src="<?php echo site_url() . 'static/backoffice/images/avatar.png'; ?>" width="80" style="border">
                                <?php } ?>    
                            </li>
                            <li class="nav-item">
                                <div class="sale-tag medium--right">
                                    Disponible <span class="money conversion-bear-money">&dollar;<?php echo $total_compra != "" ? format_number_miles($total_compra) : "0.00"; ?></span>
                                </div>
                            </li>
                        </center>

                        <li class="nav-item pcoded-menu-caption"><label>Navegación</label></li>
                        <?php
                        $url = explode("/", uri_string());
                        if (isset($url[1])) {
                            $nav = $url[1];
                        } else {
                            $nav = "home";
                        }
                        $catalog_syle = "";
                        $home_syle = "";
                        $order_syle = "";

                        switch ($nav) {
                            case "home":
                                $home_syle = "color-black";
                                break;
                            case "order":
                                $order_syle = "color-black";
                                break;
                            default:
                                $catalog_syle = "color-black";
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
                        <?php
                        $url = explode("/", uri_string()); 
                        if($url[0] == "backoffice"){?>
                            <li class="nav-item">
                                <a href="<?php echo site_url() . 'backoffice/cursos'; ?>" class="nav-link <?php echo $home_syle; ?>">
                                    <span class="pcoded-micon">
                                        <i data-feather="home"></i>
                                    </span>
                                    <span class="pcoded-mtext">Inicio</span>
                                </a>
                            </li>
                            <li class="nav-item pcoded-hasmenu pcoded-trigger">
                                <a href="#!" class="nav-link">
                                    <span class="pcoded-micon">
                                        <i data-feather="airplay"></i>
                                    </span>
                                    <span class="pcoded-mtext">Mis Categorías</span></a>
                                        <ul class="pcoded-submenu">
                                            <?php foreach ($obj_category_catalogo as $value) { ?>
                                                <li class="pcoded-trigger">
                                                    <a href="<?php echo site_url()."backoffice/cursos/".$value->slug;?>"><b><?php echo $value->name; ?></b></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="pcoded-micon">
                                        <i data-feather="shopping-cart"></i>
                                    </span>
                                    <span class="pcoded-mtext">Mis Pedidos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url() . 'login/logout'; ?>" class="nav-link">
                                    <span class="pcoded-micon">
                                        <i data-feather="log-out"></i>
                                    </span>
                                    <span class="pcoded-mtext">Salir</span>
                                </a>
                            </li>
                            

                        <?php }else{ ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url() . 'mi_catalogo'; ?>" class="nav-link <?php echo $home_syle; ?>">
                                    <span class="pcoded-micon">
                                        <i data-feather="home"></i>
                                    </span>
                                    <span class="pcoded-mtext">Inicio</span>
                                </a>
                            </li>
                            <li class="nav-item pcoded-hasmenu pcoded-trigger">
                                <a href="#!" class="nav-link <?php echo $catalog_syle; ?>">
                                    <span class="pcoded-micon">
                                        <i data-feather="airplay"></i>
                                    </span>
                                    <span class="pcoded-mtext">Mis Categorías</span></a>
                                <ul class="pcoded-submenu">
                                    <?php foreach ($obj_category_catalogo as $value) { ?>
                                        <li class="pcoded-hasmenu pcoded-trigger">
                                            <a href="#"><b><?php echo $value->name; ?></b></a>
                                            <ul class="pcoded-submenu" style="display: block;">
                                                <?php
                                                foreach ($obj_sub_category as $key => $value_sub) {
                                                    if ($value_sub->category_id == $value->category_id && $value_sub != "") {?>
                                                            <li>
                                                                <a href='<?php echo site_url() . "mi_catalogo/subcategoria/$value_sub->slug"; ?>'><?php echo $value_sub->name; ?></a>
                                                            </li>
                                                    <?php } else {
                                                        if ($key == 0) { ?>
                                                            <li>
                                                                <a href='<?php echo site_url() . "mi_catalogo/$value->slug"; ?>'>Ver</a>
                                                            </li>
                                                        <?php } ?>
                                                        <?php
                                                    }
                                                }
                                                ?> 
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url() . 'mi_catalogo/order'; ?>" class="nav-link <?php echo $order_syle; ?>">
                                    <span class="pcoded-micon">
                                        <i data-feather="shopping-cart"></i>
                                    </span>
                                    <span class="pcoded-mtext">Mis Pedidos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url() . 'login/logout'; ?>" class="nav-link">
                                    <span class="pcoded-micon">
                                        <i data-feather="log-out"></i>
                                    </span>
                                    <span class="pcoded-mtext">Salir</span>
                                </a>
                            </li>
                        <?php }  ?>    
                    </ul>
                </div>
            </div>
        </nav>
        <header class="navbar pcoded-header navbar-expand-lg navbar-light">
            <div class="m-header"><a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
                <a href="<?php echo site_url() . 'login/logout'; ?>" class="b-brand">
                    <img src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" alt="Logo" width="35"/>
                    <span class="b-title">Catalogo de Empresas</span></a>
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
            <div class="collapse navbar-collapse">
                <?php
                //count data cart
                $cart = count($this->cart->contents());
                if ($cart > 0) {
                    ?>
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <div class="dropdown drp-user">
                                <a href="<?php echo site_url() . 'mi_catalogo/pay_order'; ?>">
                                    <span class="btn-glow-dark theme-bg" title="Pagar Compra" data-toggle="tooltip" data-placement="bottom" data-original-title="Pagar Compra" style="padding: 10px;border-radius: 10px;">
                                        <i data-feather="shopping-cart" style="color: white;"></i>
                                    </span>

                                </a>
                            </div>
                        </li>
                    </ul>
        <?php } ?>   
            </div>
        </header>
<?php echo $body; ?>
        <!--[if lt IE 11]> <div class="ie-warning"> <h1>Warning!!</h1> <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website. </p> <div class="iew-container"> <ul class="iew-download"> <li> <a href="http://www.google.com/chrome/"> <img src="../assets/images/browser/chrome.png" alt="Chrome"> <div>Chrome</div> </a> </li> <li> <a href="https://www.mozilla.org/en-US/firefox/new/"> <img src="../assets/images/browser/firefox.png" alt="Firefox"> <div>Firefox</div> </a> </li> <li> <a href="http://www.opera.com"> <img src="../assets/images/browser/opera.png" alt="Opera"> <div>Opera</div> </a> </li> <li> <a href="https://www.apple.com/safari/"> <img src="../assets/images/browser/safari.png" alt="Safari"> <div>Safari</div> </a> </li> <li> <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"> <img src="../assets/images/browser/ie.png" alt=""> <div>IE (11 & above)</div> </a> </li> </ul> </div> <p>Sorry for the inconvenience!</p> </div> <![endif]-->
        <script src="<?php echo site_url() . 'static/course/js/vendor-all.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/course/js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/course/js/pcoded.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/course/js/ekko-lightbox.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/course/js/ac-lightbox.js'; ?>"></script>
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