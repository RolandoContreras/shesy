<script src="<?php echo site_url().'static/cms/js/core/bootbox.locales.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Mantenimientos de Pagos</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Pagos</a></li>
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
                    <h5>Listado de Pagos</h5>
                  </div>
                  <div class="card-block">
                    <div class="table-responsive">
                      <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                          <div class="col-sm-12">
                            <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 267px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">ID</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 392px;"
                                    aria-label="Position: activate to sort column ascending">Fecha</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 197px;"
                                    aria-label="Office: activate to sort column ascending">Usuario</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Nombres</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Wallet</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Importe</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Tax</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Total</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Estado</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 188px;"
                                    aria-label="Start date: activate to sort column ascending">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                              <?php foreach ($obj_pay as $value): ?>
                            <tr>
                                <td><?php echo $value->pay_id;?></td>
                                <td><?php echo formato_fecha_barras($value->date);?></td>
                                <td><b><?php echo "@".$value->username;?></b></td>
                                <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td><?php echo $value->btc_address;?></td>
                                <td><?php echo format_number_dolar($value->amount);?></td>
                                <td><?php echo format_number_dolar($value->descount);?></td>
                                <td><?php echo format_number_dolar($value->amount_total);?></td>
                                <td>
                                    <?php if ($value->active == 1) {
                                        $valor = "Es espera";
                                        $stilo = "label label-warning";
                                    }elseif($value->active == 2){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    }elseif($value->active == 3){
                                        $valor = "Cancelado";
                                        $stilo = "label label-important";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-secondary" type="button" onclick="edit_pay('<?php echo $value->pay_id;?>');"><span class="pcoded-micon"><i data-feather="edit"></i></span>  Editar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Fecha</th>
                                  <th rowspan="1" colspan="1">Usuario</th>
                                  <th rowspan="1" colspan="1">Nombres</th>
                                  <th rowspan="1" colspan="1">Wallet</th>
                                  <th rowspan="1" colspan="1">Importe</th>
                                  <th rowspan="1" colspan="1">Tax</th>
                                  <th rowspan="1" colspan="1">Total</th>
                                  <th rowspan="1" colspan="1">Estado</th>
                                  <th rowspan="1" colspan="1">Acciones</th>
                                </tr>
                              </tfoot>
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
              </div>
            </div>
          </div>
        </div>
</section>
<script src="<?php echo site_url();?>static/cms/js/cobros.js"></script>