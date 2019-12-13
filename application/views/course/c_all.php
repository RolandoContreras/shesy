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
                  <div class="card">
                    <div class="card-header">
                      <h5><?php echo $text_name;?></h5>
                    </div>
                    <div class="card-block">
                      <div class="row text-center">
                        <?php 
                        foreach ($obj_videos as $value) { ?>
                            <div class="col-xl-2 col-lg-3 col-sm-4 col-xs-12">
                                <a href="<?php echo $value->video;?>" data-toggle="lightbox" data-gallery="mixedgallery">
                                    <img src="<?php echo site_url()."static/course/img/$value->img";?>" class="img-fluid m-b-10" alt="">
                                </a>
                                <div class="card Design-sprint theme-bg2">
                                    <div class="card-header borderless">
                                        <span class="d-block text-white mt-2"><b><?php echo corta_texto(str_to_first_capital($value->name),14);?></b><br/><?php echo str_to_first_capital($value->summary);?></span> 
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
        </div>
      </div>
    </div>
  </section>
    