<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Comisiones</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/panel';?>">
                          <span class="pcoded-micon"><i data-feather="home"></i></span>
                          </a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/comisiones';?>">Listado de Comisiones</a></li>
                  <li class="breadcrumb-item"><a href="#!">Comisiones</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/comisiones/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control"  type="text" value="<?php echo isset($obj_comission->commissions_id)?$obj_comission->commissions_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="commissions_id" name="commissions_id" value="<?php echo isset($obj_comission->commissions_id)?$obj_comission->commissions_id:"";?>">
                                  </div>
                            </div>
                          <div class="form-group col-md-6">
                              
                              <div class="form-group">
                                <label>ID Cliente</label>
                                <input class="form-control" disabled="" type="text" id="customer_id" name="customer_id" value="<?php echo isset($obj_comission->customer_id)?$obj_comission->customer_id:"";?>" class="input-xlarge-fluid" placeholder="Cliente">
                              </div>
                              <div class="form-group">
                                  <label>Usuario</label>
                                  <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_comission->username)?$obj_comission->username:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="">
                              </div>
                              <div class="form-group">
                                  <label>Nombres</label>
                                  <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_comission->first_name)?$obj_comission->first_name." ".$obj_comission->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
                              </div>
                              <div class="form-group">
                                  <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control">
                                          <option value="1" <?php if($obj_comission->active == 1){ echo "selected";}?>>Abonado</option>
                                          <option value="2" <?php if($obj_comission->active == 2){ echo "selected";}?>>Abonado 2</option>
                                          <option value="0" <?php if($obj_comission->active == 3){ echo "selected";}?>>No Abonado</option>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>Fecha</label>
                                    <input class="form-control" type="text" id="date" name="date" value="<?php echo isset($obj_comission->date)?formato_fecha_barras($obj_comission->date):"";?>" class="input-xlarge-fluid">
                              </div>
                              <div class="form-group">
                                    <label>Importe</label>
                                    <input class="form-control" type="text" id="amount" name="amount" value="<?php echo isset($obj_comission->amount)?$obj_comission->amount:0;?>" class="input-xlarge-fluid">
                              </div>
              
                              <label for="inputState">Bono</label>
                                <select name="bonus_id" id="bonus_id" class="form-control">
                                    <option value="1" <?php if($obj_comission->bonus_id == 1){ echo "selected";}?>>Referido</option>
                                    <option value="2" <?php if($obj_comission->bonus_id == 2){ echo "selected";}?>>Unilevel</option>
                                    <option value="3" <?php if($obj_comission->bonus_id == 3){ echo "selected";}?>>Maching</option>
                                </select>
                          </div>
                        </div>
                        <div class="form-row">
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_comissions();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/comission.js'?>"></script>