<div class="col-md-9 col-sm-12">
                <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
                  <div class="stm_lms_user_info_top">
                    <h1>Mi Tienda</h1>
                  </div>
                  <div class="stm_lms_user_bio">
                    <div class="stm_lms_update_field__description"> La embajada emprendedora hoy se complace en presentar la sección MI TIENDA. Impulsamos que todos nuestros embajadores
                      participen activamente en el posicionamiento de su marca, con el respaldo y soporte de la embajada. Conseguiremos el éxito. </div>
                  </div>
                  <div class="stm_lms_instructor_courses__top">
                    <h4>Todas mis Productos</h4>
                  </div>
                  <!-- campañas -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class=""> <a href="#statistics" data-toggle="tab"> Mis Empresas </a></li>
                    <li role="presentation" class=""> <a href="#my-courses" data-toggle="tab"> Mis Cursos </a></li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane vue_is_disabled active" v-bind:class="{'is_vue_loaded' : vue_loaded}" id="statistics">
                    <div class="stm-lms-user-quizzes stm-lms-user-certificates">
                          <!-- catalogo-->
                        <?php 
                         if($obj_catalog != null){ 
                            foreach($obj_catalog as $value){ ?>
                                <div class="stm_lms_instructor_courses__single">
                                  <div class="stm_lms_instructor_courses__single__inner">
                                    <div class="stm_lms_instructor_courses__single--image">
                                      <div class="image_wrapper"> 
                                        <img srcset="<?php echo site_url()."static/catalog/$value->img3";?> 2x" src="<?php echo site_url()."static/catalog/$value->img3";?>" alt="Publicidad" title="Publicidad" width="272" height="161">
                                      </div>
                                    </div>
                                    <div class="stm_lms_instructor_courses__single--inner">
                                      <div class="stm_lms_instructor_courses__single--terms">
                                        <div class="stm_lms_instructor_courses__single--term">
                                          <a title="Cursos">Categoría:</a>
                                          <b><?php echo $value->category_name;?></b>
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
                                                <?php if($value->active == 1){ ?>
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
                                         <?php 
                                         if($value->active == 1){ ?>
                                            <a href="<?php echo site_url()."soloporhoy/$value->category_slug/$value->catalog_slug?d=$obj_profile->customer_id";?>" data-wpel-link="internal" rel="nofollow" class="btn btn-default" target="_blank">
                                              <span>Ver Empresa</span>
                                            </a>
                                         <?php }else{ ?>
                                            <h6>Validando para producción</h6>
                                            <br/><br/>
                                        <?php } ?>         
                                        <a href="javascript:void(0);" onclick="edit_catalog('<?php echo $value->id;?>');" data-wpel-link="internal" rel="nofollow"><span><i class="fa fa-edit"></i> Editar</span></a> |
                                        <a href="javascript:void(0);" onclick="delete_catalog('<?php echo $value->id;?>');" data-wpel-link="internal" rel="nofollow" style="color:red;"><span><i aria-hidden="true" class="fa fa-trash"></i> Eliminar</span></a>
                                        <br/>
                                      </div>
                                      <div class="stm_lms_instructor_courses__single--started"> Creado: <?php echo formato_fecha($value->date);?></div>
                                    </div>
                                  </div>
                                </div>
                           <?php }
                           }else{ ?>
                          <p>No hay Empresas</p>
                      <?php } ?>
                    </div>
                    </div>

                    <div role="tabpanel" id="my-courses" class="tab-pane vue_is_disabled  is_vue_loaded">
                      <div class="stm-lms-user-courses">
                        <div class="stm_lms_instructor_courses__grid">
                        <?php 
                         if($obj_courses != null){ 
                            foreach($obj_courses as $value){ ?>
                                <div class="stm_lms_instructor_courses__single">
                                  <div class="stm_lms_instructor_courses__single__inner">
                                    <div class="stm_lms_instructor_courses__single--image">
                                      <div class="image_wrapper"> 
                                        <img srcset="<?php echo site_url()."static/catalog/$value->img3";?> 2x" src="<?php echo site_url()."static/catalog/$value->img3";?>" alt="Publicidad" title="Publicidad" width="272" height="161">
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
                        <?php }else{ ?>
                          <div class="stm_lms_instructor_courses__single">
                              <h5>No hay Cursos</h5>
                          </div>
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <script src='<?php echo site_url().'static/publicity/js/shop.js';?>'></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>