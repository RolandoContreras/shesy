<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Inversiones</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/inversiones';?>">Listado de Inversiones</a></li>
                  <li class="breadcrumb-item"><a>Imagenes</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/inversiones/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php 
                                if(isset($obj_investment)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_investment->investment_id)?$obj_investment->investment_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="investment_id" name="investment_id" value="<?php echo isset($obj_investment->investment_id)?$obj_investment->investment_id:"";?>">
                                  </div>
                            <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_investment->name)?$obj_investment->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" required="">
                                </div>
                              <div class="form-group">
                                    <label for="inputState">Estado</label>
                                    <select class="form-control" name="active" id="active" required="">
                                              <option value="">[ Seleccionar ]</option>
                                              <option value="0" <?php if(isset($obj_investment)){
                                                  if($obj_investment->active == 0){ echo "selected";}
                                              }else{echo "";} ?>>Inactivo</option>
                                              <option value="1" <?php if(isset($obj_investment)){
                                                  if($obj_investment->active == 1){ echo "selected";}
                                              }else{echo "";} ?>>Activo</option>
                                    </select>
                              </div>
                            </div>
                          <div class="form-group col-md-6">
                              <?php 
                                  if(isset($obj_investment)){ ?>
                                      <div class="form-group">
                                          <label>Imagen Actual</label><br/>
                                          <img src='<?php echo site_url()."static/cms/images/investment/$obj_investment->img";?>' width="100" />
                                          <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_investment)?$obj_investment->img:"";?>">
                                      </div>
                            <?php } ?>
                              <div class="form-group">
                                    <label>Imagen</label>
                                    <div class="custom-file">
                                        <input type="file" name="image_file" id="image_file" class="custom-file-input" onchange="upload_img();" <?php echo isset($obj_investment->img) ? "" : "required"; ?> >
                                        <label id="label_img" class="custom-file-label invalid">Elegir archivos...</label>
                                        <div id="respose_img"></div>
                                    </div>
                              </div>
                              
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_investment();">Cancelar</button>                    
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
<script src="<?php echo site_url(); ?>static/cms/js/investment.js"></script>