<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js'; ?>"></script>
<div class="content-w">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url().'backoffice';?>">Tablero</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);">Red</a></li>
    <li class="breadcrumb-item"><span>Referidos Directos</span></li>
  </ul>
  <!-------------------- END - Breadcrumbs -------------------->
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper col-xl-10">
        <h6 class="element-header"> Referidos Diretos </h6>
        <div class="col-12">
          <div class="row">
            <div class="col-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="profile-tile">
                    <a class="profile-tile-box">
                        <div class="pt-avatar-w"> <img src="<?php echo site_url().'static/backoffice/images/plan/libre.png';?>"> </div>
                      <div class="pt-user-name"> <b><?php echo $obj_total->total_posicion;?> Kits</b> <br> Posición </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="profile-tile">
                    <a class="profile-tile-box" href="#">
                      <div class="pt-avatar-w"> <img src="<?php echo site_url().'static/backoffice/images/plan/plan_1.png';?>"> </div>
                      <div class="pt-user-name"> <b><?php echo $obj_total->total_pack_1;?> Kits</b> <br> Pack1 </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="profile-tile">
                    <a class="profile-tile-box" href="#">
                      <div class="pt-avatar-w"> <img src="<?php echo site_url().'static/backoffice/images/plan/plan_2.png';?>"> </div>
                      <div class="pt-user-name"> <b><?php echo $obj_total->total_pack_2;?> Kits</b> <br> Pack2 </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="element-box-tp">
          <div class="table-responsive" style="overflow-x: auto;">
              
              
            <table class="table table-padded dataTable display" id="financial_history" cellspacing="0" width="100%" role="grid" style="width: 100%;">
                    <thead>
                      <tr role="row">
                       <th class="text-center"> Nombre y <br>Usuario </th>
                      <th class="text-center"> Datos de<br>  Contacto</th>
                      <th class="text-center"> Plan <br> </th>
                      <th class="text-center"> Fecha de<br>Registro </th>
                      <th class="text-center"> Fecha de<br>Activación </th>
                      <th class="text-center"> Estado </th>
                      </tr>
                    </thead>
                     <tbody>
                         <?php foreach ($obj_referidos as $value) { ?>
                                <tr role="row " class="odd ">
                                      <td align="center">
                                          <span class="lighter"><span class="smaller lighter"><?php echo $value->first_name." ".$value->last_name?></span> <br> <span><b><?php echo "@".$value->username;?></b></span></span>
                                      </td>
                                      <td align="center"> 
                                          <?php echo $value->phone;?> <br> <span class="lighter"><?php echo $value->email;?></span>
                                      </td>
                                      <td align="center">
                                          <span>
                                              <?php 
                                              switch ($value->kit_id) {
                                                  case 1:
                                                        echo "Membership";    
                                                      break;
                                                  case 2:
                                                        echo "Inicio";    
                                                      break;
                                                  case 3:
                                                        echo "Apertura";    
                                                      break;
                                                  case 4:
                                                       echo "Elite"; 
                                                      break;
                                                  case 5:
                                                      echo "Premium";   
                                                      break;
                                                  default:
                                                      echo "-";   
                                                      break;
                                              }
                                              ?>
                                  </span> <br> <span class="smaller lighter"> Actual </span> </td>
                                      <td align="center"> 
                                          <span>  <?php echo formato_fecha_barras($value->created_at);?></span><br> <span class="smaller lighter"><?php echo formato_fecha_minutos($value->created_at);?> <i class="far fa-clock"></i></span>
                                      </td>
                                      <td align="center">
                                          <span>  <?php echo $value->date_start==""?"-": formato_fecha_barras($value->date_start);?></span><br> <span class="smaller lighter"><?php echo formato_fecha_minutos($value->date_start);?> <i class="far fa-clock"></i></span>
                                      </td>
                                      <td align="center">
                                          <?php 
                                    if($value->active == 1){ ?>
                                            <a class="badge badge-success">Activo</a>
                                    <?php }else{ ?>
                                            <a class="badge badge-danger">Inativo</a> 
                                    <?php } ?>
                                      </td>
                                </tr>
                         <?php } ?>
                        
                      </tbody>
                  </table>  
          </div>
        </div>
      </div>
      <form method="post" id="formConfirmInvoice" action="" onsubmit="return sendWithValidation($(this));"> <input type="hidden" name="cofirm_invoice_id" id="cofirm_invoice_id" value="sss"> <input type="hidden" name="_token" value="VHHrXR8gvwphmQbkUhdNaQvjXNOYIYmGYF3DyXyk">        </form>
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