<!doctype html>
<html lang="es-PE">
    <?php $this->load->view("head"); ?>
    <body>
        <div id="section-header" data-section-id="header">
            <?php $this->load->view("header"); ?>
        </div>
        <div class="background-image background-image--1590554804411">
            <div class="section section--opt_in section--middle section--xs-small section--dark section--1590554804411"
                 kjb-settings-id="sections_1590554804411_settings_background_color">
                <div class="container">
                    <div class="row text-xs-center">
                        <div class="col-md-6">
                            <div class="section--middle optin__panel optin__panel--boxed">
                                <div class="row optin optin--stacked">
                                    <div class="col-md-12">
                                        <?php foreach ($this->cart->contents() as $items): ?>
                                            <div class="checkout-content">
                                                <img class="img-responsive checkout-content-img" src="<?php echo site_url() . "static/catalog/" . $items['img']; ?>" alt="Snhsaytjrbepnkhdyyhi correos 1">
                                                <div class="checkout-content-body">
                                                    <div class="space-20"></div>
                                                    <h2 style="text-align: center;"><span style="color: #57de1d;"><strong>Estas apunto de comprar.<br>&nbsp;</strong></span></h2>
                                                    <h3>
                                                        <span style="color: #000000;">
                                                            <i class="fa fa-check"></i>&nbsp;&nbsp;<?php echo $items['name']; ?><br><br>
                                                        </span>
                                                    </h3>
                                                </div>
                                                <div>
                                                    <input onclick="show();" type="radio" name="pay" id="tarjeta_radio" value="tarjeta" checked>
                                                    <label>Pago con tarjeta</label><br/>
                                                    <input onclick="show();" type="radio" name="pay" id="banco_radio" value="banco">
                                                    <label>Pago con trasferencia bancaria</label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 offset-md-1" id="tarjeta">
                            <form action="javascript:void(0);" method="post">
                                <div class="section--middle optin__panel optin__panel--boxed">
                                    <div class="row optin optin--stacked">
                                        <div class="col-md-12">
                                            <h4 class="checkout-panel-title js-checkout-panel-price-discountable" style="color: #000000;">
                                                Pago con Tarjeta
                                            </h4>
                                        </div>
                                        <div class="col-md-12">
                                            <h2 class="checkout-panel-title js-checkout-panel-price-discountable" style="color: #000000;">
                                                &dollar;<?php echo $this->cart->format_number($this->cart->total()); ?>
                                            </h2>
                                        </div>

                                        <div class="col-md-12">
                                            <p class="optin__subheading">Déjanos tus datos para hacerte el envió</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="optin__subheading"><b>Recomendado por:</b> <?php echo $obj_customer->first_name . " " . $obj_customer->last_name; ?></p>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="space-20"></div>
                                            <div class="text-field form-group">
                                                <p class="optin__subheading">Ingrese su nombre</p>
                                                <input type="text" name="name" id="name" required="required" class="form-control" placeholder="Nombre">
                                                <input type="hidden" name="sponsor_id" id="sponsor_id" value="<?php echo $obj_customer->customer_id ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="space-20"></div>
                                            <div class="text-field form-group">
                                                <p class="optin__subheading">Apellidos</p>
                                                <input type="text" name="last_name" id="last_name" required="required" class="form-control" placeholder="Apellidos">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="email-field form-group">
                                                <p class="optin__subheading">Teléfono</p>
                                                <input required="required" class="form-control" placeholder="Teléfono:" type="text" name="phone" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="email-field form-group">
                                                <p class="optin__subheading">Dirección / Referencia</p>
                                                <textarea name="address" id="address" cols="20" rows="5" class="form-control" placeholder="Ingrese su dirección / referencia"  required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="tarjeta">
                                            <button id="pagar" type="button" data-price="<?php echo quitar_punto_number($this->cart->format_number($this->cart->total())); ?>" data-price2="<?php echo $this->cart->format_number($this->cart->total()); ?>" class="buyButton btn btn--sections_1590554804411_settings_btn_text btn--block btn--solid btn-form form-control"><i class="fa fa-credit-card"></i> Pagar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-5 offset-md-1" id="banco" style="display: none;">
                            <div class="section--middle optin__panel optin__panel--boxed">
                                <div class="row optin optin--stacked">
                                    <div class="col-md-12">
                                        <h4 class="checkout-panel-title js-checkout-panel-price-discountable" style="color: #000000;">
                                            Pago por transferencia bancaria
                                        </h4>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 class="checkout-panel-title js-checkout-panel-price-discountable" style="color: #000000;">
                                            &dollar;<?php echo $this->cart->format_number($this->cart->total()); ?> - s/<?php echo format_number($this->cart->format_number($this->cart->total()) * 3.5); ?>
                                        </h2>
                                    </div>
                                    <div class="col-md-12">
                                            <p class="optin__subheading"><b>Recomendado por:</b> <?php echo $obj_customer->first_name . " " . $obj_customer->last_name; ?></p>
                                        </div>
                                    <div class="col-md-12" style="overflow: auto;">
                                        <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" cellspacing="0" cellpadding="0" border="0" >
                                            <thead>
                                                <tr>
                                                    <th>Número de Cuenta</th>
                                                    <th>Banco</th>
                                                    <th>Títular</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="http://localhost/shesy/static/page_front/images/interbank_logo.png" width="80">4953001956935 </td>
                                                    <td>Interbank</td>
                                                    <td>Coorporativo Fk</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="http://localhost/shesy/static/page_front/images/yape.png" width="60"> 923 870  996</td>
                                                    <td>Yape</td>
                                                    <td>Merilu Rojas / Administradora</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="http://localhost/shesy/static/page_front/images/bcp_logo.png" width="80"> 19399069591091</td>
                                                    <td>Crédito (BCP)</td>
                                                    <td>Merilu Rojas / Administradora</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="optin__subheading">Si realizaste el envió a nuestras cuentas, por favor adjunta el comprobando y envíalo y nos comunicaremos en la brevedad.</p>
                                    </div>
                                        
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="space-20"></div>
                                            <div class="text-field form-group">
                                                <p class="optin__subheading">Ingrese su nombre</p>
                                                <input type="text" name="name" id="name" required="required" class="form-control" placeholder="Nombre">
                                                <input type="hidden" name="sponsor_id" id="sponsor_id" value="<?php echo $obj_customer->customer_id ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="space-20"></div>
                                            <div class="text-field form-group">
                                                <p class="optin__subheading">Apellidos</p>
                                                <input type="text" name="last_name" id="last_name" required="required" class="form-control" placeholder="Apellidos">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="email-field form-group">
                                                <p class="optin__subheading">Teléfono</p>
                                                <input required="required" class="form-control" placeholder="Teléfono:" type="text" name="phone" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="email-field form-group">
                                                <p class="optin__subheading">Dirección / Referencia</p>
                                                <textarea name="address" id="address" cols="20" rows="5" class="form-control" placeholder="Ingrese su dirección / referencia"  required="required"></textarea>
                                            </div>
                                        </div>
                                    <form action="javascript:void(0);" method="post" onsubmit="send_voucher();" name="form-voucher">
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="space-20"></div>
                                            <div class="text-field form-group">
                                                <p class="optin__subheading">Adjunte el comprobate del envio</p>
                                                <input type="file" name="voucher" id="voucher" required="required" class="form-control" placeholder="Comprabante">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="text-align: left">
                                            <div class="space-20"></div>
                                            <div class="text-field form-group">
                                                <button id="enviar" type="submit"  class="btn btn--sections_1590554804411_settings_btn_text btn--block btn--solid btn-form form-control"><i class="fa fa-arrow-right"></i> Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-footer">
            <?php $this->load->view("footer"); ?>
        </div>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo site_url() . "static/page_front/js/script/home.js"; ?>"></script>
        <script>
                                        function show() {
                                            var radio_tarjeta = document.getElementById("tarjeta_radio").checked;
                                            if(radio_tarjeta === true){
                                                 document.getElementById("tarjeta").style.display = "block";
                                                 document.getElementById("banco").style.display = "none";
                                            }else{
                                                document.getElementById("tarjeta").style.display = "none";
                                                document.getElementById("banco").style.display = "block";
                                                 
                                            }
                                        }

        </script>

        <script>
