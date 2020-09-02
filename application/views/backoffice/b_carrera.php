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
                                    <h5 class="m-b-10">Plan Carrera</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Mi Avance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Grado Actual</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-green f-30 m-r-10"></i><?php echo isset($obj_customer->name) != "" ? str_to_mayusculas($obj_customer->name) : " Sin Rango "; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Total de Puntos</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i><?php echo $point; ?> Puntos
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-lg-9" style="margin: 0 auto !important;">
                                                            <?php foreach ($obj_range as $value) { ?>
                                                                <div id="ajaxContent">
                                                                    <div class="element-wrapper pb-0">
                                                                        <div class="element-box">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div align="center"> 
                                                                                        <img src='<?php echo site_url() . "static/backoffice/images/rangos/$value->img"; ?>' width="80"> 
                                                                                    </div>
                                                                                </div>
                                                                                <?php if ($point >= $value->point_grupal) { ?>
                                                                                    <div class="col-md-8">
                                                                                        <h6 class="element-header" style="margin-top:15px"><?php echo str_to_mayusculas($value->name); ?></h6>
                                                                                        <p style="color:#3E4B5B"><b>Felicidaes! Usted alcanzó esta calificación.</b> <br> Puntuación necesaria: <?php echo format_number_miles($value->point_grupal); ?> Puntos de Volumen </p>
                                                                                    </div>    
                                                                                    <?php
                                                                                } else {
                                                                                    $percent = ($point / $value->point_grupal) * 100;
                                                                                    $percent = format_number_miles($percent);
                                                                                    $rest = $value->point_grupal - $point;
                                                                                    ?>  
                                                                                    <div class="col-md-8">
                                                                                        <h6 class="element-header" style="margin-top:15px"><?php echo str_to_mayusculas($value->name); ?></h6>
                                                                                        <div align="center">
                                                                                            <div class="form-desc">
                                                                                                <p class="text-primary" style="color:#3E4B5B">Faltan <?php echo format_number_miles($rest); ?> Puntos de Volumen</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="os-progress-bar warning">
                                                                                            <div class="progress m-t-30" style="height: 7px;">
                                                                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                            </div>
                                                                                            <div class="bar-labels">
                                                                                                <div class="bar-label-left"> <?php echo $percent . "%" ?> </div>
                                                                                                <div class="bar-label-right"> <span class="info">0 /<?php echo format_number_miles($value->point_grupal); ?></span> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>     
                                                                            </div>
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
            </div>
        </div>
    </div>
</div>
</div>
</section>