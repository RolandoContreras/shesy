<script src="<?php echo site_url() . 'static/cms/js/core/jquery-1.11.1.min.js'; ?>"></script>
<div class="content-w">
    <div class="top-bar color-scheme-dark"> </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"> 
            <a href="<?php echo site_url() . 'backoffice'; ?>">Tablero</a> 
        </li>
    </ul>

    <div class="content-i">
        <div class="content-box">
            <div class="row">

                <div class="col-sm-12 col-xxl-12">
                    <div class="element-wrapper">
                        <h6 class="element-header"> Resumen </h6>


                        <?php
                        if (isset($result_date)) {
                            if ($result_date < 11) {
                                ?>
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    Hola <?php echo $_SESSION['customer']['name']; ?> quedan solo <strong><?php echo $result_date; ?> días para </strong>su recompra mensual. Procure estar activo para que sigan ganando en el plan.  <button onclick="go_recompras();" type="button" class="buyButton btn btn-default" data-price="11000" data-price2="110.00" data-kit="2">Ir a Recompras</button>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <?php if ($obj_customer->active == 0) { ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                Bienvenido  <?php echo $_SESSION['customer']['name']; ?> a <strong>Cultura Imparable, </strong>para que obtengas todos los beneficios adquiere un <strong>Pack</strong> con nosotros. <a href="<?php echo site_url() . 'backoffice/plan'; ?>" type="button" class="buyButton btn btn-default">Clic Aquí</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-tile">
                                    <a class="profile-tile-box" href="<?php echo site_url() . 'backoffice/carrera'; ?>" style="width: 100%;"> <img src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_customer->img"; ?>' alt="rango" width="70"/>
                                        <div class="pt-user-name"> RANGO ACTUAL<br> <b><?php echo $obj_customer->range_name; ?></b> </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="element-box el-tablo">
                                    <div class="label"> Ganancia Total </div>
                                    <div class="value"> &dollar; <?php echo $obj_total_commissions->total_comissions != "" ? $obj_total_commissions->total_comissions : "0.00"; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="element-box el-tablo">
                                    <div class="label"> EFECTIVO DISPONIBLE </div>
                                    <div class="value"> &dollar; <?php echo $obj_total_commissions->total_disponible != "" ? $obj_total_commissions->total_disponible : "0.00"; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="element-box el-tablo">
                                    <div class="label"> PUNTOS DE COMPRA </div>
                                    <div class="value"> &dollar; <?php echo $obj_total_commissions->total_compra != "" ? $obj_total_commissions->total_compra : "0.00"; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-none d-sm-block">
                                <div class="profile-tile">
                                    <a class="profile-tile-box" href="<?php echo site_url() . 'backoffice/carrera'; ?>" style="width: 100%;"> <img src='<?php echo site_url() . "static/backoffice/images/plan/$obj_customer->kit_img"; ?>' alt="plan" width="80"/>
                                        <div class="pt-user-name"> PLAN ACTUAL<br> <b><?php echo $obj_customer->kit; ?></b> </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 d-none d-sm-block">
                                <div class="profile-tile">
                                    <a class="profile-tile-box" href="<?php echo site_url() . 'backoffice/referred'; ?>" style="width: 100%;"> <i class="os-icon os-icon-users" style="font-size: 35px; color: #4a3116;"></i>
                                        <div class="pt-user-name"> Personas Directas<br> <b><?php echo $obj_total_referidos->total_referred; ?></b> </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 d-none d-sm-block">
                                <div class="profile-tile">
                                    <a class="profile-tile-box" href="<?php echo site_url() . 'backoffice/unilevel'; ?>" style="width: 100%;"> <i class="os-icon os-icon-hierarchy-structure-2" style="font-size: 35px; color: #4a3116;"></i>
                                        <div class="pt-user-name"> Personas en el Equipo <br><b><?php echo $obj_total_referidos->total_register; ?></b> </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 d-none d-sm-block">
                                <div class="profile-tile">
                                    <a class="profile-tile-box" href="<?php echo site_url() . 'backoffice/history'; ?>" style="width: 100%;"> <i class="os-icon os-icon-bar-chart-stats-up" style="font-size: 35px; color: #4a3116;"></i>
                                        <div class="pt-user-name"> Ganancia Último Mes<br> <b><?php echo format_number_dolar($obj_total_commissions->commission_by_date); ?></b></div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-xxl-12">
                    <div class="element-wrapper">
                        <h6 class="element-header"> Finanzas y Red </h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="element-box el-tablo">
                                    <div class="table-responsive">
                                        <table class="table table-padded dataTable display" id="financial_history" cellspacing="0" width="100%" role="grid" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 152.4px;"> Usuário<br>Remitente </th>
                                                    <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 142.4px;"> Tipo de<br>Bono </th>
                                                    <th class="text-center sorting" rowspan="1" colspan="1" style="width: 141.4px;"> Dato de<br>Fecha </th>
                                                    <th class="text-center sorting" rowspan="1" colspan="1" style="width: 140.4px;"> Importe<br>Total </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($obj_commissions as $value) { ?>
                                                    <tr role="row " class="odd ">
                                                        <td align="center"> 
                                                            <span class="smaller lighter ">Sistema</span> <br> 
                                                            <span><b><?php echo "@" . $value->username; ?></b></span>
                                                        </td>
                                                        <td align="center"><?php echo "Bono de " . str_to_first_capital($value->bonus); ?></td>
                                                        <td align="center"> 
                                                            <span><?php echo formato_fecha_barras($value->date); ?></span><br> 
                                                            <span class="smaller lighter "> <?php echo formato_fecha_minutos($value->date); ?><i class="far fa-clock "></i></span>
                                                        </td>
                                                        <td align="center">
                                                            <span class="badge badge-success-inverted "> + &dollar;<?php echo $value->amount; ?></span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <div align="center">
                                            <div class="container">
                                                <div id="circle1" class="circle-default-style"></div>
                                                <div id="circle2" class="circle-default-style"></div>
                                                <div id="circle6" class="circle-stat-custom circle-default-style"></div>
                                                <div id="circle3" class="circle-default-style"></div>
                                                <div id="circle4"
                                                     class="circle-default-style"
                                                     data-percent="100"
                                                     data-no-percentage-sign="true"
                                                     data-animation="false"
                                                     data-stroke-linecap="round">
                                                </div>
                                                <div id="circle5" class="circle-default-style"></div>

                                                <div id="circle7" class="circle-default-style"></div>
                                                <div id="circle8" class="circle-default-style"></div>
                                            </div>
                                            <div class="alert alert-info" role="alert"> <a href="<?php echo site_url() . 'backoffice/history'; ?>">Ver Más</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <div class="element-info">
                                            <div class="element-info-with-icon">
                                                <div class="element-info-icon">
                                                    <div class="os-icon os-icon-ui-92"></div>
                                                </div>
                                                <div class="element-info-text">
                                                    <h5 class="element-inner-header"> Link de Referido </h5>
                                                    <div class="element-inner-desc"> Clic abajo para agregar a un nuevo socio.<br>
                                                        <a tabindex="0" target="_blank" href="<?php echo site_url() . 'registro/' . convert_slug($_SESSION['customer']['username']); ?>"> 
                                                            <i style="cursor: pointer;" title="Copiar" class="fa fa-plus text-success"></i> <?php echo site_url() . 'registro/' . convert_slug($_SESSION['customer']['username']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="element-header" style="margin-top: 35px;"> Puntos de Rango </h6>
                                        <div class="container py-5">
                                            <div class="row">
                                                <?php
                                                if (!empty($obj_next_range)) {
                                                    if ($obj_total_commissions->total_comissions == 0) {
                                                        $percent = 0;
                                                    } else {
                                                        $percent = ($obj_total_commissions->total_comissions / $obj_next_range->point_grupal) * 100;
                                                        $percent = ceil($percent);
                                                    }
                                                    ?>
                                                    <div class="col-xl-12 col-lg-12 mb-12">


                                                        <div class="bg-white rounded-lg p-5 shadow">
                                                            <h2 class="h6 font-weight-bold text-center mb-4">Próximo Rango</h2>

                                                            <!-- Progress bar 1 -->
                                                            <div class="progress mx-auto" data-value='<?php echo $percent; ?>'>
                                                                <span class="progress-left">
                                                                    <span class="progress-bar border-primary"></span>
                                                                </span>
                                                                <span class="progress-right">
                                                                    <span class="progress-bar border-primary"></span>
                                                                </span>
                                                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                                    <div class="h2 font-weight-bold"><?php echo $percent; ?><sup class="small">%</sup></div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center mt-4">
                                                                <div class="col-6 border-right">
                                                                    <div class="h6 font-weight-bold mb-0"><?php echo $obj_total_commissions->total_comissions;?></div> 
                                                                    <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_customer->ranges_img"; ?>' style="max-width: 70px;">
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="h6 font-weight-bold mb-0"><?php echo $obj_next_range->point_grupal;?></div> 
                                                                    <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_next_range->img"; ?>' style="max-width: 70px;">
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-xl-12 col-lg-12 mb-12">
                                                        <div class="bg-white rounded-lg p-5 shadow">
                                                            <h2 class="h6 font-weight-bold text-center mb-4">Rangos Completos</h2>
                                                            <div class="progress mx-auto" data-value='100'>
                                                                <span class="progress-left">
                                                                    <span class="progress-bar border-success"></span>
                                                                </span>
                                                                <span class="progress-right">
                                                                    <span class="progress-bar border-success"></span>
                                                                </span>
                                                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                                    <div class="h2 font-weight-bold">100<sup class="small">%</sup></div>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center mt-4">
                                                                <div class="col-12 border-right">
                                                                    <div class="h4 font-weight-bold mb-0">
                                                                        <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_customer->ranges_img"; ?>' style="max-width: 70px;"> 
                                                                    </div>
                                                                    <span class="small text-gray"><?php echo $obj_customer->range_name; ?></span>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#financial_history').dataTable({
            "order": [[0, "desc"]]
        });
    });</script>

<script>
    $(function () {

        $(".progress").each(function () {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }

    });
</script>
<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

    .progress {
        width: 150px;
        height: 150px;
        background: none;
        position: relative;
    }

    .progress::after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 6px solid #eee;
        position: absolute;
        top: 0;
        left: 0;
    }

    .progress>span {
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    .progress .progress-left {
        left: 0;
    }

    .progress .progress-bar {
        width: 100%;
        height: 100%;
        background: none;
        border-width: 6px;
        border-style: solid;
        position: absolute;
        top: 0;
    }

    .progress .progress-left .progress-bar {
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }

    .progress .progress-right {
        right: 0;
    }

    .progress .progress-right .progress-bar {
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
    }

    .progress .progress-value {
        position: absolute;
        top: 0;
        left: 0;
    }

    /*
    *
    * ==========================================
    * FOR DEMO PURPOSE
    * ==========================================
    *
    */

    body {
        background: #ff7e5f;
        background: -webkit-linear-gradient(to right, #ff7e5f, #feb47b);
        background: linear-gradient(to right, #ff7e5f, #feb47b);
        min-height: 100vh;
    }

    .rounded-lg {
        border-radius: 1rem;
    }

    .text-gray {
        color: #aaa;
    }

    div.h4 {
        line-height: 1rem;
    }
</style>
<script src="<?php echo site_url() . "static/backoffice/dist/circliful.js" ?>"></script>

