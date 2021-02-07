<script src="<?php echo site_url() . 'static/cms/js/core/bootbox.locales.min.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/cms/js/core/bootbox.min.js'; ?>"></script>
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
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/'; ?>">Panel</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/cursos'; ?>">Cursos</a></li>
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
                                        <button class="btn btn-secondary" type="button" onclick="new_video('<?php echo $course_id; ?>','<?php echo $module_id; ?>');"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo Vídeo</span></button>
                                        <button class="btn btn-primary" type="button" onclick="back_module('<?php echo $course_id; ?>');"><span><span class="pcoded-micon"><i data-feather="arrow-left"></i></span> Regresar al Modulo</span></button>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th rowspan="1" colspan="1" style="width: 150px;">ID</th>
                                                                    <th rowspan="1" colspan="1">Título</th>
                                                                    <th rowspan="1" colspan="1">Módulo</th>
                                                                    <th rowspan="1" colspan="1">Curso</th>
                                                                    <th rowspan="1" colspan="1">Tipo</th>
                                                                    <th rowspan="1" colspan="1">Fecha de Creación</th>
                                                                    <th rowspan="1" colspan="1">Estado</th>
                                                                    <th rowspan="1" colspan="1">Acciones</th>
                                                                </tr>

                                                            </thead>
                                                            <tbody>

                                                                <?php foreach ($obj_videos as $value): ?>
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1"><?php echo $value->video_id; ?></td>
                                                                        <td><span class="badge badge-pill badge-warning" style="font-size: 100%;"><?php echo $value->name; ?></span></td>
                                                                        <td><span class="badge badge-pill badge-secondary" style="font-size: 90%;"><?php echo $value->module_name; ?></span></td>
                                                                        <td><span class="badge badge-pill badge-info" style="font-size: 90%;"><?php echo $value->course_name; ?></span></td>
                                                                        <td class="label-info">
                                                                            <?php
                                                                            if ($value->type == 1) {
                                                                                $valor = "Resumen";
                                                                                $stilo = "label label-success";
                                                                            } else {
                                                                                $valor = "Normal";
                                                                                $stilo = "label label-info";
                                                                            }
                                                                            ?>
                                                                            <span><?php echo $valor; ?></span>
                                                                        </td>
                                                                        <td><?php echo formato_fecha($value->date); ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if ($value->active == 0) {
                                                                                $valor = "No Activo";
                                                                                $stilo = "badge-danger";
                                                                            } else {
                                                                                $valor = "Activo";
                                                                                $stilo = "badge-success";
                                                                            }
                                                                            ?>
                                                                            <span class="badge badge-pill <?php echo $stilo ?>" style="font-size: 100%;"><?php echo $valor; ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <div class="operation">
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-secondary" type="button" onclick="edit_video('<?php echo $course_id; ?>', '<?php echo $module_id;?>', '<?php echo $value->video_id;?>');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                                                                    <button class="btn btn-secondary" type="button" onclick="delete_video('<?php echo $value->video_id; ?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
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
                                                                    <th rowspan="1" colspan="1">Curso</th>
                                                                    <th rowspan="1" colspan="1">Módulo</th>
                                                                    <th rowspan="1" colspan="1">Tipo</th>
                                                                    <th rowspan="1" colspan="1">Fecha de Creación</th>
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
<script src="<?php echo site_url() . 'static/cms/js/videos.js'; ?>"></script>
