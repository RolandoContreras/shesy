<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Categoría</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/panel';?>">
                          <span class="pcoded-micon"><i data-feather="home"></i></span>
                          </a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/categorias';?>">Listado de Categorías</a></li>
                  <li class="breadcrumb-item"><a href="#!">Categoría</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/categorias/validate";?>">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <?php 
                                if(isset($obj_category)){ ?>
                              <div class="form-group">
                                    <label>ID</label>
                                    <input class="form-control" type="text" value="<?php echo isset($obj_category)?$obj_category->category_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                    <input type="hidden" name="category_id" id="category_id" value="<?php echo isset($obj_category)?$obj_category->category_id:"";?>">
                              </div>
                              <?php } ?>
                              <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_category->name)?$obj_category->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                              </div>
                              <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tipo</label>
                                        <select name="type" id="type" class="form-control">
                                         <option value="">[ Seleccionar ]</option>
                                          <option value="1" <?php if(isset($obj_category)){
                                              if($obj_category->type == 1){ echo "selected";}
                                          }else{echo "";} ?>>Videos</option>
                                          <option value="2" <?php if(isset($obj_category)){
                                              if($obj_category->type == 2){ echo "selected";}
                                          }else{echo "";} ?>>Catalogo</option>
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputState">Estado</label>
                                        <select name="active" id="active" class="form-control">
                                         <option value="">[ Seleccionar ]</option>
                                          <option value="1" <?php if(isset($obj_category)){
                                              if($obj_category->active == 1){ echo "selected";}
                                          }else{echo "";} ?>>Activo</option>
                                          <option value="0" <?php if(isset($obj_category)){
                                              if($obj_category->active == 0){ echo "selected";}
                                          }else{echo "";} ?>>Inactivo</option>
                                    </select>

                                </div>
                            </div>
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_category();">Cancelar</button>                    
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
<script src="<?php echo site_url();?>static/cms/js/category.js"></script>
