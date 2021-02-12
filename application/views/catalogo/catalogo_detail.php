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
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'catalogo'; ?>"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Catalogo Producto Seleccionado</a></li>
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
                                        <h5>Mi producto: <?php echo $obj_catalog->name; ?></h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-sm-5 col-xs-12">
                                                <a href='<?php echo site_url() . "static/catalog/$obj_catalog->img"; ?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name; ?>">
                                                    <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img"; ?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name; ?>">
                                                </a>
                                                <a href='<?php echo site_url() . "static/catalog/$obj_catalog->img2"; ?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name; ?>">
                                                    <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img2"; ?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name; ?>">
                                                </a>
                                                <a href='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name; ?>">
                                                    <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name; ?>">
                                                </a>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-sm-7 col-xs-12">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" style="color:#888 !important;">
                                                        <h2 class="mt-3"><?php echo $obj_catalog->name; ?></h2>
                                                        <h2>
                                                            &dollar; <?php echo $obj_catalog->price; ?>
                                                        </h2>
                                                        <p><span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money">16/Sep</span></span></p>
                                                        <br/>
                                                        <?php echo $obj_catalog->description; ?>
                                                        <h6 class="mt-3">Código de Producto</h6>
                                                        <p class="mb-1">
                                                            #<?php echo $obj_catalog->catalog_id; ?>
                                                        </p>
                                                        <h6 class="mt-3">Categoría</h6>
                                                        <p>
                                                            <a href="<?php echo site_url() . "mi_catalogo/$obj_catalog->category_slug"; ?>">
                                                                <span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money"><?php echo $obj_catalog->category_name; ?></span></span>
                                                            </a>
                                                        </p>
                                                        <hr>
                                                        <?php if ($obj_catalog->stock > 0) { ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                Guarde su producto en el carrito y siga comprando.
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            </div>
                                                            <?php if ($obj_catalog->granel == 0) { ?>
                                                                <div class="row form-group">
                                                                    <div class="col-sm-2">
                                                                        <input type="text" class="form-control autonumber" name="talla" id="talla" placeholder="Talla" style="text-transform: uppercase;">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control autonumber" name="color" id="color" placeholder="Color" style="text-transform: uppercase;">
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="row form-group">
                                                                <div class="col-sm-2">
                                                                    <label class="col-form-label" style="color:#888 !important;">Cantidad <?php echo $obj_catalog->granel == 1 ? "(Kg) / (Und)" : ""; ?></label>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control autonumber" data-v-max="9999" data-v-min="0" name="quantity" id="quantity" placeholder="Ingrese Cantidad">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <?php if ($obj_catalog->granel == 0) { ?>
                                                                        <button type="button" class="btn btn-glow-success btn-success" title="Agregar al Carrito" onclick="add_cart('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><i data-feather="shopping-cart"></i> Agregar</button>
                                                                    <?php } else { ?>
                                                                        <button type="button" class="btn btn-glow-success btn-success" title="Agregar al Carrito" onclick="add_cart_granel('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><i data-feather="shopping-cart"></i> Agregar</button>
                                                                    <?php } ?>
                                                                    <input type="text" id="copy" value="<?php echo site_url()."$obj_catalog->category_slug/$obj_catalog->slug?".encrypt($customer_id);?>"/>
                                                                    <button type="button" class="btn btn-info" title="Copiar Enlace"  onclick="copy();" onclick="add_cart('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><i data-feather="copy"></i> Copiar Enlace del Producto</button>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        
                                                                </div>
                                                            </div>

                                                        <?php } else { ?>
                                                            <div class="sale-tag medium--right">
                                                                <span class="money conversion-bear-money">Sin Stock</span>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="form-group has-feedback" style="display: none;" id="quantity_error">
                                                            <div class="alert alert-danger validation-errors">
                                                                <p class="user_login_id" style="text-align: center;">La cantidad es invalida.</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-feedback" style="display: none;" id="quantity_success">
                                                            <div class="alert alert-success validation-errors">
                                                                <p class="user_login_id" style="text-align: center;">Producto Agregado.</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="card-header">
                                                        <h5>Productos Relacionados</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row text-center">
                                                            <?php foreach ($obj_catalog_all as $value) { ?>
                                                                <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                                                                    <a href="<?php echo site_url() . "mi_catalogo/$value->category_slug/$value->catalog_id/$value->slug"; ?>">
                                                                        <img src="<?php echo site_url() . "static/catalog/$value->img"; ?>" class="img-fluid m-b-10" alt="<?php echo $value->name; ?>"></a>
                                                                </div>
                                                            <?php } ?>
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
                <style>
                    .white{
                        color:white !important;
                    }
                </style>
<script>
 function copy() {
        var copyText = document.getElementById("copy");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        /* Copy the text inside the text field */
        document.execCommand("copy");
        /* Alert the copied text */
        alert("Copiado");
        }
</script>
