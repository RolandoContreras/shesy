<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Mi Perfil</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'backoffice'; ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Mis Datos</a></li>
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
                                        <h5>Datos Personales</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form  id="validation-form123" method="post" action="javascript:void(0);">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" value="<?php echo $obj_customer->first_name . " " . $obj_customer->last_name; ?>" placeholder="Nombre" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Usuario</label>
                                                        <input type="text" class="form-control" value="<?php echo $obj_customer->username; ?>" placeholder="Usuario" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" placeholder="Email" value="<?php echo $obj_customer->email; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Dirección</label>
                                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $obj_customer->address; ?>" placeholder="Dirección" required="">
                                                        <label class="error jquery-validation-error small form-text invalid-feedback">La dirección es requerida.</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Teléfono</label>
                                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $obj_customer->phone; ?>" placeholder="Teléfono" required="">
                                                        <label class="error jquery-validation-error small form-text invalid-feedback">El teléfono es requerido.</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Páís</label>
                                                        <input type="text" class="form-control" value="<?php echo $obj_customer->nombre; ?>" placeholder="País" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <button id="save_profile" type="button" onclick="change_profile();" class="btn btn-success mb-2"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Datos Personales</button>
                                                        <button class="btn btn-success mb-2" type="button" style="display: none;" id="spinner_profile">
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            Guardando ...
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Mi Plan </label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter email" value="<?php echo $obj_customer->kit; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">DNI / Cedula</label>
                                                        <input type="text" class="form-control"  placeholder="DNI / Cedula" value="<?php echo $obj_customer->dni; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Fecha de Activación</label>
                                                        <input type="text" class="form-control" placeholder="Fecha de Activación" value="<?php echo $obj_customer->date_start != null ? formato_fecha($obj_customer->date_start) : "---"; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Fecha de Recompra</label>
                                                        <input type="text" class="form-control" placeholder="Fecha de Recompra" value="<?php echo $obj_customer->date_month != null ? formato_fecha($obj_customer->date_month) : "---"; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Fecha de Registro</label>
                                                        <input type="text" class="form-control" placeholder="Fecha de Recompra" value="<?php echo $obj_customer->created_at != null ? formato_fecha($obj_customer->created_at) : "---"; ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Estado</label>
                                                        <?php if ($obj_customer->active == "1") { ?>
                                                            <input type="text" class="form-control" placeholder="Estado" value="Activo" readonly="">
                                                        <?php } else { ?>
                                                            <input type="text" class="form-control" placeholder="Estado" value="Inactivo" readonly="">
                                                        <?php } ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <h5 class="mt-5">Datos Bancarios & Contraseña</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="element-info">
                                                    <ul class="nav nav-tabs" style="padding: 20px;">
                                                        <li class="nav-item" style="cursor: pointer;"> 
                                                            <a id="show_wallet" class="nav-link active show" align="center">Datos Bancarios</a> 
                                                        </li>
                                                        <li class="nav-item" style="cursor: pointer;"> 
                                                            <a id="show_pass" class="nav-link" align="center">Contraseña</a>                      
                                                        </li>
                                                    </ul>
                                                    <div class="body" style="margin-top: 30px;">
                                                        <div id="show_wallet_div">
                                                            <form class="form-horizontal" onsubmit="change_bank();" enctype="multipart/form-data" action="javascript:void(0);"> 
                                                                <div class="form-group"> 
                                                                    <label class="control-label"> Nombre del Banco *</label> 
                                                                    <select class="form-control" name="bank_id" id="bank_id" required="">
                                                                        <option value="">Seleccionar</option>
                                                                        <option value="1" <?php echo $obj_customer->bank_id == 1 ? "selected" : ""; ?>>BCP (Banco de Crédito)</option>
                                                                        <option value="2" <?php echo $obj_customer->bank_id == 2 ? "selected" : ""; ?>>Interbank</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group"> 
                                                                    <label class="control-label"> Titular de la cuenta * </label> 
                                                                    <input type="text" name="bank_account" value="<?php echo $obj_customer->bank_account; ?>" id="bank_account" class="form-control" required="">
                                                                    <label class="error jquery-validation-error small form-text invalid-feedback">Titular es requerido.</label>
                                                                </div>
                                                                <div class="form-group"> 
                                                                    <label class="control-label"> N° de cuenta Bancaria *</label> 
                                                                    <input type="text" name="bank_number" value="<?php echo $obj_customer->bank_number; ?>" id="bank_number" class="form-control" required="">
                                                                    <label class="error jquery-validation-error small form-text invalid-feedback">N° de cuenta es requerido.</label>
                                                                </div>
                                                                <div class="form-group"> 
                                                                    <label class="control-label"> N° de cuenta CCI (Interbancario)  </label> 
                                                                    <input type="text" name="back_number_cci" value="<?php echo $obj_customer->bank_number_cci; ?>" id="back_number_cci" class="form-control">
                                                                </div>
                                                                <div class="form-group has-feedback" style="display: none;" id="wallet_error">
                                                                    <div class="alert alert-danger validation-errors">
                                                                        <p class="user_login_id" style="text-align: center;">Ingrese datos validos</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-12" align="right"> 
                                                                        <button id="save_bank" type="submit" class="btn btn-success mb-2"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Datos Bancarios</button>
                                                                        <button class="btn btn-success mb-2" type="button" style="display: none;" id="spinner_bank">
                                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                            Guardando ...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div> 
                                                        <div id="show_pass_div" style="display:none;">
                                                            <form class="form-horizontal" onsubmit="change_pass();" enctype="multipart/form-data" action="javascript:void(0);">
                                                                <div class="form-group">
                                                                    <div class="col-lg-12"> 
                                                                        <label class="control-label">Contraseña Actual</label> 
                                                                        <input type="password" name="pass" id="pass" class="form-control">    
                                                                        <label class="error jquery-validation-error small form-text invalid-feedback">La contraseña es requerida.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-12"> 
                                                                        <label class="control-label">Nueva Contraseña</label> 
                                                                        <input type="password" name="new_pass" id="new_pass" class="form-control"> 
                                                                        <label class="error jquery-validation-error small form-text invalid-feedback">La nueva ontraseña es requerida.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-12"> 
                                                                        <label class="control-label">Confirme Nueva Contraseña</label> 
                                                                        <input type="password" name="new_pass_confirm" id="new_pass_confirm" class="form-control"> 
                                                                        <label class="error jquery-validation-error small form-text invalid-feedback">La confirmación de la nueva ontraseña es requerida.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-12" align="right"> 
                                                                        <button id="save_pass" type="button" onclick="change_pass();" class="btn btn-success mb-2"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cambiar Contraseña</button>
                                                                        <button class="btn btn-success mb-2" type="button" style="display: none;" id="spinner_pass">
                                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                            Guardando ...
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>Cambiar Imagen de Perfil</h5>
                                                        <p>Tamaño de la imagen recomendada (215 x 215)</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> 
                                                            <form id="dropzone" action="<?php echo site_url() . 'backoffice/profile/upload_img'; ?>" class="dropzone">
                                                                <div class="fallback">
                                                                    <input name="file" type="file" id="archivos"/>
                                                                </div>
                                                            </form>
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
    </div>
</div>
<script src='<?php echo site_url() . 'static/backoffice/js/script/profile.js'; ?>'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src='<?php echo site_url() . 'static/backoffice/js/dropzone.js';?>'></script>
<script>
    $(document).ready(function () {
        $("#show_wallet").click(function () {
            $("#show_pass").removeClass("active show");
            $("#show_wallet").addClass("active show");
            $("#show_pass_div").hide(1000);
            $("#show_wallet_div").show(1000);
        });

        $("#show_pass").click(function () {
            $("#show_wallet").removeClass("active show");
            $("#show_pass").addClass("active show");
            $("#show_wallet_div").hide(1000);
            $("#show_pass_div").show(1000);
        });
    });
</script>
