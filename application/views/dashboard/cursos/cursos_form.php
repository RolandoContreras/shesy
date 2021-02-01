<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Formulario de Cursos</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/panel'; ?>">
                                            <span class="pcoded-micon"><i data-feather="home"></i></span>
                                        </a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/mis-cursos'; ?>">Listado de Cursos</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Cursos</a></li>
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
                                        <form name="cursos_form" name="cursos_form" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate();">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <?php if (isset($obj_courses)) { ?>
                                                        <div class="form-group">
                                                            <label>ID</label>
                                                            <input class="form-control" type="text" value="<?php echo isset($obj_courses->course_id) ? $obj_courses->course_id : ""; ?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                            <input type="hidden" id="course_id" name="course_id" value="<?php echo isset($obj_courses->course_id) ? $obj_courses->course_id : ""; ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_courses->name) ? $obj_courses->name : ""; ?>" class="input-xlarge-fluid" placeholder="Titulo" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Precio Eliminado</label>
                                                        <input class="form-control" type="number" step="any" id="price_del" name="price_del" value="<?php echo isset($obj_courses->price_del) ? $obj_courses->price_del : ""; ?>" class="input-xlarge-fluid" placeholder="Precio Eliminado">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Precio</label>
                                                        <input class="form-control" type="number" step="any" id="price" name="price" value="<?php echo isset($obj_courses->price) ? $obj_courses->price : ""; ?>" class="input-xlarge-fluid" placeholder="Precio" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Descripción</label>
                                                        <textarea name="description" id="description" class="form-control"><?php echo isset($obj_courses->description) ? $obj_courses->description : ""; ?></textarea>
                                                        <script>
                                                            CKEDITOR.replace('description');
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php if (isset($obj_courses)) { ?>
                                                        <div class="form-group">
                                                            <label>Imagen 1</label><br/>
                                                            <img src='<?php echo site_url() . "static/cms/images/cursos/$obj_courses->img"; ?>' width="100" />
                                                            <input class="form-control" type="hidden" name="img_2" id="img_2" value="<?php echo isset($obj_courses) ? $obj_courses->img : ""; ?>">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label>Imagen 1 (Tamaño 600 x 600)</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image_file" id="image_file" class="custom-file-input" onchange="upload_img();" <?php echo isset($obj_courses) ? "" : "required"; ?> >
                                                            <label id="label_img" class="custom-file-label invalid">Elegir archivos...</label>
                                                            <div id="respose_img"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Duración Horas</label>
                                                        <input class="form-control" type="text" id="duration" name="duration" value="<?php echo isset($obj_courses->duration) ? $obj_courses->duration : ""; ?>" class="input-xlarge-fluid" placeholder="Duración Hrs">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Categoría</label>
                                                        <select name="category_id" id="category_id" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <?php foreach ($obj_category as $value): ?>
                                                                <option value="<?php echo $value->category_id; ?>"
                                                                <?php
                                                                if (isset($obj_courses)) {
                                                                    if ($obj_courses->category_id == $value->category_id) {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><?php echo $value->name; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Libre</label>
                                                        <select name="free" id="free" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <option value="1" <?php
                                                            if (isset($obj_courses)) {
                                                                if ($obj_courses->free == 1) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>Si</option>
                                                            <option value="0" <?php
                                                            if (isset($obj_courses)) {
                                                                if ($obj_courses->free == 0) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Estado</label>
                                                        <select name="active" id="active" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <option value="1" <?php
                                                            if (isset($obj_courses)) {
                                                                if ($obj_courses->active == 1) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>Activo</option>
                                                            <option value="0" <?php
                                                            if (isset($obj_courses)) {
                                                                if ($obj_courses->active == 0) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>Inactivo</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
                                            <button class="btn btn-danger" type="reset" onclick="cancel_curso();">Cancelar</button>                    
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
<script src="<?php echo site_url() . 'static/cms/js/cursos.js' ?>"></script>
<script type="text/javascript">
    $(window).on('load', function () {
        // classic editor
        ClassicEditor.create(document.querySelector('#sumilla'))
    });
</script>

