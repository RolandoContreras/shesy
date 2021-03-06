<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Enlace de Compra</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Enlace de Compra</a></li>
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
                    <h5>Listado de Enlace de Compra</h5>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">ID</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Fecha</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Cliente</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Pagado Por</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Imagen</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Total</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Entregado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($obj_invoices as $key => $value): ?>
                                <td><?php echo $value->invoice_id;?></td>
                                <td>
                                    <span class="badge badge-pill badge-warning" style="font-size: 100%;"><?php echo formato_fecha_barras($value->date);?></span>
                                </td>
                                <td><?php echo $value->name." ".$value->last_name;?></td>
                                <td>
                                    <?php if ($value->voucher == 1) {
                                        $valor = "Deposito Bancario";
                                        $stilo = "label label-info";
                                    }else{
                                        $valor = "Tarjeta";
                                        $stilo = "label label-success";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <?php if (!empty($value->img)) { ?>
                                        <a href="<?php echo site_url() . "static/cms/images/comprobantes/$value->invoice_id/$value->img"; ?>" data-lightbox="roadtrip">
                                            <i class="fas fa-eye f-30 text-c-green"></i>
                                        </a>
                                    <?php }else{ 
                                            echo "---";
                                     }?>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-success" style="font-size: 100%;">&dollar;<?php echo format_number($value->total);?></span></td>
                                <td>
                                    <?php if ($value->active == 1) {
                                        $valor = "En Espera";
                                        $stilo = "label label-warning";
                                    }elseif($value->active == 2){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    }else{
                                        $valor = "Cancelado";
                                        $stilo = "label label-danger";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <?php if ($value->status == 1) {
                                        $valor = "Falta Entregar";
                                        $stilo = "label label-warning";
                                    }else{
                                        $valor = "Entregado";
                                        $stilo = "label label-success";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                                    <?php if ($value->active == 1) { ?>
                                                            <button class="btn btn-secondary" type="button" onclick="active_enlace_compra('<?php echo $value->invoice_id;?>','<?php echo $value->referencia_compra_id;?>','<?php echo $value->sponsor;?>');"><span class="pcoded-micon"><i data-feather="check-circle"></i></span> Procesar</button>
                                                    <?php } ?>
                                                    <button class="btn btn-secondary" type="button" onclick="view_order_enlace_compra('<?php echo $value->invoice_id;?>');"><span class="pcoded-micon"><i data-feather="shopping-cart"></i></span> Ver Pedido</button>
                                                    <button class="btn btn-secondary" type="button" onclick="delete_enlace_compra('<?php echo $value->invoice_id;?>');"><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</button>
                                                    <?php if ($value->voucher != 1 && $value->status == 1) { ?>
                                                        <button class="btn btn-secondary" type="button" onclick="marcar_enviado('<?php echo $value->referencia_compra_id;?>');"><span class="pcoded-micon"><i data-feather="send"></i></span> Marcar como enviado</button>
                                                    <?php }?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Fecha</th>
                                  <th rowspan="1" colspan="1">Cliente</th>
                                  <th rowspan="1" colspan="1">Pagado Por</th>
                                  <th rowspan="1" colspan="1">Imagen</th>
                                  <th rowspan="1" colspan="1">Total</th>                                  
                                  <th rowspan="1" colspan="1">Estado</th>
                                  <th rowspan="1" colspan="1">Entregado</th>
                                  <th rowspan="1" colspan="1">Acciones</th>
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
</section>
<script src="<?php echo site_url();?>static/cms/js/enlace_compra.js"></script>
<script src="<?php echo site_url() . 'static/backoffice/js/lightbox.js'; ?>"></script>
