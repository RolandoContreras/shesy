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
                  <h5 class="m-b-10">Mantenimientos de Sub Categorías</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Sub Categorías</a></li>
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
                    <h5>Listado de Sub Categorías</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_sub_category('<?php echo $category_id;?>');"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nueva Sub Categoría</span></button>
                    <button class="btn btn-secondary" type="button" onclick="bak_category('<?php echo $category_id;?>');"><span><span class="pcoded-micon"><i data-feather="arrow-left"></i></span> Regresar</span></button>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid"
                              aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0">ID</th>
                                  <th class="sorting" tabindex="0">Categoría</th>
                                  <th class="sorting" tabindex="0">Nombre</th>
                                  <th class="sorting" tabindex="0">Estado</th>
                                  <th class="sorting" tabindex="0">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                                   <?php foreach ($obj_sub_category as $value): ?>
                                <tr>
                                <th><?php echo $value->sub_category_id;?></th>
                                <td>
                                    <span class="badge badge-pill badge-secondary" style="font-size: 90%;"><?php echo $value->category_name;?></span></td>
                                <td>
                                    <span class="badge badge-pill badge-warning" style="font-size: 100%;"><?php echo $value->name;?></span></td>
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
                                    <div class="operation">
                                            <div class="btn-group">
                                               <button class="btn btn-secondary" type="button" onclick="edit_sub_category('<?php echo $category_id;?>','<?php echo $value->sub_category_id;?>');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                               <button class="btn btn-secondary" type="button" onclick="delete_sub_category('<?php echo $value->sub_category_id;?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Categoría</th>
                                  <th rowspan="1" colspan="1">Nombre</th>
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
<script src="<?php echo site_url();?>static/cms/js/sub_category.js"></script>