<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Pack</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Recompra</a></li>
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
                                        <h5>Pack Disponibles</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach ($obj_kit as $value) { ?>
                                                <div class="col-md-4">
                                                    <div class="card theme-bg2">
                                                        <div class="card-block">
                                                            <div class="row align-items-center justify-content-center">
                                                                <div class="col">
                                                                    <h2 class="text-white f-w-300">&dollar;<?php echo $value->price; ?><img src="<?php echo site_url() . "static/backoffice/images/plan/$value->img"; ?>" width="80" alt="Planes"></h2>
                                                                    <div class="row align-items-center justify-content-center">
                                                                        <div class="col-6">
                                                                            <h5 class="text-white"><?php echo $value->name; ?></h5>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <button type="button"  data-price="<?php echo quitar_punto_number($value->price); ?>" data-price2="<?php echo $value->price; ?>" data-kit="<?php echo $value->kit_id; ?>" class="buyButton btn theme-bg shadow-2 text-uppercase btn-block"   ><i class="fa fa-shopping-bag text-c-white fa-2x"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row card-active">
                                                                        <div class="col-md-12 col-12 text-gris">
                                                                            <h5 class="text-gris">Caracteristicas:</h5>
                                                                            <?php echo $value->description; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12 col-md-12">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Pago por transferencia bancaria</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i> Restaurar</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> Colapsar</span><span style="display:none"><i class="feather icon-plus"></i> Expandir</span></a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> eliminar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center sorting_desc" tabindex="0" rowspan="1" colspan="1">  </th>
                                                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Número de Cuenta </th>
                                                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Nombre del Banco </th>
                                                        <th class="text-center sorting" rowspan="1" colspan="1"> Títular </th>
                                                        <th class="text-center sorting" rowspan="1" colspan="1"> Descripción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row " class="odd ">
                                                        <td align="center">
                                                            <img src="<?php echo site_url() . "static/page_front/images/interbank_logo.png" ?>" width="80"/>
                                                        </td>
                                                        <td align="center"> 
                                                            4953001956935
                                                        </td>
                                                        <td align="center">Banco Interbank</td>
                                                        <td align="center"> 
                                                            Coorporativo Fk
                                                        </td>
                                                        <td align="center">
                                                            Pago vía transferencia bancaria
                                                        </td>
                                                    </tr>
                                                    <tr role="row " class="odd ">
                                                        <td align="center">
                                                            <img src="<?php echo site_url() . "static/page_front/images/yape.png" ?>" width="60"/>
                                                        </td>
                                                        <td align="center"> 
                                                            923 870  996
                                                        </td>
                                                        <td align="center">Yape</td>
                                                        <td align="center"> 
                                                            Merilu Rojas / Administradora
                                                        </td>
                                                        <td align="center">
                                                            Pago vía Yape (celular)
                                                        </td>
                                                    </tr>
                                                    <tr role="row " class="odd ">
                                                        <td align="center">
                                                            <img src="<?php echo site_url() . "static/page_front/images/bcp_logo.png" ?>" width="80"/>
                                                        </td>
                                                        <td align="center"> 
                                                            19399069591091
                                                        </td>
                                                        <td align="center">Banco de Crédito</td>
                                                        <td align="center"> 
                                                            Merilu Rojas / Administradora
                                                        </td>
                                                        <td align="center">
                                                            Pago vía transferencia bancaria
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-sm-12">
                                                <div class="alert alert-primary mb-0" role="alert">
                                                    <p><a class="alert-link">Información</a><br/><br/>Luego de hacer el envió a nuestros números de cuenta, comunícate con nosotros a través de nuestro whatsapp +51 923870996, enviar el comprobante de pago, el usuario y el producto a comprar. En los próximos minutos estaremos procesando su pedido.</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo site_url() . 'static/backoffice/js/script/plan.js'; ?>"></script>
<script>
    Culqi.publicKey = 'pk_live_d4ZedlvJFWdrXoiI';
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
            currency: 'USD',
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
<link rel="stylesheet" href="<?php echo site_url() . 'static/backoffice/css/jquery.modal.min.css'; ?>"/>