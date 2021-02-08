<!DOCTYPE html>
<html lang="en-US" class="no-js stm_lms_type_video">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cultura Emprendedora | Plataforma de Curso</title>
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/mystyle.css?ver=29'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/linear-icons.css?ver=2.0'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/stmlms_icons.css?ver=2.0'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/font-awesome.min.css?ver=2.0'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/animate.css'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/lesson_video.css?ver=29'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/bootstrap.min.css?ver=3.2'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/styles.css?ver=3.2'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat%3A200%2C300%2C500%2C600%2C400%2C700%7COpen+Sans%3A300%2C400%2C600%2C700%2C800%2C300italic%2C400italic%2C600italic%2C700italic%2C800italic&#038;subset=latin&#038;ver=1589966475' type='text/css' media='all' />
        <!--//STAR FAVICON-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() . 'static/page_front/images/logo/favico/apple-touch-icon.png'; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-32x32.png'; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-16x16.png'; ?>">
        <link rel="manifest" href="<?php echo site_url() . 'static/page_front/images/logo/favico/site.webmanifest'; ?>">
        <script>
            var site = "<?php echo site_url(); ?>"
        </script>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    </head>
    <body class="logged-in stm_lms_button skin_custom_color classic_lms wpb-js-composer js-comp-ver-5.6 vc_responsive">
        <div class="stm_lms_lesson_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4">
                        <div class="stm_lms_lesson_header__left">
                            <div class="stm-lms-curriculum-trigger"> <i class="fa fa-list-ul"></i></div>
                            <div class="logo-unit">
                                <a href="<?php echo site_url() . 'backoffice'; ?>"> 
                                    <img class="img-responsive logo_transparent_static visible" src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" style="width: 50px;" alt="Cultura Emprendedora" /> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-8">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-push-2">
                                        <div class="stm_lms_lesson_header__center">
                                            <h5><?php echo $obj_courses->name; ?></h5>
                                            <a href="<?php echo site_url() . 'backoffice'; ?>"> <i class="lnr lnr-arrow-left"></i> Regresar al Inicio </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <div class="stm_lms_lesson_header__right">
                            <div class="stm_lms_account_dropdown">
                                <div class="dropdown"> 
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="lnr lnr-user"></i> 
                                        <span class="login_name">Hola <?php echo corta_texto($_SESSION['customer']['name'], 8); ?></span> <span class="caret"></span> 
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li> 
                                            <a href="<?php echo site_url() . 'backoffice/cursos'; ?>">Inicio</a> 
                                            <a href="<?php echo site_url() . 'salir'; ?>" class="stm_lms_logout">Salir</a>                    
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="stm_lms_settings_button">
                                <a href="<?php echo site_url() . 'backoffice/#settings'; ?>"><i class="lnr lnr-cog"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stm-lms-course__overlay"></div>
        <div class="stm-lms-wrapper stm-lessons">
            <div class="stm-lms-course__curriculum">
                <div class="stm-curriculum__close"> <i class="lnr lnr-cross"></i></div>
                <div class="stm-curriculum">
                    <h3 class="stm-curriculum__title text-black">Sección del Curso</h3>
                    <?php foreach ($obj_modules as $key => $value) { ?>
                        <div class="stm-curriculum-section opened">
                            <div class="stm-curriculum-item stm-curriculum-item__section opened">
                                <div class="stm-curriculum-section__info"> <span>Section <?php echo $key = $key + 1; ?></span>
                                    <h5><?php echo $value->name; ?></h5>
                                </div>
                            </div>
                            <div class="stm-curriculum-section__lessons">
                                <?php
                                foreach ($obj_videos as $key_videos => $videos) {
                                    if ($value->module_id == $videos->module_id) {
                                        $key_videos += 1
                                        ?> 
                                        <a href="<?php echo site_url() . "virtual/$slug/$obj_courses->slug/$videos->slug"; ?>" class="stm-curriculum-item text is-completed first">
                                            <div class="stm-curriculum-item__icon"> <i class="stmlms-text"></i> </div>
                                            <div class="stm-curriculum-item__num"> <?php echo $key_videos; ?></div>
                                            <div class="stm-curriculum-item__title">
                                                <div class="heading_font"> <?php echo $videos->name; ?></div>
                                            </div>
                                            <div class="stm-curriculum-item__meta"> </div>
                                            <?php
                                            if ($videos->video_id <= $obj_courses_overview->video_actual) {
                                                $complete = "completed";
                                            } else {
                                                $complete = "";
                                            }
                                            ?>
                                            <div class="stm-curriculum-item__completed <?php echo $complete; ?>"> <i class="fa fa-check"></i> </div>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="stm-lms-course__sidebar">
                <div class="stm-lesson_sidebar__close">
                    <i class="lnr lnr-cross"></i>
                </div>
            </div>
            <!--curso-->
            <?php echo $body ?>
        </div>
        <!--footer-->
        <?php
        if ($obj_courses_overview->video_id <= $obj_courses_overview->video_actual) {
            $style = "completed";
        } else {
            $style = "";
        }
        ?>
        <div id="complete"  class="stm-lms-lesson_navigation heading_font uncompleted <?php echo $style; ?>">
            <div class="stm-lms-lesson_navigation_side stm-lms-lesson_navigation_prev">
                <?php if ($obj_video_ant != null) { ?>
                    <a href="<?php echo site_url() . "virtual/$obj_courses->category_slug/$obj_courses->slug/$obj_video_ant->slug"; ?>"> 
                        <i class="lnr lnr-chevron-left"></i> <span class="stm_lms_section_text"><?php echo $obj_video_ant->name; ?></span> 
                        <span>Anterior</span>        
                    </a>
                <?php } ?>
            </div>
            <div class="stm-lms-lesson_navigation_complete">
                <a onclick="complete('<?php echo $obj_courses->course_id; ?>', '<?php echo $obj_courses_overview->video_id; ?>', <?php echo $total_videos; ?>);" class="btn btn-default stm_lms_complete_lesson uncompleted"><span>Completo</span> </a>
            </div>
            <div class="stm-lms-lesson_navigation_side stm-lms-lesson_navigation_next">
                <?php if ($obj_video_next != null) { ?>
                    <a href="<?php echo site_url() . "virtual/$obj_courses->category_slug/$obj_courses->slug/$obj_video_next->slug"; ?>"> 
                        <span class="stm_lms_section_text"><?php echo $obj_video_next->name; ?></span> 
                        <span>Siguiente</span> <i class="lnr lnr-chevron-right"></i>        
                    </a>
                <?php } ?>
            </div>
        </div>
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/curriculum_trigger.css?ver=29'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/lesson.css?ver=29'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/curriculum.css?ver=29'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/course/css/lesson_comments.css?ver=92'; ?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?php echo site_url() . 'static/backoffice/css/footer/total_progress.css?ver=92'; ?>' type='text/css' media='all' />
        <script src='<?php echo site_url() . 'static/course/js/bootstrap.min.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/jquery.fancybox.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/select2.full.min.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/backoffice/js/custom.js?ver=3.2'; ?>'></script>
        <script src='<?php echo site_url() . 'static/course/js/curriculum_trigger.js?ver=29'; ?>'></script>
        <script src='<?php echo site_url() . 'static/course/js/lesson_sidebar.js?ver=29'; ?>'></script>
        <script defer src="<?php echo site_url() . 'static/course/js/script/question.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/cms/js/core/bootbox.locales.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/cms/js/core/bootbox.min.js'; ?>"></script>
    </body>
</html>