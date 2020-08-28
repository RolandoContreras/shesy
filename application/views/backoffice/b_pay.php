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
                                    <h5 class="m-b-10">Mis Cobros</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Resumen</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Ganancia Total</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-green f-30 m-r-10"></i>
                                                    &dollar;<?php echo $total_comisiones != "" ? $total_comisiones : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Efectivo Disponible *</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-credit-card text-c-red f-30 m-r-10"></i>
                                                    &dollar;<?php echo $total_disponible != "" ? $total_disponible : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-block">
                                        <h6 class="mb-4">Puntos de Compra *</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0">
                                                    <i class="feather icon-shopping-cart text-c-red f-30 m-r-10"></i>
                                                    &dollar;<?php echo $total_compra != "" ? $total_compra : "0.00"; ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Solicitar un Cobro</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Reglas de Retiro </strong>
                                            <hr/>
                                            Las solicitudes de retiro se realizan solos los fines de mes.<br>
                                            El importe mínimo de retiro es de $3.
                                            Los pagos se procesan en las primeras 24 horas hábiles de realizar la solicitud<br>
                                            <strong>Debe estar activo en el mes para poder solicitar el cobro, de lo contrario no aparecerá importe disponible.</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="col-lg-12" style="margin-bottom: 30px;" align="center">
                                            <a id="btnCreate"> 
                                                <button id="show_pay" class="btn btn-success animated infinite pulse" style="font-size:11px; font-weight: 900; text-transform: uppercase;">Clic aquí para realizar su retiro!</button>          
                                            </a>
                                            <div id="show_pay_div" class="col-xl-6 col-lg-6 col-md-6" style="padding-top: 30px;border: 1px solid #ccc;border-radius: 15px; display: none; ">
                                                <div class="element-wrapper">
                                                    <div class="element-box">
                                                        <div class="element-info">
                                                            <div class="element-info-with-icon">
                                                                <div class="element-info-icon">
                                                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                                                </div>
                                                                <div class="element-info-text">
                                                                    <h5 class="element-inner-header"><i class="fa fa-credit-card"></i> Solicitar Retiro </h5>
                                                                </div>
                                                            </div>
                                                            <div class="body"  style="margin-top: 30px;">
                                                                <form class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0);" onsubmit="make_pay();" method="post"> 
                                                                    <div class="form-group has-feedback"  id="wallet_error">
                                                                        <div class="col-lg-12" align="left">
                                                                            <label class="control-label text-left"> Importe: </label> 
                                                                        </div> 
                                                                        <input type="text" name="amount" id="amount" onkeyup="this.value = Numtext(this.value)" class="form-control">
                                                                        <label class="error jquery-validation-error small form-text invalid-feedback">El importe es requerido.</label>
                                                                        <input type="hidden" name="total_disponible" id="total_disponible" value="<?php echo $total_disponible; ?>">
                                                                    </div>
                                                                    <?php
                                                                    if ($obj_customer->bank_number != null && $obj_customer->bank_account != null) {
                                                                        $disable = "";
                                                                        ?>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12" align="left"> 
                                                                                <label class="control-label"> Nombre del Banco:</label> 
                                                                            </div>
                                                                            <input type="text" value="<?php echo $obj_customer->bank_id == 1 ? "BCP (Crédito)" : "Interbank"; ?>" class="form-control" readonly="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12" align="left"> 
                                                                                <label class="control-label"> Titular de la cuenta:</label> 
                                                                            </div>
                                                                            <input type="text" value="<?php echo $obj_customer->bank_account; ?>" class="form-control" readonly="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-lg-12" align="left">
                                                                                <label class="control-label"> Número de Cuenta:</label> 
                                                                            </div> 
                                                                            <input type="text" id="bank_nuber" name="bank_nuber" value="<?php echo $obj_customer->bank_number; ?>"  class="form-control" readonly="">
                                                                        </div>
                                                                        <?php
                                                                    } else {
                                                                        $disable = "disabled";
                                                                        ?>
                                                                        <div class="element-box">
                                                                            <div class="alert alert-warning" role="alert"> <strong>Necesita agregar su cuenta bancaria </strong><br> 
                                                                                Para solicitar un retiro primero debe vincular su cuenta bancaria<br> dar clic en el siguiente enlace para poder hacerlo:
                                                                                <a href="<?php echo site_url() . 'backoffice/profile'; ?>">Clic Aquí</a>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="form-group">
                                                                        <div class="col-lg-12" align="right">
                                                                            <button id="pay" type="submit" class="btn btn-success" <?php echo $disable; ?>><i class="fa fa-dollar"></i> Solicitar Retiro</button>
                                                                            <button class="btn btn-success mb-2" type="button" style="display: none;" id="spinner_pay">
                                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                                Procesando ...
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group has-feedback" style="display: none;" id="pay_alert">
                                                                        <div class="alert alert-danger validation-errors">
                                                                            <p class="user_login_id" style="text-align: center;">El importe es invalido.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-feedback" style="display: none;" id="pay_success">
                                                                        <div class="alert alert-success validation-errors">
                                                                            <p class="user_login_id" style="text-align: center;">Solicitud de retiro con éxito.</p>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="card-header">
                                                <h5>Listado de Cobros</h5>
                                            </div>
                                            <div class="col-sm-12">
                                                <table id="table" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="text-center sorting_desc" tabindex="0" rowspan="1" colspan="1"> ID </th>
                                                            <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Fecha de Solicitud</th>
                                                            <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Banco</th>
                                                            <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Importe </th>
                                                            <th class="text-center sorting" rowspan="1" colspan="1"> Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($obj_pay as $value) { ?>
                                                            <tr role="row" class="odd">
                                                                <td align="center">
                                                                    <span class="lighter"><?php echo $value->pay_id; ?></span>
                                                                </td>
                                                                <td align="center">
                                                                    <span><?php echo formato_fecha_barras($value->date); ?></span><br> 
                                                                    <span class="smaller lighter "><i class="fa fa-clock-o"></i> <?php echo formato_fecha_minutos($value->date); ?></span>
                                                                </td>
                                                                <td align="center">
                                                                    <?php echo $value->bank_id == 1 ? "BCP (crédito)" : "Interbank"; ?>
                                                                </td>
                                                                <td align="center">
                                                                    <span class="badge badge-success-inverted">&dollar;<?php echo $value->amount; ?></span>
                                                                </td>
                                                                <td align="center">
                                                                    <?php if ($value->active == "1") { ?>
                                                                        <a class="badge badge-primary-inverted text_status">En espera de Proceso</a>
                                                                    <?php } elseif ($value->active == "2") { ?>
                                                                        <a class="badge badge-success-inverted text_status">Pagado</a>
                                                                    <?php } else { ?>
                                                                        <a class="badge badge-danger text_status">Cancelado</a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
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
<script src='<?php echo site_url() . 'static/backoffice/js/script/pay.js'; ?>'></script>
<script>
                                                                                $(document).ready(function () {
                                                                                    $("#show_pay").click(function () {
                                                                                        $("#show_pay_div").show(1000);
                                                                                    });
                                                                                });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>






<div class="content-w">
    <div class="content-i">
        <div class="content-box">



            <div class="col-lg-12" style="margin-bottom: 30px;" align="center">
                <?php
                $date = date("Y-m-d");
                if (date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday' || date('l', strtotime($date)) == 'Monday') {
                    ?>
                    <a id="btnCreate"> 
                        <button id="show_pay" class="btn btn-primary btn-round animated infinite pulse" style="font-size:11px; font-weight: 900; text-transform: uppercase;">Clic aquí para realizar su retiro!</button>          
                    </a>
                <?php } ?>
                <div id="show_pay_div" class="col-xl-6 col-lg-6 col-md-6" style="padding-top: 30px; display: none; ">
                    <div class="element-wrapper">
                        <div class="element-box">
                            <div class="element-info">
                                <div class="element-info-with-icon">
                                    <div class="element-info-icon">
                                        <div class="os-icon os-icon-wallet-loaded"></div>
                                    </div>
                                    <div class="element-info-text">
                                        <h5 class="element-inner-header"> Solicitar Retiro </h5>
                                    </div>
                                </div>
                                <div class="body"  style="margin-top: 30px;">
                                    <form class="form-horizontal" onsubmit="make_pay();" enctype="multipart/form-data" action="javascript:void(0);"> 
                                        <div class="form-group"> 
                                            <div class="col-lg-12" align="left"> 
                                                <label class="control-label"> <b>SALDO DISPONIBLE: </b>  </label> 
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback"  id="wallet_error">
                                            <div class="col-lg-12" align="left"> 
                                                <label class="control-label"> Importe: </label> 
                                            </div>
                                            <input type="text" name="amount" onkeyup="this.value = Numtext(this.value)" onblur="validate_amount(this.value);" id="amount" class="form-control">
                                            <input type="hidden" name="total_disponible" id="total_disponible" value="<?php echo $total_disponible; ?>">

                                        </div>
                                        <div class="form-group has-feedback"  id="wallet_error">
                                            <div class="col-lg-12" align="left"> 
                                                <label class="control-label"> Tax:   </label> 
                                            </div>
                                            <input type="text" name="tax" id="tax" result disabled="" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback"  id="wallet_error">
                                            <div class="col-lg-12" align="left"> 
                                                <label class="control-label"> Total a Recibir:   </label> 
                                            </div>
                                            <input type="text" name="result" id="result" disabled="" class="form-control">
                                        </div>
                                        <?php if ($bank != "") { ?>
                                            <div class="form-group has-feedback"  id="wallet_error">
                                                <div class="col-lg-12" align="left"> 
                                                    <label class="control-label"> Nombre del Banco:</label> 
                                                </div>
                                                <input type="text" name="wallet" disabled="" value="<?php echo $bank == 1 ? "BCP (Crédito)" : "Interbank"; ?>" id="wallet" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback"  id="wallet_error">
                                                <div class="col-lg-12" align="left"> 
                                                    <label class="control-label"> Número de Cuenta:</label> 
                                                </div>
                                                <input type="text" name="wallet" disabled="" value="<?php echo $obj_customer->bank_number; ?>" id="wallet" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback"  id="wallet_error">
                                                <div class="col-lg-12" align="left"> 
                                                    <label class="control-label"> Número de Cuenta Interbancario:</label> 
                                                </div>
                                                <input type="text" name="wallet" disabled="" value="<?php echo $obj_customer->bank_number_cci; ?>" id="wallet" class="form-control">
                                                <p>* Verificar los datos de recibimiento recuerde que es bajo su responzabilidad.</p>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if ($bank == null) {
                                            $disable = "disabled";
                                            ?>
                                            <div class="element-box">
                                                <div class="alert alert-warning" role="alert"> <strong>Necesita agregar su cuenta bancaria </strong><br> 
                                                    Para solicitar un retiro primero debe vincular su cuenta bancaria<br> dar clic en el siguiente enlace para poder hacerlo:
                                                    <a href="<?php echo site_url() . 'backoffice/profile'; ?>">Clic Aquí</a>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            $disable = "";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <div class="col-lg-12" align="right"> 


                                                <button class="mr-2 mb-2 btn btn-success" <?php echo $disable; ?> type="submit" style="margin-top: 30px;">Realizar Retiro <i class="os-icon os-icon-grid-18"></i></button>        



                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="element-wrapper">
                <h6 class="element-header">Listado de Retiros</h6>
                <div class="element-box">
                    <div class="clearfix"></div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>

