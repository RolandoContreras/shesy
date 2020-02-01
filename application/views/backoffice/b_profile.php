<div class="content-w">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"> <a href="<?php echo site_url().'backoffice';?>">Tablero</a> </li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <div class="container-fluid" style="margin-top: 30px;">
        <div class="row clearfix">
          <div class="col-xl-4 col-lg-4 col-md-5">
            <div class="user-profile compact">
                <div class="up-head-w" style="background-image:url('<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>');">
                <div class="up-main-info">
                  <h2 class="up-header"> <?php echo $obj_customer->first_name." ".$obj_customer->last_name;?></h2>
                  <h6 class="up-sub-header"> Email: <?php echo $obj_customer->email;?> <br> Usuario: <?php echo "@".$obj_customer->username;?> <br> Documento: <?php echo $obj_customer->dni;?></h6>
                </div> 
                </div>
              <div class="up-controls">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="value-pair">
                      <div class="label"> Estado: </div>
                      <?php 
                      if($obj_customer->active == "1"){ ?>
                            <div class="value badge badge-pill badge-success"> Activo </div>
                      <?php  }else{ ?>
                          <div class="value badge badge-pill badge-danger"> Inactivo </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="up-contents">
                <div class="m-b">
                  <div class="row m-b">
                    <div class="col-sm-6 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->kit;?> </div>
                        <div class="label"> Mi Plan </div>
                      </div>
                    </div>
                    <div class="col-sm-6 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->dni;?> </div>
                        <div class="label"> DNI / Cedula </div>
                      </div>
                    </div>
                    <div class="col-sm-12 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->address;?> </div>
                        <div class="label"> Dirección </div>
                      </div>
                    </div>
                    <div class="col-sm-4 b-r b-b">
                      <div class="el-tablo centered padded-v">
                          <div class="value" style="font-size: 18px;"> <?php echo formato_fecha_barras($obj_customer->created_at);?> </div>
                        <div class="label"> Fecha de Registro </div>
                      </div>
                    </div>
                    <div class="col-sm-4 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->date_start!=""?formato_fecha_barras($obj_customer->date_start):"-";?> </div>
                        <div class="label"> Fecha de Activación </div>
                      </div>
                    </div>
                    <div class="col-sm-4 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->date_month!=""?formato_fecha_barras($obj_customer->date_month):"-";?> </div>
                        <div class="label"> Fecha de Recompra</div>
                      </div>
                    </div>
                    <div class="col-sm-6 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->phone;?> </div>
                        <div class="label"> Teléfono </div>
                      </div>
                    </div>
                       <div class="col-sm-6 b-r b-b">
                      <div class="el-tablo centered padded-v">
                        <div class="value" style="font-size: 18px;"> <?php echo $obj_customer->nombre;?> </div>
                        <div class="label"> País </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-8 col-md-7">
            <div class="element-wrapper">
              <div class="element-box">
                <div class="element-info">
                  <div class="element-info-with-icon">
                    <div class="element-info-icon">
                      <div class="os-icon os-icon-edit-1"></div>
                    </div>
                    <div class="element-info-text">
                      <h5 class="element-inner-header"> Información Editable </h5>
                      <div class="element-inner-desc"> Seleccione la categoría abajo para editar </div>
                    </div>
                  </div>
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
                                <label class="control-label"> Nombre del Banco </label> 
                                <select class="form-control" name="bank_id" id="bank_id">
                                    <option value="">Seleccionar</option>
                                    <option value="1" <?php echo $obj_customer->bank_id == 1?"selected":"";?>>BCP (Banco de Crédito)</option>
                                    <option value="2" <?php echo $obj_customer->bank_id == 2?"selected":"";?>>Interbank</option>
                                </select>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label"> Titular de la cuenta </label> 
                                <input type="text" name="bank_account" value="<?php echo $obj_customer->bank_account;?>" id="bank_account" class="form-control">
                            </div>
                            <div class="form-group"> 
                                <label class="control-label"> N° de cuenta Bancaria </label> 
                                <input type="text" name="bank_number" value="<?php echo $obj_customer->bank_number;?>" id="bank_number" class="form-control">
                            </div>
                            <div class="form-group"> 
                                <label class="control-label"> N° de cuenta CCI (Interbancario)  </label> 
                                <input type="text" name="back_number_cci" value="<?php echo $obj_customer->bank_number_cci;?>" id="back_number_cci" class="form-control">
                            </div>
                            <div class="form-group has-feedback" style="display: none;" id="wallet_error">
                                <div class="alert alert-danger validation-errors">
                                    <p class="user_login_id" style="text-align: center;">Ingrese datos validos</p>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12" align="right"> 
                                  <button class="mr-2 mb-2 btn btn-success" type="submit" style="margin-top: 30px;">Guardar Datos Bancarios <i class="os-icon os-icon-grid-18"></i></button>        
                              </div>
                            </div>
                            <div class="form-group has-feedback" style="display: none;" id="wallet_success">
                                <div class="alert alert-success validation-errors">
                                    <p class="user_login_id" style="text-align: center;">Datos Bancarios Guardados.</p>
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
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12"> 
                                  <label class="control-label">Nueva Contraseña</label> 
                                  <input type="password" name="new_pass" id="new_pass" class="form-control"> 
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12"> 
                                  <label class="control-label">Confirme Nueva Contraseña</label> 
                                  <input type="password" name="new_pass_confirm" id="new_pass_confirm" class="form-control"> 
                              </div>
                            </div>
                            <div class="form-group has-feedback" style="display: none;" id="pass_error">
                                <div class="alert alert-danger validation-errors">
                                    <p class="user_login_id" style="text-align: center;">Ingrese una contraseña valida</p>
                                </div>
                            </div>  
                            <div class="form-group has-feedback" style="display: none;" id="error_no_equal">
                                <div class="alert alert-danger validation-errors">
                                    <p class="user_login_id" style="text-align: center;">Las contraseña no son iguales</p>
                                </div>
                            </div>  
                            <div class="form-group">
                              <div class="col-lg-12" align="right"> 
                                  <button class="mr-2 mb-2 btn btn-success" type="submit">Actualizar Contraseña</button> 
                              </div>
                            </div>
                            <div class="form-group has-feedback" style="display: none;" id="pas_success">
                                <div class="alert alert-success validation-errors">
                                    <p class="user_login_id" style="text-align: center;">Contraseña cambiada con éxito.</p>
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
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#show_wallet").click(function(){
    $("#show_pass").removeClass( "active show" );
    $("#show_wallet").addClass( "active show" );
    $("#show_pass_div").hide(1000);
    $("#show_wallet_div").show(1000);
  });
  
  $("#show_pass").click(function(){
    $("#show_wallet").removeClass( "active show" );
    $("#show_pass").addClass( "active show" );
    $("#show_wallet_div").hide(1000);
    $("#show_pass_div").show(1000);
  });
});
</script>
<script src='<?php echo site_url().'static/backoffice/js/script/profile.js';?>'></script>


