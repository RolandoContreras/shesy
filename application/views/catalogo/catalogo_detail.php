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
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'catalogo';?>"><i data-feather="home"></i></a></li>
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
                      
                    </div>
                  <div class="col-sm-12">
                      <div class="card">
                      <div class="card-header">
                        <h5>Mi producto: <?php echo $obj_catalog->name;?></h5>
                      </div>
                      <div class="card-block">
                        <div class="row text-center">
                          <div class="col-xl-4 col-lg-4 col-sm-4 col-xs-12">
                              <a href='<?php echo site_url()."static/catalog/$obj_catalog->img";?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name;?>">
                                <img src='<?php echo site_url()."static/catalog/$obj_catalog->img";?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name;?>">
                            </a>
                          </div>
                          <div class="col-xl-4 col-lg-4 col-sm-4 col-xs-12">
                            <a href='<?php echo site_url()."static/catalog/$obj_catalog->img2";?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name;?>">
                                <img src='<?php echo site_url()."static/catalog/$obj_catalog->img2";?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name;?>">
                            </a>
                          </div>
                          <div class="col-xl-4 col-lg-4 col-sm-4 col-xs-12">
                            <a href='<?php echo site_url()."static/catalog/$obj_catalog->img3";?>' data-toggle="lightbox" data-gallery="<?php echo $obj_catalog->name;?>">
                                <img src='<?php echo site_url()."static/catalog/$obj_catalog->img3";?>' class="img-fluid m-b-10" alt="<?php echo $obj_catalog->name;?>">
                            </a>
                          </div>
                        </div>
                      </div>
                      <hr>
                          <div class="card-header">
                                  <h5>Contenido</h5>
                                </div>
                               <div class="card-block">
                                   <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                          <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <li>
                                                <a class="nav-link text-left show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Descripción</a>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                          <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <h5 class="mt-3"><?php echo $obj_catalog->name;?></h5>
                                                <h3><?php echo format_number_moneda_soles($obj_catalog->price);?></h3>
                                              <p class="mb-0" style="color:#888 !important;">
                                                  <br/>
                                                    <?php echo $obj_catalog->description;?>
                                                    <h6 class="mt-3">Categoría</h6>
                                                        <p class="text-primary mb-1"><a href="<?php echo site_url()."catalogo/$obj_catalog->category_slug";?>"><?php echo $obj_catalog->category_name;?></a></p>
                                                        <hr>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        Guarde su producto en el carrito y siga comprando.
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                     </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" style="color:#888 !important;">Ingrese Cantidad</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control autonumber" data-v-max="9999" data-v-min="0" name="quantity" id="quantity">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button type="button" class="btn btn-glow-success btn-success" title="Agregar al Carrito" data-toggle="tooltip" data-original-title="Agregar al Carrito" onclick="add_cart('<?php echo $obj_catalog->catalog_id;?>','<?php echo $obj_catalog->price;?>','<?php echo $obj_catalog->name;?>');"><i data-feather="shopping-cart"></i> Agregar</button>
                                                    </div>
                                                </div>
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
                                        </div>
                                      </div>
                                </div>
                    </div>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="card-header">
                                      <h5>Productos Relacionados</h5>
                                    </div>
                                      <div class="card-block">
                                              <div class="row text-center">
                                                <?php foreach ($obj_catalog_all as $value) { ?>
                                                    <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                                                        <a href="<?php echo site_url()."catalogo/$value->category_slug/$value->slug";?>">
                                                            <img src="<?php echo site_url()."static/catalog/$value->img";?>" class="img-fluid m-b-10" alt="<?php echo $value->name;?>"></a>
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
    </div>
  </section>
<script src="<?php echo site_url();?>static/catalog/js/order.js"></script>

    