<!DOCTYPE html>
<html lang="es">
<?php $this->load->view("head");?>
<body class="home-page bp-nouveau home page-template page-template-templates page-template-home-page page-template-templateshome-page-php page page-id-565 wp-embed-responsive theme-wordpress-lms pmpro-body-has-access woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr learnpress-v3 buy-through-membership header-template-overlay wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
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
          <div class="width-navigation">
            <ul id="primary-menu" class="main-menu">
                <li id=menu-item-22 class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-22 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                    <a href="<?php echo site_url();?>" class="tc-menu-inner">Inicio</a>
                </li>
                <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'about';?>" class="tc-menu-inner">Acerca</a>
                </li>
                <li id="menu-item-48" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-builder">
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
                                          <?php 
                                              foreach ($obj_category_videos as $value) { ?>
                                                    <li id="menu-item-4115" class="menu-item menu-item-type-post_type menu-item-object-lp_course menu-item-4115 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                                                      <a href='<?php echo site_url()."courses/$value->slug";?>' class="tc-menu-inner"><?php echo $value->name;?></a>
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
                  <li id="menu-item-3813" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-3813 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
                      <a href="<?php echo site_url().'catalog';?>" class="tc-menu-inner">Catalogo</a>
                      <ul class="sub-menu" style="display: none;">
                          <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                <a href='<?php echo site_url()."catalog";?>' class="tc-menu-inner tc-megamenu-title">Todos los Productos</a>
                          </li>
                          <?php 
                          foreach ($obj_category_catalog as $value) { ?>
                            <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 tc-menu-item tc-menu-depth-1 tc-menu-align-left">
                                <a href='<?php echo site_url()."catalog/$value->slug";?>' class="tc-menu-inner tc-megamenu-title"><?php echo  $value->name;?></a>
                            </li>
                          <?php  } ?> 
                      </ul>
                  </li>
                  
                  
                  <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default">
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
    <?php $this->load->view("nav",$obj_category_videos);?>
    <div id="main-content">
      <div id="home-main-content" class="home-content home-page container" role="main">
          <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.5" data-vc-parallax-image="<?php echo site_url().'static/page_front/images/background.jpg';?>" class="vc_row wpb_row vc_row-fluid thim-header-block vc_custom_1528698277459 thim-background-overlay vc_row-has-fill vc_row-o-full-height vc_row-o-columns-stretch vc_row-o-equal-height vc_row-flex vc_general vc_parallax vc_parallax-content-moving">
          <div class=overlay style="background-color: rgba(0,0,0,0.90)"></div>
          <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class=vc_column-inner>
              <div class=wpb_wrapper>
                <div class=vc_empty_space style="height: 88px"><span class=vc_empty_space_inner></span></div>
                <div class="vc_wp_text wpb_content_element thim-textbox-header">
                  <div class="widget widget_text">
                    <div class=textwidget>
                      <h3 style="text-align: center;">¡BIENVENIDO!</h3>
                      <p style="text-align: center;">
                              <img style="padding:15px; opacity: 0.5;" alt="Logo FK" width="200" src="<?php echo site_url().'static/page_front/images/logo/logo.png';?>" class="logo">
                          <br/>
                      </p>
                      <p style="text-align: center; padding-top:5px;">
                              CULTURA DE EMPRENDEDORES CON PROPÓSITO
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="thim-sc-image-box left">
                            <section id="title2">
                                  <div class="">
                                      <div class="thim-sc-steps layout-4">
                                        <div class="sc-steps-wrapper border-radius-30" style="background-image: url(<?php echo site_url().'static/page_front/images/layer_1.jpg';?>);">
                                            <div class="inner-steps-wrapper border-radius-30">
                                            <div class="container">
                                              <div class="row">
                                                  <div class="col-lg-6 media-box">
                                                  <div class="player-wrapper respondive_c">
                                                    <div class="player-inner">
                                                        <iframe width="640" height="275" src="<?php echo site_url().'static/page_front/video/presentacion.mp4';?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                    </div>
                                                  </div>
                                                  <div class="icon-play"></div>
                                                </div>
                                                <div class="col-lg-6 content-box">
                                                    <center>
                                                    <div class=steps-wrapper style="">
                                                      <h3 class="sc-title" style="text-align:center !important;">¿Qué es la cultura FK?</h3>
                                                      <p class="description respondive_d">Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos, la visión es ser una comunidad de fuerte INFLUENCIA capas de respaldar CAMBIOS POSITIVOS EN LA SOCIEDAD para generar un mundo más próspero y trascendente.</p>
                                                      <p class="description respondive_d div_hide">Tu misión es convertirte en esa persona que quieres ser para que tu éxito sume en nuestra influencia colectiva. Si deseas más información observa el siguiente video</p>
                                                    <div>
                                                      <div class=tab-content>
                                                        <div class="tab-pane active">
                                                          
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  </center>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </section>
                    <div class="vc_empty_space" style="height: 48px"><span class="vc_empty_space_inner"></span></div>
                          </div>
                <div class="thim-sc-course-search ">
                    <div class=thim-loading-icon>
                      <div class=sk-three-bounce>
                        <div class="sk-child sk-bounce1"></div>
                        <div class="sk-child sk-bounce2"></div>
                        <div class="sk-child sk-bounce3"></div>
                      </div>
                    </div><span class=widget-search-close></span>
                    <ul class="courses-list-search list-unstyled"></ul>
                </div>
                
                <!--STAR WELCOME-->
                <div class="vc_row wpb_row vc_inner vc_row-fluid list-iconbox">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class=vc_column-inner>
                      <div class=wpb_wrapper>
                        <div class="thim-sc-icon-box layout-2 default">
                          <div class=icon-box-wrapper style>
                            <div class=box-icon style="">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <div class=box-content>
                              <h3 class="title">Talleres educativos</h3>
                            </div>
                          </div>
                        </div>
                        <div class="thim-sc-icon-box layout-2 default">
                          <div class=icon-box-wrapper style=" border-color: #df6c4f; color: #df6c4f;">
                            <div class=box-icon style="">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class=box-content>
                              <h3 class="title">Talleres de interacción</h3>
                            </div>
                          </div>
                        </div>
                        <div class="thim-sc-icon-box layout-2 default">
                          <div class=icon-box-wrapper style=" border-color: #49a942; color: #49a942;">
                            <div class=box-icon>
                                <i class="fa fa-hands-helping"></i>
                            </div>
                            <div class="box-content">
                              <h3 class="title">Ayudas sociales</h3>
                            </div>
                          </div>
                        </div>
                        <div class="thim-sc-icon-box layout-2 default">
                          <div class=icon-box-wrapper style=" border-color: #00a78e; color: #00a78e;">
                            <div class="box-icon">
                                <i class="fa fa-trophy" aria-hidden="true"></i>
                            </div>
                            <div class="box-content">
                              <h3 class="title">Emprendimiento</h3>
                            </div>
                          </div>
                        </div>
                          <div class="vc_empty_space" style="height: 48px"><span class="vc_empty_space_inner"></span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--END WELCOME-->
                <div class="thim-sc-scroll-heading next-screen">
                  <div class=title data-scroll-to=#next-screen data-scroll-speed=700 data-scroll-offset>
                    <div class=text>Next</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="vc_row-full-width vc_clearfix"></div>
        <div id="next-screen" class="vc_row-full-width vc_clearfix"></div>
      <div data-vc-full-width="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1501121593742 vc_row-has-fill vc_row-no-padding">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="">
              <!--STAR ACERCA--->
              <div class="wpb_wrapper">
                  <div class="thim-sc-steps layout-4" style="padding:0px !important;">
                      <div class=sc-steps-wrapper style="background-image: url(<?php echo site_url().'static/page_front/images/fondo-abstracto.jpg';?>); ">
                          <div class=inner-steps-wrapper style="background: none !important;">
                    <div class=container>
                      <div class=row>
                          <div class="col-lg-6 content-box">
                          <div class=steps-wrapper>
                              <h3 class="sc-title" style="color:black !important;">¿Qué es la embajada FK?</h3>
                            <div class=steps>
                              <div class=tab-content>
                                <div class="tab-pane active">
                                    <p class="description respondive_a black">Si eres el tipo de persona que más allá de participar, busca ser PROTAGONISTA de esta cultura, crear más espacios de valor e impulsándola para que más personas puedan conocerla. Te invito a observar el siguiente video y postular a la embajada Fk para que adquieras toda la información, recursos financieros y educativos.</p>
                                  <p class="description respondive_a div_hide black">Tu misión es convertirte en esa persona que quieres ser para que tu éxito sume en nuestra influencia colectiva. Si deseas más información observa el siguiente video:</p>
                                  <a href="#" class="readmore">Postular a ser un emabajador </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="col-lg-6 media-box">
                          <div class="player-wrapper">
                            <div class="player-inner">
                                <iframe width="640" height="275" autoplay="false"  src="<?php echo site_url().'static/page_front/video/embajada.mp4';?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                          </div>
                          <div class="icon-play"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--END ACERCA---->
            <div class=wpb_wrapper>
              <div class="thim-sc-steps layout-3">
                <div class=container>
                  <div class=row>
                    <div class="col-md-12 heading">
                      <div class=steps-wrapper>
                        <h3 class="sc-title">Conviértete en parte de nuestra cultura</h3>
                        <div class=steps>
                          <ul class="nav" role="tablist">
                            <li class="nav-item active" data-toggle="tab" href="#thim_5def1b33677ed-step-0" role="tab">
                                <a class=nav-link>1<span>paso</span></a>
                                <p class=tab-title>Crea tu registro gratis</p>
                            </li>
                            <li class="nav-item " data-toggle="tab" href="#thim_5def1b33677ed-step-2" role="tab">
                                <a class="nav-link">2<span>paso</span></a>
                                <p class="tab-title">Aprende con nosotros</p>
                            </li>
                            <li class="nav-item " data-toggle="tab" href="#thim_5def1b33677ed-step-3" role="tab">
                                <a class=nav-link>3<span>paso</span></a>
                              <p class=tab-title>Comparte la información</p>
                            </li>
                            <li class="nav-item" data-toggle="tab" href="#thim_5def1b33677ed-step-4" role="tab">
                                <a class="nav-link">4<span>paso</span></a>
                                <p class="tab-title">Recibe una recompensa</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 media-box">
                      <div class=media-wrapper>
                          <img width="830" height="550" alt="group-4" data-src="<?php echo site_url().'static/page_front/images/group-4.png';?>" class="lazyload">
                      </div>
                    </div>
                    <div class="col-md-6 content-box">
                      <div class=steps-wrapper>
                        <div class=steps>
                          <div class=tab-content>
                            <div class="tab-pane active" id="thim_5def1b33677ed-step-0" role="tabpanel">
                              <h4 class="tab-title">Crea tu registro gratis</h4>
                              <p class=description>Ve la pestaña registro, completa tus datos y el sistema te creará un usuario gratuitamente para que seas un nuevo socio.</p>
                              <a href="<?php echo site_url().'register';?>" style="margin-top: 10px;" class="readmore">Crear Cuenta</a>
                            </div>
                            <div class="tab-pane" id="thim_5def1b33677ed-step-2" role="tabpanel">
                              <h4 class="tab-title">Aprende con nosotros</h4>
                              <p class=description>Participaran de la plataforma educativa Online que tenemos y podrás especializarte en el área que deseas desde la comodidad de tu hogar.</p>
                            </div>
                            <div class="tab-pane" id="thim_5def1b33677ed-step-3" role="tabpanel">
                              <h4 class="tab-title">Comparte la información</h4>
                              <p class=description>Al compartir la información con tus amigos ganarás puntos que luego lo vas a poder canjear por dinero en efectivo.</p>
                            </div>
                            <div class="tab-pane" id="thim_5def1b33677ed-step-4" role="tabpanel">
                              <h4 class="tab-title">Recibe una recompensa</h4>
                              <p class=description>La corporación FK ha creado un plan de compensación para todos los socios que quieran compartir el negocio, convirtiéndose en un empresario con nosotros.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class=background-overlay style="background-image: url(<?php echo site_url().'static/page_front/images/layer-background-gold.jpg';?>);"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vc_row-full-width vc_clearfix"></div>
      <div data-vc-full-width="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1501121593742 vc_row-has-fill vc_row-no-padding">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class=vc_column-inner>
            <div class="thim-sc-steps layout-3" style="padding-bottom: 0px !important; padding-top: 55px">
                <div class=container>
                  <div class=row>
                    <div class="col-md-12 heading">
                      <div class=steps-wrapper>
                        <h3 class="sc-title">¿Te gustaría ser uno de nuestros docentes?</h3>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <img alt="group-4" data-src="<?php echo site_url().'static/page_front/images/layer_person.png';?>" class="lazyload" style="margin-top: -14%;">
                    </div>
                    <div class="col-md-6">
                      <div class=steps-wrapper>
                        <div class=steps>
                          <div class=tab-content>
                            <div class="tab-pane active" role="tabpanel">
                              <p class=description>Si deseas ser parte de nuestro equipo, comunícate a nuestro número de WhatsApp o a través de la sección de contacto.</p>
                              <p class=description>
                                  <i class="fab fa-whatsapp"></i>
                                   +(51) 926 344 838.
                              </p>
                              <div class="rounded-view-all-button">
                                  <a href="<?php echo site_url().'contact';?>">Quiero ser Docente</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="vc_row-full-width vc_clearfix"></div>
       <div id="next-screen" class="vc_row wpb_row vc_row-fluid thim-bg-top-center vc_custom_1502099498895 vc_row-has-fill vc_column-gap-10">
          <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
              <div class="wpb_wrapper">
                <!--START CURSOS-->
                <div class="thim-courses-collection-wrapper">
                  <div class="thim-collection-info rounded-colection-info">
                    <h3 class="title">¡Nuestros Cursos! Te Ayudamos a hacer crecer tu vida.</h3>
                  </div>
                  <div class="thim-courses-collection rounded-courses-collection">
                    <div class="collection-frame">
                      <ul class="slidee">
                         
                        <?php 
                        foreach ($courses as $value) { ?>
                            <li class="collection-item">
                                <img width="338" height="300" alt="<?php echo $value->name;?>" data-src='<?php echo site_url()."static/course/img/$value->img2";?>' class="lazyload">
                                <a class="collection-wrapper" href='<?php echo site_url()."courses/$value->category_slug/$value->slug";?>'>
                                  <h4 class="name"><?php echo $value->name;?></h4>
                                  <div class="number-courses" style="padding:10px;"><?php echo corta_texto($value->summary,60);?></div>
                                </a>
                            </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <div class=rounded-view-all-button>
                      <a href="<?php echo site_url().'courses';?>">Ver todos los cursos</a>
                  </div>
                </div>
                <!--END CURSOS-->
              <div class=vc_empty_space style="height: 60px"><span class=vc_empty_space_inner></span></div>
            </div>
          </div>
        </div>
      </div>
      
      
      <!--START CATALOGO-->
      <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class=vc_column-inner>
            <div class=wpb_wrapper>
              <div class=vc_empty_space style="height: 66px"><span class=vc_empty_space_inner></span></div>
              <div class=thim-courses-block-2>
                <div class="row no-gutter">
                  <div class="col-sm-3 intro-item">
                    <div class=wrapper>
                      <h3 class="title">Catalogo</h3>
                      <p class="description">Encuentra productos exclusivos a un precio increíble por ser parte de nuestra empresa.</p>
                      <a href="<?php echo site_url().'catalog';?>" class="view-courses-button">Ver todo el Catalogo</a>
                    </div>
                  </div>
                    <?php 
                    foreach ($catalog as $value) { ?>
                        <div class="col-sm-3 course-item free">
                        <div class=featured-img>
                            <a href='<?php echo site_url()."catalog/$value->category_slug/$value->slug";?>' class="img-link">
                                <img width=400 height=400 alt="<?php echo $value->name;?>" data-src='<?php echo site_url()."static/catalog/$value->img";?>' class="lazyload">
                            </a>
                        </div>
                        <div class=content-item>
                          <div class=name>
                              <a href="<?php echo site_url()."catalog/$value->slug";?>"><?php echo $value->name;?></a>
                          </div>
                          <h4 class="title">
                              <a href="<?php echo site_url()."catalog/$value->slug";?>"><?php echo corta_texto($value->summary,50);?></a>
                          </h4>
                        </div>
                      </div>
                    <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--END CATALOGO-->
    <div class="vc_row-full-width vc_clearfix"></div>
    </div>
    </div>
    <!--//START FOOTER-->
    <?php $this->load->view("footer");?>
    <!--//START FOOTER-->
    </div>
    <div id=back-to-top><i class="fa fa-angle-up" aria-hidden=true></i></div>
    <div id="tp_chameleon_list_google_fonts"></div>
      <div class="gallery-slider-content"></div>
      <script>
        var BP_Nouveau = {"ajaxurl":"","object_nav_parent":"#buddypress","objects":{"0":"activity","1":"members","4":"xprofile","7":"settings","8":"notifications"},"nonces":{"activity":"fcd5ecf43e","members":"9af41e8848","xprofile":"10dfc2af2b","settings":"8d89e10911"}};
      </script>
      <script>
        window.lazySizesConfig = window.lazySizesConfig || {};window.lazySizesConfig.lazyClass = 'lazyload';window.lazySizesConfig.loadingClass = 'lazyloading';window.lazySizesConfig.loadedClass = 'lazyloaded';lazySizesConfig.loadMode = 1;
      </script>
      <script>
        lazySizes.init();
      </script>
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
</body>
</html>