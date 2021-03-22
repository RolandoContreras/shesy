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
                    <h4>Productos &amp; Servicios</h4>
                    <a href="#" class="btn btn-default"> <i class="fa fa-plus"></i> Nuevo Producto</a>
                  </div>
                  <!-- campañas -->
                  <!--<div id="stm_lms_instructor_courses" class="stm_lms_instructor_courses vue_is_disabled is_vue_loaded"><div class="stm_lms_instructor_courses__grid"><div class="stm_lms_instructor_courses__single course-publish"><div class="stm_lms_instructor_courses__single__inner"><div class="stm_lms_instructor_courses__single--image"><div class="stm_lms_post_status heading_font new"> Campañas</div> <a href="" target="_blank" data-wpel-link="internal" rel="nofollow"><div class="stm_lms_instructor_courses__single--image-wrapper"><img src="https://stylemixthemes.com/masterstudy/white-lms/wp-content/uploads/sites/7/2018/07/cat_2-272x161.jpg" alt="cat_2" title="cat_2" width="272" height="161"></div></a></div> <div class="stm_lms_instructor_courses__single--inner"><div class="stm_lms_instructor_courses__single--terms"><div class="stm_lms_instructor_courses__single--term"><a href="https://stylemixthemes.com/masterstudy/white-lms/course/art/" title="Art">Art</a></div></div> <div class="stm_lms_instructor_courses__single--title"><a href="https://stylemixthemes.com/masterstudy/white-lms/courses/real-things-art-painting-by-jason-ni/" data-wpel-link="internal" rel="nofollow"><h5>Real Things Art Painting by Jason Ni</h5></a></div> <div class="stm_lms_instructor_courses__single--meta"></div> <div class="stm_lms_instructor_courses__single--bottom"><div class="stm_lms_instructor_courses__single--status publish"><div class="stm_lms_instructor_courses__single--status-inner"><div class="stm_lms_instructor_courses__single--choice publish chosen"><i class="fa fa-check-circle"></i> <span>Publicado</span></div> <div class="stm_lms_instructor_courses__single--choice draft"><a href="http://localhost/shesy/ " style="color: red;"><i aria-hidden="true" class="fa fa-trash"></i> <span>Eliminar</span></a></div> <a href="http://localhost/shesy/ " class="stm_lms_instructor_courses__single--choice edit"><i class="fa fa-edit"></i> <span>Editar</span></a></div></div> <div class="stm_lms_instructor_courses__single--price heading_font"><span>$60.99</span> <strong>$45.99</strong></div></div> <div class="stm_lms_instructor_courses__single--featured heading_font"><div class="feature_it remove_from_featured"> Ver Producto</div></div> <div class="stm_lms_instructor_courses__single--updated">Creación: 6 days ago</div></div></div></div></div></div>-->
                  No tiene Productos <br/><br/>

                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> <a href="#my-courses" data-toggle="tab"> Mis Campañas </a></li>
                    <li role="presentation" class=""> <a href="#statistics" data-toggle="tab"> Estadisticas </a></li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" id="my-courses" class="tab-pane vue_is_disabled active is_vue_loaded">
                      <div class="stm-lms-user-courses">
                        <div class="stm_lms_instructor_courses__grid">
                        <!-- courses-->
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
                  </div>
                  <div role="tabpanel" class="tab-pane vue_is_disabled " v-bind:class="{'is_vue_loaded' : vue_loaded}" id="statistics">
                </div>
              </div>
            </div>
            <script src='<?php echo site_url().'static/publicity/js/campana.js';?>'></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>