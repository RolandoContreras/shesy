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
                    <li class="breadcrumb-item"><a>Catalogo Todos</a></li>
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
                        <h5>Image Gallery</h5>
                      </div>
                      <div class="card-block">
                        <div class="row text-center">
                          <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                            <a href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl1.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl1.jpg" class="img-fluid m-b-10" alt="">
                            </a>
                          </div>
                          <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                            <a href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/l2.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl2.jpg" class="img-fluid m-b-10" alt="">
                            </a>
                          </div>
                          <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                            <a href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/l3.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl3.jpg" class="img-fluid m-b-10" alt="">
                            </a>
                          </div>
                          <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                            <a href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/l4.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl4.jpg" class="img-fluid m-b-10" alt="">
                            </a>
                          </div>
                          <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                            <a href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/l5.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl5.jpg" class="img-fluid m-b-10" alt="">
                            </a>
                          </div>
                          <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                            <a href="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/l6.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="http://html.codedthemes.com/datta-able/bootstrap/assets/images/light-box/sl6.jpg" class="img-fluid m-b-10" alt="">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                      
                      
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="card">
                                <div class="card-header">
                                  <h5>Título: <?php echo $obj_catalog->name;?></h5>
                                </div>
                                <div class="card-body">
                                  <div class="row justify-content-center">
                                    <div class="col-md-12">
                                      <div class="embed-responsive embed-responsive-16by9">
                                          <iframe class="embed-responsive-item" src="<?php echo $obj_catalog->video;?>" allowfullscreen=""></iframe>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-header">
                                  <h5>Contenido</h5>
                                </div>
                               <div class="card-block">
                                        <h6>Descripción</h6>
                                        <p><?php echo $obj_catalog->description;?></p>
                                        <h6 class="mt-3">Categoría</h6>
                                        <p class="text-primary mb-1"><a href="<?php echo site_url()."catalogo/$obj_catalog->category_slug";?>"><?php echo $obj_catalog->category_name;?></a></p>
                                </div>
                            </div>
                              <div class="col-sm-12">
                      <div class="card-header">
                          <h5>Videos Relacionados</h5>
                        </div>
                          <div class="card-block">
                            <div class="grid">
                                <?php
                                foreach ($obj_catalog_all as $value) { ?>
                                  <figure class="effect-apollo">
                                      <img width="365" height="340" src="<?php echo site_url()."static/catalog/$value->img";?>" alt="<?php echo $value->name;?>">
                                    <figcaption>
                                        <h2><span style="font-size: 32px !important;font-weight: 300 !important;"><?php echo $value->name;?></span></h2>
                                      <p><?php echo corta_texto($value->summary, 100);?></p>
                                      <a href="<?php echo site_url()."course/$value->category_slug/$value->slug";?>">Ver Más</a>
                                    </figcaption>
                                  </figure>
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
    