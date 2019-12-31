<!DOCTYPE html>
<html lang="es">
<?php $this->load->view("head");?>
<body class="bp-nouveau archive post-type-archive post-type-archive-product wp-embed-responsive theme-wordpress-lms woocommerce woocommerce-page woocommerce-no-js pagetitle-show hfeed bg-type-color thim-body-visual-composer responsive box-shadow auto-login ltr learnpress-v3 buy-through-membership header-template-overlay wpb-js-composer js-comp-ver-6.0.5 vc_responsive no-js">
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
 <?php $this->load->view("nav",$obj_category_catalog);?>
  <div id=main-content>
    <section class=content-area>
      <div class="page-title layout-1">
        <div class="main-top no-parallax" style="background-image:url(<?php echo site_url().'static/page_front/images/background.jpg';?>)">
          <span class=overlay-top-header style="background-color: rgba(0,0,0,0.6);"></span>
          <div class="content container">
            <div class=row>
              <div class="text-title col-md-6">
                <h1>Catalogo</h1>
              </div>
              <div class="text-description col-md-6">
                <div class=banner-description>
                  <div class=banner-description><strong class="br">El mejor precio del mercado</strong>Únete a Fk y compra con nosotros.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="breadcrumb-content ">
          <div class="breadcrumbs-wrapper container">
              <ul itemprop="breadcrumb" itemscope id="breadcrumbs" class="breadcrumbs">
                <li itemprop="itemListElement">
                    <a itemprop="item" href="<?php echo site_url();?>" title="Inicio">
                        <span itemprop="name">Inicio</span>
                    </a>
                    <span class="breadcrum-icon">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li itemprop="itemListElement">
                    <span itemprop="name" title="Contacto" class="gold">Catalogo</span>
                </li>
              </ul>
          </div>
        </div>
      </div>
      <div class="container site-content ">
        <div class=row>
          <main id=main class="site-main col-sm-12 full-width">
            <div id=primary class=content-area>
              <main id=main class=site-main role=main>
                <div class=product-filter>
                  <div class=woocommerce-notices-wrapper></div>
                  <div class="display grid-list-switch" data-cookie=product-switch data-layout=grid>
                    <a href=javascript:; class="grid switchToGrid"><i class="fa fa-th"></i></a>
                    <a href=javascript:; class="list switchToList"><i class="fa fa-th-list"></i></a></div>
                  <p class=woocommerce-result-count>
                    Mostrando 12 de <?php echo $total;?> resultados</p>
                  <form class=woocommerce-ordering method="get" action="<?php echo $url;?>">
                    <span>Order por:</span> 
                    <select name="orderby" class="orderby">
                        <option value="menu_order">Ordenar por Defecto</option>
                        <option value="date">Ordenar por novedad</option>
                        <option value="price">Ordenar por precio menor a mayor</option>
                        <option value="price-desc">Ordenar por precio mayor a menor</option>
                    </select>
                  </form>
                </div>
                  <div class="form-group has-feedback" style="display: none;" id="message_success">
                    <div class="alert alert-success validation-errors">
                        <p class="user_login_id" style="text-align: center;">Producto Agregado.</p>
                    </div>
                  </div>
                <ul class="category-product product-grid archive_switch row">
                  <?php 
                  foreach ($obj_catalog  as $value) { ?>
                      <li class="col-xs-6 col-md-3 col-sm-6 first product-card post-846 product type-product status-publish has-post-thumbnail product_cat-accessories product_cat-cookware product_cat-culinary product_cat-postcard pmpro-has-access  instock sale shipping-taxable purchasable product-type-simple">
                        <div class=wrapper>
                          <div class=feature-image>
                            <span class=onsale>Venta!</span>
                            <a href='<?php echo site_url()."catalog/$value->category_slug/$value->slug";?>'>
                                <img width="400" height="400" alt data-srcset='<?php echo site_url()."static/catalog/$value->img";?> 400w, <?php echo site_url()."static/catalog/$value->img";?> 150w, <?php echo site_url()."static/catalog/$value->img";?> 300w, <?php echo site_url()."static/catalog/$value->img";?> 355w, <?php echo site_url()."static/catalog/$value->img";?> 100w, <?php echo site_url()."static/catalog/$value->img";?> 600w' sizes="(max-width: 400px) 100vw, 400px" data-src='<?php echo site_url()."static/catalog/$value->img";?>' class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyload">
                            <div class=quick-view><span><i class="fa fa-search"></i></span></div>
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="title-product">
                                <a href="<?php echo site_url()."catalog/$value->category_slug/$value->slug";?>" class="product_name"><?php echo $value->name;?></a></div>
                                    <span class="price">
                                         <span class="woocommerce-Price-amount amount">$<?php echo $value->price;?></span>
                                    </span>
                            <a onclick="add_cart('<?php echo $value->catalog_id;?>','<?php echo $value->price;?>','<?php echo $value->name;?>');" class="button product_type_simple add_to_cart_button">Agregar al Carro</a>
                        </div>    
                        </div>
                    <div class=clear></div>
                    </li>
                  <?php  } ?>
                </ul>
  <nav class=woocommerce-pagination>
    <ul class=page-numbers>
        <?php echo $obj_pagination; ?>
    </ul>
  </nav>
  </main>
  </div>
  </main>
  </div>
  </div>
  </section>
  </div>
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
      <script src=https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js></script>
      <script>
        WebFont.load({google:{families:['Roboto:400,300']}});
      </script>
      <script defer src="<?php echo site_url().'static/page_front/js/autoptimize_282.js';?>"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src='<?php echo site_url().'static/page_front/js/script/contact.js';?>'></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="<?php echo site_url();?>static/page_front/js/script/cart.js"></script>
</body>
</html>