script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 100%;">
                                            <a class="brand">LISTADO DETALLE DE COBRO</a>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100%;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>NOMBRE COMISIÓN</th>
                                <th>MONTO</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum_normal = "";?>
                            <?php foreach ($obj_pay_commission as $value): ?>
                            <?php $sum_normal += $value->amount;?>
                            <tr>
                                <td align="center"><?php echo $value->commissions_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center"><?php echo $value->name;?></td>
                                <td align="center"><b><?php echo $value->amount;?></b></td>
                                <td align="center">
                                    <?php if (($value->status_value == 1) || ($value->status_value == 2) ){
                                        $valor = "Abonado";
                                        $stilo = "label label-default";
                                    }elseif($value->status_value == 3){
                                        $valor = "Es espera de procesar";
                                        $stilo = "label label-warning";
                                    }elseif($value->status_value == 4){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor;?></span>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                                
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="center"><b>TOTAL</b></td>
                            <td align="center"><a class="pending"><b><?php echo $sum_normal;?></a></b></td>
                            <td></td>
                        </tr>
                    </table>
            </div>
           <!--</form>-->         
        </div>
    </div>
</div><!-- main content -->
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
    } );
} );
</script>
<script src="static/cms/js/cobros.js"></script>