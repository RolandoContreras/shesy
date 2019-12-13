<div class="content-w">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"> <a href="<?php echo site_url().'backoffice';?>">Tablero</a> </li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <div class="col-md-8" style="margin: 0 auto !important; margin-bottom: 20px !important;">
        <div class="element-wrapper">
          <h6 class="element-header">Plan Carrera<br> <small class="text-muted">Mi Avance</small> </h6>
          <div class="element-box">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="body">
                    <div class="card-value float-right text-muted tile-icon"> <i class="far fa-star" style="font-size: 60px;"></i> </div>
                    <h3 class="mb-1"><?php echo isset($obj_customer->name) != ""?str_to_mayusculas($obj_customer->name):" Sin Rango ";?></h3>
                    <div>Graduación Actual</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="body">
                    <div class="card-value float-right text-muted tile-icon"><i class="fas fa-award" style="font-size: 60px;"></i></div>
                    <h3 class="mb-1">0 Pontos</h3>
                    <div>Acumulador por el equipo menor</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8" style="margin: 0 auto !important;">
        <?php
        foreach ($obj_range as $value) { ?>
                <div id="ajaxContent">
                      <div class="element-wrapper pb-0">
                        <div class="element-box">
                          <div class="row">
                            <div class="col-md-4">
                              <div align="center"> 
                                  <img src='<?php echo site_url()."static/backoffice/images/rangos/$value->img";?>' width="150"> 
                              </div>
                            </div>
                            <?php 
                            $max_grupal = $value->point_grupal * 0.6;
                            $max_personal = $value->point_grupal * 0.4;
                            
                            if($point_grupal > $max_grupal){
                                $grupal =  $max_grupal;
                            }else{
                                $grupal =  $point_grupal;
                            }
                            
                            if($point_personal > $max_personal){
                                $personal =  $max_personal;
                            }else{
                                $personal =  $point_personal;
                            }
                            
                            $total_points =  $personal + $grupal;
                            
                            $percent = ($total_points / $value->point_grupal)*100;
                            $percent = number_format($percent, 2);
                            $rest = $value->point_grupal - $total_points;
                                 
                            if($percent == 100){ ?>
                                 <div class="col-md-8">
                                      <h6 class="element-header" style="margin-top:15px"><?php echo str_to_mayusculas($value->name);?></h6>
                                      <p style="color:#3E4B5B"><b>Felicidaes! Usted alcanzó esta calificación.</b> <br> Puntuación necesaria: <?php echo format_number_miles($value->point_grupal);?> Pontos de Volume <br> Premio: PIN </p>
                                </div>    
                            <?php }else{ ?>  
                                  <div class="col-md-8">
                                        <h6 class="element-header" style="margin-top:15px"><?php echo str_to_mayusculas($value->name);?></h6>
                                      <div align="center">
                                        <div class="form-desc">
                                            <p class="text-primary" style="color:#3E4B5B">Faltan <?php echo format_number_miles($rest);?> Puntos de Volumen</p>
                                        </div>
                                      </div>
                                      <div class="os-progress-bar warning">
                                        <div class="bar-labels">
                                          <div class="bar-label-left"> <?php echo $percent."%"?> </div>
                                          <div class="bar-label-right"> <span class="info">0 /<?php echo format_number_miles($value->point_grupal);?></span> </div>
                                        </div>
                                        <div class="bar-level-1" style="width: 100%">
                                          <div class="bar-level-3" style="width: <?php echo $percent."%"?>"></div>
                                        </div>
                                      </div>
                                    </div>
                            <?php } ?>     
                          </div>
                        </div>
                      </div>
                    </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>