<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Formulario de Sub Categorías</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/panel'; ?>">
                                            <span class="pcoded-micon"><i data-feather="home"></i></span>
                                        </a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . "dashboard/categorias/$category_id"; ?>">Listado de Sub Categorías</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Sub Categorías</a></li>
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
                                        <form enctype="multipart/form-data" method="post" action="<?php echo site_url() . "dashboard/categorias/validate_sub_category"; ?>">
                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <?php if (isset($sub_category)) { ?>
                                                        <div class="form-group">
                                                            <label>ID</label>
                                                            <input class="form-control" type="text" value="<?php echo isset($sub_category) ? $sub_category->sub_category_id : ""; ?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                            <input type="hidden" name="sub_category_id" id="sub_category_id" value="<?php echo isset($sub_category) ? $sub_category->sub_category_id : ""; ?>">
                                                        </div>
                                                    <?php } ?>
                                                    <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id; ?>">
                                                </div>
                                                <div class="form-group col-md-6">


                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($sub_category->name) ? $sub_category->name : ""; ?>" class="input-xlarge-fluid" placeholder="Nombre" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Categoría</label>
                                                        <select class="form-control" disabled="">
                                                            <option selected=""><?php echo $category_name; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputState">Estado</label>
                                                            <select name="active" id="active" class="form-control" required="">
                                                                <option value="">[ Seleccionar ]</option>
                                                                <option value="1" <?php
                                                                if (isset($sub_category)) {
                                                                    if ($sub_category->active == 1) {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>>Activo</option>
                                                                <option value="0" <?php
                                                                if (isset($sub_category)) {
                                                                    if ($sub_category->active == 0) {
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
                                            </div>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <button class="btn btn-danger" type="reset" onclick="cancel_sub_category('<?php echo $category_id; ?>');">Cancelar</button>                    
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
<script src="<?php echo site_url(); ?>static/cms/js/sub_category.js"></script>
