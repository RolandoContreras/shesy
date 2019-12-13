<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container" style="width: 110%;">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 110%;">
                                            <a class="brand">LISTADO DE MENSAJES</a>
                                            <button class="btn btn-small" onclick="new_informative();"><i class="fa fa-plus-square"></i> Nuevo</button>
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
                                <th>Página</th>
                                <th>Título</th>
                                <th>Posición</th>
                                <th>Contenido</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($obj_messages_informative as $value): ?>
                                <td align="center"><b><?php echo $value->otros_id;?></b></td>
                                <td align="center">
                                    <?php
                                        switch ($value->page) {
                                            case 1:
                                                $text = "Dashboard";
                                                $style = "label label-info";
                                                break;
                                            case 2:
                                                $text = "Mi Perfil";
                                                $style = "label label-info";
                                                break;
                                            case 3:
                                                $text = "Productos";
                                                $style = "label label-info";
                                                break;
                                            case 3:
                                                $text = "Productos";
                                                $style = "label label-info";
                                                break;
                                            case 4:
                                                $text = "Upgrade";
                                                $style = "label label-info";
                                                break;
                                            case 5:
                                                $text = "Unilevel";
                                                $style = "label label-info";
                                                break;
                                            case 6:
                                                $text = "Mis Comisiones";
                                                $style = "label label-info";
                                                break;
                                            case 7:
                                                $text = "Billetera";
                                                $style = "label label-info";
                                                break;
                                            case 8:
                                                $text = "Soporte";
                                                $style = "label label-info";
                                                break;
                                            case 9:
                                                $text = "Cobros";
                                                $style = "label label-info";
                                                break;
                                            
                                        }
                                    ?>
                                    <span class="<?php echo $style;?>"><?php echo $text;?></span>
                                </td>
                                <td align="center"><b><?php echo $value->title;?></b></td>
                                <td align="center"><?php echo $value->position;?></td>
                                <td align="center"><?php echo $value->text;?></td>
                                <td align="center">
                                    <?php if ($value->active == 0) {
                                        $valor = "No Publicado";
                                        $stilo = "label label-important";
                                    }else{
                                        $valor = "Publicado";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                <button class="btn btn-small" onclick="edit_informative('<?php echo $value->otros_id;?>');"><i class="fa fa-pencil-square-o"></i> Editar</button><button class="btn btn-small" onclick="delete_informative('<?php echo $value->otros_id;?>');"><i class="fa fa-trash-o"></i> Eliminar</button>
                                          </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
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
         "order": [[ 0, "asc" ]]
    } );
} );
</script>
<script src="static/cms/js/informative.js"></script>