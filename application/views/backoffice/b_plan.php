<link rel="stylesheet" href="<?php echo site_url() . 'static/backoffice/css/jquery.modal.min.css'; ?>"/>
<div class="content-w">
    <div class="top-bar color-scheme-dark"> </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"> 
            <a href="<?php echo site_url() . 'backoffice'; ?>">Tablero</a> 
        </li>
    </ul>
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12 col-xxl-12">
                    <div class="element-wrapper">
                        <h6 class="element-header"> Pack </h6>
                        <div class="row">
                            <?php foreach ($obj_kit as $value) { ?>
                                <div class="pricing-plan col-md-3">
                                    <div class="plan-head">
                                        <div class="plan-image"> 
                                            <img alt="" src='<?php echo site_url() . "static/backoffice/images/plan/$value->img"; ?>'> 
                                        </div> 
                                        <div class="plan-name">
                                            <h1 class="display-4" style="font-size: 24px; font-weight: 900 !important; letter-spacing: normal !important; color: #585858;"><?php echo str_to_mayusculas($value->name); ?></h1>
                                        </div>
                                    </div>
                                    <div class="plan-body">
                                        <div class="plan-price-w">
                                            <div class="price-value" style="font-size: 30px;"> <span style="font-size: 10px;"></span> <?php echo format_number_dolar($value->price); ?> </div>
                                        </div>
                                        <div class="plan-btn-w"> 
                                            <button type="button" <?php echo $kit_id >= $value->kit_id ? "disabled" : ""; ?> class="buyButton btn btn-primary" data-price="<?php echo quitar_punto_number($value->price); ?>" data-price2="<?php echo $value->price; ?>" data-kit="<?php echo $value->kit_id; ?>">Selecionar Pack</button>
                                        </div>
                                    </div>
                                    <div class="plan-description">
                                        <?php echo $value->description; ?>
                                    </div>
                                </div>
                            <?php } ?>  
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Pago por transferencia bancaria</h6>
                        <div class="element-box">
                            <!-------------------- END - Controls Above Table -------------------->
                            <div class="table-responsive">
                                <!-------------------- START - Basic Table -------------------->
                                <div id="financial_history_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-padded dataTable display no-footer" id="financial_history" role="grid" style="width: 100%;" aria-describedby="financial_history_info" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr role="row">
                                                        <th></th>
                                                        <th>Número de Cuenta</th>
                                                        <th>Nombre del Banco</th>
                                                        <th>Títular</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><img src="<?php echo site_url() . "static/page_front/images/interbank_logo.png" ?>" width="80"/></td>
                                                        <td>4953001956935 </td>
                                                        <td>Banco Interbank</td>
                                                        <td>Coorporativo Fk</td>
                                                        <td>Pago vía transferencia bancaria </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="<?php echo site_url() . "static/page_front/images/yape.png" ?>" width="60"/></td>
                                                        <td>923 870  996</td>
                                                        <td>Yape</td>
                                                        <td>Merilu Rojas / Administradora</td>
                                                        <td>Pago vía Yape (celular) </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="<?php echo site_url() . "static/page_front/images/bcp_logo.png" ?>" width="80"/></td>
                                                        <td>19399069591091</td>
                                                        <td>Banco de Crédito</td>
                                                        <td>Merilu Rojas / Administradora</td>
                                                        <td>Pago vía transferencia bancaria </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div> 
                                        <div class="col-sm-12">
                                    <div class="alert alert-primary mb-0" role="alert">
                                        <p><a class="alert-link">Información</a><br/><br/>Luego de hacer el envió a nuestros números de cuenta, comunícate con nosotros a través de nuestro whatsapp +51 923870996, enviar el comprobante de pago, el usuario y el producto a comprar. En los próximos minutos estaremos procesando su pedido.</p>
                                    </div>
                                </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        <div class="form-group has-feedback" id="pay_success_2" style="display: none">
                            <center>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert" type="button">×</button>
                                    <p>Felicitaciones tu compra fue exitosa</p>
                                </div>                 
                            </center>
                        </div>
                        <div class="form-group has-feedback" id="pay_info"></div>
                    </div>
                </div>
            </div>
            <script src="<?php echo site_url() . 'static/backoffice/js/script/plan.js'; ?>"></script>
            <script>
                Culqi.publicKey = 'pk_test_igI3EctoA17FeNUD';
                var price = "";
                var price2 = "";
                var kit_id = "";


                $('.buyButton').on('click', function (e) {
                    price = $(this).attr('data-price');
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
                        var url = site + "backoffice/plan/create_invoice";
                        $.ajax({
                            url: url,
                            method: 'post',
                            data: {
                                price: price,
                                price2: price2,
                                kit_id: kit_id,
                                email: email,
                                token: token
                            },
                            dataType: 'JSON',
                            success: function (data) {
                                if (data.object == "charge") {
                                    document.getElementById("pay_success_2").style.display = "block";
                                    location.href = site + "backoffice/invoice";
                                } else {
                                    $("#pay_info").html();
                                    var texto = "";
                                    texto = texto + '<div class="alert alert-danger">';
                                    texto = texto + '<p style="text-align: center;">Hubo un error, verifique los datos de la tarjeta</p>';
                                    texto = texto + '</div>';
                                    $("#pay_info").html(texto);
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

