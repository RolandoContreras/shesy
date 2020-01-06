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
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_pay;?></h4><span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400"><?php echo $obj_pending->pending_pay;?></label> Pendientes</span></div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="f-w-400 m-b-15">Facturas</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_invoices;?></h4>
                    <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400"><?php echo $obj_pending->pending_invoices_pack;?></label> Pendientes Pack &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400"><?php echo $obj_pending->pending_invoices_catalog;?></label> Pendientes Catalogo</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4">
                <div class="card user-card">
                  <div class="card-block">
                    <h5 class="f-w-400 m-b-15">Categorías</h5>
                    <h4 class="f-w-300 mb-3"><?php echo $obj_total->total_category;?></h4><span class="text-muted">Total</span></div>
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
              <div class="col-xl-4 col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h5 class="mb-2">Venta por Mes</h5>
                    <div class="card-header-right">
                      <div class="btn-group card-option"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                          <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                          <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                              <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-block">
                    <div id="Stack-age" class="Stackchart" style="height: 220px; overflow: hidden; text-align: left;">
                      <div style="position: relative;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 456px; height: 220px; padding: 0px; touch-action: auto;"
                          class="amcharts-chart-div"><svg version="1.1" style="position: absolute; width: 456px; height: 220px; top: 0.0499878px; left: 0.333313px;"><desc>JavaScript chart by amCharts 3.21.5</desc><g><path cs="100,100" d="M0.5,0.5 L455.5,0.5 L455.5,219.5 L0.5,219.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path><path cs="100,100" d="M0.5,0.5 L408.5,0.5 L408.5,164.5 L0.5,164.5 L0.5,0.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" transform="translate(27,20)"></path></g><g><g transform="translate(27,20)"></g><g transform="translate(27,20)" visibility="visible"></g></g><g transform="translate(27,20)" clip-path="url(#AmChartsEl-3)"><g visibility="hidden"></g></g><g></g><g></g><g></g><g><g transform="translate(27,20)"><g><g transform="translate(27,164)" visibility="visible" aria-label=" <20 30"><path cs="100,100" d="M0.5,0.5 L0.5,-40.5 L14.5,-40.5 L14.5,0.5 L0.5,0.5 Z" fill="url(#AmChartsEl-311)" stroke="#67b7dc" fill-opacity="0.9" stroke-width="1" stroke-opacity="0.2"></path><linearGradient id="AmChartsEl-311" x1="0%" x2="0%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1de9b6"></stop><stop offset="100%" stop-color="#1dc4e9"></stop></linearGradient></g><g transform="translate(95,164)" visibility="visible" aria-label=" 30 35"><path cs="100,100" d="M0.5,0.5 L0.5,-81.5 L14.5,-81.5 L14.5,0.5 L0.5,0.5 Z" fill="url(#AmChartsEl-312)" stroke="#67b7dc" fill-opacity="0.9" stroke-width="1" stroke-opacity="0.2"></path><linearGradient id="AmChartsEl-312" x1="0%" x2="0%" y1="100%" y2="0%"><stop offset="0%" stop-color="#899FD4"></stop><stop offset="100%" stop-color="#A389D4"></stop></linearGradient></g><g transform="translate(163,164)" visibility="visible" aria-label=" 40 40"><path cs="100,100" d="M0.5,0.5 L0.5,-122.5 L14.5,-122.5 L14.5,0.5 L0.5,0.5 Z" fill="url(#AmChartsEl-353)" stroke="#67b7dc" fill-opacity="0.9" stroke-width="1" stroke-opacity="0.2"></path><linearGradient id="AmChartsEl-353" x1="0%" x2="0%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1de9b6"></stop><stop offset="100%" stop-color="#1dc4e9"></stop></linearGradient></g><g transform="translate(231,164)" visibility="visible" aria-label=" 50 30"><path cs="100,100" d="M0.5,0.5 L0.5,-40.5 L14.5,-40.5 L14.5,0.5 L0.5,0.5 Z" fill="url(#AmChartsEl-375)" stroke="#67b7dc" fill-opacity="0.9" stroke-width="1" stroke-opacity="0.2"></path><linearGradient id="AmChartsEl-375" x1="0%" x2="0%" y1="100%" y2="0%"><stop offset="0%" stop-color="#899FD4"></stop><stop offset="100%" stop-color="#A389D4"></stop></linearGradient></g><g transform="translate(299,164)" visibility="visible" aria-label=" 60 32"><path cs="100,100" d="M0.5,0.5 L0.5,-56.5 L14.5,-56.5 L14.5,0.5 L0.5,0.5 Z" fill="url(#AmChartsEl-396)" stroke="#67b7dc" fill-opacity="0.9" stroke-width="1" stroke-opacity="0.2"></path><linearGradient id="AmChartsEl-396" x1="0%" x2="0%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1de9b6"></stop><stop offset="100%" stop-color="#1dc4e9"></stop></linearGradient></g><g transform="translate(367,164)" visibility="visible" aria-label=" >70 38"><path cs="100,100" d="M0.5,0.5 L0.5,-106.5 L14.5,-106.5 L14.5,0.5 L0.5,0.5 Z" fill="url(#AmChartsEl-407)" stroke="#67b7dc" fill-opacity="0.9" stroke-width="1" stroke-opacity="0.2"></path><linearGradient id="AmChartsEl-407" x1="0%" x2="0%" y1="100%" y2="0%"><stop offset="0%" stop-color="#899FD4"></stop><stop offset="100%" stop-color="#A389D4"></stop></linearGradient></g></g></g></g><g></g><g><g><path cs="100,100" d="M0.5,0.5 L408.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(27,184)"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,164.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(27,20)" visibility="visible"></path></g></g><g><g transform="translate(27,20)" style="pointer-events: none;" clip-path="url(#AmChartsEl-4)"><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L0.5,164.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" visibility="hidden"></path><path cs="100,100" d="M0.5,0.5 L408.5,0.5 L408.5,0.5" fill="none" stroke-width="1" stroke="#000000" visibility="hidden"></path></g><clipPath id="AmChartsEl-4"><rect x="0" y="0" width="408" height="164" rx="0" ry="0" stroke-width="0"></rect></clipPath></g><g></g><g><g transform="translate(27,20)"></g></g><g><g></g></g><g><g transform="translate(27,20)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(34,181.5)"><tspan y="6" x="0">&lt;20</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(102,181.5)"><tspan y="6" x="0">30</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(170,181.5)"><tspan y="6" x="0">40</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(238,181.5)"><tspan y="6" x="0">50</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(306,181.5)"><tspan y="6" x="0">60</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(374,181.5)"><tspan y="6" x="0">&gt;70</tspan></text></g><g transform="translate(27,20)" visibility="visible"><text y="0" fill="#000000" font-family="Verdana" font-size="0px" opacity="1" text-anchor="end" transform="translate(-12,164)"><tspan y="0" x="0">25</tspan></text><text y="0" fill="#000000" font-family="Verdana" font-size="0px" opacity="1" text-anchor="end" transform="translate(-12,123)"><tspan y="0" x="0">30</tspan></text><text y="0" fill="#000000" font-family="Verdana" font-size="0px" opacity="1" text-anchor="end" transform="translate(-12,82)"><tspan y="0" x="0">35</tspan></text><text y="0" fill="#000000" font-family="Verdana" font-size="0px" opacity="1" text-anchor="end" transform="translate(-12,41)"><tspan y="0" x="0">40</tspan></text><text y="0" fill="#000000" font-family="Verdana" font-size="0px" opacity="1" text-anchor="end" transform="translate(-12,0)"><tspan y="0" x="0">45</tspan></text></g></g><g></g><g transform="translate(27,20)"></g><g></g><g></g><clipPath id="AmChartsEl-3"><rect x="-1" y="-1" width="410" height="166" rx="0" ry="0" stroke-width="0"></rect></clipPath></svg>
                          <a style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 32px; top: 25px;">JS chart by amCharts</a>
                        </div>
                      </div>
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
                        <h6 class="m-t-50 m-b-0">Total Pedido Semana</h6>
                      </div>
                      <div class="col text-right">
                        <h3 class="text-c-green f-w-300"><?php echo $obj_invoices->total_invoice_catalog_week_active;?></h3><span class="text-muted d-block">Pedidos Procesados</span><span class="badge theme-bg text-white m-t-20"><?php echo $obj_invoices->total_invoice_catalog_week;?></span></div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h5>Ventas</h5><span class="d-block pt-2">Año <?php echo $year;?></span>
                  <div class="card-header-right">
                    <div class="btn-group card-option"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></button>
                      <ul
                        class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li
                          class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                          <li
                            class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                    </div>
                  </div>
                </div>
                <div class="card-block">
                  <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                        <h3 class="f-w-300 mb-0 float-left"><?php echo format_number_dolar($obj_invoices->total_year);?></h3>
                    </div>
                    <div class="col-6">
                      <div id="transactions" class="float-right" style="height: 90px; width: 80px; margin: 0px auto; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 90px;" width="80"
                          height="90"></canvas>
                        <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                          <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; max-width: 16px; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 1px; text-align: center;">0.0</div>
                            <div style="position: absolute; max-width: 16px; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 34px; text-align: center;">2.5</div>
                            <div style="position: absolute; max-width: 16px; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 66px; text-align: center;">5.0</div>
                          </div>
                          <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">0</div>
                            <div style="position: absolute; top: 54px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">20</div>
                            <div style="position: absolute; top: 18px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">40</div>
                          </div>
                        </div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 90px;" width="80"
                          height="90"></canvas></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-header">
                    <h5>Reporte / <?php echo $mes_actual;?></h5><span class="d-block pt-2">Ventas e Ingresos</span>
                  <div class="card-header-right">
                    <div class="btn-group card-option"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></button>
                      <ul   class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-block">
                  <div class="row">
                    <div class="col-6">
                      <div id="transactions1" style="height: 45px; width: 80px; margin: 0px auto; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 45px;" width="80"
                          height="45"></canvas>
                        <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                          <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; max-width: 16px; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 1px; text-align: center;">0.0</div>
                            <div style="position: absolute; max-width: 16px; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 34px; text-align: center;">2.5</div>
                            <div style="position: absolute; max-width: 16px; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 66px; text-align: center;">5.0</div>
                          </div>
                          <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">0</div>
                            <div style="position: absolute; top: 23px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">25</div>
                            <div style="position: absolute; top: 0px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">50</div>
                          </div>
                        </div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 45px;" width="80" height="45"></canvas></div>
                        <h3 class="f-w-300 pt-3 mb-0 text-center"><?php echo format_number_miles($obj_invoices->count_total_mes);?></h3>
                    </div>
                    <div class="col-6">
                      <div id="transactions2" style="height: 45px; width: 80px; margin: 0px auto; padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 45px;" width="80"
                          height="45"></canvas>
                        <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                          <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; max-width: 16px; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 1px; text-align: center;">0.0</div>
                            <div style="position: absolute; max-width: 16px; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 34px; text-align: center;">2.5</div>
                            <div style="position: absolute; max-width: 16px; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 66px; text-align: center;">5.0</div>
                          </div>
                          <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; top: 45px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">0</div>
                            <div style="position: absolute; top: 23px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">25</div>
                            <div style="position: absolute; top: 0px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">50</div>
                          </div>
                        </div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 45px;" width="80"
                          height="45"></canvas></div>
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
                      <div id="transactions3" class="float-left" style="height: 90px; width: 80px; margin: 0px auto; padding: 0px; position: relative;">
                          <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 90px;" width="80" height="90"></canvas>
                        <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                          <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; max-width: 16px; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 1px; text-align: center;">0.0</div>
                            <div style="position: absolute; max-width: 16px; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 34px; text-align: center;">2.5</div>
                            <div style="position: absolute; max-width: 16px; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 66px; text-align: center;">5.0</div>
                          </div>
                          <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                            <div style="position: absolute; top: 90px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">0</div>
                            <div style="position: absolute; top: 54px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">20</div>
                            <div style="position: absolute; top: 18px; font: 400 0px / 0px open sans, sans-serif; color: transparent; left: 0px; text-align: right;">40</div>
                          </div>
                        </div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 80px; height: 90px;" width="80"
                          height="90"></canvas></div>
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
<script>
'use strict';$(document).ready(function(){floatchart()
$(window).on('resize',function(){
    floatchart();});
    var chart=AmCharts.makeChart(
            "Stack-age",{"type":"serial","theme":"light","dataProvider":[{"age":"Ene","visits":<?php echo $obj_invoices->sum_ene;?>,"color":["#1de9b6","#1dc4e9"]}
                       ,{"age":"Feb","visits":<?php echo $obj_invoices->sum_ene;?>,"color":["#899FD4","#A389D4"]}
                       ,{"age":"Mar","visits":50,"color":["#899FD5","#A389D4"]}
                       ,{"age":"Abr","visits":4,"color":["#899FD6","#A389D4"]}
                       ,{"age":"May","visits":6,"color":["#899FD7","#A389D4"]}
                       ,{"age":"Jun","visits":6,"color":["#899FD8","#A389D4"]}
                       ,{"age":"Jul","visits":6,"color":["#899FD9","#A389D4"]}
                       ,{"age":"Ago","visits":7,"color":["#899F10","#A389D4"]}
                       ,{"age":"Set","visits":8,"color":["#1de911","#1dc4e9"]}
                       ,{"age":"Oct","visits":2,"color":["#899FD4","#A389D4"]}
                       ,{"age":"Nov","visits":1,"color":["#1de9b6","#1dc4e9"]}
                       ,{"age":"Dic","visits":1,"color":["#899FD4","#A389D4"]}]
                       ,"valueAxes":[{"gridAlpha":0,"axisAlpha":0,"lineAlpha":0,"fontSize":0,}],"startDuration":1,"graphs":[{"balloonText":"<b>[[category]]: [[value]]</b>","fillColorsField":"color","fillAlphas":0.9,"lineAlpha":0.2,"columnWidth":0.2,"type":"column","valueField":"visits"}],"chartCursor":{"categoryBalloonEnabled":false,"cursorAlpha":0,"zoomable":false},"categoryField":"age","categoryAxis":{"gridPosition":"start","gridAlpha":0,"axisAlpha":0,"lineAlpha":0,}});
    setTimeout(function(){},400);});$('#mobile-collapse').on('click',function(){setTimeout(function(){floatchart();},700);});function floatchart(){$(function(){var options={legend:{show:false},series:{label:"",curvedLines:{active:true,nrSplinePoints:20},},tooltip:{show:true,content:"x : %x | y : %y"},grid:{hoverable:true,borderWidth:0,labelMargin:0,axisMargin:0,minBorderMargin:0,},yaxis:{min:0,max:80,color:'transparent',font:{size:0,}},xaxis:{color:'transparent',font:{size:0,}}};var options_nospace={legend:{show:false},series:{label:"",curvedLines:{active:true,nrSplinePoints:0},},tooltip:{show:true,content:"x : %x | y : %y"},grid:{hoverable:true,borderWidth:0,labelMargin:0,axisMargin:0,minBorderMargin:20,},yaxis:{min:0,max:80,color:'transparent',font:{size:0,}},xaxis:{}};$.plot($("#transactions"),[{data:[[0,48],[1,30],[2,25],[3,30],[4,20],[5,40],[6,30],],color:"#1dc4e9",bars:{show:true,lineWidth:1,fill:true,fillColor:{colors:[{opacity:1},{opacity:1}]},barWidth:0.2,align:'center',horizontal:false},points:{show:false,radius:3,fill:true},curvedLines:{apply:false,}}],{series:{label:"",curvedLines:{active:true,nrSplinePoints:0},},tooltip:{show:true,content:"x : %x | y : %y"},grid:{hoverable:true,borderWidth:0,labelMargin:0,axisMargin:0,minBorderMargin:0,},yaxis:{min:0,max:50,color:'transparent',font:{size:0,}},xaxis:{color:'transparent',font:{size:0,}}});$.plot($("#transactions1"),[{data:[[0,48],[1,30],[2,25],[3,30],[4,20],[5,40],[6,30],],color:"#a389d4",bars:{show:true,lineWidth:1,fill:true,fillColor:{colors:[{opacity:1},{opacity:1}]},barWidth:0.2,align:'center',horizontal:false},points:{show:false,radius:3,fill:true},curvedLines:{apply:false,}}],{series:{label:"",curvedLines:{active:true,nrSplinePoints:0},},tooltip:{show:true,content:"x : %x | y : %y"},grid:{hoverable:true,borderWidth:0,labelMargin:0,axisMargin:0,minBorderMargin:0,},yaxis:{min:0,max:50,color:'transparent',font:{size:0,}},xaxis:{color:'transparent',font:{size:0,}}});$.plot($("#transactions2"),[{data:[[0,44],[1,26],[2,22],[3,35],[4,28],[5,35],[6,28],],color:"#1dc4e9",bars:{show:true,lineWidth:1,fill:true,fillColor:{colors:[{opacity:1},{opacity:1}]},barWidth:0.2,align:'center',horizontal:false},points:{show:false,radius:3,fill:true},curvedLines:{apply:false,}}],{series:{label:"",curvedLines:{active:true,nrSplinePoints:0},},tooltip:{show:true,content:"x : %x | y : %y"},grid:{hoverable:true,borderWidth:0,labelMargin:0,axisMargin:0,minBorderMargin:0,},yaxis:{min:0,max:50,color:'transparent',font:{size:0,}},xaxis:{color:'transparent',font:{size:0,}}});$.plot($("#transactions3"),[{data:[[0,40],[1,30],[2,25],[3,38],[4,30],[5,38],[6,30],],color:"#1dc4e9",bars:{show:true,lineWidth:1,fill:true,fillColor:{colors:[{opacity:1},{opacity:1}]},barWidth:0.2,align:'center',horizontal:false},points:{show:false,radius:3,fill:true},curvedLines:{apply:false,}}],{series:{label:"",curvedLines:{active:true,nrSplinePoints:0},},tooltip:{show:true,content:"x : %x | y : %y"},grid:{hoverable:true,borderWidth:0,labelMargin:0,axisMargin:0,minBorderMargin:0,},yaxis:{min:0,max:50,color:'transparent',font:{size:0,}},xaxis:{color:'transparent',font:{size:0,}}});});}
</script>
    