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
                  <h5 class="m-b-10">Activacion de Campaña | Empresa</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Campañas Empresas</a></li>
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
                    <h5>Listado de Campañas</h5>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-sort="ascending" >ID</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" >Fecha</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" >Embajador</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" >Empresa</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" >Categoría</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" >Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                              <?php foreach ($obj_publicity_catalog as $value): ?>
                            <tr>
                                <td><?php echo $value->id;?></td>
                                <td><?php echo formato_fecha_barras($value->date);?></td>
                                <td><h6><?php echo $value->first_name." ".$value->last_name;?></h6></td>
                                <td><h6><?php echo $value->catalog_name;?></h6></td>
                                <td><h6><?php echo $value->category_name;?></h6></td>
                                <td>
                                    <?php if ($value->status == 1) {
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    }elseif($value->status == 0){
                                        $valor = "Inactivo";
                                        $stilo = "label label-warning";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <div class="operation">
                                            <div class="btn-group">
                                                <?php 
                                                if($value->status == 0){ ?>
                                                    <button type="button" class="btn btn-success" onclick="active_catalog('<?php echo $value->id;?>');"><i class="fa fa-check"></i> Activar</button>
                                                <?php } ?>
                                                <button type="button" class="btn btn-info" onclick="edit_catalog('<?php echo $value->id;?>')"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger" onclick="delete_catalog('<?php echo $value->id;?>')"><i class="fa fa-trash"></i></button>
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
                                  <th rowspan="1" colspan="1">Embajador</th>
                                  <th rowspan="1" colspan="1">Empresa</th>
                                  <th rowspan="1" colspan="1">Categoría</th>
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
<script src="<?php echo site_url();?>static/cms/js/publicidad.js"></script>