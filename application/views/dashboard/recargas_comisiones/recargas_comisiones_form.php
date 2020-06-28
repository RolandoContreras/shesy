<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Recarga</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/recargas';?>">Listado de Recargas</a></li>
                  <li class="breadcrumb-item"><a>Nueva Recarga</a></li>
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
                      <form enctype="multipart/form-data" action="javascript:void(0);" onsubmit="recargar_comisiones();">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Usuario</label>
                                <input class="form-control" onblur="validate_user(this.value);" type="text" id="username" name="username" class="input-xlarge-fluid" placeholder="Ingrese Usuario" value="<?php echo isset($obj_comission)?$obj_comission->username:null;?>" required>
                                <input type="hidden" id="customer_id" name="customer_id" value="<?php echo isset($obj_comission)?$obj_comission->customer_id:null;?>">
                                <input type="hidden" id="commissions_id" name="commissions_id" value="<?php echo isset($obj_comission)?$obj_comission->commissions_id:null;?>">
                                
                                <span class="alert-0"></span>
                              </div>
                              <div class="form-group">
                                  <label>Cliente</label>
                                  <input class="form-control" type="text" id="customer" name="customer" class="input-xlarge-fluid" placeholder="Cliente" disabled="" value="<?php echo isset($obj_comission)?$obj_comission->first_name." ".$obj_comission->last_name:null;?>" required>
                              </div>
                              <div class="form-group">
                                  <label>Documento</label>
                                    <input class="form-control" type="text" id="dni" name="dni" class="input-xlarge-fluid" placeholder="DNI" value="<?php echo isset($obj_comission)?$obj_comission->dni:null;?>" disabled="" required>
                              </div>
                              <div id="message"></div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label for="inputState">Importe</label>
                                <input class="form-control" type="text" id="amount" name="amount" class="input-xlarge-fluid" placeholder="Importe" value="<?php echo isset($obj_comission)?$obj_comission->amount:null;?>" required="">
                              </div>
                              <div class="form-group">
                                  <label for="inputState">Estado</label>
                                        <select name="active" id="active" class="form-control" required>
                                            <option value="" selected="">[ Seleccionar ]</option>
                                              <option value="2" <?php if(isset($obj_comission)){
                                                  if($obj_comission->active == 2){ echo "selected";}
                                              }else{echo "";} ?>>Abonado</option>
                                              <option value="0" <?php if(isset($obj_comission)){
                                                  if($obj_comission->active == 0){ echo "selected";}
                                              }else{echo "";} ?>>No Abonado</option>
                                        </select>
                              </div>
                        </div>
                        <button class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_recargas_comisiones();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/recargas_comisiones.js'?>"></script>