<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js'; ?>"></script>
<div class="content-w">
        <div class="top-bar color-scheme-dark"> </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="<?php echo site_url().'backoffice';?>">Tablero</a> 
            </li>
        </ul>
        <div class="content-i">
          <div class="content-box">
            <div class="row">
              <div class="col-sm-12 col-xxl-12">
                <div class="element-wrapper">
                  <h6 class="element-header"> Resumen </h6>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="element-box el-tablo">
                        <div class="label"> Ganancia Total </div>
                        <div class="value"> US$ <?php echo $obj_total_commissions->total_comissions!=""?$obj_total_commissions->total_comissions:"0.00";?> </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="element-box el-tablo">
                        <div class="label"> Ganancia DISPONIBLE </div>
                        <div class="value"> US$ <?php echo $obj_total_commissions->total_disponible!=""?$obj_total_commissions->total_disponible:"0.00";?> </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="element-box el-tablo">
                        <div class="label"> Plan Actual </div>
                        <div class="value"> 
                            <img src='<?php echo site_url()."static/backoffice/images/plan/$obj_customer->kit_img";?>' alt="plan" width="80"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="element-box el-tablo">
                        <div class="label"> Rango Actual </div>
                        <div class="value"> <img src='<?php echo site_url()."static/backoffice/images/rangos/$obj_customer->img";?>' alt="rango" width="70"/></div>
                      </div>
                    </div>
                      <div class="col-md-3 d-none d-sm-block">
                      <div class="profile-tile">
                          <a class="profile-tile-box" href="<?php echo site_url().'backoffice/referred';?>" style="width: 100%;"> <i class="os-icon os-icon-users" style="font-size: 35px; color: #4a3116;"></i>
                            <div class="pt-user-name"> Personas Directas<br> <b><?php echo $obj_total_referidos->total_referred;?></b> </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-3 d-none d-sm-block">
                      <div class="profile-tile">
                        <a class="profile-tile-box" href="<?php echo site_url().'backoffice/unilevel';?>" style="width: 100%;"> <i class="os-icon os-icon-hierarchy-structure-2" style="font-size: 35px; color: #4a3116;"></i>
                          <div class="pt-user-name"> Personas en el Equipo <br><b><?php echo $obj_total_referidos->total_register;?></b> </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-3 d-none d-sm-block">
                      <div class="profile-tile">
                        <a class="profile-tile-box" href="<?php echo site_url().'backoffice/history';?>" style="width: 100%;"> <i class="os-icon os-icon-bar-chart-stats-up" style="font-size: 35px; color: #4a3116;"></i>
                            <div class="pt-user-name"> Ganancia Último Mes<br> <b><?php echo format_number_dolar($obj_total_commissions->commission_by_date);?></b></div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-3 d-none d-sm-block">
                      <div class="profile-tile">
                        <a class="profile-tile-box" href="<?php echo site_url().'backoffice/carrera';?>" style="width: 100%;"> <i class="os-icon os-icon-map" style="font-size: 35px; color: #4a3116;"></i>
                            <div class="pt-user-name"> PRÓXIMO RANGO<br> <b><?php echo $obj_next_range->name;?></b> </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                
                
              <div class="col-sm-12 col-xxl-12">
                <div class="element-wrapper">
                  <h6 class="element-header"> Finanzas y Red </h6>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="element-box el-tablo">
                        <div class="table-responsive">
                              <table class="table table-padded dataTable display" id="financial_history" cellspacing="0" width="100%" role="grid" style="width: 100%;">
                                    <thead>
                                      <tr role="row">
                                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 152.4px;"> Usuário<br>Remitente </th>
                                        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 142.4px;"> Tipo de<br>Bono </th>
                                        <th class="text-center sorting" rowspan="1" colspan="1" style="width: 141.4px;"> Dato de<br>Fecha </th>
                                        <th class="text-center sorting" rowspan="1" colspan="1" style="width: 140.4px;"> Importe<br>Total </th>
                                      </tr>
                                    </thead>
                                     <tbody>
                                         <?php foreach ($obj_commissions as $value) { ?>
                                                <tr role="row " class="odd ">
                                                      <td align="center"> 
                                                          <span class="smaller lighter ">System</span> <br> 
                                                          <span><b><?php echo "@".$value->username;?></b></span>
                                                      </td>
                                                      <td align="center"><?php echo "Bono de ".str_to_first_capital($value->bonus);?></td>
                                                      <td align="center"> 
                                                          <span><?php echo formato_fecha_barras($value->date);?></span><br> 
                                                          <span class="smaller lighter "> <?php echo formato_fecha_minutos($value->date);?><i class="far fa-clock "></i></span>
                                                      </td>
                                                      <td align="center">
                                                          <span class="badge badge-success-inverted "> + <?php echo $value->amount;?></span>
                                                      </td>
                                                </tr>
                                         <?php } ?>

                                      </tbody>
                          </table>
                            
                            
                            
                      <div align="center">
                          <div class="alert alert-info" role="alert"> <a href="<?php echo site_url().'backoffice/history';?>">Ver Más</a> </div>
                      </div>
                    </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                   <div class="element-wrapper">
                  <div class="element-box">
                    <div class="element-info">
                      <div class="element-info-with-icon">
                        <div class="element-info-icon">
                          <div class="os-icon os-icon-ui-92"></div>
                        </div>
                        <div class="element-info-text">
                          <h5 class="element-inner-header"> Link de Referido </h5>
                          <div class="element-inner-desc"> Clic abajo para agregar a un nuevo socio.<br>
                              <a tabindex="0" target="_blank" href="<?php echo site_url().'register/'.$_SESSION['customer']['username'];?>"> 
                                  <i style="cursor: pointer;" title="Copiar" class="fa fa-plus text-success"></i> <?php echo site_url().'register/'.$_SESSION['customer']['username'];?></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      <h6 class="element-header" style="margin-top: 35px;"> Puntos de Rango </h6>
                      <div class="element-wrapper">
                        <div class="element-box">
                          <div class="text-center">
                              <?php if(isset($obj_customer->img) == ""){
                                            $var_next_range = "sin_rango.png";
                                        }else{
                                            $var_next_range = $obj_customer->img;
                               }?>
                              
                            <div class="d-block d-sm-none"> 
                                <img class="img-responsive" src='<?php echo site_url()."static/backoffice/images/rangos/$var_next_range";?>' style="max-width: 70px;"> 
                                <img class="img-responsive" src="https://cdn.onlinewebfonts.com/svg/img_317292.png" style="max-width: 30px; margin: 0 20px; opacity: 0.2;"> 
                                <img class="img-responsive" src='<?php echo site_url()."static/backoffice/images/rangos/$obj_next_range->img";?>' style="max-width: 70px;">                          
                            </div>
                            <div class="d-none d-sm-block"> 
                                <img class="img-responsive" src='<?php echo site_url()."static/backoffice/images/rangos/$var_next_range";?>' style="max-width: 90px;"> 
                                <img class="img-responsive" src="https://cdn.onlinewebfonts.com/svg/img_317292.png" style="max-width: 60px; margin: 0 20px; opacity: 0.2;"> 
                                <img class="img-responsive" src='<?php echo site_url()."static/backoffice/images/rangos/$obj_next_range->img";?>' style="max-width: 90px;">                          
                            </div>
                          </div>
                          <div class="os-progress-bar warning">
                            <div class="bar-labels">
                              <div class="bar-label-left"> 0% </div>
                              <div class="bar-label-right"> <span class="info">0 / <?php echo format_number_miles($obj_next_range->point_grupal);?></span> </div>
                            </div>
                            <div class="bar-level-1" style="width: 100%">
                              <div class="bar-level-3" style="width: 0%"></div>
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
        </div>
      </div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#financial_history').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>