<header class="header header--static">
      <div class="announcements">
        <div id="block-1593108639155" class="header__block header__block--announcement header__block--show">
          <a class="announcement text-center background-dark">
            <div class="container"> BIENVENIDOS A CULTURA IMPARABLE </div>
          </a>
        </div>
      </div>
      <div class="header__wrap">
        <div class="header__content header__content--desktop background-dark">
          <div class="container header__container media">
            <div id="block-1555988494486" class="header__block header__block--logo header__block--show">
              <a class="logo" href="<?php echo site_url();?>"> 
                  <img class="logo__image" src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" kjb-settings-id="sections_header_blocks_1555988494486_settings_logo" alt="Logo" width="50"/> 
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
              
              <?php
                //count data cart
                $cart = count($this->cart->contents());
                if ($cart > 0) {
                    ?>
<!--                    <a href="javascript:void(0);" onclick="validate_login();">
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
                    </a>-->
            <?php } ?> 
              
              
            <div id="block-1555988491313" class="header__block header__switch-content header__block--menu media__body">
              <div class="link-list justify-content-right" kjb-settings-id="sections_header_blocks_1555988491313_settings_menu"> 
                  <a class="link-list__link" href="<?php echo site_url(); ?>" rel="noopener">Inicio</a> 
                  <a class="link-list__link" href="<?php echo site_url() . 'cursos'; ?>" rel="noopener">Cursos</a> 
                  <a class="link-list__link" href="<?php echo site_url() . "catalogo"; ?>" rel="noopener">Catalogo</a>
                  <?php// foreach ($obj_category_catalog as $value) { ?>
<!--                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                    <a href='<?php echo site_url() . "catalogo/$value->slug"; ?>' class="black tc-menu-inner tc-megamenu-title"><?php echo $value->name; ?></a>
                                    <ul class="sub-menu" style="display: none;">
                                        <?php foreach ($obj_sub_category as $value_sub) {
                                            if ($value_sub->category_id == $value->category_id) { ?>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                                    <a href='<?php echo site_url() . "catalogo/subcategoria/$value_sub->slug"; ?>' class="black tc-menu-inner tc-megamenu-title"><?php echo $value_sub->name; ?></a>
                                                </li>
                                            <?php } } ?> 
                                    </ul>
                                </li>-->
                            <?php //} ?> 
                  <a class="link-list__link" href="<?php echo site_url() . 'contacto'; ?>" rel="noopener">Contacto</a> 
                  <a class="link-list__link" href="<?php echo site_url() . 'registro'; ?>" rel="noopener">Registro</a> 
              </div>
            </div>
            <div id="block-1593710564240" class="header__block header__switch-content header__block--cta">
              <a class="btn btn-medium btn-solid btn- background-dark" href="<?php echo site_url() . 'iniciar-sesion'; ?>"> Iniciar Sesión</a>
            </div>
            <div class="hamburger hidden--desktop">
              <div class="hamburger__slices">
                <div class="hamburger__slice hamburger--slice-1"></div>
                <div class="hamburger__slice hamburger--slice-2"></div>
                <div class="hamburger__slice hamburger--slice-3"></div>
                <div class="hamburger__slice hamburger--slice-4"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="header__content header__content--mobile background-light"></div>
      </div>
    </header>