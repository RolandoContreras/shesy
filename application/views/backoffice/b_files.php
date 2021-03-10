<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content"> 
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Material de Apoyo</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Documentos e información</a></li>
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
                                        <h5>Información de Catalogo</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" onsubmit="show_information();" enctype="multipart/form-data" action="javascript:void(0);"> 
                                                    <div class="form-group"> 
                                                        <label class="control-label"> Ingrese código de producto </label> 
                                                        <input type="text" name="catalog_id" id="catalog_id" class="form-control" placeholder="Ingrese Código" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-12" align="right"> 
                                                            <button class="btn btn-success" type="submit" style="margin-top: 30px;">Buscar <i class="fa fa-search"></i></button>        
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="element-box" id="show_information" style="display:none;">
                                                    <div id="res">
                                                        <p>Sin Información</p>
                                                        <p>Código no valido</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Información de Cursos</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0);" onsubmit="show_information_course();"> 
                                                    <div class="form-group"> 
                                                        <label class="control-label"> Ingrese código de curso </label> 
                                                        <input type="text" name="course_id" id="course_id" class="form-control" placeholder="Ingrese Código de Curso" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-12"> 
                                                            <button class="btn btn-success" type="submit" style="margin-top: 30px;">Buscar <i class="fa fa-search"></i></button>        
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="element-box" id="show_information_course" style="display:none;">
                                                    <div id="res_course">
                                                        <p>Sin Información</p>
                                                        <p>Código no valido</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/images/imagen_presentacion.jpg'; ?>">
                                                    <p class="titulo-materiais">[ES] Presentación de negocios</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/presentacion_embajada_fk.pptx'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/files/fondo1_min.jpg'; ?>">
                                                    <p class="titulo-materiais">Logo Fondo Fuego</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/fondo1.jpg'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/files/fondo2_min.jpg'; ?>">
                                                    <p class="titulo-materiais">Logo Dorado</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/fondo2.jpg'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/files/fondo3_min.jpg'; ?>">
                                                    <p class="titulo-materiais">Logo WallPaper</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/fondo3.jpg'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/files/logo-azul_min.png'; ?>">
                                                    <p class="titulo-materiais">Logo Azul</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/logo-azul.png'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/files/logo_dorado_min.png'; ?>">
                                                    <p class="titulo-materiais">Logo Dorado</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/logo-dorado.png'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="element-box p-2">
                                            <div class="card">
                                                <div class="body pad-materiais" align="center"> 
                                                    <img class="img-fluid img-thumbnail" src="<?php echo site_url() . 'static/backoffice/files/logo_dorado_min2.png'; ?>">
                                                    <p class="titulo-materiais">Logo Dorado 2</p> 
                                                    <a href="<?php echo site_url() . 'static/backoffice/files/logo-dorado2.png'; ?>" target="_blank" class="btn btn-dark"><i class="fa fa-download"></i> Descargar </a> 
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
</div>
</div>
</section>
<script src="<?php echo site_url(); ?>static/catalog/js/materiales.js"></script>