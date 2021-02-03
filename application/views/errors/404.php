<!doctype html>
<html lang="es-PE">
<?php $this->load->view("head"); ?>
<body>
    <div id="section-header" data-section-id="header">
        <?php $this->load->view("header"); ?>
    </div>
    <main>
        <div data-content-for-index data-dynamic-sections="index">
            <!--FIN - QUIENES SOMOS-->
            <div>
                <div class="section background-dark">
                    <div class="sizer ">
                        <div class="backgroundVideo"></div>
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="block-type--image text- col-6 animated" data-reveal-units="seconds">
                                    <div class="block box-shadow-medium background-unrecognized" data-aos="fade-down" data-aos-delay="500" data-aos-duration="0">
                                        <div class="image">
                                            <img class="image__image" src="<?php echo site_url() . "static/page_front/images/logo_embajada.png" ?>" alt="Cultura Imparable" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fullscreen-bg backgroundVideo">
                <video loop muted autoplay poster="img/videoframe.jpg" class="fullscreen-bg__video">
                    <source src="<?php echo site_url()."static/page_front/video/video.mp4"?>" type="video/mp4">
                </video>
            </div>
            <!--Sé parte de los profesores-->
            <div class="section background-dark color-teacher" data-reveal-units="seconds">
                <div id="block-1597943616686" class="block-type--image text-col-5" data-reveal-units="seconds">
                    <div class="block box-shadow-none background-unrecognized aos-init aos-animate" data-aos="none" data-aos-delay="0" data-aos-duration="0">
                        <div class="center">
                            <img class="image__image" src="<?php echo site_url()."static/page_front/images/arrow.gif";?>" alt="arrow-fown" width="50">
                        </div>
                    </div>
                </div>
                <div class="sizer">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="block-break"></div>
                            <div id="block-1597347523879" class=" block-type--text text-center col-11" data-reveal-units="seconds">
                                <div class="block box-shadow-none background-unrecognized aos-init aos-animate" data-aos="none" data-aos-delay="0" data-aos-duration="0">
                                    <h1><span class="JsGRdQ" style="color: #fffd55;">La página que estas buscando no existe.</span></h1>
                                    <p>
                                        <span class="JsGRdQ">Verifica el enlace o regresa al inicio. <b>Cultura Emprendedora</b></span>
                                    </p>
                                </div>
                            </div>
                            <div class="block-break"></div>
                            <div id="block-1598224544471" class="block-type--cta text-center col-6" data-reveal-units="seconds">
                                <div class="block box-shadow-none background-unrecognized aos-init aos-animate" data-aos="none" data-aos-delay="0" data-aos-duration="0">
                                    <a class="btn btn-large btn-solid btn-full background-light" href="<?php echo site_url();?>">
                                        ¡IR AL INICIO!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="section-footer">
        <?php $this->load->view("footer"); ?>
    </div>
    <script
        src="<?php echo site_url() . "static/page_front/js/encore_core-391b174ddfaf72e8ec9615d1579235b5c2c755e7cd65e22cf10938c815f7f394.js"; ?>">
    </script>
    <script src="<?php echo site_url() . "static/page_front/js/scripts.js?15964308185009978"; ?>"></script>
</body>

</html>