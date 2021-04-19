<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mantenimientos de Sub Industrias</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Sub Industrias</a></li>
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
                    <h5>Listado de Industrias</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_sub_industry();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nueva Sub Industria</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" role="grid"
                              aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" aria-sort="descending">ID</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Nombre</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Industria</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Tipo</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($obj_sub_industry as $value): ?>
                                <tr>
                                <th><?php echo $value->id;?></th>
                                <td><h6><?php echo strtoupper($value->name);?></h6></td>
                                <td>
                                    <?php echo $value->industry_name;?>
                                </td>
                                <td>
                                    <?php if ($value->type == 1) {
                                        $valor = "Catalogo";
                                        $stilo = "label label-info";
                                    }else{
                                        $valor = "Vídeos";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <?php if ($value->active == 0) {
                                        $valor = "No Activo";
                                        $stilo = "label label-danger";
                                    }else{
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-icon btn-info" onclick="edit('<?php echo $value->id;?>');"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="delete_sub_industry('<?php echo $value->id;?>')"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Nombre</th>
                                  <th rowspan="1" colspan="1">Industria</th>
                                  <th rowspan="1" colspan="1">Tipo</th>
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
<script src="<?php echo site_url();?>static/cms/js/sub_industry.js"></script>