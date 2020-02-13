<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("head");?>
<body class="bp-nouveau lp_course-template-default single single-lp_course postid-486 wp-embed-responsive theme-wordpress-lms wordpress-lms learnpress learnpress-page pmpro-body-has-access woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive lp_login_popup box-shadow auto-login ltr learnpress-v3 buy-through-membership course-free header-template-overlay thim-lp-layout-1 lp-landing wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
  <div id=thim-preloading>
    <div class=thim-loading-icon>
      <div class=sk-folding-cube>
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
  </div>
  <div id=wrapper-container class="content-pusher creative-right bg-type-color">
    <div class=overlay-close-menu></div>
    <?php $this->load->view("header");?>
    <?php $this->load->view("nav");?>
  <div id=main-content>
    <section class=content-area>
      <div class="page-title layout-2">
        <div class="main-top no-parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/background_2.jpg';?>)"><span class=overlay-top-header style="background-color: rgba(0,0,0,0.6);"></span>
          <div class="content container">
            <div class=text-title>
              <h1>Desarrollo Personal</h1>
            </div>
            <div class=text-description>
              <div class=banner-description>Aprende todo lo que necesites saber con nosotros. Sé un experto en la materia.
              </div>
            </div>
          </div>
        </div>
        <div class="breadcrumb-content">
            <div class="breadcrumbs-wrapper container">
              <ul id="breadcrumbs" class="breadcrumbs">
                <li>
                    <a href="<?php echo site_url();?>" title="Inicio">
                        <span>Inicio</span>
                    </a>
                    <span class="breadcrum-icon">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                   <span title="Contacto">Cursos</span>
                </li>
              </ul>
            </div>
          </div>  
      </div>
      <div class="container site-content ">
        <div class=row>
          <div id=main class="site-main col-sm-12 full-width">
            <article id=post-486 class="sidebar-right post-486 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-business course_tag-business course_tag-theme course_tag-wordpress pmpro-has-access course">
              <div class=entry-content>
                <div id=lp-single-course class=lp-single-course>
                  <div id=learn-press-course>
                    <div class=course-summary>
                      <div class=landing-1>
                        <div class=course-info>
                          <ul class="list-inline clearfix">
                              <li class="list-inline-item item-categories">
                                  <label class="gold">Título</label>
                                    <span class="cat-links gold">Has crecer tu marca personal</span>
                              </li>
                              <li class="list-inline-item item-categories">
                                  <label>Categoría</label>
                                  <span class="cat-links">Desarrollo Personal</span>
                              </li>
                        
                          </ul>
                      </div>
                      <div class="course-thumbnail">
                        <div class="col-md-12">
                          <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="<?php echo $obj_videos->video;?>" allowfullscreen=""></iframe>
                          </div>
                        </div>
                    </div>
                    <div class="course-landing-summary has-social">
                    <div class=content-landing-1>
                      <div class=course-meta></div>
                      <div id=thim-landing-course-menu-tab>
                        <div class="container wrapper clearfix">
                          <div class="course-purchase-info has-wishlist">
                            <div class="learn-press-course-buttons lp-course-buttons">
                                <div class="rounded-view-all-button" style="margin-top:0px !important;">
                                    <a href="<?php echo site_url().'register';?>">Regístrate</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class=course-description id=learn-press-course-description>
                        <div id="tab-overview">
                          <h4>Descripción del Curso</h4>
                          <?php echo $obj_videos->description;?>
                        </div>
                      </div>
                      <div id=tab-curriculum style="height: 68px;"></div>
                      <div class=course-curriculum id=learn-press-course-curriculum>
                        <div class=curriculum-heading>
                          <div class="title">
                            <h2 class="course-curriculum-title">Contenido del Curso</h2>
                          </div>
                            <span class="total-lessons">Total vídeos: <span class="badge badge-pill badge-success" style="font-size: 100%;"><?php echo $total;?></span></span>
                        </div>
                        <ul class=curriculum-sections>
                          <li class=section id=section-228>
                            <h4 class="section-header">
                                <span class="collapse"></span> Ver Vídeos
                            </h4>
                            <ul class="section-content">
                              <?php 
                              foreach ($obj_videos_all as $value) { ?>
                                    <li class="course-item course-item-lp_lesson course-item-487 item-preview has-status" data-type=lp_lesson>
                                      <span class=course-format-icon>
                                          <i class="fa fa-play"></i>
                                      </span>
                                    <div class=meta-rank>
                                      <div class=rank>
                                          <span class=label>Título</span>
                                      </div>
                                    </div>
                                     <?php
                                        if($value->type == 2){ ?>   
                                        <a class=section-item-link href='<?php echo site_url().'login';?>'>
                                                    <span class="item-name"><?php echo $value->name;?></span>
                                                            <div class="meta-rank"><div class="rank"><span class="label">Iniciar Sesión</span></div></div>
                                                    <span class="course-item-meta">
                                                        <span class="lp-label lp-label-preview">Vista previa</span>
                                                    </span>
                                                </a>
                                     <?php }else{ ?>
                                            <a class=section-item-link href='<?php echo site_url()."courses/$value->category_slug/$value->slug";?>'>
                                                <span class="item-name"><?php echo $value->name;?></span>
                                                <span class="course-item-meta">
                                                    <span class="lp-label lp-label-preview">Vista previa</span>
                                                </span>
                                            </a>
                                     <?php } ?>   
                                      
                                  </li>
                              <?php } ?>
                            </ul>
                          </li>
                        </ul>
                      </div>
                      
                    <div id=tab-instructor style="height: 40px"></div>
                    <div class=thim-related-course>
                      <h3 class="related-title">Cursos Relacionados</h3>
                      <div class="courses-carousel archive-courses course-grid owl-carousel owl-theme" data-cols=3>
                         <?php 
                         foreach ($obj_videos_rand as $value) { ?> 
                            <div class="inner-course ">
                              <div class=wrapper-course-thumbnail>
                                  
                                  <a href='<?php echo site_url()."courses/$value->category_slug/$value->slug";?>' class=img_thumbnail>
                                    <img width=277 height=310 alt="<?php echo $value->name;?>" src='<?php echo site_url()."static/course/img/$obj_videos->img2";?>' class="lazyload">
                                </a>
                              <div class=course-rating>
                                <div class=review-stars-rated title="5 out of 5 stars">
                                  <div class="review-stars empty"></div>
                                  <div class="review-stars filled" style=width:100%;></div>
                                </div>
                              </div>
                            </div>
                            <div class=item-list-center>
                              <div class=course-title>
                                <h2 class="title">
                                    <a href='<?php echo site_url()."courses/$value->category_slug/$value->slug";?>'><?php echo $value->name;?></a>
                                </h2>
                              </div>
                                <span class=date-comment>
                                    <span class=date><?php echo formato_fecha_dia_mes($value->date);?></span>
                                </span>
                            </div>
                          </div>
                         <?php } ?> 
                    </div>
                    </div>
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
     </div>
    </article>
  </div>
  </div>
  </div>
  </section>
  </div>
  <?php $this->load->view("footer_2")?>
  </div>
   <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
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
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src='<?php echo site_url().'static/page_front/js/script/contact.js';?>'></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src='<?php echo site_url().'static/page_front/js/script/login_course.js';?>'></script>
</body>
</html>