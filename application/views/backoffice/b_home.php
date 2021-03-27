<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <?php  if($obj_profile->active_month == 0){ ?>
                                <div class="col-md-12 col-xl-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <b>NOTICIA IMPORTANTE</b>
                                        <hr>
                                        Bienvenido a la embajada empresarial <b> <?php echo $_SESSION['customer']['name']?></b>, acumula puntos de canje por cada consumo o recomendación.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                </div>
                             <?php } ?>   
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
                                <div class="card card-social">
                                    <div class="space-15"></div>
                                    <?php
                                    if (!empty($obj_next_range)) {
                                        if ($obj_total_commissions->total_comissions == 0) {
                                            $percent = 0;
                                        } else {
                                            $percent = ($obj_total_commissions->total_comissions / $obj_next_range->point_grupal) * 100;
                                            $percent_js = $obj_total_commissions->total_comissions / $obj_next_range->point_grupal;
                                            $percent = ceil($percent);
                                        }
                                        ?>
                                        <div class="circle">
                                            <strong class="number-cicle"><?php echo $percent; ?>% <br/> 
                                                <strong class="number-range">
                                                    <?php echo $obj_next_range->name; ?>
                                                </strong>
                                            </strong>
                                            <div class="os-progress-bar warning">
                                                <div class="bar-labels">
                                                    <div class="bar-label-left"> <?php echo format_number_miles($obj_total_commissions->total_comissions); ?> PTS </div>
                                                    <div class="bar-label-right"> <span class="info"><?php echo format_number_miles($obj_next_range->point_grupal); ?> PTS</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else {
                                        $percent_js = 1;
                                        ?>
                                        <div class="circle">
                                            <strong class="number-cicle">100%</strong>
                                            <div class="os-progress-bar warning">
                                                <div class="bar-labels">
                                                    <div class="bar-label-left"></div>
                                                    <div class="bar-label-right"> <span class="info">Completado</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Ganancia Total</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-green f-30 m-r-10"></i>&dollar;<?php echo $obj_total_commissions->total_comissions != "" ? format_number($obj_total_commissions->total_comissions) : "0.00"; ?>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0">100%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  if($obj_profile->kit_id != 0 && $obj_profile->active_month != 0){ ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Ganancia Disponible</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-blue f-30 m-r-10"></i>&dollar;<?php echo $gananciaDisponible != "" ? format_number($gananciaDisponible) : "0.00"; ?>
                                                </h3>
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0">100%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>&dollar;<?php echo $obj_total_commissions->total_disponible != "" ? format_number($obj_total_commissions->total_disponible) : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Puntos de Canje</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>&dollar;<?php echo $obj_total_commissions->total_compra != "" ? format_number($obj_total_commissions->total_compra) : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  if($obj_profile->kit_id != 0 && $obj_profile->active_month != 0){ ?>
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
                                                    <div class="progress-bar progress-c-green" role="progressbar" style="width:<?php echo $percent; ?>%;height:6px;" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
                                                    <div class="progress-bar progress-c-green" role="progressbar" style="width:100%;height:6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  if($obj_profile->kit_id != 0 && $obj_profile->active_month != 0){ ?>
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
                                                    <div class="progress-bar progress-c-purple" role="progressbar" style="width:100%;height:6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
                                                    <div class="progress-bar progress-c-green" role="progressbar" style="width:100%;height:6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:100%;height:6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($obj_profile->kit_id != 0 && $obj_profile->active_month != 0){ 
                                $class = "col-md-6 col-xl-6 offset-2";
                            }else{
                                $class = "col-md-6 col-xl-4";
                            } ?>
                            <div class="<?php echo $class;?>">
                                <div class="card card-social">
                                    <div class="card-block border-bottom">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto"><i class="fa fa-user-plus text-c-red fa-2x"></i></div>
                                            <div class="col text-right">
                                                <h3>Enlace de Referencia</h3>
                                                <h6 class="text-c-blue mb-0"><i class="feather icon-arrow-down text-c-green m-r-10"></i> <span class="text-muted">Nuevo Socio: <a target="_blank" href="<?php echo site_url() . 'registro/' . convert_slug($obj_profile->username); ?>"><?php echo site_url() . 'registro/' . convert_slug($obj_profile->username); ?></a></span></h6>
                                            </div>
                                        </div>
                                        <!--<hr/>
                                        <div class="row align-items-center justify-content-center card-active text-right">
                                            <div class="col-12">
                                                <h6 class="text-c-blue mb-0"><i class="feather icon-arrow-down text-c-green m-r-10"></i> <span class="text-muted">Compra: <a target="_blank" href="<?php echo site_url() . 'catalogo/referencia/' . convert_slug($obj_profile->username); ?>"><?php echo site_url() . 'catalogo/referencia/' . convert_slug($obj_profile->username); ?></a></span></h6>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12">
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
                                                                <td align="center">
                                                                    <?php
                                                                    if ($value->pago == 1) {
                                                                        echo "Retiro";
                                                                    } else {
                                                                        echo "Bono de " . $value->bonus;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td align="center"> 
                                                                    <span><?php echo formato_fecha_barras($value->date); ?></span><br> 
                                                                    <span class="smaller lighter "><i class="fa fa-clock-o"></i> <?php echo formato_fecha_minutos($value->date); ?></span>
                                                                </td>
                                                                <td align="center">
                                                                    <?php if ($value->amount < 0) { ?>
                                                                        <span class="badge-danger-inverted"> <?php echo $value->amount; ?>&dollar;</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge-success-inverted"> + &dollar;<?php echo $value->amount; ?></span>
                                                                    <?php } ?>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.circle').circleProgress({
        value: <?php echo $percent_js; ?>,
        size: 280.0,
        startAngle: -Math.PI,
        thickness: '20',
        fill: {
            gradient: ['#3aeabb', '#fdd250']
        },
        emptyFill: 'rgba(0, 0, 0, .1)',
        animation: {
            duration: 1200,
            easing: 'circleProgressEasing'
        },
        animationStartValue: 0.0,
        reverse: false,
        lineCap: 'butt'
    });
</script>
