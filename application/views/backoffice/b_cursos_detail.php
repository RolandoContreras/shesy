<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Listado</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'catalogo'; ?>"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Curso Seleccionado</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Mi producto: <?php echo $obj_courses->name; ?></h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-sm-5 col-xs-12">
                                                <a href='<?php echo site_url() . "static/cms/images/cursos/$obj_courses->img"; ?>' data-toggle="lightbox" data-gallery="<?php echo $obj_courses->name; ?>">   
                                                    <img src='<?php echo site_url() . "static/cms/images/cursos/$obj_courses->img"; ?>' class="img-fluid m-b-10" alt="<?php echo $obj_courses->name; ?>">
                                                </a>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-sm-7 col-xs-12">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" style="color:#888 !important;">
                                                        <h2 class="mt-3"><?php echo $obj_courses->name; ?></h2>
                                                        <h2>
                                                            &dollar; <?php echo $obj_courses->price; ?>
                                                        </h2>
                                                        <p><span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money">16/Sep</span></span></p>
                                                        <br/>
                                                        <?php echo $obj_courses->description; ?>
                                                        
                                                        <h6 class="mt-3">Categoría</h6>
                                                        <p>
                                                            <a href="<?php echo site_url() . "backoffice/cursos/$obj_courses->category_slug"; ?>">
                                                                <span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money"><?php echo $obj_courses->category_name; ?></span></span>
                                                            </a>
                                                        </p>
                                                        <hr>
                                                            <div class="row form-group">
                                                                <div class="col-sm-8">
                                                                        <button type="button" class="btn btn-glow-success btn-success" title="Agregar al Carrito" onclick="add_cart('<?php echo $obj_courses->course_id; ?>', '<?php echo $obj_courses->price; ?>', '<?php echo $obj_courses->name; ?>');"><i data-feather="shopping-cart"></i> Agregar al Carrito</button>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-sm-6">
                                                                    <input type="text" id="copy" value="<?php echo $url;?>" class="form-control" readonly=""/>
                                                                </div>           
                                                                <div class="col-sm-6">
                                                                    <button type="button" class="btn btn-info btn-block" title="Copiar Enlace"  onclick="copy();"><i data-feather="copy"></i> Enlace de Recomendación</button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="card-header">
                                                        <h5>Cursos Relacionados</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row text-center">
                                                            <?php foreach ($obj_courses_all as $value) { ?>
                                                                <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                                                                    <a href="<?php echo site_url() . "backoffice/cursos/$value->category_slug/$value->course_id/$value->slug"; ?>">
                                                                        <img src="<?php echo site_url() . "static/cms/images/cursos/$value->img"; ?>" class="img-fluid m-b-10" alt="<?php echo $value->name; ?>"></a>
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
                </div>
                </section>
                <script src="<?php echo site_url(); ?>static/backoffice/js/script/pay_order_curso.js"></script>
                <style>
                    .white{
                        color:white !important;
                    }
                </style>
                <script>
                    function copy() {
                            var copyText = document.getElementById("copy");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999); /* For mobile devices */
                            /* Copy the text inside the text field */
                            document.execCommand("copy");
                            /* Alert the copied text */
                            alert("Copiado");
                            }
                </script>

