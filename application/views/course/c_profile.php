  <section class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Perfil</h5>
                  </div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo site_url().'course';?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a>Perfil</a></li>
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
                            <h5>Información Personal</h5>
                          </div>
                          <div class="card-block">
                            <div class="alert alert-primary mb-0" role="alert">
                              <p>La información mostrada a continuación es confidencial. - <a href="index-widget-package.html" target="_blank" class="alert-link">BCA CAPITAL</a></p>
                              <label class="text-muted">Si desea cambiar su información personal y KIT de membresía dirigirse a su oficina virtual de BCA CAPITAL y hacer los cambios respectivos .</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="card loction-user">
                          <div class="card-block p-0">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-auto"><img class="img-fluid rounded-circle" style="width:80px;" src="<?php echo site_url().'static/backoffice/images/avatar.png';?>" alt="<?php echo $obj_customer->first_name;?>"></div>
                              <div class="col">
                                <h5><?php echo $obj_customer->first_name." ".$obj_customer->last_name;?></h5><span>
                                    <i class="fas fa-map-marker-alt f-18 m-r-5"></i><?php echo $obj_customer->nombre;?></span>
                              </div>
                            </div>
                            <div class="border-top"></div>
                          <div class="card-block">
                            <ul class="task-list">
                                <li>
                                    <i class="task-icon bg-c-green"></i>
                                    <h6>Email</h6>
                                    <p class="text-muted"><?php echo $obj_customer->email;?></p>
                                </li>
                                <li>
                                    <i class="task-icon bg-c-green"></i>
                                    <h6>Usuario</h6>
                                    <p class="text-muted"><?php echo "@".$obj_customer->username;?></p>
                                </li>
                                <li>
                                    <i class="task-icon bg-c-green"></i>
                                    <h6>Documento / Cedula</h6>
                                    <p class="text-muted"><?php echo $obj_customer->dni;?></p>
                                </li>
                                <li>
                                    <i class="task-icon bg-c-green"></i>
                                    <h6>Dirección</h6>
                                    <p class="text-muted"><?php echo $obj_customer->address;?></p>
                                </li>
                            </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="card theme-bg2 visa-top">
                          <div class="card-header borderless">
                            <h5 class="text-white float-left">Kid</h5>
                            <img class="img-fluid float-right" src="<?php echo site_url().'static/page_front/images/logo/icono-negro.png';?>" alt="logo" width="50">
                          </div>
                          <div class="card-block visa">
                            <h6 class="f-w-600 text-white "> <?php echo $obj_customer->kit;?><span class="f-w-300 m-l-10"><?php echo $obj_customer->active == 1 ? "Activo":"Inactivo";?></span></h6>
                            <span class="text-white"><b>Fecha de Activación</b>&nbsp;&nbsp;<?php echo formato_fecha_barras($obj_customer->date_start);?></span>
                            <h3 class="f-w-300 text-white m-t-25 m-b-0"><?php echo str_to_first_capital($text_course);?></h3>
                            <span class="text-white">Cursos Disponibles</span>
                            <img class="img-fluid" src="<?php echo site_url().'static/page_front/images/visa-background.png';?>" alt="visa-background"></div>
                        </div>
                      </div>
                    </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    