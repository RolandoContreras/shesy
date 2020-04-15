<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Usuarios</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/usuarios';?>">Listado de Usuarios</a></li>
                  <li class="breadcrumb-item"><a>Usuarios</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/usuarios/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php  if(isset($obj_users)){ ?>
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_users->user_id)?$obj_users->user_id:"";?>" placeholder="ID" disabled="">
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo isset($obj_users)?$obj_users->user_id:"";?>">
                                  </div>
                                <?php } ?>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="<?php echo isset($obj_users->email)?$obj_users->email:"";?>" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="form-control" type="password" id="password" name="password" value="<?php echo isset($obj_users->password)?$obj_users->password:"";?>" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Estado</label>
                                        <select name="active" id="active" class="form-control">
                                         <option value="">[ Seleccionar ]</option>
                                          <option value="1" <?php if(isset($obj_users)){
                                              if($obj_users->active == 1){ echo "selected";}
                                          }else{echo "";} ?>>Activo</option>
                                          <option value="0" <?php if(isset($obj_users)){
                                              if($obj_users->active == 0){ echo "selected";}
                                          }else{echo "";} ?>>Inactivo</option>
                                    </select>
                              </div>
                            </div>
                          <div class="form-group col-md-6">
                                <div class="form-group">
                                      <label>Nombres</label>
                                      <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo isset($obj_users->first_name)?$obj_users->first_name:"";?>" placeholder="Nombres">
                                </div>
                                <div class="form-group">
                                      <label>Apellidos</label>
                                      <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo isset($obj_users->last_name)?$obj_users->last_name:"";?>" placeholder="Apellidos">
                                </div>
                                <div class="form-group">
                                      <label>Priveligios</label>
                                       <select class="form-control" name="privilage" id="privilage">
                                            <option value="1" <?php if(isset($obj_users)){
                                              if($obj_users->privilage == 1){ echo "selected";}
                                              }else{echo "";} ?>>Control Simple</option>
                                              <option value="2" <?php if(isset($obj_users)){
                                                  if($obj_users->privilage == 2){ echo "selected";}
                                              }else{echo "";} ?>>Control Total</option>
                                        </select>
                                </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancelar_users();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/users.js'?>"></script>