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
                                    
                                    <th>S/. <?php echo $this->cart->format_number($items['price']); ?></th>
                                    <th class="text-c-green">
                                        <span class="badge badge-pill badge-success" style="font-size: 100%;">S/. <?php echo $this->cart->format_number($items['subtotal']); ?></span>
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
                                            S/. <?php echo $this->cart->format_number($this->cart->total()); ?>
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
                                          <button type="button" class="btn btn-primary" id="buyButton" data-price="<?php echo quitar_punto_number($this->cart->format_number($this->cart->total())); ?>">Pagar</button>
                                      </div>
                                  </div>
                            </div>
                          <div class="form-group has-feedback" id="pay_success_2" style="display: none">
                              <center>
                                 <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert" type="button">×</button>
                                    <p>La venta se realizo éxitosamente</p>
                                 </div>                 
                             </center>
                          </div>
                          <div class="form-group has-feedback" id="pay_info" style="display: none">
                                 <center>
                                     <div class="alert alert-danger">
                                        <button class="close" data-dismiss="alert" type="button">×</button>
                                        <p>Hubo un error, verifique los datos de la tarjeta</p>
                                     </div>                 
                                 </center>
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
<script src="<?php echo site_url();?>static/catalog/js/pay_order_new.js"></script>
<script>
  Culqi.publicKey = 'pk_test_igI3EctoA17FeNUD';
  var  price = "";
  $('#buyButton').on('click', function(e) {
      price = $(this).attr('data-price');
      Culqi.settings({
        title: 'Cultura Imparable',
        currency: 'PEN',
        description: 'Venta de Producto y/o Servicio',
        amount: price
      });
    Culqi.open();
    e.preventDefault();
    });
    
    function culqi() {
      if (Culqi.token) { // ¡Objeto Token creado exitosamente!
          var token = Culqi.token.id;
          var email = Culqi.token.email;
          var url = site + "catalogo/pay_order/process_pay_invoice"
          $.ajax({
             url: url,
             method : 'post',
             data: {
                 price:price,
                 email:email,
                 token:token
             },
             dataType: 'JSON',  
             success: function(data){
                 if(data.object == "charge"){
                    document.getElementById("pay_success_2").style.display = "block";
                    location.href = site + "catalogo/order";
                }else {
                    document.getElementById("pay_info").style.display = "block";
                 } 
             },
             error : function(data){
                 alert(data.user_message);
             }
          });
      } else { 
          console.log(Culqi.error);
          alert(Culqi.error.user_message);
      }
    };

</script>