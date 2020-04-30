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
                  <h5 class="m-b-10">Mantenimientos de Vídeos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Vídeos</a></li>
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
                    <h5>Listado de Videos</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_video();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo</span></button>
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
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 267px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">ID</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 392px;"
                                    aria-label="Position: activate to sort column ascending">Título</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Categoría</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 188px;"
                                    aria-label="Start date: activate to sort column ascending">Imagen</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 135px;"
                                    aria-label="Salary: activate to sort column ascending">Video</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 135px;"
                                    aria-label="Salary: activate to sort column ascending">Tipo</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 135px;"
                                    aria-label="Salary: activate to sort column ascending">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 135px;"
                                    aria-label="Salary: activate to sort column ascending">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                                  <?php foreach ($obj_videos as $value): ?>
                                <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo $value->video_id;?></th>
                            <td><?php echo str_to_first_capital($value->name);?></td>
                            <td><?php echo str_to_first_capital($value->categoria);?></td>
                            <td><img src='<?php echo site_url()."static/course/img/$value->img";?>' width="60"/></td>
                            <td><?php echo $value->video;?></td>
                            <td class="label-info">
                                <?php if ($value->type == 1) {
                                    $valor = "Libre";
                                    $stilo = "label label-success";
                                }else{
                                    $valor = "Pagado";
                                    $stilo = "label label-info";
                                } ?>
                                <span><?php echo $valor;?></span>
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
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary" type="button" onclick="edit_videos('<?php echo $value->video_id;?>');"><span> <span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                            <button class="btn btn-secondary" type="button" onclick="delete_video('<?php echo $value->video_id;?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
                                        </div>
                                </div>
                            </td>
                        </tr>
                            <?php endforeach; ?> 
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Título</th>
                                  <th rowspan="1" colspan="1">Categoría</th>
                                  <th rowspan="1" colspan="1">Modulo</th>
                                  <th rowspan="1" colspan="1">Imagen</th>
                                  <th rowspan="1" colspan="1">Video</th>
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
<script src="<?php echo site_url();?>static/cms/js/videos.js"></script>
