<div class="col-md-9 col-sm-12">
                <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
                  <div class="stm_lms_user_info_top">
                    <h1>Mi Publicidad</h1>
                  </div>
                  <div class="stm_lms_user_bio">
                    <div class="stm_lms_update_field__description"> La embajada emprendedora hoy se complace en presentar la sección de campaña publicitaria. Impulsamos que todos nuestros embajadores
                      participen activamente en el posicionamiento de su marca, con el respaldo y soporte de la embajada. Conseguiremos el éxito. </div>
                  </div>
                  <div class="stm_lms_instructor_courses__top">
                    <h4>Todas las Campañas</h4>
                  </div>
                  <!-- campañas -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class=""> <a href="#my-courses" data-toggle="tab"> Mis Campañas </a></li>
                    <li role="presentation" class=""> <a href="#statistics" data-toggle="tab"> Estadisticas </a></li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" id="my-courses" class="tab-pane vue_is_disabled active is_vue_loaded">
                      <div class="stm-lms-user-courses">
                        <div class="stm_lms_instructor_courses__grid">
                        <?php 
                          if($obj_publicity_courses == null && $obj_publicity_catalog == null){ ?>
                              <div class="stm_lms_instructor_courses__single">
                                  <h5>No hay Campañas</h5>
                              </div>
                          <?php } 
                         if($obj_publicity_courses != null){ 
                            foreach($obj_publicity_courses as $value){ ?>
                                <div class="stm_lms_instructor_courses__single">
                                  <div class="stm_lms_instructor_courses__single__inner">
                                    <div class="stm_lms_instructor_courses__single--image">
                                      <div class="image_wrapper"> 
                                        <img srcset="<?php echo site_url()."static/publicity/img/publi_curso.jpg";?> 2x" src="<?php echo site_url()."static/publicity/img/publi_curso.jpg";?>" alt="Publicidad" title="Publicidad" width="272" height="161">
                                      </div>
                                    </div>
                                    <div class="stm_lms_instructor_courses__single--inner">
                                      <div class="stm_lms_instructor_courses__single--terms">
                                        <div class="stm_lms_instructor_courses__single--term">
                                          <a href="<?php echo site_url().""?>" title="Cursos">Cursos</a>
                                        </div>
                                      </div>
                                      <div class="stm_lms_instructor_courses__single--title">
                                        <a href="" data-wpel-link="internal" rel="nofollow">
                                          <h5><?php echo $value->name;?></h5>
                                        </a>
                                        <div class="stm_lms_instructor_courses__single--bottom">
                                          <div class="stm_lms_instructor_courses__single--status publish">
                                              <div class="stm_lms_instructor_courses__single--status-inner">
                                                <div class="stm_lms_instructor_courses__single--choice publish chosen">
                                                <?php if($value->status == 1){ ?>
                                                  <i class="fa fa-check-circle"></i> <span>Activo</span>
                                                <?php }else{ ?>
                                                  <span>Inactivo</span>  
                                                <?php } ?>
                                                  </div>
                                                <div class="stm_lms_instructor_courses__single--choice draft">
                                                  <a href="javascript:void(0);" onclick="delete_course('<?php echo $value->id;?>');" style="color: red;"><i aria-hidden="true" class="fa fa-trash"></i> <span>Eliminar</span></a>
                                                </div>
                                                <a href="javascript:void(0);" onclick="edit_course('<?php echo $value->id;?>');" class="stm_lms_instructor_courses__single--choice edit"><i class="fa fa-edit"></i> <span>Editar</span></a>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <br/>
                                      <br/>
                                      <div class="stm_lms_instructor_courses__single--enroll">
                                        <a href="<?php echo site_url()."cursosporhoy/$value->category_slug/$value->course_slug?d=$obj_profile->customer_id";?>" data-wpel-link="internal" rel="nofollow" class="btn btn-default" target="_blank"><span>Ver Campaña</span>
                                        </a>
                                        <br/>
                                        <br/>
                                        <a href="javascript:void(0);" onclick="edit_course('<?php echo $value->id;?>');" data-wpel-link="internal" rel="nofollow"><span><i class="fa fa-edit"></i> Editar</span></a> |
                                        <a href="javascript:void(0);" onclick="delete_course('<?php echo $value->id;?>');"  data-wpel-link="internal" rel="nofollow" style="color:red;"><span><i aria-hidden="true" class="fa fa-trash"></i> Eliminar</span></a>
                                      </div>
                                      <div class="stm_lms_instructor_courses__single--started"> Creado: <?php echo formato_fecha($value->date);?></div>
                                    </div>
                                  </div>
                                </div>
                           <?php } ?>
                        <?php } ?>
                        <!-- catalogo-->
                        <?php 
                         if($obj_publicity_catalog != null){ 
                            foreach($obj_publicity_catalog as $value){ ?>
                                <div class="stm_lms_instructor_courses__single">
                                  <div class="stm_lms_instructor_courses__single__inner">
                                    <div class="stm_lms_instructor_courses__single--image">
                                      <div class="image_wrapper"> 
                                        <img srcset="<?php echo site_url()."static/publicity/img/publi_curso.jpg";?> 2x" src="<?php echo site_url()."static/publicity/img/publi_curso.jpg";?>" alt="Publicidad" title="Publicidad" width="272" height="161">
                                      </div>
                                    </div>
                                    <div class="stm_lms_instructor_courses__single--inner">
                                      <div class="stm_lms_instructor_courses__single--terms">
                                        <div class="stm_lms_instructor_courses__single--term">
                                          <a href="<?php echo site_url().""?>" title="Cursos">Empresas</a>
                                        </div>
                                      </div>
                                      <div class="stm_lms_instructor_courses__single--title">
                                        <a href="" data-wpel-link="internal" rel="nofollow">
                                          <h5><?php echo $value->name;?></h5>
                                        </a>
                                        <div class="stm_lms_instructor_courses__single--bottom">
                                          <div class="stm_lms_instructor_courses__single--status publish">
                                              <div class="stm_lms_instructor_courses__single--status-inner">
                                                <div class="stm_lms_instructor_courses__single--choice publish chosen">
                                                <?php if($value->status == 1){ ?>
                                                  <i class="fa fa-check-circle"></i> <span>Activo</span>
                                                <?php }else{ ?>
                                                  <span>Inactivo</span>  
                                                <?php } ?>
                                                  </div>
                                                <div class="stm_lms_instructor_courses__single--choice draft">
                                                  <a href="javascript:void(0);" onclick="delete_catalog('<?php echo $value->id;?>');" style="color: red;"><i aria-hidden="true" class="fa fa-trash"></i> <span>Eliminar</span></a>
                                                </div>
                                                <a href="javascript:void(0);" onclick="edit_catalog('<?php echo $value->id;?>');" class="stm_lms_instructor_courses__single--choice edit"><i class="fa fa-edit"></i> <span>Editar</span></a>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <br/>
                                      <br/>
                                      <div class="stm_lms_instructor_courses__single--enroll">
                                        <a href="<?php echo site_url()."soloporhoy/$value->category_slug/$value->catalog_slug?d=$obj_profile->customer_id";?>" data-wpel-link="internal" rel="nofollow" class="btn btn-default"  target="_blank"><span>Ver Campaña</span>
                                        </a>
                                        <br/>
                                        <br/>
                                        <a href="javascript:void(0);" onclick="edit_catalog('<?php echo $value->id;?>');" data-wpel-link="internal" rel="nofollow"><span><i class="fa fa-edit"></i> Editar</span></a> |
                                        <a href="javascript:void(0);" onclick="delete_catalog('<?php echo $value->id;?>');" data-wpel-link="internal" rel="nofollow" style="color:red;"><span><i aria-hidden="true" class="fa fa-trash"></i> Eliminar</span></a>
                                      </div>
                                      <div class="stm_lms_instructor_courses__single--started"> Creado: <?php echo formato_fecha($value->date);?></div>
                                    </div>
                                  </div>
                                </div>
                           <?php } ?>
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane vue_is_disabled " v-bind:class="{'is_vue_loaded' : vue_loaded}" id="statistics">
                    <div class="stm-lms-user-quizzes stm-lms-user-certificates">
                      <div class="stm-lms-user-quiz__head heading_font">
                          <div class="stm-lms-user-quiz__head_title">Campaña</div>
                          <div class="stm-lms-user-quiz__head_title">Concepto</div>
                          <div class="stm-lms-user-quiz__head_status">Visitas</div>
                      </div>
                      <?php 
                      if($obj_publicity_courses != null || $obj_publicity_catalog != null){
                        foreach($obj_publicity_courses as $value){ ?>
                          <div class="stm-lms-user-quiz">
                            <div class="stm-lms-user-quiz__title"> 
                              <a><?php echo $value->name;?></a>
                            </div>
                            <a class="stm-lms-user-quiz__name stm_preview_certificate">Cursos</a>
                            <div class="affiliate_points heading_font"> 
                                <span class="affiliate_points__btn"><i class="fa fa-eye"></i> 
                                <span class="text"><?php echo $value->total_view;?> Visitas</span> </span>
                            </div>
                            <div class="affiliate_points heading_font" data-copy="lmsx33x869"> 
                                <span class="affiliate_points__btn"> <i class="fa fa-eye"></i> 
                                <span class="text"><?php echo $value->total_sell;?> Ventas</span> </span>
                            </div>
                        </div>
                      <?php } ?>
                      <?php 
                      foreach($obj_publicity_catalog as $value){ ?>
                          <div class="stm-lms-user-quiz">
                            <div class="stm-lms-user-quiz__title"> 
                              <a><?php echo $value->name;?></a>
                            </div>
                            <a class="stm-lms-user-quiz__name stm_preview_certificate">Empresas</a>
                            <div class="affiliate_points heading_font"> 
                                <span class="affiliate_points__btn"><i class="fa fa-eye"></i> 
                                <span class="text"><?php echo $value->total_view;?> Visitas</span> </span>
                            </div>
                            <div class="affiliate_points heading_font" data-copy="lmsx33x869"> 
                                <span class="affiliate_points__btn"> <i class="fa fa-eye"></i> 
                                <span class="text"><?php echo $value->total_sell;?> Ventas</span> </span>
                            </div>
                        </div>
                      <?php } 
                      }else{ ?>
                          <p>No hay registros</p>
                      <?php } ?>
                    </div>
                    </div>
                  </div>
              </div>
            </div>
            <script src='<?php echo site_url().'static/publicity/js/campana.js';?>'></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>