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
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'course';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Videos Todos</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            
          <div class="main-body">
            <div class="page-wrapper">
              <div class="row">
                  <div class="col-sm-12">
                      <?php 
                    $kid_id = $_SESSION['customer']['kit_id'];
                    if($kid_id == 0 && $obj_videos->type == 2){ ?>
                        <div class="card">
                        <div class="card-block">
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Para poder ver el contenido completo de los cursos. Por favor adquiera un pack &nbsp;&nbsp;<a href="<?php echo site_url().'backoffice/plan';?>"> ¡Clic Aquí! </a> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>  
                        </div>
                      </div>
                    <?php }else{ ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="card">
                                <div class="card-header">
                                  <h5>Título: <?php echo $obj_videos->name;?></h5>
                                </div>
                                <div class="card-body">
                                  <div class="row justify-content-center">
                                    <div class="col-md-12">
                                      <div class="embed-responsive embed-responsive-16by9">
                                          <iframe class="embed-responsive-item" src="<?php echo $obj_videos->video;?>" allowfullscreen=""></iframe>
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
                                        <p><?php echo $obj_videos->description;?></p>
                                        <h6 class="mt-3">Categoría</h6>
                                        <p class="text-primary mb-1">
                                            <a href="<?php echo site_url()."course/$obj_videos->category_slug";?>"><span class="badge badge-pill badge-success" style="font-size: 100%;"><?php echo $obj_videos->category_name;?></span></a></p>
                                </div>
                            </div>
                              <div class="col-sm-12">
                                  <div class="card-header">
                                      <h5>Videos Relacionados</h5>
                                    </div>
                                      <div class="card-block">
                                        <div class="grid">
                                            <?php
                                            foreach ($obj_videos_all as $value) { ?>
                                              <figure class="effect-apollo">
                                                  <img width="365" height="340" src="<?php echo site_url()."static/course/img/$value->img2";?>" alt="advance-3">
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
                    <?php } ?>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    