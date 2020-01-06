<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/jquery.modal.min.css';?>"/>




<div class="content-w">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url().'backoffice';?>">Tablero</a></li>
    <li class="breadcrumb-item"><span>Facturas</span></li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <div class="row">
        <div class="col-md-12">
          <div class="element-wrapper">
            <h6 class="element-header">Factura Activación del Plan</h6>
            <div class="element-box">
              <!-------------------- END - Controls Above Table -------------------->
              <div class="table-responsive">
                <!-------------------- START - Basic Table -------------------->
                <div id="financial_history_wrapper" class="dataTables_wrapper">
                    
                    
                    
                  <table class="table table-padded dataTable display" id="financial_history" cellspacing="0" width="100%" role="grid" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th class="text-center sorting_desc" tabindex="0" rowspan="1" colspan="1" style="width: 137.4px;"> ID </th>
                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 152.4px;"> Importe de <br>Factura </th>
                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 142.4px;"> Tipo de<br>Factura </th>
                        <th class="text-center sorting" rowspan="1" colspan="1" style="width: 141.4px;"> Dato de<br>Fecha </th>
                        <th class="text-center sorting" rowspan="1" colspan="1" style="width: 140.4px;"> Estado<br>Total </th>
                      </tr>
                    </thead>
                     <tbody>
                         <?php foreach ($obj_invoices as $value) { ?>
                                <tr role="row " class="odd ">
                                      <td align="center">
                                          <span class="lighter"><?php echo $value->invoice_id;?></span>
                                      </td>
                                      <td align="center"> 
                                          <span><?php echo format_number_dolar($value->price);?></span> <br> 
                                      </td>
                                      <td align="center">
                                          <span class="smaller lighter"><?php echo "Pago membresía - ".$value->name;?></span>
                                      </td>
                                      <td align="center"> 
                                          <span><?php echo formato_fecha_barras($value->date);?></span><br> 
                                          <span class="smaller lighter "> <?php echo formato_fecha_minutos($value->date);?><i class="far fa-clock "></i></span>
                                      </td>
                                      <td align="center">
                                          <?php 
                                          if($value->active == "1"){ ?>
                                                <a class="badge badge-primary-inverted text_status">Esperando Activación</a>
                                          <?php }elseif($value->active == "2"){ ?>
                                                <a class="badge badge-success-inverted text_status">Pagado</a>
                                          <?php }else{ ?>
                                                <a href="#modal_<?php echo $value->invoice_id;?>" rel="modal:open">
                                                      <button  class="mr-2 mb-2 btn btn-warning"> Subir Imagen</button>
                                                  </a>
                                          <?php } ?>
                                      </td>
                                </tr>
                         <?php } ?>
                        
                      </tbody>
                  </table>
                </div> 
                
            
            <?php foreach ($obj_invoices as $value) { ?>
                    <div class="modal text-center" id="modal_<?php echo $value->invoice_id;?>">
                          <div class="onboarding-content with-gradient">
                            <div class="onboarding-text" id="modalMsgBody">
                              <form id="upload_form">
                            <div class="onboarding-media" style="padding-top: 20px;">
                                 <h4 class="onboarding-title" id="modalMsgTitle">SUBIR IMAGEN</h4>
                            </div>
                                <div class="form-group"><br>
                                    <label>Seleccionar Imagen del envio</label>
                                    <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                    <input type="text" value="<?php echo $value->invoice_id;?>" name="invoice_id" id="invoice_id" style="display:none">
                                </div>
                                <hr>
                                <div class="form-group text-right">
                                    <button type="submit" name="upload" id="upload" class="btn btn-primary"><i class="fa fa-send"></i> Enviar</button>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-lg-12"> 
                                        <label class="control-label"><br>La cuenta se activar en las próximas horas. Gracias</label> 
                                    </div>
                                </div>
                                 <div id="uploaded_image"></div>
                        </form>
                            </div>
                          </div>
                        </div>
            <?php } ?>
            
            
                 
                
              </div> 
            </div> 
          </div> 
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
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js'; ?>"></script>
<script>
$(document).ready(function(){
    $("#upload_form").on('submit',function(e){
        e.preventDefault();
        if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Seleccionar Imagen</div>');
        }else{
            if($('#message').val() == ''){
                $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe llenar el campo</div>  ');
            }else{
                $.ajax({
                url : "<?php echo site_url().'backoffice/invoice/upload'?>",
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#uploaded_image").html(data);
                    location.reload();
                }
            });
            }
            
        }
    });
});
</script>
