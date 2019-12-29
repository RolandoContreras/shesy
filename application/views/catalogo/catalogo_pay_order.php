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
                                        <input class="form-control" type="text" id="qty" name="qty" value="<?php echo $this->cart->format_number($items['qty']); ?>" class="input-xlarge-fluid" placeholder="Cantidad">
                                    </th>
                                    <th>$<?php echo $this->cart->format_number($items['price']); ?></th>
                                    <th class="text-c-green">
                                        <span class="badge badge-pill badge-success" style="font-size: 100%;">$<?php echo $this->cart->format_number($items['subtotal']); ?></span>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-primary" onclick="update_order('<?php echo $items['rowid'];?>');"><i data-feather="rotate-cw"></i> Actualizar</button>
                                        <button type="button" class="btn btn-danger" onclick="delete_order('<?php echo $items['rowid'];?>');"><i data-feather="trash-2"></i> Eliminar</button>
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
                                        <h5>Tipos de Pagos</h5>
                                      </div>
                                    </div>
                                  </div>
                                <div class="col-md-12 col-xl-4">
                                    <div class="card theme-bg2 visitor">
                                      <div class="card-block text-center">
                                          <img class="img-female" src="<?php echo site_url().'static/page_front/images/visa-background.png';?>" alt="visitor-user">
                                            <h5 class="text-white m-0">Pagar con Pago Efectivo</h5>
                                            <img width="100" src="<?php echo site_url().'static/page_front/images/pagoefectivo.png';?>" alt="visitor-user"><br/>
                                      </div>
                                        
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="process_pay_invoice();"><i data-feather="dollar-sign"></i> Pagar</button>                                            
                                  </div>
                              <div class="col-md-12 col-xl-2">
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