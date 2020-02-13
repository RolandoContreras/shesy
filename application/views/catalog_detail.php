<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("head");?>
<body class="bp-nouveau product-template-default single single-product postid-1693 wp-embed-responsive theme-wordpress-lms pmpro-body-has-access woocommerce woocommerce-page woocommerce-no-js pagetitle-show bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr learnpress-v3 buy-through-membership header-template-overlay wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
  <div id=thim-preloading>
    <div class=thim-loading-icon>
      <div class=sk-folding-cube>
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
  </div>
  <div id=wrapper-container class="content-pusher creative-right bg-type-color">
    <div class=overlay-close-menu></div>
    <?php $this->load->view("header");?>
    <?php $this->load->view("nav");?>
    <div id="main-content">
      <section class="content-area">
        <div class="page-title layout-1">
          <div class="main-top no-parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/background_2.jpg';?>)"><span class=overlay-top-header style="background-color: rgba(0,0,0,0.6);"></span>
            <div class="content container">
              <div class=row>
                <div class="text-title col-md-6">
                  <h1>Catalogo</h1>
                </div>
                <div class="text-description col-md-6">
                  <div class=banner-description>
                    <p><strong class="br">El mejor precio del mercado </strong>Únete a Fk y compra con nosotros.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="breadcrumb-content ">
            <div class="breadcrumbs-wrapper container">
              <nav class=woocommerce-breadcrumb> 
                  <a href="<?php echo site_url();?>">Inicio</a> 
                  <span class=breadcrum-icon></span> <a href="<?php echo site_url().'catalog';?>">Catalogo</a>                
                  <span class="breadcrum-icon"></span><?php echo $obj_catalog->name;?></nav>
            </div>
          </div>
        </div>
        <div class="container site-content ">
          <div class=row>
            <div class="site-main col-sm-12 full-width">
              <div id=primary class=content-area>
                <div class=site-main role="main">
                  <div class=woocommerce-notices-wrapper></div>
                  <div class="post-1693 product type-product status-publish has-post-thumbnail product_cat-accessories product_cat-cookware product_cat-culinary pmpro-has-access first instock shipping-taxable purchasable product-type-simple">
                    <div class="product-info row">
                      <div class="col-sm-5 left image-panel">
                        <div id="carousel" class="flexslider">
                          <ul class="slides flex-control-nav">
                            <li>
                                <img width="600" height="600" alt="<?php echo $obj_catalog->name;?>" title="<?php echo $obj_catalog->name;?>" src='<?php echo site_url()."static/catalog/$obj_catalog->img";?>' srcset='<?php echo site_url()."static/catalog/$obj_catalog->img";?> 600w, <?php echo site_url()."static/catalog/$obj_catalog->img";?> 150w, <?php echo site_url()."static/catalog/$obj_catalog->img";?> 300w, <?php echo site_url()."static/catalog/$obj_catalog->img";?> 355w, <?php echo site_url()."static/catalog/$obj_catalog->img";?> 100w, <?php echo site_url()."static/catalog/$obj_catalog->img";?> 400w' sizes="(max-width: 600px) 100vw, 600px"  class="attachment-shop_single size-shop_single wp-post-image lazyload">
                            </li>
                            <li>
                                <img width="600" height="600" alt="<?php echo $obj_catalog->name;?>" title="<?php echo $obj_catalog->name;?>" src="<?php echo site_url()."static/catalog/$obj_catalog->img2";?>" srcset='<?php echo site_url()."static/catalog/$obj_catalog->img2";?> 600w, <?php echo site_url()."static/catalog/$obj_catalog->img2";?> 150w, <?php echo site_url()."static/catalog/$obj_catalog->img2";?> 300w, <?php echo site_url()."static/catalog/$obj_catalog->img2";?> 355w, <?php echo site_url()."static/catalog/$obj_catalog->img2";?> 100w, <?php echo site_url()."static/catalog/$obj_catalog->img2";?> 400w' sizes="(max-width: 600px) 100vw, 600px"  class="attachment-shop_single size-shop_single wp-post-image lazyload">
                            </li>
                            <li>
                                <img width="600" height="600" alt="<?php echo $obj_catalog->name;?>" title="<?php echo $obj_catalog->name;?>" src="<?php echo site_url()."static/catalog/$obj_catalog->img3";?>" srcset='<?php echo site_url()."static/catalog/$obj_catalog->img3";?> 600w, <?php echo site_url()."static/catalog/$obj_catalog->img3";?> 150w, <?php echo site_url()."static/catalog/$obj_catalog->img3";?> 300w, <?php echo site_url()."static/catalog/$obj_catalog->img3";?> 355w, <?php echo site_url()."static/catalog/$obj_catalog->img3";?> 100w, <?php echo site_url()."static/catalog/$obj_catalog->img3";?> 400w' sizes="(max-width: 600px) 100vw, 600px"  class="attachment-shop_single size-shop_single wp-post-image lazyload">
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-sm-7 right">
                        <h1 class="product_title entry-title"><?php echo $obj_catalog->name;?></h1>
                        <div class=woocommerce-product-rating>
                          <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                              <span style="width:100%"></span>
                          </div> 
                            <div class="product_meta">
                                <span class="posted_in">Fecha: <a href="javascript:void(0);" rel="tag"><?php echo formato_fecha_dia_mes($obj_catalog->date);?></a></span>
                            </div>
                            <a href="#reviews" class="woocommerce-review-link" rel="nofollow"></a>
                        </div>
                        <p class="price">
                            <span class="woocommerce-Price-amount amount">
                                <span class="badge badge-pill badge-info" style="font-size: 100%;">$<?php echo $obj_catalog->price;?></span>
                            </span>
                        </p>
                        <div class="description">
                          <?php echo $obj_catalog->summary;?>
                        </div>
                        <form class="cart" method="post" action="javascript:void(0);">
                            <div class="quantity">
                                <input type="text" name="quantity" id="quantity" value="1" title="Cantidad" class="input-text qty text" size="4">
                            </div>
                            <button onclick="add_cart_number('<?php echo $obj_catalog->catalog_id;?>','<?php echo $obj_catalog->price;?>','<?php echo $obj_catalog->name;?>');" class="single_add_to_cart_button button alt">Agregar al Carrito</button>
                        </form>
                        <div class="product_meta">
                            <span class="posted_in">
                                Categoría: <a href='<?php echo site_url()."catalog/$obj_catalog->category_slug";?>'>
                                <span class="badge badge-pill badge-success" style="font-size: 100%;"><?php echo $obj_catalog->category_name;?></span>
                                </a>
                            </span>
                        </div>
                        <br/>
                        <div class="form-group has-feedback" style="display: none;" id="message_success">
                            <div class="alert alert-success validation-errors">
                                <p class="user_login_id" style="text-align: center;">Producto Agregado.</p>
                            </div>
                          </div>
                        <div class="form-group has-feedback" style="display: none;" id="quantity_error">
                            <div class="alert alert-danger validation-errors">
                                <p class="user_login_id" style="text-align: center;">Cantidad Invalida.</p>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                      <ul class="tabs wc-tabs" role="tablist">
                        <li class="description_tab" id="tab-title-description">
                            <a>Descripción</a>
                        </li>
                      </ul>
                        <div class="woocommerce-Tabs-panel panel entry-content wc-tab" style="padding:0 100px !important;">
                        <h2>Descripción</h2>
                        <?php echo $obj_catalog->description;?>
                      </div>
                    </div>
                    <section>
                      <h2>Productos Relacionados</h2>
                      <ul class="category-product product-grid row">
                          <?php
                          foreach ($obj_catalog_rand as $value) { ?>
                            <li class="col-xs-6 col-md-3 col-sm-6 first product-card post-846 product type-product status-publish has-post-thumbnail product_cat-accessories product_cat-cookware product_cat-culinary product_cat-postcard pmpro-has-access  instock sale shipping-taxable purchasable product-type-simple">
                              <div class=wrapper>
                                <div class=feature-image>
                                    <a href='<?php echo site_url()."catalog/$value->category_slug/$value->slug";?>'>
                                        <img width=400 height=400 alt="<?php echo $value->name;?>" srcset='<?php echo site_url()."static/catalog/$value->img";?> 400w, <?php echo site_url()."static/catalog/$value->img";?> 150w, <?php echo site_url()."static/catalog/$value->img";?> 300w, <?php echo site_url()."static/catalog/$value->img";?> 355w, <?php echo site_url()."static/catalog/$value->img";?> 100w, <?php echo site_url()."static/catalog/$value->img";?> 600w' sizes="(max-width: 400px) 100vw, 400px" src='<?php echo site_url()."static/catalog/$value->img";?>' class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload">
                                    </a>
                                </div>
                                <div class="product-content">
                                  <div class="title-product">
                                      <a href='<?php echo site_url()."catalog/$value->category_slug/$value->slug";?>' class=product_name><?php echo $value->name;?></a></div>
                                  <span class=price>
                                      <span class="woocommerce-Price-amount amount">$<?php echo $value->price;?></span>
                                  </span>
                                    <a onclick="add_cart('<?php echo $value->catalog_id;?>','<?php echo $value->price;?>','<?php echo $value->name;?>');" class="button product_type_simple add_to_cart_button">Agregar al Carro</a>
                                </div>
                              </div>
                              <div class=clear></div>
                            </li>
                          <?php } ?>
                      </ul>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!--START FOOTER-->
    <?php $this->load->view("footer_2");?>
    <!--END FOOTER-->
  </div>
  <div id="back-to-top"><i class="fa fa-angle-up" aria-hidden=true></i></div>
  <div class="gallery-slider-content"></div>
  <script>
    var BP_Nouveau = {"ajaxurl":"","object_nav_parent":"#buddypress","objects":{"0":"activity","1":"members","4":"xprofile","7":"settings","8":"notifications"},"nonces":{"activity":"fcd5ecf43e","members":"9af41e8848","xprofile":"10dfc2af2b","settings":"8d89e10911"}};
  </script>
  <script>
    window.lazySizesConfig = window.lazySizesConfig || {};window.lazySizesConfig.lazyClass = 'lazyload';window.lazySizesConfig.loadingClass = 'lazyloading';window.lazySizesConfig.loadedClass = 'lazyloaded';lazySizesConfig.loadMode = 1;
  </script>
  <script>
    lazySizes.init();
  </script>
  <script src="<?php echo site_url();?>static/page_front/js/script/cart_1.js"></script>
  <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
  <script>
    WebFont.load({google:{families:['Roboto:400,300']}});
  </script>
  <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</body>
</html>