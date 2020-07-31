<footer id="colophon" class="site-footer dark style_old">
    <div class="footer no-footer-sticky ">
      <div class="container">
          <div class="row footer-columns footer-sidebars">
            <div class="footer-col footer-col6 col-xs-12 col-md-3">
                <aside id="nav_menu-2" class="widget widget_nav_menu">
                <h3 class="widget-title">Nosotros</h3>
                <div class="menu-company-container">
                  <ul id="menu-company" class="menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        Somos una comunidad de influencia con el objetivo de generar cambios positivos en la sociedad.
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <img src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" width="100">
                    </li>
                  </ul>
                </div>
              </aside>
            </div>
            <div class="footer-col footer-col6 col-xs-12 col-md-2">
              <aside id="nav_menu-3" class="widget widget_nav_menu">
                <h3 class="widget-title">Cursos</h3>
                <div class="menu-programs-container">
                  <ul id="menu-programs" class="menu">
                     <?php 
                      foreach ($obj_category_videos as $value) { ?>
                          <li class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                              <a href='<?php echo site_url()."courses/$value->slug";?>' class="tc-menu-inner"><?php echo $value->name;?></a>
                          </li>
                      <?php } ?> 
                  </ul>
                </div>
              </aside>
            </div>
            <div class="footer-col footer-col6 col-xs-12 col-md-3">
              <aside id=text-3 class="widget widget_text">
                <h3 class="widget-title">Contacto</h3>
                <div class=textwidget>
                  <ul>
                    <li>
                        <i class="fa fa-envelope"></i> 
                        <a href="<?php echo site_url().'contact';?>">
                            <span>contacto@culturafk.com</span>
                        </a>
                    </li>
                    <li><i class="fa fa-fax"></i> 51 931770526</li>
                    <!--<li><i class="fa fa-map-marker"></i> Av. Alfredo Benavides 2191 - Lima.</li>-->
                  </ul>
                </div>
              </aside>
            </div>
            <div class="footer-col footer-col6 col-xs-12 col-md-2">
              <aside id=nav_menu-4 class="widget widget_nav_menu">
                <h3 class="widget-title">Enlaces</h3>
                <div class=menu-links-container>
                  <ul id=menu-links class=menu>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4124 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url();?>" class="tc-menu-inner">Inicio</a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url().'courses';?>" class=tc-menu-inner>Cursos</a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url().'catalog';?>" class=tc-menu-inner>Catalogo</a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url().'contact';?>" class=tc-menu-inner>Contacto</a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                        <a href="<?php echo site_url().'login';?>" class=tc-menu-inner>Iniciar Sesión</a>
                    </li>
                  </ul>
                </div>
              </aside>
            </div>
              <div class="footer-col footer-col6 col-xs-12 col-md-2">
              <aside id=nav_menu-4 class="widget widget_nav_menu">
                <h3 class="widget-title">Social</h3>
                <div class=menu-links-container>
                  <ul id=menu-links class=menu>
                      <div class="thim-sc-social-links ">
                          <ul class="socials">
                            <li>
                                <a target="_blank" href="https://facebook.com">Facebook</a>
                                <a target="_blank" href="https://youtube.com">Youtube</a>
                                <a target="_blank" href="https://www.instagram.com">Instagram</a>
                            </li>
                          </ul>
                      </div>

                  </ul>
                </div>
              </aside>
            </div>
              
          </div>
        </div>
    </div>
     <div class="copyright-area ">
        <div class="container">
          <div class="copyright-content">
            <div class="row">
            </div>
          </div>
        </div>
      </div>
  </footer>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="769313953214961"
  theme_color="#0084ff"
  logged_in_greeting="Hola!! ¿te puedo ayudar en algo?"
  logged_out_greeting="Hola!! ¿te puedo ayudar en algo?">
      </div>