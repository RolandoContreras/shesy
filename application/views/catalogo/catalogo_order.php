<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mis Compras</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a>Compras</a></li>
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
                    <h5>Todas mis Compras</h5>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid"
                              aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 267px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">ID Compra</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 392px;"
                                    aria-label="Position: activate to sort column ascending">Fecha</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Cliente</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Concepto</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Total</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 188px;"
                                    aria-label="Start date: activate to sort column ascending">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                                   <?php foreach ($obj_invoices as $value): ?>
                                <tr>
                                <th><?php echo $value->invoice_id;?></th>
                                <th><?php echo formato_fecha_barras($value->date);?></th>
                                <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td>Compra de Producto</td>
                                <td class="text-c-green">
                                    <span class="badge badge-pill badge-success" style="font-size: 100%;">$<?php echo $value->total;?></span>
                                </td>
                                <td>
                                    <?php if ($value->active == 1) {
                                        $valor = "Pendiente";
                                        $stilo = "label label-warning";
                                    }else if($value->active == 2){
                                        $valor = "Procesado";
                                        $stilo = "label label-success";
                                    }else if($value->active == 0){
                                        $valor = "Sin Acción";
                                        $stilo = "label label-info";
                                    }else{
                                        $valor = "Cancelado";
                                        $stilo = "label label-danger";
                                    } ?>
                                    <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <?php if($value->active == 0){ ?>
                                            <div class="btn-group">
                                                <a style="color:rgb(29, 233, 182);" type="button" data-toggle="modal" data-target="#pay_modal" data-whatever="@getbootstrap" onclick="upload_invoice('<?php echo $value->invoice_id;?>');" class="btn btn-icon btn-rounded btn-outline-success"><i data-feather="upload"></i></a>
                                            </div>
                                            <div class="modal fade" id="pay_modal" tabindex="-1" role="dialog" style="display: none;">
                                                <div class="modal-dialog" role="document">
                                                    <form name="invoice" id="invoice">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detalle de Pago</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Cargar Comprobante</label><br/>
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="image_file" value="Upload Imagen de Envio" name="image_file">
                                                                                <label class="custom-file-label" for="validatedCustomFile">Seleccionar la Imagen...</label>
                                                                                <input type="text" value="<?php echo $value->invoice_id;?>" name="invoice_id" id="invoice_id" style="display:none">
                                                                            </div>
                                                                      </div>
                                                                        <hr>
                                                                        <div id="uploaded_image">
                                                                            <div class="alert alert-danger" style="text-align: center;display: none;">Seleccionar Imagen</div>
                                                                        </div>
                                                                        <div id="message_success">
                                                                            <div class="alert alert-success" style="text-align: center;display: none;">Imagen subida con éxito</div>
                                                                        </div>
                                                                </div>
                                                            <div class="modal-footer">
                                                                <button type="button" onclick="send_invoice('<?php echo $value->invoice_id;?>');" class="btn btn-primary"><i data-feather="send"></i> Enviar</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                              </div>
                                        <?php } ?>
                                        <div class="btn-group">
                                                   <button type="button" onclick="ver_order('<?php echo $value->invoice_id;?>');" class="btn btn-icon btn-rounded btn-outline-info"><i data-feather="eye"></i></button>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID Compra</th>
                                  <th rowspan="1" colspan="1">Fecha</th>
                                  <th rowspan="1" colspan="1">Cliente</th>
                                  <th rowspan="1" colspan="1">Concepto</th>
                                  <th rowspan="1" colspan="1">Total</th>
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
<script src="<?php echo site_url();?>static/catalog/js/order.js"></script>