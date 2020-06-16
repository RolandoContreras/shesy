<nav class="visible-xs mobile-menu-container mobile-effect">
    <div class=inner-off-canvas>
        <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">Cerrar <i class="fa fa-times" aria-hidden=true></i></div>
        <?php
        //count data cart
        $cart = count($this->cart->contents());
        if ($cart > 0) {
            ?>
            <a href="javascript:void(0);" onclick="validate_login();">|
                <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
                    <div class="minicart_hover green_yellow" id="header-mini-cart">
                        <span class="cart-items-number">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="wrapper-items-number">
                                <span class="items-number"><?php echo $cart; ?></span></span>
                        </span>
                    </div>
                </div>
            </a>
        <?php } ?>  
        <div class="thim-mobile-search-cart ">
            <div class="thim-search-wrapper hidden-lg-up">
            </div>
        </div>
        <?php
        $url = explode("/", uri_string());
        if (isset($url[0])) {
            $nav = $url[0];
        } else {
            $nav = "";
        }

        $home_syle = "";
        $about_syle = "";
        $courses_syle = "";
        $contact_syle = "";
        $catalog_syle = "";

        switch ($nav) {
            case "about":
                $about_syle = "current-menu-parent ";
                break;
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

        <ul class="nav navbar-nav">
            <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $home_syle; ?> menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                <a href="<?php echo site_url(); ?>" class="tc-menu-inner">Inicio</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $courses_syle; ?> menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
                <a class="tc-menu-inner">Cursos</a>
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
                                                <ul id="menu-mega-menu" class="menu">
                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4117 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                        <a href="<?php echo site_url() . 'cursos'; ?>" class="tc-menu-inner">Todos los Cursos</a>
                                                    </li>
                                                    <?php foreach ($obj_category_videos as $value) { ?>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                            <a href='<?php echo site_url() . "cursos/$value->slug"; ?>' class="tc-menu-inner"><?php echo $value->name; ?></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="thim-courses-megamenu row">
                                        <div class="course-item col-sm-12">
                                            <div class="feature-img">
                                                <img width="300" height="300" alt="Cursos Gratuitos" src="<?php echo site_url() . 'static/page_front/images/cursos_gratuitos.jpg'; ?>" class="lazyload">
                                            </div>
                                            <div class="course-detail">
                                                <h3 class="title">
                                                    <a href="<?php echo site_url() . 'registro'; ?>">Prueba nuestros cursos gratuitos</a>
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
            <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $catalog_syle; ?> menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
                <a class="tc-menu-inner">Catalogo</a>
                <div class='tc-megamenu-wrapper tc-megamenu-holder mega-sub-menu sub-menu'>
                    <p>
                    <div class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-4">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_wp_custommenu wpb_content_element">
                                        <div class="widget widget_nav_menu">
                                            <h2 class="widgettitle">Acerca del Catalogo</h2>
                                            <div class="menu-mega-menu-container">
                                                <ul class="menu">
                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4117 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                        <a href="<?php echo site_url() . 'catalogo'; ?>" class="tc-menu-inner">Todos los Productos</a>
                                                    </li>
                                                    <?php foreach ($obj_category_catalog as $value) { ?>
                                                        <li class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                            <a href='<?php echo site_url() . "catalogo/$value->slug"; ?>' class="tc-menu-inner"><?php echo $value->name; ?></a>
                                                            <ul class="menu">
                                                                <?php foreach ($obj_sub_category as $value_sub) {
                                                                    if ($value_sub->category_id == $value->category_id) {
                                                                        ?>
                                                                        <li class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                                            <a href='<?php echo site_url() . "catalogo/subcategoria/$value_sub->slug"; ?>' class="tc-menu-inner"><?php echo $value_sub->name; ?></a>
                                                                        </li>
                                                                    <?php } } ?> 
                                                                </ul>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $contact_syle; ?> menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="<?php echo site_url() . 'contacto'; ?>" class=tc-menu-inner>Contacto</a>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="<?php echo site_url() . 'registro'; ?>" class=tc-menu-inner>Registro</a>
            </li>
        </ul>
        <div class="header-right">
            <div class="widget woocommerce widget_shopping_cart">

            </div>
        </div>
        <div class=off-canvas-widgetarea>
            <div class="widget widget_text">
                <div class=textwidget>
                    <ul>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a>+(51)1 224-8210</a></li>
                        <li><i class="fa fa-envelope"></i>  <a><span>contacto@culturafk.com</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="thim-sc-social-links ">
                <ul class=socials>
                    <li><a target="_blank" href="#">Facebook</a></li>
                    <li><a target="_blank" href="#">Youtube</a></li>
                    <li><a target="_blank" href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>