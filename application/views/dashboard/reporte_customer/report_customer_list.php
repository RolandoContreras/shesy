<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Todos los Clientes</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url().'dashboard/panel';?>">Panel</a></li>
                  <li class="breadcrumb-item"><a>Clientes</a></li>
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
                    <h5>Reporte de Clientes</h5>
                  </div>
                    <div class="card-header">
                    <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/report_customer/load";?>">
                        <div class="form-row">
                          <div class="form-group col-md-4">
                              <label>Fechas</label>
                              <div class="input-daterange input-group" id="datepicker_range">
                                <input type="text" class="form-control text-left" id="date_start" name="date_start" placeholder="Fecha de Inicio"/>
                                <input type="text" class="form-control text-right" id="date_end" name="date_end" placeholder="Fecha Final"/>
                             </div>
                          </div>
                         <div class="form-group col-md-2">
                             <label>Pack</label>
                              <select name="pack" id="pack" class="form-control">
                                  <option value="-1">Todos</option>
                                  <?php 
                                  foreach ($obj_kit as $value) { ?>
                                        <option value="<?php echo $value->kit_id;?>"><?php echo $value->name;?></option>
                                  <?php } ?>
                              </select>
                         </div>
                         <div class="form-group col-md-2">
                             <label>Rangos</label>
                              <select name="ranges" id="ranges" class="form-control">
                                  <option value="-1">Todos</option>
                                  <?php 
                                  foreach ($obj_ranges as $value) { ?>
                                        <option value="<?php echo $value->range_id;?>"><?php echo $value->name;?></option>
                                  <?php } ?>
                              </select>
                         </div>
                         <div class="form-group col-md-2">
                             <label>Estado</label>
                              <select name="active" id="active" class="form-control">
                                      <option value="-1" selected="">Todos</option>
                                      <option value="1">Activo</option>
                                      <option value="0">Inactivo</option>
                              </select>
                         </div>
                         <div class="form-group col-md-2">
                             <label>Buscar</label>
                              <button type="submit" class="btn btn-primary form-control">Buscar</button>
                         </div>
                        </div>
                    </form>
                        <form enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/report_customer/export";?>">
                            <input type="hidden" id="date_start" name="date_start" value="<?php echo $date_start;?>">
                            <input type="hidden" id="date_end" name="date_end" value="<?php echo $date_end;?>">
                            <input type="hidden" id="pack" name="pack" value="<?php echo $pack;?>">
                            <input type="hidden" id="ranges" name="ranges" value="<?php echo $ranges;?>">
                            <input type="hidden" id="active" name="active" value="<?php echo $active;?>">
                            <div class="form-group col-md-2">
                             <button type="submit" class="btn btn-success form-control">Exportar</button>                    
                         </div>
                        </form>    
                        <div class="card-block">
                            
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
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Usuario</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 392px;"
                                    aria-label="Position: activate to sort column ascending">Nombres</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">DNI</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Teléfono</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">País</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Pack</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Fecha de Activación</th>
                                  <th class="sorting" tabindex="0" aria-controls="zero-configuration" rowspan="1" colspan="1" style="width: 100px;"
                                    aria-label="Age: activate to sort column ascending">Estado</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($obj_customer as $key => $value): ?>
                                <td><?php echo $value->customer_id;?></td>
                                <td><?php echo $value->username;?></td>
                                <td><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td><?php echo $value->dni;?></td>
                                <td><?php echo $value->phone;?></td>
                                <td><?php echo $value->pais;?></td>
                                <td><?php echo $value->pack;?></td>
                                <td><?php echo formato_fecha_barras($value->date_start);?></td>
                                <td>
                                    <?php if ($value->active == 1) {
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    }else{
                                        $valor = "Inactivo";
                                        $stilo = "label label-danger";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th rowspan="1" colspan="1">ID</th>
                                  <th rowspan="1" colspan="1">Usuario</th>
                                  <th rowspan="1" colspan="1">Nombres</th>
                                  <th rowspan="1" colspan="1">DNI</th>
                                  <th rowspan="1" colspan="1">Teléfono</th>
                                  <th rowspan="1" colspan="1">País</th>
                                  <th rowspan="1" colspan="1">Pack</th>
                                  <th rowspan="1" colspan="1">Fecha Activación</th>
                                  <th rowspan="1" colspan="1">Estado</th>
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
<style>
    .datepicker>.datepicker-days { display: block;}
    ol.linenums {margin: 0 0 0 -8px;}
</style>
    
  
    