<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Rangos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/puntos';?>">Listado de Rangos</a></li>
                  <li class="breadcrumb-item"><a>Rangos</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/rangos/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                          <?php if(isset($obj_ranges)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_ranges->range_id)?$obj_ranges->range_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="range_id" name="range_id" value="<?php echo isset($obj_ranges->range_id)?$obj_ranges->range_id:"";?>">
                                  </div>
                        <?php } ?>
                            </div>
                            
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_ranges->name)?$obj_ranges->name:"";?>" class="input-xlarge-fluid">
                                </div>
                                <div class="form-group">
                                    <label>Puntos Personales</label>
                                    <input class="form-control" type="text" id="point_personal" name="point_personal" value="<?php echo isset($obj_ranges->point_personal)?$obj_ranges->point_personal:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
                                </div>
                                <div class="form-group">
                                      <label>Puntos Grupales</label>
                                      <input class="form-control" type="text" id="point_grupal" name="point_grupal" value="<?php echo isset($obj_ranges->point_grupal)?$obj_ranges->point_grupal:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
                                </div>
                            </div>
                          <div class="form-group col-md-6">
                            <?php 
                                  if(isset($obj_ranges->range_id)){ ?>
                                      <div class="form-group">
                                          <label>Imagen Actual</label><br/>
                                          <img src='<?php echo site_url()."static/backoffice/images/rangos/$obj_ranges->img";?>' width="100" />
                                          <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_ranges)?$obj_ranges->img:"";?>">
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
                                    <label for="inputState">Estado</label>
                                    <select class="form-control" name="active" id="active">
                                              <option value="1" <?php if($obj_ranges->active == 1){ echo "selected";}?>>Activo</option>
                                             <option value="0" <?php if($obj_ranges->active == 0){ echo "selected";}?>>Inactivo</option>
                                    </select>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_ranges();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/ranges.js'?>"></script>