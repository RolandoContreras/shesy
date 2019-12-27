<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Facturas</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/videos';?>">Listado de Facturas</a></li>
                  <li class="breadcrumb-item"><a>Facturas</a></li>
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
                    <h5>Datos</h5>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/facturas/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_invoices)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" id="invoice_id" name="invoice_id" value="<?php echo isset($obj_invoices->invoice_id)?$obj_invoices->invoice_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo isset($obj_invoices->invoice_id)?$obj_invoices->invoice_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_invoices->username)?$obj_invoices->username:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="">
                              </div>
                              <div class="form-group">
                                  <label>Cliente</label>
                                  <input class="form-control" type="text" id="customer" name="customer" value="<?php echo isset($obj_invoices->username)?$obj_invoices->first_name." ".$obj_invoices->last_name:"";?>" class="input-xlarge-fluid" placeholder="Cliente" disabled="">
                              </div>
                              <div class="form-group">
                                  <label>Fecha</label>
                                    <input class="form-control" type="text" id="date" name="date"  placeholder="YYYY/mm/dd" value="<?php echo isset($obj_invoices->date)?formato_fecha_db_time($obj_invoices->date):"";?>" class="input-xlarge-fluid" placeholder="Fecha">
                              </div>
                              <div class="form-group">
                                  <label>Importe</label>
                                    <input class="form-control" type="text" name="price" id="price" value="<?php echo isset($obj_invoices->price)?($obj_invoices->price):"";?>" class="input-xlarge-fluid" placeholder="Precio">
                              </div>
                              <div class="form-group">
                                  <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="">[ Seleccionar ]</option>
                                        <option value="0" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 0){ echo "selected";}
                                        }else{echo "";} ?>>Sin Acción</option>
                                        <option value="1" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 1){ echo "selected";}
                                        }else{echo "";} ?>>Esperando Activación</option>
                                        <option value="2" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 2){ echo "selected";}
                                        }else{echo "";} ?>>Procesado</option>
                                        <option value="3" <?php if(isset($obj_invoices)){
                                            if($obj_invoices->active == 3){ echo "selected";}
                                        }else{echo "";} ?>>Cancelado</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                             <?php 
                              if(isset($obj_invoices->invoice_id)){ ?>
                                    <div class="form-group">
                                          <label>Imagen Actual</label><br/>
                                          <img src='<?php echo site_url()."static/backoffice/invoice/$obj_invoices->img";?>' width="100" />
                                          <input class="form-control" type="hidden" name="img2" id="img2" value="<?php echo isset($obj_invoices)?$obj_invoices->img:"";?>">
                                      </div>
                              <?php } ?>
                              <div class="form-group">
                                    <label>Imagen</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                              </div>
                              <div class="form-group">
                              <label for="inputState">Kit</label>
                                <select name="kit" id="kit" class="form-control">
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_kit as $value ): ?>
                                <option value="<?php echo $value->kit_id;?>"
                                    <?php 
                                            if(isset($obj_invoices->kit_id)){
                                                    if($obj_invoices->kit_id==$value->kit_id){
                                                        echo "selected";
                                                    }
                                            }else{
                                                      echo "";
                                            }

                                    ?>><?php echo $value->name;?>
                                </option>
                                    <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                              <label for="inputState">Tipo</label>
                                    <select name="type" id="type" class="form-control">
                                    <option value="1" <?php if(isset($obj_invoices)){
                                          if($obj_invoices->type == 1){ echo "selected";}
                                      }else{echo "";} ?>>Pago de Kit</option>
                                    <option value="2" <?php if(isset($obj_invoices)){
                                          if($obj_invoices->type == 2){ echo "selected";}
                                      }else{echo "";} ?>>Pago Reconsumos</option>
                                    </select>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancelar_invoice();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/invoices.js'?>"></script>