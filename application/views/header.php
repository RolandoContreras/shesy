<header id="masthead" class="site-header affix-top template-layout-2 sticky-header has-retina-logo has-retina-logo-sticky palette-transparent header-overlay">
    <div class="header-wrapper header-v2 default">
        <div class="main-header container">
            <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
                <a class="login_2" href="<?php echo site_url() . 'login'; ?>">Ingresar</a>  
                &nbsp;&nbsp;&nbsp;
                <div class="icon-wrap"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></div>
            </div>
            <div class="width-logo">
                <a class="no-sticky-logo" href="<?php echo site_url(); ?>" title="Logo Imparable" rel="home">
                    <img alt="Logo Imparable" width="70" height="45" src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>">
                </a>
                <a href="<?php echo site_url(); ?>" title="Logo Imparable" rel="Inicio" class="sticky-logo">
                    <img alt="Logo Imparable" width="70" height="30" src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>">
                </a>
            </div>
            <?php
            $url = explode("/", uri_string());
            if (isset($url[0])) {
                $nav = $url[0];
            } else {
                $nav = "";
            }
            $home_syle = "";
            $courses_syle = "";
            $contact_syle = "";
            $catalog_syle = "";
            switch ($nav) {
                case "courses":
                    $courses_syle = "current-menu-parent ";
                    break;
                case "catalog":
                    $catalog_syle = "current-menu-parent ";
                    break;
                case "contact":
                    $contact_syle = "current-menu-parent ";
                    break;
                default:
                    $home_syle = "current-menu-parent ";
                    break;
            }
            ?>
            <div class="width-navigation">
                <ul id="primary-menu" class="main-menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $home_syle; ?> menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url(); ?>" class="tc-menu-inner">Inicio</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $courses_syle; ?> menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
                        <a href="<?php echo site_url() . 'courses'; ?>" class="tc-menu-inner">Cursos</a>
                        <div class='tc-megamenu-wrapper tc-megamenu-holder mega-sub-menu sub-menu'>
                            <p>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="vc_wp_custommenu wpb_content_element">
                                                <div class="widget widget_nav_menu">
                                                    <h2 class="widgettitle">Acerca de Cursos</h2>
                                                    <div class="menu-mega-menu-container">
                                                        <ul class="menu">
                                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4117 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                                <a href="<?php echo site_url() . 'courses'; ?>" class="tc-menu-inner black">Todos los Cursos</a>
                                                            </li>
                                                            <?php foreach ($obj_category_videos as $value) { ?>
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                                    <a href='<?php echo site_url() . "courses/$value->slug"; ?>' class="tc-menu-inner black"><?php echo $value->name; ?></a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-8">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="thim-courses-megamenu row">
                                                <div class="course-item col-sm-12">
                                                    <div class="feature-img">
                                                        <img width="300" height="300" alt="Cursos Gratuitos" src="<?php echo site_url() . 'static/page_front/images/cursos_gratuitos.jpg'; ?>" class="lazyload">
                                                    </div>
                                                    <div class=course-detail>
                                                        <h3 class="title">
                                                            <a href="<?php echo site_url() . 'register'; ?>">Prueba nuestros cursos gratuitos</a>
                                                        </h3>
                                                        <div class="price"><span class="course-price">¡Regístrate Gratis! </span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="menu-item-3813" class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $catalog_syle; ?> menu-item-has-children menu-item-3813 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url() . 'catalog'; ?>" class="tc-menu-inner">Catalogo</a>
                        <ul class="sub-menu" style="display: none;">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                <a href='<?php echo site_url() . "catalog"; ?>' class="black tc-menu-inner tc-megamenu-title">Todos los Productos</a>
                            </li>
                            <?php foreach ($obj_category_catalog as $value) { ?>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                    <a href='<?php echo site_url() . "catalog/$value->slug"; ?>' class="black tc-menu-inner tc-megamenu-title"><?php echo $value->name; ?></a>
                                    <ul class="sub-menu" style="display: none;">
                                        <?php foreach ($obj_sub_category as $value_sub) {
                                            if ($value_sub->category_id == $value->category_id) { ?>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                                    <a href='<?php echo site_url() . "catalog/subcategoria/$value_sub->slug"; ?>' class="black tc-menu-inner tc-megamenu-title"><?php echo $value_sub->name; ?></a>
                                                </li>
                                            <?php } } ?> 
                                    </ul>
                                </li>
                            <?php } ?> 
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $contact_syle; ?> menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url() . 'contact'; ?>" class="tc-menu-inner">Contacto</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url() . 'register'; ?>" class="login">REGISTRO</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url() . 'login'; ?>" class="login">LOGIN</a>
                    </li>
                </ul>
                <?php
                //count data cart
                $cart = count($this->cart->contents());
                if ($cart > 0) {
                    ?>
                    <a href="javascript:void(0);" onclick="validate_login();">
                        <div class="header-right">
                            <div class="widget woocommerce widget_shopping_cart">
                                <div class="minicart_hover green_yellow" id="header-mini-cart">
                                    <span class="cart-items-number">
                                        <span class="text">Carrito</span> 
                                        <i class="fas fa-shopping-cart"></i>
                                        <span class="wrapper-items-number">
                                            <span class="items-number"><?php echo $cart; ?></span></span>
                                    </span>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </a>
<?php } ?>  
            </div>
        </div>
    </div>
</header>