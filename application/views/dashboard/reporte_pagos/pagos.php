<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>


<div class="row-fluid">
    <div class="span12">
      <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Vista Global de Pagos</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CONCEPTO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a>Total de Ingresos</a></td>
                                                    <td><b><?php echo $total_ingreso;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Total de Pago</a></td>
                                                <td><b><?php echo $total_pagado;?></b></td>
                                            </tr>
<!--                                            <tr>
                                                <td><a>Total pendientes de Pagos</a></td> 
                                                <td><b><?php echo $total_pendiente;?></b></td>
                                            </tr>-->
                                            <tr>
                                                <td><a>Diferencial</a></td> 
                                                <td><b><?php echo $decifit;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
          </div>
    </div>
    </div>
    
    <div class="row-fluid">
      <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Gastos Externos</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CONCEPTO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a>Perdida en pagos Líderes Expansión</a></td>
                                                    <td><b>$7,000</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Pago Hosting y Dominio</a></td>
                                                <td><b>$550</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Herramientas de Marketing</a></td> 
                                                <td><b>$1,125</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Evento de Presentación (Hoteles)</a></td> 
                                                <td><b>$600</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Webinar (Sala Online)</a></td> 
                                                <td><b>$500</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Cenas/Almuerzos Líderes</a></td> 
                                                <td><b>$1,100</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Financiamientos Viajes de Líderes</a></td> 
                                                <td><b>$1,800</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Pago World Travel Vacation</a></td> 
                                                <td><b>$3,500</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Asesoramientos</a></td> 
                                                <td><b>$800</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Viajes y hospedaje Interior del País</a></td> 
                                                <td><b>$400</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Constitución de Bitshare</a></td> 
                                                <td><b>$300</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Equipo de Trabajo - Corporativo</a></td> 
                                                <td><b>$10,500</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Perdida en Intento de Diversificación</a></td> 
                                                <td><b>$10,000</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Carlos Gomez</a></td> 
                                                <td><b>$1,300</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Sueldos Corporativo (6 meses)</a></td> 
                                                <td><b>$17,000</b></td>
                                            </tr>
                                            <tr>
                                                <td><a>TOTAL</a></td> 
                                                <td><b>$39,475</b></td>
                                            </tr>
                                            
                                    </tbody>
                            </table>
          </div>
    </div>
<script src="static/cms/js/panel.js"></script>