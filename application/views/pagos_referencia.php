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
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <form action="javascript:void(0);" method="post">
                                <div class="section--middle optin__panel optin__panel--boxed">
                                    <div class="row optin optin--stacked">
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
                                        <div class="col-md-12">
                                            <button type="button" data-price="<?php echo quitar_punto_number($this->cart->format_number($this->cart->total())); ?>" data-price2="<?php echo $this->cart->format_number($this->cart->total()); ?>" class="buyButton btn btn--sections_1590554804411_settings_btn_text btn--block btn--solid btn-form form-control">Pagar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-footer">
            <?php $this->load->view("footer"); ?>
        </div>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='<?php echo site_url() . 'static/page_front/js/script/contact.js'; ?>'></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script>
//    pk_test_igI3EctoA17FeNUD
                                Culqi.publicKey = 'pk_test_igI3EctoA17FeNUD';
                                var price = "";
                                var price2 = "";
                                var kit_id = "";
                                $('.buyButton').on('click', function (e) {
                                    price = $(this).attr('data-price');
                                    price = price * 3.5;
                                    price2 = $(this).attr('data-price2');
                                    kit_id = $(this).attr('data-kit');
                                    
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
                                        var url = site + "create_invoice_referencia";
                                        $.ajax({
                                            url: url,
                                            method: 'post',
                                            data: {
                                                price: price,
                                                price2: price2,
                                                email: email,
                                                token: token,
                                            },
                                            dataType: 'JSON',
                                            success: function (data) {
                                                if (data.object == "charge") {
                                                    Swal.fire({
                                                        position: 'top-end',
                                                        icon: 'success',
                                                        title: 'Pago Procesado',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                                    url = site + "backoffice/invoice";
                                                    setTimeout(function () {
                                                        location.href = url
                                                    }, 1500);
                                                } else {
                                                    Swal.fire({
                                                        position: 'top-end',
                                                        icon: 'error',
                                                        title: 'Ups! Sucedio un error ',
                                                        footer: "Verifique los datos de la tarjeta"
                                                    });
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