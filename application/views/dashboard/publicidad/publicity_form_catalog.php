<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Publicidad de Catalogo</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/publicidad_catalogo';?>">Listado de Campaña</a></li>
                  <li class="breadcrumb-item"><a>Campaña</a></li>
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
                    <form name="catalog-form" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate_catalog();">
                        <div class="form-row">
                            <input type="hidden" id="id" name="id" value="<?php echo isset($obj_publicity_catalog)?$obj_publicity_catalog->id:"";?>">
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>Nombre de Campaña</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_publicity_catalog)?$obj_publicity_catalog->name:"";?>" class="input-xlarge-fluid">
                                </div>
                            <div class="form-group">
                              <label>Tipo</label>
                              <select class="form-control" name="status" id="status" readonly>
                                  <option selected>Empresas</option>
                              </select>    
                            </div>
                            <div class="form-group">
                              <label>Empresas</label>
                              <select class="form-control" name="catalog_id" id="catalog_id" readonly>
                                  <?php 
                                  foreach($obj_catalog as $value){ ?>
                                        <option value="<?php echo $value->id;?>" <?php echo $value->id == $obj_publicity_catalog->catalog_id ? "selected":"";?>><?php echo $value->name;?></option>
                                  <?php } ?>
                              </select>    
                            </div>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>Embajador</label>
                                    <input class="form-control" type="text" id="point_personal" name="point_personal" value="<?php echo isset($obj_publicity_catalog)?$obj_publicity_catalog->first_name." ".$obj_publicity_catalog->last_name:"";?>" class="input-xlarge-fluid" placeholder="Embajador">
                              </div>
                              <div class="form-group">
                                    <label for="inputState">Estado</label>
                                    <select name="status" id="status" class="form-control" required="">
                                         <option value="">[ Seleccionar ]</option>
                                          <option value="1" <?php if(isset($obj_publicity_catalog)){
                                              if($obj_publicity_catalog->status == 1){ echo "selected";}
                                          }else{echo "";} ?>>Activo</option>
                                          <option value="0" <?php if(isset($obj_publicity_catalog)){
                                              if($obj_publicity_catalog->status == 0){ echo "selected";}
                                          }else{echo "";} ?>>Inactivo</option>
                                    </select>
                              </div>
                          </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_catalog();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/publicidad.js'?>"></script>