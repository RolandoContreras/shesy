<script src="<?php echo site_url() . 'static/cms/js/core/bootbox.locales.min.js'; ?>"></script>
<script src="<?php echo site_url() . 'static/cms/js/core/bootbox.min.js'; ?>"></script>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Formulario de Activación de Cursos</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/cursos-activaciones'; ?>">Listado de Activación</a></li>
                                    <li class="breadcrumb-item"><a>Nueva Activación de Cursos</a></li>
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
                                        <form enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="active();">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <?php if (isset($obj_customer_courses)) { ?>
                                                        <div class="form-group">
                                                            <label>ID</label>
                                                            <input class="form-control" type="text" value="<?php echo isset($obj_customer_courses->customer_course_id) ? $obj_customer_courses->customer_course_id : ""; ?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                        </div>
                                                    <?php } ?>
                                                    <input type="hidden" id="customer_course_id" name="customer_course_id" value="<?php echo isset($obj_customer_courses->customer_course_id) ? $obj_customer_courses->customer_course_id : ""; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Ingrese Usuario</label>
                                                        <input class="form-control" onblur="validate_user(this.value);" type="text" id="username" name="username" class="input-xlarge-fluid" placeholder="Ingrese Usuario" value="<?php echo isset($obj_customer_courses) ? $obj_customer_courses->email : "" ?>" required>
                                                        <input type="hidden" id="customer_id" name="customer_id" value="<?php echo isset($obj_customer_courses) ? $obj_customer_courses->customer_id : ""; ?>">
                                                        <span class="alert-0"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ID Cliente</label>
                                                        <input class="form-control" type="text" id="id" name="id" class="input-xlarge-fluid" placeholder="ID" disabled="" value="<?php echo isset($obj_customer_courses) ? $obj_customer_courses->customer_id : "" ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cliente</label>
                                                        <input class="form-control" type="text" id="customer" name="customer" class="input-xlarge-fluid" placeholder="Cliente" disabled="" value="<?php echo isset($obj_customer_courses) ? $obj_customer_courses->first_name . ' ' . $obj_customer_courses->last_name : "" ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Teléfono</label>
                                                        <input class="form-control" type="text" id="dni" name="dni" class="input-xlarge-fluid" placeholder="DNI" disabled="" value="<?php echo isset($obj_customer_courses) ? $obj_customer_courses->phone : "" ?>">
                                                    </div>
                                                    <div id="message"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputState">Curso</label>
                                                        <select name="course_id" id="course_id" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <?php foreach ($obj_courses as $value): ?>
                                                                <option value="<?php echo $value->course_id; ?>" <?php echo isset($obj_customer_courses) && $value->course_id == $obj_customer_courses->course_id ? "selected" : "" ?>>
                                                                    <?php echo $value->name . " - $" . $value->price; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
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
<script src="<?php echo site_url() . 'static/cms/js/active_curso.js' ?>"></script>
<style>
    .datepicker>.datepicker-days { display: block;}
    ol.linenums {margin: 0 0 0 -8px;}
</style>