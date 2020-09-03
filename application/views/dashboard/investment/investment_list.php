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
                                    <h5 class="m-b-10">Inversiones</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/'; ?>">Panel</a></li>
                                    <li class="breadcrumb-item"><a>Imagenes</a></li>
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
                                        <h5>Listado de Inversiones</h5>
                                        <button class="btn btn-secondary" type="button" onclick="new_investment();"><span><span class="pcoded-micon"><i data-feather="plus"></i></span> Nuevo</span></button>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 267px;" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending">ID</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 392px;"
                                                                        aria-label="Position: activate to sort column ascending">Nombre</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                                                        aria-label="Age: activate to sort column ascending">Imagen</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                                                        aria-label="Age: activate to sort column ascending">Estado</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 188px;"
                                                                        aria-label="Start date: activate to sort column ascending">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <?php foreach ($obj_investment as $value): ?>
                                                                    <tr>
                                                                        <th><?php echo $value->investment_id; ?></th>
                                                                        <td><?php echo $value->name; ?></td>
                                                                        <td>
                                                                            <img width="100" src="<?php echo site_url() . "static/cms/images/investment/$value->img"; ?>" alt="<?php echo $value->name;?>"/>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            if ($value->active == 0) {
                                                                                $valor = "No Activo";
                                                                                $stilo = "label label-danger";
                                                                            } else {
                                                                                $valor = "Activo";
                                                                                $stilo = "label label-success";
                                                                            }
                                                                            ?>
                                                                            <span class="<?php echo $stilo; ?>"><?php echo $valor; ?></span>
                                                                        </td>

                                                                        <td align="center">
                                                                            <div class="operation">
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-secondary" type="button" onclick="edit_investment('<?php echo $value->investment_id; ?>');"><span><span class="pcoded-micon"><i data-feather="edit"></i></span> Editar</span></button>
                                                                                    <button class="btn btn-secondary" type="button" onclick="delete_investment('<?php echo $value->investment_id;?>');"><span><span class="pcoded-micon"><i data-feather="trash-2"></i></span> Eliminar</span></button>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th rowspan="1" colspan="1">ID</th>
                                                                    <th rowspan="1" colspan="1">Nombre</th>
                                                                    <th rowspan="1" colspan="1">Imagen</th>
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
<script src="<?php echo site_url(); ?>static/cms/js/investment.js"></script>