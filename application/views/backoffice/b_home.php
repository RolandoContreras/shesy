<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <?php
                        if (isset($result_date)) {
                            if ($result_date < 11) {
                                ?>
                            <div class="col-md-12">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    Hola <?php echo $_SESSION['customer']['name']; ?> quedan solo <strong><?php echo $result_date; ?> días para </strong>su recompra mensual. Procure estar activo para que sigan ganando en el plan. <button onclick="go_recompras();"type="button" class="buyButton btn theme-bg shadow-2"><i class="fa fa-shopping-bag text-c-white fa-2x" style="margin-right:0px;"></i></button>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                            </div>
                                <?php
                            }
                        }
                        ?>
                        <?php if ($obj_customer->active == 0) { ?>
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                Bienvenido  <?php echo $_SESSION['customer']['name']; ?> a <strong>Cultura Imparable, </strong>para que obtengas todos los beneficios adquiere un <strong>Pack</strong> con nosotros. <a href="<?php echo site_url() . 'backoffice/plan'; ?>" type="button" class="buyButton btn btn-default">Clic Aquí</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            </div>
                        <?php } ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Ganancia Total</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-green f-30 m-r-10"></i>&dollar;<?php echo $obj_total_commissions->total_comissions != "" ? $obj_total_commissions->total_comissions : "0.00"; ?>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0">100%</p>
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
                                        <h6 class="mb-4">Efectivo Disponible</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>&dollar;<?php echo $obj_total_commissions->total_disponible != "" ? $obj_total_commissions->total_disponible : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Puntos de Compra</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>&dollar;<?php echo $obj_total_commissions->total_compra != "" ? $obj_total_commissions->total_compra : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><img src='<?php echo site_url() . "static/backoffice/images/rangos/$obj_customer->ranges_img"; ?>' alt="plan" width="60"/></div>
                                            <div class="col text-right">
                                                <h3><?php echo $obj_customer->range_name; ?></h3>
                                                <h5 class="text-c-green mb-0">
                                                    <i class="feather icon-arrow-up text-c-green m-r-10"></i><span class="text-muted">Rango Actual</span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10"></h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-green" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><img src='<?php echo site_url() . "static/backoffice/images/plan/$obj_customer->kit_img"; ?>' alt="plan" width="80"/></div>
                                            <div class="col text-right">
                                                <h3><?php echo $obj_customer->kit; ?></h3>
                                                <h5 class="text-c-green mb-0">
                                                    <i class="feather icon-arrow-up text-c-green m-r-10"></i><span class="text-muted">Plan Actual</span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10"></h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-green" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><i class="fa fa-user-circle text-c-green fa-3x"></i></div>
                                            <div class="col text-right">
                                                <h3><?php echo $obj_total_referidos->total_referred; ?></h3>
                                                <h5 class="text-c-green mb-0">
                                                    <i class="feather icon-arrow-up text-c-green m-r-10"></i><span class="text-muted">Referidos Directos</span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10"></h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-green" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><i class="fa fa-users text-c-purple fa-2x"></i></div>
                                            <div class="col text-right">
                                                <h3><?php echo $obj_total_referidos->total_register; ?></h3>
                                                <h5 class="text-c-purple mb-0"><i class="feather icon-arrow-up text-c-green m-r-10"></i> <span class="text-muted">Personas en el Equipo</span></h5>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10"></h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-purple" role="progressbar" style="width:40%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><i class="fa fa-dollar text-c-green fa-2x"></i></div>
                                            <div class="col text-right">
                                                <h3><?php echo format_number_dolar($obj_total_commissions->commission_by_date); ?></h3>
                                                <h5 class="text-c-blue mb-0"><i class="feather icon-arrow-up text-c-green m-r-10"></i> <span class="text-muted">Ingreso Último Mes</span></h5>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10"></h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:80%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-md-6 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><i class="fa fa-user-plus text-c-red fa-2x"></i></div>
                                            <div class="col text-right">
                                                <h3>Enlace de Referencia</h3>
                                                <h6 class="text-c-blue mb-0"><i class="feather icon-arrow-up text-c-green m-r-10"></i> <span class="text-muted">Click Aquí: <a target="_blank" href="<?php echo site_url() . 'registro/' . convert_slug($obj_profile->username); ?>"><?php echo site_url() . 'registro/' . convert_slug($obj_profile->username); ?></a></span></h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10"></h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:80%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Historial Financiero</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i> Restaurar</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> Colapsar</span><span style="display:none"><i class="feather icon-plus"></i> Expandir</span></a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> eliminar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center sorting_desc" tabindex="0" rowspan="1" colspan="1"> ID </th>
                                                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Remitente </th>
                                                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Bono </th>
                                                        <th class="text-center sorting" rowspan="1" colspan="1"> Fecha </th>
                                                        <th class="text-center sorting" rowspan="1" colspan="1"> Importe</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($obj_commissions != null) {
                                                        foreach ($obj_commissions as $value) {
                                                            ?>
                                                            <tr role="row " class="odd ">
                                                                <td align="center">
                                                                    <span class="lighter"><?php echo $value->commissions_id; ?></span>
                                                                </td>
                                                                <td align="center"> 
                                                                    Administrador 
                                                                </td>
                                                                <td align="center"><?php echo "Bono de " . $value->bonus; ?></td>
                                                                <td align="center"> 
                                                                    <span><?php echo formato_fecha_barras($value->date); ?></span><br> 
                                                                    <span class="smaller lighter "><i class="fa fa-clock-o"></i> <?php echo formato_fecha_minutos($value->date); ?></span>
                                                                </td>
                                                                <td align="center">
                                                                    <span class="badge-success-inverted"> + &dollar;<?php echo $value->amount; ?></span>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr class="unread">
                                                            <td colspan="4" style="text-align: center">Sin registros</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-md-4 col-xl-4">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><i class="fa fa-user-plus text-c-red fa-2x"></i></div>
                                            <div class="col text-right">
                                                <h3>Nuevo Socio</h3>
                                                <h5 class="text-c-blue mb-0"><span class="text-muted">Enlace de Referencia</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center card-active">
                                            <div class="col-12">
                                                <h6 class="text-center m-b-10">
                                                    <span class="text-muted m-r-5">
                                                        Click Aquí: <a target="_blank" href="<?php echo site_url() . 'registro/' . convert_slug($obj_profile->username); ?>"><?php echo site_url() . 'registro/' . convert_slug($obj_profile->username); ?></a>
                                                    </span>
                                                </h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-red" role="progressbar" style="width:100%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                            <!--<h6 class="element-header" style="margin-top: 35px;"> Puntos de Rango </h6>-->
<!--                                        <div class="container py-5">
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

                                                             Progress bar 1 
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
                                        </div>-->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script>
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
</script>-->
<!--<script src="<?php echo site_url() . "static/backoffice/dist/circliful.js" ?>"></script>-->