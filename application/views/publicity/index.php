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
                    <a href="http://localhost/shesy/ publicidad/anuncios " class="btn btn-default"> <i class="fa fa-plus"></i> Nuevo</a>
                  </div>
                  <!-- campañas -->
                  <div id="stm_lms_instructor_courses" class="stm_lms_instructor_courses vue_is_disabled is_vue_loaded"><div class="stm_lms_instructor_courses__grid"><div class="stm_lms_instructor_courses__single course-publish"><div class="stm_lms_instructor_courses__single__inner"><div class="stm_lms_instructor_courses__single--image"><div class="stm_lms_post_status heading_font new"> Campañas</div> <a href="" target="_blank" data-wpel-link="internal" rel="nofollow"><div class="stm_lms_instructor_courses__single--image-wrapper"><img src="https://stylemixthemes.com/masterstudy/white-lms/wp-content/uploads/sites/7/2018/07/cat_2-272x161.jpg" alt="cat_2" title="cat_2" width="272" height="161"></div></a></div> <div class="stm_lms_instructor_courses__single--inner"><div class="stm_lms_instructor_courses__single--terms"><div class="stm_lms_instructor_courses__single--term"><a href="https://stylemixthemes.com/masterstudy/white-lms/course/art/" title="Art">Art</a></div></div> <div class="stm_lms_instructor_courses__single--title"><a href="https://stylemixthemes.com/masterstudy/white-lms/courses/real-things-art-painting-by-jason-ni/" data-wpel-link="internal" rel="nofollow"><h5>Real Things Art Painting by Jason Ni</h5></a></div> <div class="stm_lms_instructor_courses__single--meta"></div> <div class="stm_lms_instructor_courses__single--bottom"><div class="stm_lms_instructor_courses__single--status publish"><div class="stm_lms_instructor_courses__single--status-inner"><div class="stm_lms_instructor_courses__single--choice publish chosen"><i class="fa fa-check-circle"></i> <span>Publicado</span></div> <div class="stm_lms_instructor_courses__single--choice draft"><a href="http://localhost/shesy/ " style="color: red;"><i aria-hidden="true" class="fa fa-trash"></i> <span>Eliminar</span></a></div> <a href="http://localhost/shesy/ " class="stm_lms_instructor_courses__single--choice edit"><i class="fa fa-edit"></i> <span>Editar</span></a></div></div> <div class="stm_lms_instructor_courses__single--price heading_font"><span>$60.99</span> <strong>$45.99</strong></div></div> <div class="stm_lms_instructor_courses__single--featured heading_font"><div class="feature_it remove_from_featured"> Ver Producto</div></div> <div class="stm_lms_instructor_courses__single--updated">Creación: 6 days ago</div></div></div></div></div></div>
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
                    <div id="stm-account-statistics" class="min-height-500"><div class="stm-lms-user-quizzes"><div class="row"><div class="col-xs-12"></div> <div class="col-xs-12 col-sm-6"><h3>Estadisticas</h3></div> <div class="col-xs-12 col-sm-6"><div class="row"><div class="col-xs-12 col-md-7 col-sm-6"><div class="form-group"><input type="text" placeholder="Paypal Email" class="form-control"></div></div> <div class="col-xs-12 col-md-5 col-sm-6"><button class="btn btn-default"><span>Save</span></button></div></div></div></div> <div class="row"><div class="col-xs-12 col-sm-12"><div chartid="line_chart_id" class="statistics-chart-class"><canvas id="line-chart" width="0" height="0" class="chartjs-render-monitor" style="display: block; width: 0px; height: 0px;"></canvas></div></div> <div class="col-xs-12 col-sm-12"><div chartid="pie_chart_id" class="statistics-chart-class"><canvas id="pie-chart" width="0" height="0" class="chartjs-render-monitor" style="display: block; width: 0px; height: 0px;"></canvas></div></div></div> <div class="stm-lms-user-quiz__head heading_font"><div class="stm-lms-user-quiz__head_title"><select name="category" class="form-control disable-select"><option value="0">All</option><option value="812">Let`s paint Van Gogh`s Starry Night</option><option value="880">Basics of Masterstudy</option><option value="882">Web Coding and Apache Basics</option><option value="996">How to Make Beautiful Landscape photos?</option><option value="997">Real Things Art Painting by Jason Ni</option><option value="999">Road Bike Manual or How to Be a Champion.</option><option value="1000">Make your Concept Right and Beautiful</option><option value="1001">Design Instruments for Communication</option><option value="1072">Nvidia and UE4 Technologies Practice</option><option value="1073">How to be a DJ? Make Electronic Music</option><option value="2858">Complete Web Development in 1 Bundle!</option><option value="2863">Trading Basics (3-Course Bundle)</option><option value="2865">Stock Trading &amp;amp; Investing for Beginners 4-in-1 Course Bundle</option><option value="2867">The New Fundamentals of Management (5 Course Bundle)</option><option value="2870">The Complete Financial BundleCourse 2020</option><option value="2872">Fundamentals of Analyzing Investments</option><option value="2874">The Complete Communication Skills Master Class for Life</option><option value="2876">The Complete Business Plan Course (Includes 5 Courses)</option><option value="2880">Master "Technical Analysis and Chart reading skills" Bundle</option><option value="2882">Web Development for Beginners 5-in-1 Course Bundle</option><option value="2884">Office 365 Administration</option><option value="2886">Learn JavaScript: Full-Stack from Scratch</option><option value="2888">The Complete CMS Project Course</option><option value="2890">Programming For Beginners Bundle Course</option><option value="2892">The Complete Stock Trading Bundle Course</option><option value="4040">MasterStudy Mobile LMS App</option></select></div> <div class="stm-lms-user-quiz__head_title"><div class="stm-datepicker"><div clearable="true" class="mx-datepicker" style="width: 100%; min-width: 210px;"><input name="date" readonly="readonly" placeholder="Select Date Range" class="form-control"> <i class="mx-input-icon mx-input-icon__calendar"></i> <div class="mx-datepicker-popup range" style="display: none;"><div style="overflow: hidden;"><div class="mx-datepicker-top"><span>next 7 days</span><span>next 30 days</span><span>previous 7 days</span><span>previous 30 days</span></div> <div class="mx-calendar" style="width: 50%; box-shadow: rgba(0, 0, 0, 0.1) 1px 0px;"><div class="mx-datepicker-footer"><button type="button" class="mx-datepicker-btn mx-datepicker-btn-confirm"> OK</button></div></div></div></div></div></div></div> <div class="text-center p-b-30"><button class="btn btn-default"><span>Load more</span></button></div></div></div></div>
                </div>
              </div>
            </div>
            <script src='<?php echo site_url().'static/publicity/js/campana.js';?>'></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>