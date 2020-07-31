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
                            <?php }
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
                                <div class="element-box el-tablo">
                                    <div class="label"> Ganancia Total </div>
                                    <div class="value"> &dollar; <?php echo $obj_total_commissions->total_comissions != "" ? $obj_total_commissions->total_comissions : "0.00"; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="element-box el-tablo">
                                    <div class="label"> Ganancia DISPONIBLE </div>
                                    <div class="value"> &dollar; <?php echo $obj_total_commissions->total_disponible != "" ? $obj_total_commissions->total_disponible : "0.00"; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="element-box el-tablo">
                                    <div class="label"> Ganancia para compra </div>
                                    <div class="value"> &dollar; <?php echo "0.00";?> </div>
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
                            <div class="col-md-3">
                                <div class="element-box el-tablo">
                                    <div class="label"> Rango Actual </div>
                                    <div class="value"> <img src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_customer->img"; ?>' alt="rango" width="70"/></div>
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
                                                            <i style="cursor: pointer;" title="Copiar" class="fa fa-plus text-success"></i> <?php echo site_url() . 'registro/' . convert_slug($_SESSION['customer']['username']);?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="element-header" style="margin-top: 35px;"> Puntos de Rango </h6>
                                        <div class="element-wrapper">
                                            <div class="element-box">
                                                <div class="text-center">
                                                    <?php
                                                    if (isset($obj_customer->img) == "") {
                                                        $var_next_range = "sin_rango.png";
                                                    } else {
                                                        $var_next_range = $obj_customer->img;
                                                    }
                                                    ?>

                                                    <div class="d-block d-sm-none"> 
                                                        <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$var_next_range"; ?>' style="max-width: 70px;"> 
                                                        <img class="img-responsive" src="<?php echo site_url().'static/backoffice/images/arrow-rigth.png'?>" style="max-width: 30px; margin: 0 20px; opacity: 0.2;"> 
                                                        <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_next_range->img"; ?>' style="max-width: 70px;">                          
                                                    </div>
                                                    <div class="d-none d-sm-block"> 
                                                        <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$var_next_range"; ?>' style="max-width: 90px;"> 
                                                        <img class="img-responsive" src="<?php echo site_url().'static/backoffice/images/arrow-rigth.png'?>" style="max-width: 60px; margin: 0 20px; opacity: 0.2;"> 
                                                        <img class="img-responsive" src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_next_range->img"; ?>' style="max-width: 90px;">                          
                                                    </div>
                                                </div>
                                                <?php 
                                                if($obj_points->puntos == 0){
                                                    $percent = 0;
                                                }else{
                                                    $percent = ($obj_points->puntos / $obj_next_range->point_grupal) * 100;
                                                    $percent = ceil($percent);
                                                }
                                                ?>
                                                <div class="os-progress-bar warning">
                                                    <div class="bar-labels">
                                                        <div class="bar-label-left"> <?php echo $percent;?>% </div>
                                                        <div class="bar-label-right"> <span class="info"><?php echo $obj_points->puntos;?> / <?php echo format_number_miles($obj_next_range->point_grupal); ?></span> </div>
                                                    </div>
                                                    <div class="bar-level-1" style="width: 100%">
                                                        <div class="bar-level-3" style="width: <?php echo $percent;?>%"></div>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#financial_history').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>