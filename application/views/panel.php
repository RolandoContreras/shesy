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
                    <!--ROL ADMIN-->
                    <?php 
                    if($_SESSION['usercms']['roles'] == '["ROLE_ADMIN"]' || $_SESSION['usercms']['roles'] == '["ROLE_SUPERVISOR"]'){ ?>
                        <div class="row">
                                <div class="col-md-12 col-xl-4">
                                    <div class="card card-event">
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col">
                                                    <h5 class="m-0">Valorización - <?php echo $date;?></h5>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label theme-bg2 text-white f-14 f-w-400 float-right"><?php echo format_number_0decimal($percent);?>%</label>
                                                </div>
                                            </div>
                                            <h2 class="mt-2"><?php echo format_number_moneda_soles($total_costo);?></h2>
                                            <h6 class="text-muted mt-3 mb-0">Meta del MES <b>(Costo Directo)</b>  &nbsp;&nbsp;-&nbsp;&nbsp;<b><?php echo format_number_moneda_soles(GOAL_YEAR_COST);?></b></h6>
                                            <div class="form-row mt-3">
                                                <div class="form-group col-md-12">
                                                    <a href="<?php echo site_url()."dashboard/valorizacion";?>"><button class="btn btn-dark btn-block" type="button"><span> Ver Valorización en Curso</span></button></a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Valorización Semanal -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACIÓN SEMANAL</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart0" class="ChartShadow BarChart bar-chart1" style="height:270px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- precio contractual por actividades -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card statistial-visit">
                                        <div class="card-header">
                                            <h5>Precio Unitario por Actividad</h5>
                                            <span class="text-muted d-block mt-1">Bases del Contrato</span>
                                        </div>
                                        <div class="card-block">
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <b>A</b> - Control y Conservación de Sistema de Estaciones
                                                </div>
                                                <div class="media-body">
                                                    <label class="label theme-bg text-white f-14 float-right"><?php echo format_number_moneda_soles(UNITARY_PRICE_A1);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <b>B</b> - Conservación de Estructuras Metalicas y Civil de Casetas
                                                </div>
                                                <div class="media-body">
                                                    <label class="label theme-bg2 text-white f-14 float-right"><?php echo format_number_moneda_soles(UNITARY_PRICE_B1);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <div class="photo-table">
                                                    <b>C</b> - Conservación de Gasfiteria de Casetas:
                                                </div>
                                                <div class="media-body">
                                                    <label class="label bg-c-blue text-white f-14 float-right"><?php echo format_number_moneda_soles(UNITARY_PRICE_C1);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <div class="photo-table">
                                                    <b>C2</b> - Fumigación y desratización en las estaciones:
                                                </div>
                                                <div class="media-body">
                                                    <label class="label bg-c-blue text-white f-14 float-right"><?php echo format_number_moneda_soles(UNITARY_PRICE_C2);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <div class="photo-table">
                                                    <b>C3</b> - Retirar Maleza y/o desmonte:
                                                </div>
                                                <div class="media-body">
                                                    <label class="label bg-c-blue text-white f-14 float-right"><?php echo format_number_moneda_soles(UNITARY_PRICE_C3);?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ACTIVIDAD A -->
                                <div class="col-md-12 col-xl-12">
                                    <div class="card bitcoin-wallet" style="margin-bottom: 0px !important;text-align: center;background-color:#2E2EFE;">
                                        <div style="padding: 15px 20px !important;">
                                            <h2 class="text-white mb-2 f-w-300" style="font-size: 35px;">VALORIZACIÓN POR ACTIVIDADES</h2>
                                        </div>
                                    </div>
                                    <div class="card theme-bg2 bitcoin-wallet" style="margin-bottom: 0px">
                                        <div style="padding: 15px 20px !important;">
                                            <h2 class="text-white mb-2 f-w-300" style="font-size: 35px;">ACTIVIDAD A</h2>
                                            <span class="text-white d-block">Control y Conservación de Sistema de Estaciones</span>
                                            <i class="fas fa-dollar-sign f-70 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACION POR ACTIVIDADES</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart1" class="ChartShadow BarChart barChart1" style="height:200px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACION POR MATERIALES</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart2" class="ChartShadow BarChart barChart" style="height:200px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card statistial-visit">
                                        <div class="card-header">
                                            <h5>TOTAL</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>META CONTRACTUAL MENSUAL</h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles(GOAL_A_MONTH_SIN_IGV);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>VALORIZACIÓN DICIEMBRE<br/><b>27 días</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles($valorization_2020['total_a_complete']);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>VALORIZACIÓN ENERO<br/><b>25 días</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles($valorization_01_21['total_a_complete']);?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- ACTIVIDAD B -->
                                 <div class="col-md-12 col-xl-12">
                                    <div class="card theme-bg bitcoin-wallet" style="margin-bottom: 0px;">
                                        <div style="padding: 15px 20px !important;margin-bottom: 0px;">
                                            <h2 class="text-white mb-2 f-w-300" style="font-size: 35px;">ACTIVIDAD B</h2>
                                            <span class="text-white d-block">Conservación de Estructuras Metalicas y Civil de Casetas</span>
                                            <i class="fas fa-dollar-sign f-70 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACION POR ACTIVIDADES</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart3" class="ChartShadow BarChart barChart1" style="height:200px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACION POR MATERIALES</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart4" class="ChartShadow BarChart barChart" style="height:200px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card statistial-visit">
                                        <div class="card-header">
                                            <h5>TOTAL</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6><b>META CONTRACTUAL MENSUAL</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles(GOAL_B_MONTH);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>VALORIZACIÓN DICIEMBRE<br/><b>27 días</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles($valorization_2020['total_b_complete']);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>VALORIZACIÓN ENERO<br/><b>25 días</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles($valorization_01_21['total_b_complete']);?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ACTIVIDAD C -->
                                <div class="col-md-12 col-xl-12">
                                    <div class="card bitcoin-wallet" style="background-color:#2E2EFE;margin-bottom: 0px;">
                                        <div style="padding: 15px 20px !important;">
                                            <h2 class="text-white mb-2 f-w-300" style="font-size: 35px;">ACTIVIDAD C</h2>
                                            <span class="text-white d-block">Conservación de Gasfiteria de Casetas</span>
                                            <i class="fas fa-dollar-sign f-70 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACION POR ACTIVIDADES</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart5" class="ChartShadow BarChart barChart1" style="height:200px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>VALORIZACION POR MATERIALES</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="bar-chart6" class="ChartShadow BarChart barChart" style="height:200px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card statistial-visit">
                                        <div class="card-header">
                                            <h5>TOTAL</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6><b>META CONTRACTUAL MENSUAL</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles(GOAL_C_MONTH);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>VALORIZACIÓN DICIEMBRE<br/><b>27 días</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles($valorization_2020['total_c_complete']);?></label>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <div class="photo-table">
                                                    <h6>VALORIZACIÓN ENERO<br/><b>25 días</b></h6>
                                                    <div class="progress">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <label class="label text-white f-14 float-right" style="background-color:#2E2EFE"><?php echo format_number_moneda_soles($valorization_01_21['total_c_complete']);?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- dashboard-custom js -->
<script>
$(document).ready(function() {
    // VALORIZACION SEMANAL
    var chart = AmCharts.makeChart("bar-chart0", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "<?php echo $week_1_start." ".$week_1_end;?>",
            "value": <?php echo $week_1;?>,
            "color": ["#1de9b6", "#1dc4e9"]
        }, {
            "Average": "<?php echo $week_2_start." ".$week_2_end;?>",
            "value": <?php echo $week_2;?>,
            "color": ["#a389d4", "#899ed4"]
        }, {
            "Average": "<?php echo $week_3_start." ".$week_3_end;?>",
            "value": <?php echo $week_3;?>,
            "color": ["#2E2EFE", "#7281ff"]
        }, {
            "Average": "<?php echo $week_4_start." ".$week_4_end;?>",
            "value": <?php echo $week_4;?>,
            "color": ["#cc6600", "#ff8000"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
    // [ Bar Chart1 ] start
    var chart = AmCharts.makeChart("bar-chart1", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "Importe Contractual",
            "value": <?php echo GOAL_A_MONTH_ACT;?>,
            "color": ["#a389d4", "#899ed4"]
        }, {
            "Average": "Valorización Diciembre",
            "value": <?php echo $valorization_2020['total_activity_a'];?>,
            "color": ["#BCA9F5", "#BCA9F5"]
        }, {
            "Average": "Valorización Enero",
            "value": <?php echo $valorization_01_21['total_activity_a'];?>,
            "color": ["#BCA9F5", "#BCA9F5"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
    // [ Bar Chart2 ] Materiales
    var chart = AmCharts.makeChart("bar-chart2", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "Importe Contractual",
            "value": <?php echo GOAL_A_MONTH_MAT;?>,
            "color": ["#a389d4", "#899ed4"]
        }, {
            "Average": "Valorización Diciembre",
            "value": <?php echo $valorization_2020['material_a'];?>,
            "color": ["#BCA9F5", "#BCA9F5"]
        }, {
            "Average": "Valorización Enero",
            "value": <?php echo $valorization_01_21['material_a'];?>,
            "color": ["#BCA9F5", "#BCA9F5"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
    // [ Bar Chart3 ]
    var chart = AmCharts.makeChart("bar-chart3", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "Importe Contractual",
            "value": <?php echo GOAL_B_MONTH_ACT;?>,
            "color": ["#1de9b6", "#1dc4e9"]
        }, {
            "Average": "Valorización Diciembre",
            "value": <?php echo $valorization_2020['total_system_b'];?>,
            "color": ["#58FAF4", "#58FAF4"]
        }, {
            "Average": "Valorización Enero",
            "value": <?php echo $valorization_01_21['total_system_b'];?>,
            "color": ["#58FAF4", "#58FAF4"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
    // [ chart-percent ] start
    // [ Bar Chart4 ]
    var chart = AmCharts.makeChart("bar-chart4", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "Importe Contractual",
            "value": <?php echo GOAL_B_MONTH_MAT;?>,
            "color": ["#1de9b6", "#1dc4e9"]
        }, {
            "Average": "Valorización Diciembre",
            "value": <?php echo $valorization_2020['material_b'];?>,
            "color": ["#58FAF4", "#58FAF4"]
        }, {
            "Average": "Valorización Enero",
            "value": <?php echo $valorization_01_21['material_b'];?>,
            "color": ["#58FAF4", "#58FAF4"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
    // [ Bar Chart5 ]
    var chart = AmCharts.makeChart("bar-chart5", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "Importe Contractual",
            "value": <?php echo GOAL_C_MONTH_ACT;?>,
            "color": ["#2E2EFE", "#2E2EFE"]
        }, {
            "Average": "Valorización Diciembre",
            "value": <?php echo $valorization_2020['total_system_c'];?>,
            "color": ["#049df5", "#049df5"]
        }, {
            "Average": "Valorización Enero",
            "value": <?php echo $valorization_01_21['total_system_c'];?>,
            "color": ["#049df5", "#049049df5df5"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
     // [ Bar Chart6 ]
     var chart = AmCharts.makeChart("bar-chart6", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "Average": "Importe Contractual",
            "value": <?php echo GOAL_C_MONTH_MAT;?>,
            "color": ["#2E2EFE", "#2E2EFE"]
        }, {
            "Average": "Valorización Diciembre",
            "value": <?php echo $valorization_2020['material_c'];?>,
            "color": ["#049df5", "#049df5"]
        }, {
            "Average": "Valorización Enero",
            "value": <?php echo $valorization_01_21['material_c'];?>,
            "color": ["#04a9f5", "#049df5"]
        }],
        "valueAxes": [{
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "fontSize": 0,
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "labelPosition": "top",
            "labelText": "[[value]]",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "value"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Average",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
        }
    });
});
</script>