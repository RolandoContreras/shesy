<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Listado</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'course'; ?>"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Productos Todos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Ver Productos</h5>
                                    </div>
                                    <div class="card-block">

                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="btn-group mb-2 mr-2">
                                                    <button type="button" class="btn btn btn-outline-secondary">Ver Por:</button>
                                                    <button type="button" class="btn btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(92px, 43px, 0px);">
                                                        <a class="dropdown-item" href="<?php echo site_url() . $url . '?orderby=date'; ?>">Ordenar por Defecto</a>
                                                        <a class="dropdown-item" href="<?php echo site_url() . $url . '?orderby=date' ?>">Ordenar por Novedad</a>
                                                        <a class="dropdown-item" href="<?php echo site_url() . $url . '?orderby=price' ?>">Precio Menor a Mayor</a>
                                                        <a class="dropdown-item" href="<?php echo site_url() . $url . '?orderby=price-desc' ?>">Precio Mayor a Menor</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="get" action="<?php echo site_url()."mi_catalogo"?>">
                                            <div class="col-sm">
                                                <div class="input-group mb-3">
                                                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2" name="search">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-dark" type="submit">
                                                                <span class="pcoded-micon">
                                                                    <i data-feather="search"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                </div>
                                            </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo $category_name; ?></h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <?php
                                            if (!empty($obj_catalog)) {
                                                foreach ($obj_catalog as $value) {
                                                    ?>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card-block p-0">
                                                            <a href="<?php echo site_url() . "mi_catalogo/$value->category_slug/$value->catalog_id/$value->slug"; ?>">
                                                                <img class="img-fluid" style="width:100%;" src="<?php echo site_url() . "static/catalog/$value->img"; ?>" alt="dashboard-user">
                                                            </a>
                                                            <div class="ux-designer">
                                                                <button onclick="add_cart_granel_1('<?php echo $value->catalog_id; ?>', '<?php echo $value->price; ?>', '<?php echo $value->name; ?>');" class="btn btn-primary" style="background-color: white;">
                                                                    <i style="color:black;" data-feather="shopping-cart"></i>
                                                                </button>
                                                                <h5>
                                                                    <a href="<?php echo site_url() . "mi_catalogo/$value->category_slug/$value->catalog_id/$value->slug"; ?>">
                                                                        <?php echo $value->name; ?>
                                                                    </a>
                                                                </h5>
                                                                <div class="sale-tag medium--right">
                                                                    Precio: <span class="money conversion-bear-money">&dollar;<?php echo $value->price; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                Sin Registro
                                            <?php } ?>
                                        </div>
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5"></div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers">
                                                        <ul class="pagination">
                                                            <?php echo $obj_pagination; ?>
                                                        </ul>
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
<script src="<?php echo site_url(); ?>static/catalog/js/pay_order_new.js"></script>
