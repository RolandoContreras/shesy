<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js'; ?>"></script>
<div class="content-w">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url().'backoffice';?>">Tablero</a></li>
    <li class="breadcrumb-item"><span>Cobros</span></li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
        <h6 class="element-header">¿Dudas sobre el retiro? <small>Consulte las reglas de retiro.</small> </h6>
        <div class="element-box">
          <div class="alert alert-info" role="alert"> <strong>Reglas de Retiro </strong><br> 
                Las solicitudes de retiro se realizan los fines de mes.<br>
                El importe mínimo de retiro es de S/. 10.
                Los pagos se procesan en las primeras 24 horas hábiles de realizar la solicitud<br>
                <strong>Debe estar activo en el mes para poder solicitar el cobro, de lo contrario no aparecerá importe disponible.</strong>
            </div>
        </div>
      </div>
        
     <div class="row">
              <div class="col-sm-12 col-xxl-12">
                <div class="element-wrapper">
                  <h6 class="element-header"> Resumen </h6>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="element-box el-tablo">
                        <div class="label"> GANANCIA TOTAL </div>
                        <div class="value"> &dollar;<?php echo $total_comisiones!=""?$total_comisiones:"0.00";?> </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="element-box el-tablo">
                        <div class="label"> GANANCIA DISPONIBLE </div>
                        <div class="value"> &dollar;<?php echo $total_disponible!=""?$total_disponible:"0.00";?> </div>
                      </div>
                    </div>
                      <div class="col-md-4">
                      <div class="element-box el-tablo">
                        <div class="label"> GANANCIA DE COMPRA </div>
                        <div class="value"> &dollar;<?php echo "0.00";?> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   
        
      <div class="col-lg-12" style="margin-bottom: 30px;" align="center">
        <a id="btnCreate"> 
            <button id="show_pay" class="btn btn-primary btn-round animated infinite pulse" style="font-size:11px; font-weight: 900; text-transform: uppercase;">Clic aquí para realizar su retiro!</button>          
        </a>
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
                                <input type="text" name="amount" onkeyup="this.value=Numtext(this.value)" onblur="validate_amount(this.value);" id="amount" class="form-control">
                                <input type="hidden" name="total_disponible" id="total_disponible" value="<?php echo $total_disponible;?>">
                                
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
                            <?php 
                            if($bank != ""){ ?>
                                <div class="form-group has-feedback"  id="wallet_error">
                                <div class="col-lg-12" align="left"> 
                                    <label class="control-label"> Nombre del Banco:</label> 
                                </div>
                                <input type="text" name="wallet" disabled="" value="<?php echo $bank==1?"BCP (Crédito)":"Interbank";?>" id="wallet" class="form-control">
                            </div>
                            <div class="form-group has-feedback"  id="wallet_error">
                                <div class="col-lg-12" align="left"> 
                                    <label class="control-label"> Número de Cuenta:</label> 
                                </div>
                                <input type="text" name="wallet" disabled="" value="<?php echo $obj_customer->bank_number;?>" id="wallet" class="form-control">
                            </div>
                            <div class="form-group has-feedback"  id="wallet_error">
                                <div class="col-lg-12" align="left"> 
                                    <label class="control-label"> Número de Cuenta Interbancario:</label> 
                                </div>
                                <input type="text" name="wallet" disabled="" value="<?php echo $obj_customer->bank_number_cci;?>" id="wallet" class="form-control">
                                <p>* Verificar los datos de recibimiento recuerde que es bajo su responzabilidad.</p>
                            </div>
                            <?php } ?>
                            <?php
                            if($bank == null){
                                $disable = "disabled"; ?>
                            <div class="element-box">
                              <div class="alert alert-warning" role="alert"> <strong>Necesita agregar su cuenta bancaria </strong><br> 
                                    Para solicitar un retiro primero debe vincular su cuenta bancaria<br> dar clic en el siguiente enlace para poder hacerlo:
                                    <a href="<?php echo site_url().'backoffice/profile';?>">Clic Aquí</a>
                                </div>
                            </div>
                            <?php }else{
                                $disable = "";
                            }
                            ?>
                            <div class="form-group">
                              <div class="col-lg-12" align="right"> 
                                  <button class="mr-2 mb-2 btn btn-success" <?php echo $disable;?> type="submit" style="margin-top: 30px;">Realizar Retiro <i class="os-icon os-icon-grid-18"></i></button>        
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
        
      <div class="element-wrapper">
        <h6 class="element-header">Listado de Retiros</h6>
        <div class="element-box">
          <div class="clearfix"></div>
          <hr>
          <table class="table table-padded dataTable display" id="financial_history" cellspacing="0" width="100%" role="grid" style="width: 100%;">
            <thead>
              <tr role="row">
                <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> ID</th>
                <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Importe</th>
                <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Tax</th>
                <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Banco</th>
                <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Fecha de Solicitud</th>
                <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1"> Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($obj_pay as $value) { ?>
                        <tr role="row" class="odd">
                            <td align="center">
                                <span class="lighter"><?php echo $value->pay_id;?></span>
                            </td>
                            <td align="center"><b><?php echo format_number_dolar($value->amount);?></b></td>
                            <td align="center">
                                <span class="lighter">
                                    <?php echo format_number_dolar($value->descount);?>
                                </span>
                            </td>
                            <td align="center">
                                <span class="smaller lighter">
                                    <?php echo $value->bank_id==1?"BCP (crédito)":"Interbank";?>
                                </span>
                            </td>
                            <td align="center">
                                <span><?php echo formato_fecha_barras($value->date);?></span><br> 
                                <span class="smaller lighter "> <?php echo formato_fecha_minutos($value->date);?><i class="far fa-clock "></i></span>
                            </td>
                            <td align="center">
                                <?php 
                                  if($value->active == "1"){ ?>
                                        <a class="badge badge-primary-inverted text_status">En espera de Proceso</a>
                                  <?php } elseif($value->active == "2"){ ?>
                                        <a class="badge badge-success-inverted text_status">Pagado</a>
                                 <?php }else{ ?>
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
<script type="text/javascript">
   $(document).ready(function() {
    $('#financial_history').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#show_pay").click(function(){
    $("#show_pay_div").show(1000);
  });
});
</script>
<script src='<?php echo site_url().'static/backoffice/js/script/pay.js';?>'></script>