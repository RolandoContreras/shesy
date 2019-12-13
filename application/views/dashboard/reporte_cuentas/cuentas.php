<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>


<div class="row-fluid">
    <div class="span6">
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Vista Global de Cuentas</a>
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
                                                    <td><a>Total Cuentas Creadas</a></td>
                                                    <td><b><?php echo $obj_customer;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Total Cuentas Pagadas</a></td>
                                                <td><b><?php echo $obj_pagados;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Total Cuentas Financiadas</a></td> 
                                                <td><b><?php echo $obj_financiado;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
                
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Cuentas Activos e Inactivos</a>
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
                                               <td><a>Cuentas Activas</a></td>
                                                <td><b><?php echo $obj_activos;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Cuentas Inactivas</a></td>
                                                    <td><b><?php echo $obj_inactivos;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Ratio de Asociados Haciendo la Red</a>
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
                                               <td><a>Ratio de Asociados</a></td>
                                                <td><b><?php echo $ratio;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Promedio de Asociados Activos</a></td>
                                                    <td><b><?php echo $promedio;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Porcentaje de Retención de  Asociados Activos</a></td>
                                                    <td><b><?php echo $porcentaje_retencion."%";?></b></td>
                                            </tr>
                                            
                                            <tr>
                                                    <td><a>Promedio de Asociados Pagados</a></td>
                                                    <td><b><?php echo $promedio_pagado;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Porcentaje de Retención de  Asociados Pagados</a></td>
                                                    <td><b><?php echo $porcentaje_retencion_pagado."%";?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Promedio Total de Asociados </a></td>
                                                    <td><b><?php echo $promedio_total;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Porcentaje de Retención Total de  Asociados</a></td>
                                                    <td><b><?php echo $porcentaje_retencion_total."%";?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        
              <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Medias Absolutas</a>
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
                                               <td><a>Media de Promedio </a></td>
                                                <td><b><?php echo $media_promedio;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Media de Porcentaje de Retención</a></td>
                                                    <td><b><?php echo $media_porcentaje."%";?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        
    </div>

        <div class="span6">
                  <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Total Tipo de Cuenta</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>TIPO</th>
                                                    <th>PRECIO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a>Basic</a></td>
                                                    <td><a>$100</a></td>
                                                    <td><b><?php echo $obj_total_account->basic;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Platinium</a></td>
                                                <td><a>$250</a></td>
                                                <td><b><?php echo $obj_total_account->platinium;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Gold</a></td> 
                                                <td><a>$500</a></td>
                                                <td><b><?php echo $obj_total_account->gold;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Vip</a></td> 
                                                <td><a>$1000</a></td>
                                                <td><b><?php echo $obj_total_account->vip;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Elite</a></td> 
                                                <td><a>$5000</a></td>
                                                <td><b><?php echo $obj_total_account->elite;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Super Vip</a></td> 
                                                <td><a>$12000</a></td>
                                                <td><b><?php echo $obj_total_account->super_vip;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Master</a></td> 
                                                <td><a>$35000</a></td> 
                                                <td><b><?php echo $obj_total_account->master;?></b></td>
                                            </tr>
                                             <tr>
                                                    <td><a>Membership</a></td>
                                                    <td><a>$0</a></td>
                                                    <td><b><?php echo $obj_total_account->membership;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
            
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Total Tipo de Cuenta Activas</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>TIPO</th>
                                                    <th>PRECIO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a>Basic</a></td>
                                                    <td><a>$100</a></td>
                                                    <td><b><?php echo $obj_total_account->basic_active;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Platinium</a></td>
                                                <td><a>$250</a></td>
                                                <td><b><?php echo $obj_total_account->platinium_active;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Gold</a></td> 
                                                <td><a>$500</a></td>
                                                <td><b><?php echo $obj_total_account->gold_active;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Vip</a></td> 
                                                <td><a>$1000</a></td>
                                                <td><b><?php echo $obj_total_account->vip_active;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Elite</a></td> 
                                                <td><a>$5000</a></td>
                                                <td><b><?php echo $obj_total_account->elite_active;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Super Vip</a></td> 
                                                <td><a>$12000</a></td>
                                                <td><b><?php echo $obj_total_account->super_vip_active;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Master</a></td> 
                                                <td><a>$35000</a></td> 
                                                <td><b><?php echo $obj_total_account->master_active;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
            
        </div>
</div>
<script src="static/cms/js/panel.js"></script>