//    pk_test_igI3EctoA17FeNUD
            Culqi.publicKey = 'pk_live_d4ZedlvJFWdrXoiI';
            var price = "";
            var price2 = "";
            var kit_id = "";
            var name = "";
            var last_name = "";
            var phone = "";
            var address = "";
            var sponsor_id = "";
            $('.buyButton').on('click', function (e) {
                price = $(this).attr('data-price');
                price = price * 3.5;
                price2 = $(this).attr('data-price2');
                kit_id = $(this).attr('data-kit');
                name = document.getElementById("name").value;
                last_name = document.getElementById("last_name").value;
                phone = document.getElementById("phone").value;
                address = document.getElementById("address").value;
                sponsor_id = document.getElementById("sponsor_id").value;

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

                if (name != "" && last_name != "" && phone != "" && address != "") {
                    document.getElementById("pagar").innerHTML = "Procesando...";
                    Culqi.open();
                    e.preventDefault();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Ingrese todos sus datos personales',
                    });
                }
            });

            function culqi() {
                if (Culqi.token) { // ¡Objeto Token creado exitosamente!
                    var token = Culqi.token.id;
                    var email = Culqi.token.email;
                    var url = site + "create_invoice_referencia";
                    $.ajax({
                        url: url,
                        method: 'post',
                        data: {
                            price: price,
                            price2: price2,
                            name: name,
                            sponsor_id: sponsor_id,
                            last_name: last_name,
                            phone: phone,
                            address: address,
                            email: email,
                            token: token
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Pago Procesado',
                                    footer: "En breve nos estaremos comunicando para coordinar la entrega",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Ups! Sucedio un error ',
                                    footer: "Verifique los datos de la tarjeta"
                                });
                                document.getElementById("pagar").innerHTML = "Pagar";
                            }
                        },
                        error: function (data) {
                            alert(data.user_message);
                            document.getElementById("pagar").innerHTML = "Pagar";
                        }
                    });
                } else {
                    console.log(Culqi.error);
                    alert(Culqi.error.user_message);
                    document.getElementById("pagar").innerHTML = "Pagar";
                }
            }
        </script>