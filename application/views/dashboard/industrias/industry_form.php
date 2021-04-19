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
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/industrias';?>">Listado de Industrias</a></li>
                  <li class="breadcrumb-item"><a href="#!">Industrias</a></li>
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
                    <form name="form" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate();">
                        <div class="form-row">
                        <?php 
                            if(isset($obj_industry)){ ?>
                            <div class="form-group col-md-12">
                              <div class="form-group">
                                    <label>ID</label>
                                    <input class="form-control" type="text" value="<?php echo isset($obj_industry)?$obj_industry->id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                              </div>
                            </div>   
                            <?php } ?>
                          <div class="form-group col-md-6">
                              <input type="hidden" name="id" id="id" value="<?php echo isset($obj_industry)?$obj_industry->id:"";?>">
                              <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_industry->name)?$obj_industry->name:"";?>" class="input-xlarge-fluid" placeholder="Ingrese Nombre" required="">
                              </div>
                                <div class="form-group">
                                    <label for="inputState">Tipo</label>
                                        <select name="type" id="type" class="form-control" required="">
                                         <option value="">[ Seleccionar Tipo]</option>
                                          <option value="1" <?php if(isset($obj_industry)){
                                              if($obj_industry->type == 1){ echo "selected";}
                                          }else{echo "";} ?>>Catalogo</option>
                                          <option value="2" <?php if(isset($obj_industry)){
                                              if($obj_industry->type == 2){ echo "selected";}
                                          }else{echo "";} ?>>Cursos</option>
                                    </select>
                                </div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputState">Estado</label>
                                        <select name="active" id="active" class="form-control" required="">
                                         <option value="">[ Seleccionar ]</option>
                                          <option value="1" <?php if(isset($obj_industry)){
                                              if($obj_industry->active == 1){ echo "selected";}
                                          }else{echo "";} ?>>Activo</option>
                                          <option value="0" <?php if(isset($obj_industry)){
                                              if($obj_industry->active == 0){ echo "selected";}
                                          }else{echo "";} ?>>Inactivo</option>
                                    </select>

                                </div>
                            </div>
                          </div>
                        </div>
                        
                        <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_industry();">Cancelar</button>                    
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
<script src="<?php echo site_url();?>static/cms/js/industry.js"></script>
