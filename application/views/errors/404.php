<!DOCTYPE html>
<html lang="es-PE">
    <?php $this->load->view("head"); ?>
    <body class="bp-nouveau error404 wp-embed-responsive theme-wordpress-lms woocommerce-no-js pagetitle-show hfeed bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr learnpress-v3 buy-through-membership header-template-overlay wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
        <div id="thim-preloading">
            <div class="thim-loading-icon">
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
        <div id="wrapper-container" class="content-pusher creative-right bg-type-color">
            <div class="overlay-close-menu"></div>
            <?php $this->load->view("header"); ?>
            <?php $this->load->view("nav"); ?>
            <div id="main-content">
                <section class="content-area">
                    <div class="page-title layout-1">
                        <div class="main-top no-parallax" style="background-image:url(<?php echo site_url() . 'static/page_front/images/background_2.jpg'; ?>)"><span class=overlay-top-header style="background-color: rgba(0,0,0,0.6);"></span>
                            <div class="content container">
                                <div class="row">
                                    <div class="text-title col-md-6">
                                        <h1>404 Página</h1>
                                    </div>
                                    <div class="text-description col-md-6">
                                        <div class="banner-description">
                                            <p><strong class="br">Te encuentras en cultura imparable </strong> Si aún no eres socio, entonces regístrate.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-content ">
                            <div class="breadcrumbs-wrapper container">
                                <ul itemscope id="breadcrumbs" class="breadcrumbs">
                                    <li itemprop="itemListElement" itemscope>
                                        <a itemprop="item" href="<?php echo site_url();?>" title="Home"><span itemprop="Inicio">Inicio</span></a>
                                        <meta itemprop="position" content="1"><span class="breadcrum-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                    <li itemprop="itemListElement" itemscope>
                                        <span itemprop="name" title="404 Page">404 Página</span>
                                        <meta itemprop="position" content="2">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container site-content ">
                        <div class="row">
                            <main id="main" class="site-main col-sm-12 full-width">
                                <section class="error-404 not-found">
                                    <div class="page-content">
                                        <h3 class="intro">Página no encontrada!</h3>
                                        <p class="404-message">Lo sentimos, no podemos encontrar la página que estás buscando. Por favor ve a <a href='<?php echo site_url();?>'>Inicio.</a></p>
                                    </div>
                                </section>
                            </main>
                        </div>
                    </div>
                </section>
            </div>
           <?php $this->load->view("footer_2"); ?>
        </div>
        <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
        <div class="gallery-slider-content"></div>
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='<?php echo site_url() . 'static/page_front/js/script/contact.js'; ?>'></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    </body>
</html>