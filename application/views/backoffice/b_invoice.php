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
                                    <h5 class="m-b-10">Mis Facturas</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Historial de Facturas</a></li>
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
                                        <h5>Mis Compras</h5>
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
                                                                    <th class="text-center sorting" rowspan="1" colspan="1"> Fecha </th>
                                                                    <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Tipo </th>
                                                                    <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Importe </th>
                                                                    <th class="text-center sorting" rowspan="1" colspan="1"> Estado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($obj_invoices as $value) { ?>
                                                                    <tr role="row " class="odd">
                                                                        <td align="center">
                                                                            <span class="lighter"><?php echo $value->invoice_id; ?></span>
                                                                        </td>
                                                                        <td align="center"> 
                                                                            <span><?php echo formato_fecha_barras($value->date); ?></span><br> 
                                                                            <span class="smaller lighter"><i class="fa fa-clock-o"></i> <?php echo formato_fecha_minutos($value->date); ?></span>
                                                                        </td>
                                                                        <td align="center"> 
                                                                            <?php echo $value->recompra == 1 ? "Recompran" : "Activación" ?>
                                                                        </td>
                                                                        <td align="center"><span class="badge-success-inverted"> + &dollar; <?php echo $value->total; ?></span></td>


                                                                        <td align="center">
                                                                            <?php if ($value->active == "1") { ?>
                                                                                <a class="badge badge-primary-inverted">Esperando Activación</a>
                                                                            <?php } elseif ($value->active == "2") { ?>
                                                                                <a class="badge badge-success-inverted">Pagado</a>
                                                                            <?php } else { ?>
                                                                                <a onclick="send_upload('<?php echo $value->invoice_id; ?>');">
                                                                                    <button  class="mr-2 mb-2 btn btn-warning">Subir Comprobante</button>
                                                                                </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr><th rowspan="1" class="text-center" colspan="1">ID</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Fecha</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Tipo</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Importe</th>
                                                                    <th rowspan="1" class="text-center" colspan="1">Estado</th>
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
<script src="<?php echo site_url() . 'static/backoffice/js/script/invoice.js'; ?>"></script>