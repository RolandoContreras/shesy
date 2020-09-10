<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Formulario de Activación</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/activaciones';?>">Listado de Activación</a></li>
                  <li class="breadcrumb-item"><a>Nueva Activación</a></li>
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
                      <form enctype="multipart/form-data" action="javascript:void(0);">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Usuario</label>
                                <input class="form-control" onblur="validate_user(this.value);" type="text" id="username" name="username" class="input-xlarge-fluid" placeholder="Ingrese Usuario">
                                <input type="hidden" id="customer_id" name="customer_id">
                                <input type="hidden" id="type" name="types" value="1">
                                <span class="alert-0"></span>
                              </div>
                              <div class="form-group">
                                  <label>Cliente</label>
                                  <input class="form-control" type="text" id="customer" name="customer" class="input-xlarge-fluid" placeholder="Cliente" disabled="">
                              </div>
                              <div class="form-group">
                                  <label>Documento</label>
                                    <input class="form-control" type="text" id="dni" name="dni" class="input-xlarge-fluid" placeholder="DNI" disabled="">
                              </div>
                              <div id="message"></div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                              <label for="inputState">Kit</label>
                                <select name="kit_id" id="kit_id" class="form-control">
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_kit as $value ): ?>
                                <option value="<?php echo $value->kit_id;?>">
                                    <?php echo $value->name." - S/. ".$value->price;?>
                                </option>
                                    <?php endforeach; ?>
                                </select>
                              </div>
                        </div>
                        <button onclick="active();" class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_activate_kit();">Cancelar</button>                    
                        </div>
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
<script src="<?php echo site_url().'static/cms/js/active.js'?>"></script>