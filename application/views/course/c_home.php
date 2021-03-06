<div id="stm-lms-lessons">
    <div class="stm-lms-course__content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="stm-lms-course__lesson-content__top">
                        <h3>Video Actual</h3>
                        <?php
                        if(isset($obj_courses_overview)){ ?>
                             <h1><?php echo $obj_courses_overview->name; ?></h1>       
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="stm-lms-course__content_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="stm-lms-course__lesson-content">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                    <?php
                                        if(isset($obj_courses_overview)){ ?>
                                        <div class="wpb_wrapper">
                                            <div class="embed-container">   
                                                <?php echo $obj_courses_overview->video;?>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <p>
                                                        <?php echo $obj_courses_overview->description; ?>
                                                    </p>
                                                </div>
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
</div>
<script src="<?php echo site_url() . 'static/course/js/script/c_home.js'; ?>"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
.embed-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
}
.embed-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>


