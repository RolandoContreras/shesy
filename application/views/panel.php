<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Tablero</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a>Panel General</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main-body">
          <div class="page-wrapper">
            <div class="row">
              <div class="col-md-12 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="m-b-15">Pagos Realizados</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_pay;?></h4><span class="text-muted">
                        <?php 
                        if($obj_pending->pending_pay > 0){
                            $style = "theme-bg-red";
                        }else{ 
                            $style = "theme-bg";
                        }?>
                        <label class="label <?php echo $style;?> text-white f-12 f-w-400">
                            <?php echo $obj_pending->pending_pay;?>
                        </label>
                        Pendientes</span></div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="f-w-400 m-b-15">Facturas</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_invoices;?></h4>
                    <span class="text-muted">
                        <?php 
                        if($obj_pending->pending_invoices_catalog > 0){
                            $style = "theme-bg-red";
                        }else{ 
                            $style = "theme-bg";
                        }?>
                        <label class="label <?php echo $style;?> text-white f-12 f-w-400">
                            <?php echo $obj_pending->pending_invoices_catalog;?>
                        </label>
                        Factura Catalogo pendiente de entrega</span>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-4">
                <div class="card theme-bg visitor">
                  <div class="card-block text-center">
                    <h5 class="text-white m-0">NUEVOS EMBAJADORES</h5>
                    <h3 class="text-white m-t-20 f-w-300"><?php echo $obj_invoices->sum_total_embassy;?></h3>
                    <span class="text-white"><?php echo $obj_pending->pending_embassy;?> Pendientes</span></div>
                </div>
              </div>
             <div class="col-md-6 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="f-w-400 m-b-15">Kits</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_kit;?></h4><span class="text-muted">Total</span></div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="f-w-400 m-b-15">Videos</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_kit;?></h4><span class="text-muted">Total</span></div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="f-w-400 m-b-15">Rangos</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_ranges;?></h4><span class="text-muted">Total</span></div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="card Active-visitor">
                  <div class="card-block text-center">
                    <h5 class="mb-3">Clientes</h5>
                    <i class="fas fa-user-friends f-30 text-c-green"></i>
                    <h2 class="f-w-300 mt-3"><?php echo format_number_miles($obj_total->total_customer);?></h2>
                    <div class="progress mt-4 m-b-40">
                      <div class="progress-bar progress-c-theme" role="progressbar" style="width: 75%; height:7px;" aria-valuenow="75" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                    <div class="row card-active">
                      <div class="col-md-6 col-6">
                        <h4><?php echo format_number_miles($obj_total->total_activos);?></h4><span class="text-muted">Pagados</span></div>
                      <div class="col-md-6 col-12">
                        <h4><?php echo format_number_miles($obj_total->total_position);?></h4><span class="text-muted">Posicionado</span></div>
                    </div>
                  </div>
                </div>
              </div>
                
              <div class="col-md-6 col-xl-4">
               <div class="card">
                  <div class="card-block">
                    <h5 class="text-center">Ventas Totales</h5>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-auto">
                                <h3 class="f-w-300 m-t-20">$<?php echo $obj_invoices->sum_total_invoice?><i class="fas fa-caret-up text-c-green f-26 m-l-10"></i></h3>
                                <span>ENTRADA</span>
                            </div>
                            <div class="col text-right">
                                <i class="fas fa-chart-pie f-30 text-c-purple"></i>
                            </div>
                        </div>
                        <div class="leads-progress mt-3">
                            <h6 class="mb-3 text-center">Pack <span class="ml-4">Catalogo</span></h6>
                            <div class="progress">
                                <?php 
                                $total = $obj_invoices->sum_total_pack + $obj_invoices->sum_total_catalog;
                                $pack = ($obj_invoices->sum_total_pack / $total) * 100;
                                $catalogo = ($obj_invoices->sum_total_catalog / $total) * 100;
                                ?>

                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: <?php echo $pack;?>%; height:10px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: <?php echo $catalogo;?>%; height:10px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6 class="text-muted f-w-300 mt-4">Venta de Pack <span class="float-right"><?php echo $obj_invoices->sum_total_pack==0?0:format_number_dolar($obj_invoices->sum_total_pack);?></span></h6>
                            <h6 class="text-muted f-w-300 mt-4">Venta de Catalogo <span class="float-right">$<?php echo $obj_invoices->sum_total_catalog==0?0:format_number_dolar($obj_invoices->sum_total_catalog);?></span></h6>
                        </div>
                    </div>
                </div>
              </div>  
              <div class="col-md-12 col-xl-4">
                <div class="card theme-bg visitor">
                  <div class="card-block text-center">
                    <h5 class="text-white m-0">COMENTARIOS</h5>
                    <h3 class="text-white m-t-20 f-w-300"><?php echo $obj_total->total_comments;?></h3>
                    <span class="text-white"><?php echo $obj_pending->pending_comments;?> Pendientes</span></div>
                </div>
                <div class="card">
                  <div class="card-block">
                    <div class="row">
                      <div class="col">
                          <i class="text-c-green" data-feather="shopping-cart" text-c-green></i>
                        <h6 class="m-t-50 m-b-0">Pedidos Total</h6>
                      </div>
                      <div class="col text-right">
                        <h3 class="text-c-green f-w-300">
                            <a href="<?php echo site_url().'dashboard/contra-entrega';?>">
                                <?php echo $obj_pending->pending_contra_entrega;?>
                            </a>
                        </h3>
                          <span class="text-muted d-block">Pedidos Pendientes</span><span class="badge theme-bg text-white m-t-20"><?php echo $obj_total->total_invoices_catalog;?></span></div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h5>Ventas</h5><span class="d-block pt-2">Año <?php echo $year;?></span>
                </div>
                <div class="card-block">
                  <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                        <h3 class="f-w-300 mb-0 float-left"><?php echo format_number_dolar($obj_invoices->total_year);?></h3>
                    </div>
                    <div class="col-6">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h5>Reporte / <?php echo $mes_actual;?></h5><span class="d-block pt-2">Ventas e Ingresos</span>
                </div>
                <div class="card-block">
                  <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                        <h3 class="f-w-300 pt-3 mb-0 text-center"><?php echo format_number_miles($obj_invoices->count_total_mes);?></h3>
                    </div>
                    <div class="col-6">
                        <h3 class="f-w-300 pt-3 mb-0 text-center"><?php echo format_number_dolar($obj_invoices->sum_total_mes);?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
            <div class="col-md-12 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h5>Ingresos Semana Actual</h5>
                  <span class="d-block pt-2"><?php echo formato_fecha_dia_mes($lunes_semana_actual)." - ".formato_fecha_dia_mes($domingo_semana_actual);?></span>
                  <div class="card-header-right">
                    <div class="btn-group card-option"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></button>
                      <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li  class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-block">
                  <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <h3 class="f-w-300 mb-0 float-right"><?php echo format_number_dolar($obj_invoices->sum_total_week_invoice);?></h3>
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
