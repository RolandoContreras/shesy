<header id="masthead" class="site-header affix-top template-layout-2 sticky-header has-retina-logo has-retina-logo-sticky palette-transparent header-overlay">
      <div class="header-wrapper header-v2 default">
        <div class="main-header container">
          <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
            <div class="icon-wrap"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></div>
          </div>
          <div class="width-logo">
              <a class="no-sticky-logo" href="<?php echo site_url();?>" title="Logo FK" rel="home">
                <img alt="Logo FK" width="70" height="45" data-src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" class="logo lazyload">
                <img  alt="Logo FK" width="291" height="100" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="retina-logo lazyload">
                <img alt="Logo FK" width="131" height="45" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="mobile-logo lazyload">
              </a>
            <a href="<?php echo site_url();?>" title="Logo FK" rel="home" class="sticky-logo">
                <img alt="Logo FK" width="70" height="30" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="lazyload">
                <img alt="Logo FK" width="695" height="100" data-src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" class="retina-logo-sticky lazyload">
            </a>
          </div>
            <?php
          $url = explode("/",uri_string());
            if(isset($url[0])){
                $nav = $url[0];
            }else{
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
          <div class="width-navigation">
            <ul id="primary-menu" class="main-menu">
                <li id=menu-item-22 class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $home_syle;?> menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="<?php echo site_url();?>" class="tc-menu-inner">Inicio</a>
                </li>
                <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $about_syle;?> menu-item-25 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'about';?>" class="tc-menu-inner">Acerca</a>
                </li>
                <li id="menu-item-48" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $courses_syle;?> menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
                    <a href="<?php echo site_url().'courses';?>" class="tc-menu-inner">Cursos</a>
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
                                          <li id="menu-item-4117" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4117 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                              <a href="<?php echo site_url().'courses';?>" class="tc-menu-inner">Todos los Cursos</a>
                                          </li>
                                          <li id="menu-item-4115" class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                              <a href="<?php echo site_url().'courses/personal';?>" class="tc-menu-inner">Desarrollo Personal</a>
                                          </li>
                                          <li id="menu-item-4116" class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4116 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                              <a href="<?php echo site_url().'courses/profetional';?>" class="tc-menu-inner">Crecimiento Profesional</a>
                                          </li>
                                          <li id="menu-item-4116" class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4116 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                              <a href="<?php echo site_url().'courses/finance';?>" class="tc-menu-inner">Finanzas</a>
                                          </li>
                                          <li id="menu-item-4110" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4110 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                             <a href="<?php echo site_url().'courses/extras';?>" class="tc-menu-inner">Extras</a>
                                          </li>
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
                                <img width="300" height="300" alt="Cursos Gratuitos" data-src="<?php echo site_url().'static/page_front/images/cursos_gratuitos.jpg';?>" class="lazyload">
                            </div>
                            <div class=course-detail>
                              <h3 class="title">
                                  <a href="<?php echo site_url().'register';?>">Prueba nuestros cursos gratuitos</a>
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
                  <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $catalog_syle;?> menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'catalog';?>" class="tc-menu-inner">Catalogo</a>
                  </li>
                  <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $contact_syle;?> menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'contact';?>" class="tc-menu-inner">Contacto</a>
                  </li>
                  <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'register';?>" class="login">REGISTRO</a>
                  </li>
                  <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'login';?>" class="login">LOGIN</a>
                  </li>
            </ul>
          </div>
        </div>
      </div>
    </header>