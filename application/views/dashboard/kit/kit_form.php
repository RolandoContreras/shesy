<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Kit</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/membresias';?>">Listado de Kit</a></li>
                  <li class="breadcrumb-item"><a>Kit</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/membresias/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_videos)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_videos->video_id)?$obj_videos->video_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="video_id" name="video_id" value="<?php echo isset($obj_videos->video_id)?$obj_videos->video_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_kit->name)?$obj_kit->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                      <label>Precio</label>
                                      <input class="form-control" type="text" id="price" name="price" value="<?php echo isset($obj_kit->price)?$obj_kit->price:"";?>" class="input-xlarge-fluid" placeholder="Precio">
                                </div>
                                  <div class="form-group">
                                        <label>Puntos</label>
                                        <input class="form-control" type="text" id="point" name="point" value="<?php echo isset($obj_kit->point)?$obj_kit->point:"";?>" class="input-xlarge-fluid" placeholder="Puntos">
                                </div>
                                <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea class="form-control" name="description" id="" placeholder="Descripción" style="height: 200px;width: 100% !important" placeholder="Descripcion"><?php echo isset($obj_kit->description)?$obj_kit->description:"";?></textarea>
                                </div>
                            </div>
                          <div class="form-group col-md-6">
                              <?php 
                                  if(isset($obj_kit)){ ?>
                                      <div class="form-group">
                                          <label>Imagen Actual</label><br/>
                                          <img src='<?php echo site_url()."static/backoffice/images/plan/$obj_kit->img";?>' width="100" />
                                          <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_kit)?$obj_kit->img:"";?>">
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
                                              <option value="">[ Seleccionar ]</option>
                                              <option value="0" <?php if(isset($obj_kit)){
                                                  if($obj_kit->active == 0){ echo "selected";}
                                              }else{echo "";} ?>>Inactivo</option>
                                              <option value="1" <?php if(isset($obj_kit)){
                                                  if($obj_kit->active == 1){ echo "selected";}
                                              }else{echo "";} ?>>Activo</option>
                                    </select>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_kit();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/kit.js'?>"></script>