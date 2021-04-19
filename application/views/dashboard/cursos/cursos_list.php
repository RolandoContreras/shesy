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
                  <h5 class="m-b-10">Mantenimientos de Cursos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Cursos</a></li>
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
                    <h5>Listado de Cursos</h5>
                    <button class="btn btn-secondary" type="button" onclick="new_curso();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo Curso</span></button>
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
                                  <th class="sorting_asc" tabindex="0" >ID</th>
                                  <th class="sorting">Nombre</th>
                                  <th class="sorting">Categoría</th>
                                  <th class="sorting">Precio</th>
                                  <th class="sorting">Tipo</th>
                                  <th class="sorting">Fecha</th>
                                  <th class="sorting">Estado</th>
                                  <th class="sorting">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                                   <?php foreach ($obj_courses as $value): ?>
                                <tr>
                                <th><?php echo $value->course_id;?></th>
                                <td><h6><?php echo strtoupper($value->name);?><h6></td>
                                <td><span class="badge badge-pill badge-info" style="font-size: 90%;"><?php echo $value->category;?></span></td>
                                <td><h6><?php echo strtoupper($value->price);?><h6></td>
                                <td>
                                    <?php 
                                        if($value->free == 0){
                                            $style = "badge-info";
                                            $valor = "No";
                                        }else{
                                            $style = "badge-warning";
                                            $valor = "Si";
                                        }
                                    ?>
                                    <span class="badge badge-pill <?php echo $style;?>" style="font-size: 100%;"><?php echo $valor;?></span>
                                </td>
                                <td><?php echo formato_fecha_barras($value->date);?></td>
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
                                               <button class="btn btn-secondary" type="button" onclick="edit_curso('<?php echo $value->course_id;?>');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                               <button class="btn btn-secondary" type="button" onclick="view_modulos('<?php echo $value->course_id; ?>');"><span><span class="pcoded-micon"><i data-feather="eye"></i></span> Módulos</span></button>
                                               <button class="btn btn-secondary" type="button" onclick="delete_curso('<?php echo $value->course_id;?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
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
<script src="<?php echo site_url();?>static/cms/js/cursos.js"></script>