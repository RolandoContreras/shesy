<div class="col-md-9 col-sm-12">
                <div class="stm_lms_private_information" data-container-open=".stm_lms_private_information">
                  <div class="stm_lms_user_info_top">
                    <h1>Posiciona tu marca</h1>
                  </div>
                  <div class="stm_lms_user_bio">
                    <h3>Publicidad la Cultura</h3>
                    <div class="stm_lms_update_field__description"> La cultura emprendedora hoy se complace en presentar la sección de campaña publicitaria. Impulsamos que todos nuestros embajadores
                      participen activamente en el posicionamiento de su marca, con el respaldo y soporte de la cultura. Conseguiremos el éxito. </div>
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
                                        <a href="<?php echo site_url()."cursosporhoy/$value->category_slug/$value->course_slug?d=$obj_profile->customer_id";?>" data-wpel-link="internal" rel="nofollow" class="btn btn-default"><span>Ver Campaña</span>
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
                                        <a href="<?php echo site_url()."soloporhoy/$value->category_slug/$value->catalog_slug?d=$obj_profile->customer_id";?>" data-wpel-link="internal" rel="nofollow" class="btn btn-default"><span>Ver Campaña</span>
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
                          <div class="stm-lms-user-quiz__head_title"> Campaña</div>
                          <div class="stm-lms-user-quiz__head_status"> Concepto</div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> 
                            How to Work with Legendary RED camera?
                          </div>
                          <a data-course-id="869" class="stm-lms-user-quiz__name stm_preview_certificate"> Cursos </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx33x869"> <span class="hidden" id="lmsx33x869">lmsx33x869</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                          <div class="affiliate_points heading_font" data-copy="lmsx33x869"> <span class="hidden" id="lmsx33x869">lmsx33x869</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/engine-creating-for-xbox-one-x/" data-wpel-link="internal" rel="nofollow"> Engine Creating for Xbox One X </a></div>
                          <a href="#" data-course-id="881" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx38x881"> <span class="hidden" id="lmsx38x881">lmsx38x881</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/web-coding-and-apache-basics/" data-wpel-link="internal" rel="nofollow"> Web Coding and Apache Basics </a></div>
                          <a href="#" data-course-id="882" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx41x882"> <span class="hidden" id="lmsx41x882">lmsx41x882</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/concept-art-printing-on-3d-printer/" data-wpel-link="internal" rel="nofollow"> Concept Art Printing on 3d Printer </a></div>
                          <a href="#" data-course-id="815" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx43x815"> <span class="hidden" id="lmsx43x815">lmsx43x815</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/how-to-make-beautiful-landscape-photos/" data-wpel-link="internal" rel="nofollow"> How to Make Beautiful Landscape photos? </a></div>
                          <a href="#" data-course-id="996" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx50x996"> <span class="hidden" id="lmsx50x996">lmsx50x996</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/fashion-photography-from-professional/" data-wpel-link="internal" rel="nofollow"> Fashion Photography from professional </a></div>
                          <a href="#" data-course-id="1002" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx409x1002"> <span class="hidden" id="lmsx409x1002">lmsx409x1002</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/road-bike-manual-or-how-to-be-a-champion/" data-wpel-link="internal" rel="nofollow"> Road Bike Manual or How to Be a Champion. </a></div>
                          <a href="#" data-course-id="999" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx20491x999"> <span class="hidden" id="lmsx20491x999">lmsx20491x999</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/basics-of-masterstudy/" data-wpel-link="internal" rel="nofollow"> Basics of Masterstudy </a></div>
                          <a href="#" data-course-id="880" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx47585x880"> <span class="hidden" id="lmsx47585x880">lmsx47585x880</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/masterstudy-mobile-lms-app/" data-wpel-link="internal" rel="nofollow"> MasterStudy Mobile LMS App </a></div>
                          <a href="#" data-course-id="4040" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx347658x4040"> <span class="hidden" id="lmsx347658x4040">lmsx347658x4040</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/how-to-be-a-dj-make-electronic-music/" data-wpel-link="internal" rel="nofollow"> How to be a DJ? Make Electronic Music </a></div>
                          <a href="#" data-course-id="1073" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx830042x1073"> <span class="hidden" id="lmsx830042x1073">lmsx830042x1073</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/real-things-art-painting-by-jason-ni/" data-wpel-link="internal" rel="nofollow"> Real Things Art Painting by Jason Ni </a></div>
                          <a href="#" data-course-id="997" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx784251x997"> <span class="hidden" id="lmsx784251x997">lmsx784251x997</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                      <div class="stm-lms-user-quiz">
                          <div class="stm-lms-user-quiz__title"> <a href="https://stylemixthemes.com/masterstudy/white-lms/courses/run-forest-run-how-to-create-running-route/" data-wpel-link="internal" rel="nofollow"> Run Forest, Run, How to create Running Route </a></div>
                          <a href="#" data-course-id="819" class="stm-lms-user-quiz__name stm_preview_certificate"> Download </a>
                          <div class="affiliate_points heading_font" data-copy="lmsx795359x819"> <span class="hidden" id="lmsx795359x819">lmsx795359x819</span> <span class="affiliate_points__btn"> <i class="fa fa-link"></i> <span class="text">Copy code</span> </span></div>
                      </div>
                    </div>
                    </div>
                  </div>
              </div>
            </div>
            <script src='<?php echo site_url().'static/publicity/js/campana.js';?>'></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>