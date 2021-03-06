<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("head"); ?>
    <body class="bp-nouveau archive post-type-archive post-type-archive-lp_course wp-embed-responsive theme-wordpress-lms wordpress-lms learnpress learnpress-page woocommerce-no-js pagetitle-show hfeed bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr learnpress-v3 buy-through-membership header-template-overlay wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
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
        <div id="wrapper-container" class="content-pusher creative-right bg-type-color">
            <div class=overlay-close-menu></div>
            <?php $this->load->view("header"); ?>
            <?php $this->load->view("nav"); ?>
            <div id="main-content">
                <section class=content-area>
                    <div class="page-title layout-1">
                        <div class="main-top no-parallax" style="background-image:url(<?php echo site_url() . 'static/page_front/images/background_2.jpg'; ?>)"><span class=overlay-top-header style="background-color: rgba(0,0,0,0.6);"></span>
                            <div class="content container">
                                <div class=row>
                                    <div class="text-title col-md-6">
                                        <h1>CURSOS</h1>
                                    </div>
                                    <div class="text-description col-md-6">
                                        <div class=banner-description>
                                            <p><strong class="br">La mejor plataforma de educación </strong> Conviértete en un profesional exitoso con nosotros.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-content">
                            <div class="breadcrumbs-wrapper container">
                                <ul id="breadcrumbs" class="breadcrumbs">
                                    <li>
                                        <a href="<?php echo site_url(); ?>" title="Inicio">
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
                    <div id="top-sidebar-courses">
                        <div class="container">
                            <div data-vc-full-width=true data-vc-full-width-init=false data-vc-stretch-content=true class="vc_row wpb_row vc_row-fluid overflow top-courses-overflow vc_custom_1501224314823 vc_row-has-fill vc_row-no-padding">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="thim-sc-heading text-center layout-2 ">
                                                <div class="heading-content">
                                                    <h3 class="gold primary-heading">Cursos Populares</h3>
                                                </div>
                                                <p class="secondary-heading text_gress"> Aprende todo lo que necesitas con nosotros, los cursos más cotizados del mercado aquí lo tendrás.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                        </div>
                    </div>
                    <div class="container site-content " style="transform: none;">
                        <div class="row" style="transform: none;">
                            <div id="main" class="site-main col-sm-12 col-md-9 flex-first">
                                <div class="post-0 post type-post status-publish format-standard hentry pmpro-has-access page type-page">
                                    <div class="entry-content">
                                        <div id="lp-archive-courses" class="lp-archive-courses">
                                            <div class="thim-course-top">
                                                <div class="display grid-list-switch lpr_course-switch " data-cookie="lpr_course-switch" data-layout="grid">
                                                    <a href="javascript:;" class="grid switchToGrid switcher-active"><i class="fa fa-th"></i></a>
                                                    <a href="javascript:;" class="list switchToList"><i class="fa fa-th-list"></i></a>
                                                </div>
                                                <div class="course-index"><span>Mostrando <?php echo $total; ?> resultados</span></div>
                                                <div class="courses-searching">
                                                    <form method="get" action="<?php echo site_url() . 'courses'; ?>">
                                                        <input type="text" name="search" placeholder="Busca tu curso" class="form-control course-search-filter" autocomplete="off">
                                                        <button type="submit">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                        <span class="widget-search-close"></span>
                                                    </form>
                                                    <ul class="courses-list-search list-unstyled"></ul>
                                                </div>
                                            </div>
                                            <div class="archive-courses course-grid archive_switch">
                                                <div class="learn-press-courses row">

                                                    <?php
                                                    if (!empty($obj_videos)) {
                                                        foreach ($obj_videos as $value) { ?>
                                                            <article class="col-md-4 col-12 col-sm-6 col-xs-6 lpr-course post-486 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-business course_tag-business course_tag-theme course_tag-wordpress pmpro-has-access course">
                                                                <div class="content">
                                                                    <div class="thumbnail">

                                                                        <?php
                                                                        if ($value->type == 1) {
                                                                            $ref = site_url() . "courses/$value->category_slug/$value->slug";
                                                                            ?>
                                                                            <span class=sale><span class=text-sale>Libre</span></span>
                                                                        <?php } else {
                                                                            $ref = site_url() . "login";
                                                                            ?>
                                                                            <span class="price">
                                                                                <span class="course-price">Reservado</span>
                                                                            </span>
        <?php } ?>
                                                                        <a href='<?php echo $ref; ?>' class="img_thumbnail">
                                                                            <img width="365" height="405" alt="<?php echo $value->name; ?>" src='<?php echo site_url() . "static/course/img/$value->img2"; ?>' class="lazyload">
                                                                        </a>
                                                                        <div class="review ">
                                                                            <div class=sc-review-stars>
                                                                                <div class=review-stars-rated title="5 out of 5 stars">
                                                                                    <div class="review-stars empty"></div>
                                                                                    <div class="review-stars filled" style=width:100%;></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="button-when-logged has-wishlist"></div>
                                                                    </div>
                                                                    <div class="sub-content">
                                                                        <h3 class="title">
                                                                            <a href='<?php echo site_url() . "courses/$value->category_slug/$value->slug"; ?>'><?php echo $value->name; ?></a>
                                                                        </h3>
                                                                        <div class="date-comment">
                                                                            <span class="date-meta"><?php echo formato_fecha_dia_mes($value->date); ?></span> 
                                                                        </div>
                                                                        <div class="content-list">
                                                                            <div class="course-description">
                                                                                <?php echo corta_texto($value->summary, 300); ?>
                                                                            </div>
                                                                            <ul class="courses_list_info">
                                                                                <li><label>Repaso:</label>
                                                                                    <div class="review">
                                                                                        <div class="sc-review-stars">
                                                                                            <div class="review-stars-rated" title="5 out of 5 stars">
                                                                                                <div class="review-stars empty"></div>
                                                                                                <div class="review-stars filled" style="width:100%;"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        <?php } } else { ?>
                                                    <article class="col-md-4 col-12 col-sm-6 col-xs-6 lpr-course post-486 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-business course_tag-business course_tag-theme course_tag-wordpress pmpro-has-access course">
                                                        <p>Sin resultados</p>
                                                    </article>
                                                        <?php } ?>
                                                </div>
                                                <nav class="learn-press-pagination">
                                                    <ul class="page-numbers">
                                                        <?php echo $obj_pagination; ?>
                                                    </ul>
                                                </nav>
                                                <div class="thim-loading-icon">
                                                    <div class="sk-folding-cube">
                                                        <div class="sk-cube1 sk-cube"></div>
                                                        <div class="sk-cube2 sk-cube"></div>
                                                        <div class="sk-cube4 sk-cube"></div>
                                                        <div class="sk-cube3 sk-cube"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <aside id="secondary" class="sidebar-courses widget-area col-md-3 sticky-sidebar flex-last" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                                    <aside id="thim-courses-categories-2" class="widget widget_thim-courses-categories">
                                        <h4 class="widget-title">Categorías</h4>
                                        <ul class="courses-categories"><?php foreach ($obj_category_videos as $value) { ?>
                                                <li class="cat-item ">
                                                    <a href='<?php echo site_url() . "courses/$value->slug"; ?>'><?php echo $value->name; ?></a>
                                                </li>
<?php } ?>
                                        </ul>
                                    </aside>
                                </div>
                            </aside>
                        </div>
                    </div>
                </section>
            </div>
<?php $this->load->view("footer_2"); ?>
        </div>
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