<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Catalogo</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/panel';?>">
                          <span class="pcoded-micon"><i data-feather="home"></i></span>
                          </a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/catalogo';?>">Listado de Vídeos</a></li>
                  <li class="breadcrumb-item"><a href="#!">Catalogo</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/catalogo/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_catalog)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_catalog->catalog_id)?$obj_catalog->catalog_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="catalog_id" name="catalog_id" value="<?php echo isset($obj_catalog->catalog_id)?$obj_catalog->catalog_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_catalog->name)?$obj_catalog->name:"";?>" class="input-xlarge-fluid" placeholder="Titulo">
                              </div>
                              <div class="form-group">
                                  <label>Precio</label>
                                  <input class="form-control" type="text" id="price" name="price" value="<?php echo isset($obj_catalog->price)?$obj_catalog->price:"";?>" class="input-xlarge-fluid" placeholder="Precio">
                              </div>
                              <div class="form-group">
                                  <label>Sumilla</label>
                                  <textarea class="form-control" name="summary" id="summary" placeholder="Sumilla"><?php echo isset($obj_catalog->summary)?$obj_catalog->summary:"";?></textarea>
                              </div>
                              <div class="form-group">
                                  <label>Descripción</label>
                                  <textarea class="form-control" name="description" id="description" placeholder="Descripción"><?php echo isset($obj_catalog->description)?$obj_catalog->description:"";?></textarea>
                              </div>
                              
                              
                              
                              
                          </div>
                          <div class="form-group col-md-6">
                              <?php 
                                  if(isset($obj_catalog)){ ?>
                                      <div class="form-group">
                                          <label>Imagen 1</label><br/>
                                          <img src='<?php echo site_url()."static/course/img/$obj_videos->img";?>' width="100" />
                                          <input class="form-control" type="hidden" name="img2" id="img2" value="<?php echo isset($obj_videos)?$obj_videos->img:"";?>">
                                      </div>
                            <?php } ?>
                              <div class="form-group">
                                    <label>Imagen 1</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                              </div>
                              
                              <?php 
                                  if(isset($obj_catalog->img2)){ ?>
                                      <div class="form-group">
                                          <label>Imagen 1</label><br/>
                                          <img src='<?php echo site_url()."static/course/img/$obj_videos->img2";?>' width="100" />
                                          <input class="form-control" type="hidden" name="img3" id="img3" value="<?php echo isset($obj_videos)?$obj_videos->img2:"";?>">
                                      </div>
                            <?php } ?>
                              <div class="form-group">
                                    <label>Imagen 2</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file2" id="image_file2">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                              </div>
                              <?php 
                                  if(isset($obj_catalog->img3)){ ?>
                                      <div class="form-group">
                                          <label>Imagen 1</label><br/>
                                          <img src='<?php echo site_url()."static/course/img/$obj_videos->img3";?>' width="100" />
                                          <input class="form-control" type="hidden" name="img4" id="img4" value="<?php echo isset($obj_videos)?$obj_videos->img2:"";?>">
                                      </div>
                            <?php } ?>
                              <div class="form-group">
                                    <label>Imagen 3</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" value="Upload Imagen de Envio" name="image_file3" id="image_file3">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputState">Estado</label>
                                    <select name="active" id="active" class="form-control">
                                     <option value="">[ Seleccionar ]</option>
                                      <option value="1" <?php if(isset($obj_videos)){
                                          if($obj_videos->active == 1){ echo "selected";}
                                      }else{echo "";} ?>>Activo</option>
                                      <option value="0" <?php if(isset($obj_kit)){
                                          if($obj_videos->active == 0){ echo "selected";}
                                      }else{echo "";} ?>>Inactivo</option>
                                </select>
                            </div>
                              
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
<script src="<?php echo site_url().'static/cms/js/catalog.js'?>"></script>
