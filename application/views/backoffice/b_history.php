<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js'; ?>"></script>

<div class="content-w">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url().'backoffice';?>">Tablero</a></li>
    <li class="breadcrumb-item"><span>Hisorial Financiero</span></li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <div class="row">
        <div class="col-md-6">
          <div class="element-wrapper" style="padding-bottom: 0;">
            <h6 class="element-header">Historial Financiero <small class="text-muted">Detalle de Ganancias</small> </h6>
          </div>
          <div class="element-box">
            <div class="os-tabs-w">
              <div class="os-tabs-controls">
                <ul class="nav nav-tabs smaller">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_overview">Financeiro</a> </li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_overview">
                  <div class="el-tablo">
                    <div class="label"> Ganacia Total </div>
                    <div class="value" id="bonustotal">$<?php echo $obj_total->total;?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="element-wrapper" style="padding-bottom: 0;">
            <h6 class="element-header">Historial Financiero <small class="text-muted">Detalle de Ganancias</small> </h6>
          </div>
          <div class="element-box">
            <div class="os-tabs-w">
              <div class="os-tabs-controls">
                <ul class="nav nav-tabs smaller">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_overview">Financeiro</a> </li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_overview">
                  <div class="el-tablo">
                    <div class="label"> Ganacia Unilevel </div>
                    <div class="value" id="bonustotal">$<?php echo $obj_total->total_unilevel;?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="element-wrapper">
            <h6 class="element-header">Histórico financeiro</h6>
            <div class="element-box">
              <!-------------------- END - Controls Above Table -------------------->
              <div class="table-responsive">
                <!-------------------- START - Basic Table -------------------->
                <div id="financial_history_wrapper" class="dataTables_wrapper">
                  <table class="table table-padded dataTable display" id="financial_history" cellspacing="0" width="100%" role="grid" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th class="text-center sorting_desc" tabindex="0" rowspan="1" colspan="1" style="width: 137.4px;"> ID </th>
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
                                          <span class="lighter"><?php echo $value->commissions_id;?></span>
                                      </td>
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
                                          <span class="badge badge-success-inverted "> + S/. <?php echo $value->amount;?></span>
                                      </td>
                                </tr>
                         <?php } ?>
                        
                      </tbody>
                  </table>
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
