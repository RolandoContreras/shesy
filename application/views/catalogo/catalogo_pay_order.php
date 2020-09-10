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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1; ?>
                                                                <?php foreach ($this->cart->contents() as $items): ?>
                                                                    <tr>
                                                                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                                        <th><?php echo $items['name']; ?></th>
                                                                        <th>
                                                                            <?php echo format_number_miles($this->cart->format_number($items['qty'])); ?>
                                                                        </th>
                                                                        <th>
                                                                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                                                                <p>
                                                                                    <?php
                                                                                    foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
                                                                                        if ($option_value != null) {
                                                                                            ?>
                                                                                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                                                                        <?php } ?>
                                                                                    <?php endforeach; ?>
                                                                                </p>
                                                                            <?php endif; ?>
                                                                        </th>

                                                                        <th class="text-c-green">
                                                                            <span class="badge badge-pill badge-success" style="font-size: 100%;">&dollar; <?php echo $this->cart->format_number($items['subtotal']); ?></span>
                                                                            <button type="button" onclick="delete_order('<?php echo $items['rowid']; ?>');" class="btn btn-icon" style="color:red;"><i data-feather="trash-2"></i></button>
                                                                        </th>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                <input type="hidden" id="punto_compra" value="<?php echo $total_compra;?>"/>
                                                                <input type="hidden" id="total" value="<?php echo $this->cart->format_number($this->cart->total()); ?>"/>
                                                                <input type="hidden" id="active_month" value="<?php echo $obj_profile->active_month;?>"/>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th class=""><b>TOTAL</b></th>
                                                                    <th class="text-c-purple">
                                                                        <span class="badge badge-pill badge-dark" style="font-size: 100%;">
                                                                            &dollar; <?php echo $this->cart->format_number($this->cart->total()); ?>
                                                                        </span>

                                                                    </th>
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
                                                                <button type="button" class="btn btn-primary" id="buyButton" data-price="<?php echo quitar_punto_number($this->cart->format_number($this->cart->total())); ?>">Pagar Tarjeta &nbsp;&nbsp;<i data-feather="credit-card"></i></button>
                                                                <button type="button" onclick="contra_entrega();" class="btn btn-primary" id="buyButton">Contra Entrega &nbsp;&nbsp;<i data-feather="user-check"></i></button>
                                                                <button type="button" onclick="puntos_compra();" id="puntos_button" class="btn btn-primary" id="buyButton">Puntos de Compra &nbsp;&nbsp;<i data-feather="shopping-bag"></i></button>
                                                                <button type="button" id="puntos_button" class="btn btn-primary" id="buyButton">Efectivo Disponible &nbsp;&nbsp;<i data-feather="dollar-sign"></i></button>
                                                            </div>
                                                        </div>
                                                    <div class="col-sm-8">
                                                        <div class="card">
                                                            <h5>Transferencias y depósitos</h5>
                                                        </div>
                                                        <table cellspacing="0" cellpadding="0" border="0" id="zero-configuration" class="display table nowrap table-striped table-hover dataTable">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Número de Cuenta</th>
                                                                    <th>Nombre del Banco</th>
                                                                    <th>Títular</th>
                                                                    <th>Descripción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="<?php echo site_url()."static/page_front/images/interbank_logo.png"?>" width="80"/></td>
                                                                    <td>4953001956935 </td>
                                                                    <td>Banco Interbank</td>
                                                                    <td>Coorporativo Fk</td>
                                                                    <td>Pago vía transferencia bancaria </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="<?php echo site_url()."static/page_front/images/yape.png"?>" width="60"/></td>
                                                                    <td>923 870  996</td>
                                                                    <td>Yape</td>
                                                                    <td>Merilu Rojas / Administradora</td>
                                                                    <td>Pago vía Yape (celular) </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><img src="<?php echo site_url()."static/page_front/images/bcp_logo.png"?>" width="80"/></td>
                                                                    <td>19399069591091</td>
                                                                    <td>Banco de Crédito</td>
                                                                    <td>Merilu Rojas / Administradora</td>
                                                                    <td>Pago vía transferencia bancaria </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="alert alert-primary mb-0" role="alert">
                                                            <p><a class="alert-link">Información</a><br/><br/>Luego de hacer el envió a nuestros números de cuenta, comunícate con nosotros a través de nuestro whatsapp +51 923870996, enviar el comprobante de pago, el usuario y el producto a comprar. En los próximos minutos estaremos procesando su pedido.</p>
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
<script src="<?php echo site_url(); ?>static/catalog/js/pay_order_new.js"></script>
<script>
                                                                    Culqi.publicKey = 'pk_live_d4ZedlvJFWdrXoiI';
                                                                    var price = "";
                                                                    $('#buyButton').on('click', function (e) {
                                                                        price = $(this).attr('data-price');
                                                                        Culqi.options({
                                                                            lang: 'auto',
                                                                            modal: true,
                                                                            style: {
                                                                                logo: '<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>',
                                                                                maincolor: '#0ec1c1',
                                                                                buttontext: '#ffffff',
                                                                                maintext: '#4A4A4A',
                                                                                desctext: '#4A4A4A'
                                                                            }
                                                                        });
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
                                                                                method: 'post',
                                                                                data: {
                                                                                    price: price,
                                                                                    email: email,
                                                                                    token: token
                                                                                },
                                                                                dataType: 'JSON',
                                                                                success: function (data) {
                                                                                    if (data.object == "charge") {
                                                                                        document.getElementById("pay_success_2").style.display = "block";
                                                                                        location.href = site + "catalogo/order";
                                                                                    } else {
                                                                                        document.getElementById("pay_info").style.display = "block";
                                                                                    }
                                                                                },
                                                                                error: function (data) {
                                                                                    alert(data.user_message);
                                                                                }
                                                                            });
                                                                        } else {
                                                                            console.log(Culqi.error);
                                                                            alert(Culqi.error.user_message);
                                                                        }
                                                                    }
                                                                    ;

</script>