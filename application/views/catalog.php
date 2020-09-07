<!doctype html>
<html lang="es-PE">
<?php $this->load->view("head"); ?>
<body>
    <div id="section-header" data-section-id="header">
        <?php $this->load->view("header"); ?>
    </div>
    <main class="wrapper main-content" role="main">
        <div id="shopify-section-collection-template" class="shopify-section collection-template-section">
            <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
                <a href="<?php echo site_url();?>" title="Volver a la portada">Inicio</a>
                <span class="divider" aria-hidden="true">›</span>
                <span>Catalogo</span>
            </nav>
            <div id="CollectionSection">
                <div class="grid grid-border">
                    <aside class="sidebar grid-item large--one-fifth collection-filters" id="collectionFilters">
                        <div id="h3-title">Comprar por:</div>
                        <div class="space-20"></div>
                        <ul>
                        <?php foreach ($obj_category_catalog as $value) { ?>
                            <li>  
                              <a class="nav_catalog" href="<?php echo site_url() . "catalogo/$value->slug"; ?>" title="<?php echo $value->name; ?>"><?php echo $value->name; ?></a>
                            </li>
                        <?php } ?>
                        </ul>
                    </aside>
                    <div class="grid-item large--four-fifths grid-border--left">
                        <header class="section-header">
                            <div id="catalog-title" class="section-header--title section-header--left h1">Catalogo</div>
                            <div class="section-header--right">
                                <div class="form-horizontal">
                                    <label for="sortBy" class="small--hide">Ordenar por</label>
                                    <form class="woocommerce-ordering" method="get" action="https://culturaimparable.com/catalogo">
                                      <select name="orderby" class="orderby" id="sortBy" onchange="changeFunc();">
                                          <option value="menu_order">Ordenar por Defecto</option>
                                          <option value="date">Ordenar por novedad</option>
                                          <option value="price">Ordenar por precio menor a mayor</option>
                                          <option value="price-desc">Ordenar por precio mayor a menor</option>
                                      </select>
                                    </form>
                                </div>
                            </div>
                            <script type="text/javascript">
                              function changeFunc() {
                                var selectBox = document.getElementById("sortBy");
                                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                                var url = 'catalogo?orderby='+ selectedValue;
                                location.href = site+url;  
                              } 
                              </script>
                        </header>
                        <div class="grid-uniform">
                        <?php  foreach ($obj_catalog  as $value) { ?>
                              <div class="grid-item small--one-half medium--one-quarter large--one-quarter on-sale">
                                <a href="<?php echo site_url()."catalogo/$value->category_slug/$value->catalog_id/$value->slug";?>" class="product-grid-item">
                                    <div class="product-grid-image" style="height: 225px;">
                                        <div class="product-grid-image--centered">
                                            <div class="lazyload__image-wrapper" style="max-width: 250px">
                                                <div style="padding-top:100.0%;">
                                                    <img width="400" height="400" alt="<?php echo $value->name;?>" srcset='<?php echo site_url()."static/catalog/$value->img";?> 400w, <?php echo site_url()."static/catalog/$value->img";?> 150w, <?php echo site_url()."static/catalog/$value->img";?> 300w, <?php echo site_url()."static/catalog/$value->img";?> 355w, <?php echo site_url()."static/catalog/$value->img";?> 100w, <?php echo site_url()."static/catalog/$value->img";?> 600w' sizes="(max-width: 400px) 100vw, 400px" src='<?php echo site_url()."static/catalog/$value->img";?>'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><?php echo $value->name;?></p>
                                    <div class="product-item--price">
                                        <span class="h1 medium--left">
                                            <span class="visually-hidden">Precio de venta</span>
                                        </span>
                                    </div>
                                    <div class="sale-tag medium--right">
                                        Precio <span class="money conversion-bear-money">$<?php echo $value->price;?></span>
                                    </div>
                                </a>
                            </div>
                  <?php  } ?>
                        </div>
                    </div>
                    <!--Pagination-->
                    <div class="grid-item pagination-border-top">
                        <div class="grid">
                            <div class="grid-item large--four-fifths push--large--one-fifth">
                                <div class="text-center">
                                    <ul class="pagination-custom">
                                      <?php echo $obj_pagination; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </main>
    <div id="section-footer">
        <?php $this->load->view("footer"); ?>
    </div>
    <script
        src="<?php echo site_url() . "static/page_front/js/encore_core-391b174ddfaf72e8ec9615d1579235b5c2c755e7cd65e22cf10938c815f7f394.js"; ?>">
    </script>
    <script src="<?php echo site_url() . "static/page_front/js/scripts.js?15964308185009978"; ?>"></script>
</body>
</html>