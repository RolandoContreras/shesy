<!doctype html>
<html lang="es-PE">
    <?php $this->load->view("head"); ?>
    <body>
        <div id="section-header">
            <?php $this->load->view("header"); ?>
        </div>
        <main class="wrapper main-content" role="main">
            <div id="shopify-section-product-template" class="shopify-section product-template-section">
                <div id="ProductSection">
                    <nav class="breadcrumb" role="navigation">
                        <a href="<?php echo site_url(); ?>" title="Volver al Inicio">Inicio</a>
                        <span class="divider">›</span>
                        <a href="<?php echo site_url() . "catalogo"; ?>" title="Ir al Catalogo">Catalogo</a>
                        <span class="divider">›</span>
                        <span class="breadcrumb--truncate"><?php echo $obj_catalog->name; ?></span>
                    </nav>
                    <div class="container">
                        <div class="grid">
                            <div class="grid-item large--two-fifths center">
                                <div class="container p-5">
                                    <div class="grid" stye="padding: 100px;">
                                        <div class="product__image-wrapper">
                                            <img width="600" height="600" alt="<?php echo $obj_catalog->name; ?>" title="<?php echo $obj_catalog->name; ?>" src='<?php echo site_url() . "static/catalog/$obj_catalog->img"; ?>' srcset='<?php echo site_url() . "static/catalog/$obj_catalog->img"; ?> 600w, <?php echo site_url() . "static/catalog/$obj_catalog->img"; ?> 150w, <?php echo site_url() . "static/catalog/$obj_catalog->img"; ?> 300w, <?php echo site_url() . "static/catalog/$obj_catalog->img"; ?> 355w, <?php echo site_url() . "static/catalog/$obj_catalog->img"; ?> 100w, <?php echo site_url() . "static/catalog/$obj_catalog->img"; ?> 400w' sizes="(max-width: 600px) 100vw, 600px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item large--three-fifths p-5">
                                <h1 class="h2"><?php echo $obj_catalog->name; ?></h1>
                                <div>
                                    <ul class="inline-list product-meta">
                                        <li>
                                            <span id="productPrice-product-template" class="h1">
                                                <span aria-hidden="true">
                                                    <span class="money conversion-bear-money">&dollar;<?php echo $obj_catalog->price; ?></span>
                                                </span>
                                            </span>
                                        </li>
                                    </ul>
                                    <hr class="hr--clear hr--small">
                                    <div class="payment-buttons payment-buttons--small">
                                        <?php if ($obj_catalog->granel == 0) { ?>
                                            <input type="text" class="form-control autonumber" name="talla" id="talla" placeholder="Talla" style="text-transform: uppercase;">
                                            <input type="text" class="form-control autonumber" name="color" id="color" placeholder="Color" style="text-transform: uppercase;">
                                        <?php } ?>
                                            <input type="text" class="form-control autonumber" data-v-max="9999" data-v-min="0" name="quantity" id="quantity" placeholder="Ingrese Cantidad *">
                                        <?php
                                        if ($obj_catalog->stock != 0) {
                                            if (isset($_SESSION['compras_customer'])) {
                                                ?>
                                                <?php if ($obj_catalog->granel == 0) { ?>
                                                    <button id="buy" onclick="add_cart_refencia_granel('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>', '<?php echo $obj_catalog->img; ?>');"class="btn btn--add-to-cart btn--secondary-accent"><span class="icon icon-cart"></span><span>Pagar</span></button>
                                                <?php } else { ?>
                                                    <button id="buy" onclick="add_cart_refencia('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>', '<?php echo $obj_catalog->img; ?>');"class="btn btn--add-to-cart btn--secondary-accent"><span class="icon icon-cart"></span><span>Pagar</span></button>
                                                <?php } ?>
                                                
                                            <?php } else { ?>
                                                <?php if ($obj_catalog->granel == 0) { ?>
                                                    <button id="buy" type="button" class="btn btn--add-to-cart btn--secondary-accent" title="Agregar al Carrito" onclick="add_cart('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><span class="icon icon-cart"></span> Agregar al carrito</button>
                                                <?php } else { ?>
                                                    <button  id="buy" type="button" class="btn btn--add-to-cart btn--secondary-accent" title="Agregar al Carrito" onclick="add_cart_granel('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><span class="icon icon-cart"></span> Agregar al carrito</button>
                                                <?php } ?>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <button id="buy" class="btn btn--add-to-cart btn--secondary-danger">
                                                <span class="icon icon-cart"></span>
                                                <span>No stock</span>
                                            </button>
                                        <?php } ?>
                                    </div>
                                    <hr class="product-template-hr">
                                    <div class="product-description rte">
                                        <h4 id="title-description" style="text-align: center;">Descripción</h4>
                                        <p><span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money"><?php echo formato_fecha_dia_mes($obj_catalog->date); ?></span></span></p>
                                        <p><?php echo $obj_catalog->description; ?></p>
                                        <h5 class="card--price">
                                            <span id="comparePrice-product-template" class="sale-tag large title-price">Categoría: <span class="money conversion-bear-money"><?php echo $obj_catalog->name; ?></span></span>
                                        </h5>
                                    </div>
                                    <hr class="product-template-hr">
                                    <div class="product-description rte">
                                        <h4 id="title-description" style="text-align: center;">Productos Relacionados</h4>
                                        <div class="row">
                                            <?php foreach ($obj_catalog_rand as $value) { ?>
                                                <div class="col-md-6">
                                                    <a href="<?php echo site_url() . "catalogo/$value->category_slug/$value->catalog_id/$value->slug"; ?>" class="card section--dark" style="text-align: left;background: #16a085;">
                                                        <img class="card--img" src="<?php echo site_url() . "static/catalog/$value->img"; ?>" alt="<?php echo $value->name; ?>"/>
                                                        <div class="card--body">
                                                            <h5 class="card--title">
                                                                <?php echo $value->name; ?>
                                                            </h5>
                                                            <h5 class="card--price" kjb-settings-id="sections_store_builder_blocks_1597634982931_settings_price">
                                                                <span id="comparePrice-product-template" class="sale-tag large title-price">Precio <span class="money conversion-bear-money">&dollar;<?php echo $value->price; ?></span></span>
                                                            </h5>
                                                        </div>
                                                    </a>
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
        </main>
        <div id="section-footer">
            <?php $this->load->view("footer"); ?>
        </div>
        <script src="<?php echo site_url() . "static/page_front/js/encore_core-391b174ddfaf72e8ec9615d1579235b5c2c755e7cd65e22cf10938c815f7f394.js"; ?>"></script>
        <script src="<?php echo site_url() . "static/page_front/js/scripts.js?15964308185009978"; ?>"></script>
        <script src="<?php echo site_url() . "static/page_front/js/script/cart_1.js"; ?>"></script>
    <!--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>-->
    </body>
</html>