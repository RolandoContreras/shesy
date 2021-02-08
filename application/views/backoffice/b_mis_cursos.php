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
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'course'; ?>"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Mis Cursos Adquiridos</a></li>
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
                                        <h5>Ver Cursos</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <?php
                                            if (!empty($obj_courses_by_customer)) {
                                                foreach ($obj_courses_by_customer as $value) {
                                                    ?>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card-block p-0">
                                                            <a href="<?php echo site_url() . "backoffice/cursos/$value->category_slug/$value->course_id/$value->slug";?>">
                                                                <img class="img-fluid" style="width:100%;" src="<?php echo site_url() . "static/cms/images/cursos/$value->img"; ?>" alt="dashboard-user">
                                                            </a>
                                                            <div style="padding:10px;">
                                                                <div class="p-10">
                                                                    <div class="row align-items-center justify-content-center card-active">
                                                                        <div class="col-12">
                                                                            <h6 class="text-center m-b-10"><span class="text-muted m-r-5">Avance:</span>
                                                                            <?php
                                                                                if ($value->total == null || $value->total == 0) {
                                                                                    $percent = 0;
                                                                                    echo "0% Completado";
                                                                                } else {
                                                                                    $percent = null;
                                                                                    $percent = ($value->total_video / $value->total) * 100;
                                                                                    echo ceil($percent) . "% Completado";
                                                                                }
                                                                            ?>
                                                                            </h6>
                                                                            
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-c-green" role="progressbar" style="width:<?php echo $percent;?>%;height:6px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                            </div>
                                                                            
                                                                            <a href="<?php echo site_url() . "virtual/$value->category_slug/$value->slug"; ?>"><button type="button" class="btn btn-warning btn-block" >VER CURSO</button></a>
                                                                            <h6 class="mt-3 mb-0 text-center text-muted">Inicio : Lunes 24 de Febrero</h6>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                Sin Registro
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
<script src="<?php echo site_url(); ?>static/catalog/js/pay_order_new.js"></script>
