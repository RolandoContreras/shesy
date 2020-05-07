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
                  <h5 class="m-b-10">Formulario de Recarga</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/recargas';?>">Listado de Recargas</a></li>
                  <li class="breadcrumb-item"><a>Nueva Recarga</a></li>
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
                      <form enctype="multipart/form-data" action="javascript:void(0);" onsubmit="recargar();">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label>Usuario</label>
                                <input class="form-control" onblur="validate_user(this.value);" type="text" id="username" name="username" class="input-xlarge-fluid" placeholder="Ingrese Usuario" required>
                                <input type="hidden" id="customer_id" name="customer_id">
                                <span class="alert-0"></span>
                              </div>
                              <div class="form-group">
                                  <label>Cliente</label>
                                  <input class="form-control" type="text" id="customer" name="customer" class="input-xlarge-fluid" placeholder="Cliente" disabled="" required>
                              </div>
                              <div class="form-group">
                                  <label>Documento</label>
                                    <input class="form-control" type="text" id="dni" name="dni" class="input-xlarge-fluid" placeholder="DNI" disabled="" required>
                              </div>
                              <div id="message"></div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="form-group">
                                <label for="inputState">Puntos</label>
                                <input class="form-control" type="text" id="points" name="points" class="input-xlarge-fluid" placeholder="Puntos" required="">
                              </div>
                        </div>
                        <button class="btn btn-primary">Guardar</button>
                        <button class="btn btn-danger" type="reset" onclick="cancel_recargas();">Cancelar</button>                    
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
<script src="<?php echo site_url().'static/cms/js/recargas.js'?>"></script>