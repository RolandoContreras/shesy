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
                                    <h5 class="m-b-10">Mis Comisiones</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Historial de Comisiones</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Ganancia Total</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-green f-30 m-r-10"></i>&dollar;<?php echo $obj_total->total != "" ? format_number_miles($obj_total->total) : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Ganancia Disponible</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-blue f-30 m-r-10"></i>&dollar;<?php echo $gananciaDisponible != "" ? format_number_miles($gananciaDisponible) : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Efectivo Disponible</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>&dollar;<?php echo $obj_total->total_disponible != "" ? format_number_miles($obj_total->total_disponible) : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Puntos de Compra</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>&dollar;<?php echo $obj_total->total_compra != "" ? format_number_miles($obj_total->total_compra) : "0.00"; ?>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Mis Comisiones</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="table" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
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
                                                                <?php foreach ($obj_commissions as $value) { ?>
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
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr><th rowspan="1" class="text-center" colspan="1">ID</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Remitente</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Tipo</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Fecha</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Total</th>
                                                                </tr>
                                                            </tfoot>
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
        </div>
    </div>
</div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>