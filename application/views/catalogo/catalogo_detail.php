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
                                            <div class="col-xl-4 col-lg-4 col-sm-5 col-xs-12">
                                                <?php 
                                                    if($video != null){ 
                                                        if($host == "vimeo.com"){ ?>
                                                            <iframe src="https://player.vimeo.com/video/<?php echo $video_id;?>" width="640" height="361" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen data-v-4d187430></iframe>
                                                        <?php  }else{ ?>
                                                            <div class="video-wrapper">
                                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen data-v-4d187430></iframe>
                                                            </div>
                                                        <?php } 
                                                    }else{ ?>
                                                          <a href='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name; ?>">
                                                            <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name; ?>">
                                                          </a>  
                                                   <?php } ?>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-sm-7 col-xs-12">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" style="color:#888 !important;">
                                                        <h3 class="mt-3"><?php echo $obj_catalog->name; ?></h3>
                                                        <h3>
                                                            &dollar; <?php echo $obj_catalog->price; ?>
                                                        </h3>
                                                        <p><span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money">16/Sep</span></span></p>
                                                        <br/>
                                                        <?php echo $obj_catalog->description; ?>
                                                        <br/><br/>
                                                        
                                                        <?php 
                                                            if($video != null){  ?>
                                                                <a href='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name; ?>">
                                                                    <img width="400" src='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' class="img-fluid center m-b-10" alt="<?php echo $obj_catalog->name; ?>">
                                                                </a>  
                                                          <?php }?>
                                                                
                                                        
                                                        <h6 class="mt-3">Código de Producto</h6>
                                                        <p class="mb-1">
                                                            #<?php echo $obj_catalog->catalog_id; ?>
                                                            <br/>
                                                            <a href="<?php echo site_url() . "backoffice/files"; ?>">
                                                                <span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money">Consultar Beneficios</span></span>
                                                            </a>
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
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control autonumber" name="talla" id="talla" placeholder="Talla" style="text-transform: uppercase;">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control autonumber" name="color" id="color" placeholder="Color" style="text-transform: uppercase;">
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="row form-group">
                                                                <div class="col-sm-3">
                                                                    <label class="col-form-label" style="color:#888 !important;">Cantidad <?php echo $obj_catalog->granel == 1 ? "(Kg) / (Und)" : ""; ?></label>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control autonumber" data-v-max="9999" data-v-min="0" name="quantity" id="quantity" placeholder="Ingrese Cantidad">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <?php if ($obj_catalog->granel == 0) { ?>
                                                                        <button type="button" class="btn btn-glow-success btn-success btn-block" title="Agregar al Carrito" onclick="add_cart('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><i data-feather="shopping-cart"></i> Agregar</button>
                                                                    <?php } else { ?>
                                                                        <button type="button" class="btn btn-glow-success btn-success btn-block" title="Agregar al Carrito" onclick="add_cart_granel('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><i data-feather="shopping-cart"></i> Agregar</button>
                                                                    <?php } ?>
                                                                    
                                                                </div>
                                                            </div>
                                                                <hr style="color:white"/>
                                                                    <p>
                                                                        <a>
                                                                            <span id="comparePrice-product-template" class="sale-tag large title-price"><span class="money conversion-bear-money">COMPARTE EL PRODUCTO</span></span>
                                                                        </a>
                                                                    </p>
                                                                <div class="row form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" id="copy" value="<?php echo $url;?>" class="form-control" readonly=""/>
                                                                    </div>           
                                                                    <div class="col-sm-6">
                                                                        <button type="button" class="btn btn-info btn-block" title="Copiar Enlace"  onclick="copy();" onclick="add_cart('<?php echo $obj_catalog->catalog_id; ?>', '<?php echo $obj_catalog->price; ?>', '<?php echo $obj_catalog->name; ?>');"><i data-feather="copy"></i> Enlace de Recomendación</button>
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
                .center {
                    margin: auto;
                    width: 50%;
                    padding: 10px;
                    }
                    .white{
                        color:white !important;
                    }
                    .video-wrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}

.video-wrapper iframe{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
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
