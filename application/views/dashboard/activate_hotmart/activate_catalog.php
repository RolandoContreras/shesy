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
                  <h5 class="m-b-10">Activaciones</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Activaciones Hotmart Empresas</a></li>
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
                    <h5>Listado de Activaciones</h5>
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
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Usuario</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Cliente</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Producto</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Precio</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Cantidad</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Total</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($obj_invoices as $key => $value): ?>
                                <td><?php echo $value->invoice_id;?></td>
                                <td><?php echo formato_fecha_barras($value->date);?></td>
                                <td><h6><b><?php echo $value->username;?></b></h6></td>
                                <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td><h6><?php echo $value->name;?><h6></td>
                                <td><?php echo format_number_dolar($value->price);?></td>
                                <td><?php echo $value->quantity;?></td>
                                <td><h6><?php echo format_number_dolar($value->total);?></h6></td>
                                <td>
                                    <?php if ($value->pending == 1) {
                                        $valor = "En Espera";
                                        $stilo = "label label-info";
                                    }else{
                                        $valor = "Activado";
                                        $stilo = "label label-success";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <?php if ($value->pending == 1) { ?>
                                                    <button class="btn btn-success" type="button" onclick="active_catalog('<?php echo $value->invoice_id;?>','<?php echo $value->parent_id;?>','<?php echo $value->quantity;?>');"><span class="pcoded-micon"><i data-feather="check-circle"></i></span> Procesar</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Usuario</th>
                                  <th rowspan="1" colspan="1">Cliente</th>
                                  <th rowspan="1" colspan="1">Tipo</th>
                                  <th rowspan="1" colspan="1">Imagen</th>
                                  <th rowspan="1" colspan="1">Kit</th>
                                  <th rowspan="1" colspan="1">Precio</th>                                  
                                  <th rowspan="1" colspan="1">Total</th>                                  
                                  <th rowspan="1" colspan="1">Fecha</th>
                                  <th rowspan="1" colspan="1">Estado</th>
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
<script src="<?php echo site_url();?>static/cms/js/hotmart_active.js"></script>