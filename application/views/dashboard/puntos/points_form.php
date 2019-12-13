<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Puntos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/puntos';?>">Listado de Puntos</a></li>
                  <li class="breadcrumb-item"><a>Puntos</a></li>
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
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/puntos/validate";?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                  <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control" type="text" value="<?php echo isset($obj_points->point_id)?$obj_points->point_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                        <input type="hidden" id="point_id" name="point_id" value="<?php echo isset($obj_points->point_id)?$obj_points->point_id:"";?>">
                                  </div>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                    <label>ID Cliente</label>
                                    <input class="form-control" type="text" id="customer_id" name="customer_id" value="<?php echo isset($obj_points->customer_id)?$obj_points->customer_id:"";?>" class="input-xlarge-fluid" placeholder="Cliente">
                                </div>
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="form-control" type="text" id="username" name="username" value="<?php echo isset($obj_points->username)?$obj_points->username:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="">
                                </div>
                                <div class="form-group">
                                      <label>Nombre</label>
                                      <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_points->first_name)?$obj_points->first_name." ".$obj_points->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
                                </div>
                            </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                        <label>Puntos</label>
                                        <input class="form-control" type="text" id="point" name="point" value="<?php echo isset($obj_points->point)?$obj_points->point:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
                                </div>
                                <div class="form-group">
                                        <label>Fecha</label>
                                        <input class="form-control" type="text" id="date" name="date" value="<?php echo isset($obj_points->date)?formato_fecha_barras($obj_points->date):"";?>" class="input-xlarge-fluid" placeholder="Nombre">
                                </div>
                              <div class="form-group">
                                    <label for="inputState">Estado</label>
                                    <select class="form-control" name="active" id="active">
                                             <option value="1" <?php if($obj_points->active == 1){ echo "selected";}?>>Abonado</option>
                                             <option value="0" <?php if($obj_points->active == 0){ echo "selected";}?>>No Abonado</option>
                                    </select>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_points();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/point_list.js'?>"></script>