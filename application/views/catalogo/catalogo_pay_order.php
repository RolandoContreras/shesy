<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mis Pedido</h5>
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
                    <h5>Mi compra actual</h5>
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
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Nombre</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Cantidad</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Talla / Color</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Precio</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Sub Total</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $i = 1; ?>
                               <?php foreach ($this->cart->contents() as $items): ?>
                                <tr>
                                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                    <th><?php echo $items['name'];?></th>
                                    <th>
                                        <input class="form-control" type="text" id="qty" name="qty" value="<?php echo format_number_miles($this->cart->format_number($items['qty'])); ?>" class="input-xlarge-fluid" placeholder="Cantidad">
                                    </th>
                                    <th>
                                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                            <p>
                                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                                    <?php endforeach; ?>
                                            </p>
                                        <?php endif; ?>
                                    </th>
                                    
                                    <th>$<?php echo $this->cart->format_number($items['price']); ?></th>
                                    <th class="text-c-green">
                                        <span class="badge badge-pill badge-success" style="font-size: 100%;">$<?php echo $this->cart->format_number($items['subtotal']); ?></span>
                                    </th>
                                    <th>
                                        <button type="button" onclick="update_order('<?php echo $items['rowid'];?>');" class="btn btn-icon btn-rounded btn-outline-success"><i data-feather="rotate-cw"></i></button>
                                        <button type="button" onclick="delete_order('<?php echo $items['rowid'];?>');" class="btn btn-icon btn-rounded btn-outline-danger"><i data-feather="trash-2"></i></button>
                                    </th>
                                </tr>
                            <?php endforeach;?>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-c-purple"><b>TOTAL</b></th>
                                <th class="text-c-purple">
                                        <span class="badge badge-pill badge-dark" style="font-size: 100%;">
                                            $<?php echo $this->cart->format_number($this->cart->total()); ?>
                                        </span>
                                        
                                </th>
                                <th></th>
                              </tbody>
                            </table>
                              <br/>
                              <div class="form-group has-feedback" style="display: none;" id="quantity_error">
                                    <div class="alert alert-danger validation-errors">
                                        <p class="user_login_id" style="text-align: center;">La cantidad es invalida.</p>
                                    </div>
                                </div>
                                <div class="form-group has-feedback" style="display: none;" id="quantity_success">
                                    <div class="alert alert-success validation-errors">
                                        <p class="user_login_id" style="text-align: center;">Producto Agregado.</p>
                                    </div>
                                </div>
                          </div>
                        </div>
                            <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h5>Pago</h5>
                                      </div>
                                    </div>
                                  </div>
                                <div class="col-sm-12">
                                      <div class="card-block text-center">
                                          <button type="button" onclick="process_pay_invoice();" class="btn btn-primary" data-toggle="modal" data-target="#pay_modal" data-whatever="@getbootstrap">Pagar</button>
                                      </div>
                                  </div>
                            </div>
                          <div class="modal fade" id="pay_modal" tabindex="-1" role="dialog" style="display: none;">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalle de Pago</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <center>
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label" style="color: black;"><br>Valor total:</label>
                                                            <b><h3 style="font-weight: 900 !important">$<?php echo $this->cart->format_number($this->cart->total());?></h3></b>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <div class="col-lg-12"> 
                                                                <label class="control-label"><br>Ahorro Dólares BCP:</label>
                                                                <b>125-26514981321</b>
                                                                <label class="control-label">Número Interbancario (CCI):</label>
                                                                <b>1351-125-26514981321-89</b>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="col-lg-12"> 
                                                              <img src="<?php echo site_url().'static/backoffice/images/bcp_logo';?>" width="100">
                                                          </div>
                                                        </div>
                                                        <div class="form-group"> 
                                                            <div class="col-lg-12"> 
                                                                <label class="control-label"><br>Ahorro Dólares Interbank:</label>
                                                                <b>125-26514981321</b>
                                                                <label class="control-label">Número Interbancario (CCI):</label>
                                                                <b>1351-125-26514981321-89</b>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="col-lg-12"> 
                                                              <img src="<?php echo site_url().'static/backoffice/images/interbank_loco.png';?>" width="100">
                                                          </div>
                                                        </div>
                                                </div>
                                                </center>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?php echo site_url().'catalogo/order';?>" type="button" style="color: white;" class="btn btn-primary">Subir Comprobante</a>
                                        </div>
                                        </div>
                                </div>
                          </div>
                          
                          
                            <div class="form-group has-feedback" style="display: none;" id="pay_success_2">
                                <div class="alert alert-success validation-errors">
                                    <p class="user_login_id" style="text-align: center;">Pedido pagado con éxito en unos minutos estamos procesando su compra.</p>
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
<script src="<?php echo site_url();?>static/catalog/js/pay_order.js"></script>