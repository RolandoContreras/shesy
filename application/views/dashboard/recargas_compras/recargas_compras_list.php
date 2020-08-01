<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mantenimientos de Recargas de Compras</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Recargas de Compras</a></li>
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
                    <h5>Listado de Recargas de Comisiones</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_recargas_compras();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nueva Recarga de Compras</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_desc" tabindex="0" rowspan="1" colspan="1">ID</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Fecha</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Usuario</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Asociado</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Concepto</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Importe</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Estado</th>
                                  <th class="sorting" tabindex="0" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($obj_comission as $value): ?>
                                <tr>
                                <th><?php echo $value->commissions_id;?></th>
                                <th><?php echo formato_fecha_barras($value->date);?></th>
                                <td><span class="badge badge-pill badge-secondary" style="font-size: 100%;"><?php echo "@".$value->username;?></span></td>
                                <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td><?php echo $value->bonus;?></td>
                                <td><span class="badge badge-pill badge-success" style="font-size: 100%;">s/.<?php echo $value->amount;?></span></td>
                                <td>
                                    <?php if (($value->active == 1) || ($value->active == 2)) {
                                        $valor = "Abonado";
                                        $stilo = "label label-success";
                                    }else{
                                        $valor = "No Abonado";
                                        $stilo = "label label-danger";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                               <button class="btn btn-secondary" type="button" onclick="edit_recargas_compras('<?php echo $value->commissions_id;?>');"><span><i data-feather="edit"></i> Editar</span></button>
                                               <button class="btn btn-secondary" type="button" onclick="delete_recargas_compras('<?php echo $value->commissions_id;?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Fecha</th>
                                  <th rowspan="1" colspan="1">Usuario</th>
                                  <th rowspan="1" colspan="1">Cliente</th>
                                  <th rowspan="1" colspan="1">Bono</th>
                                  <th rowspan="1" colspan="1">Importe</th>
                                  <th rowspan="1" colspan="1">Estado</th>
                                  <th rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </tfoot>
                            </table>
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
            </div>
          </div>
        </div>
</section>
<script src="<?php echo site_url();?>static/cms/js/recargas_compras.js"></script>