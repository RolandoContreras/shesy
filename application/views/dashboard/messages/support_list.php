<script src="static/cms/js/core/bootstrap-modal.js"></script>
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
                                    <div class="container" style="width: auto;">
                                            <a class="brand">RANGOS</a>
                                    </div>
                            </div>
                    </div>
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FECHA</th>
                                <th>USUARIO</th>
                                <th>NOMBRE</th>
                                <th>ASUNTO</th>
                                <th>MENSAJE</th>
                                <th>IMAGEN</th>
                                <th>RESPUESTA</th>
                                <th>ESTADO</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        foreach ($obj_message as $key => $value):?>
                        <tr>
                            <th><?php echo $value->messages_id;?></th>
                            <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                            <td align="center"><b><?php echo $value->username;?></b></td>
                            <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                            <td align="center"><?php echo $value->subject;?></td>
                            <td align="center"><?php echo $value->messages;?></td>
                            <td align="center">
                                <img src="<?php echo site_url()."static/backoffice/images/soporte/$value->img";?>" alt="<?php echo $value->img;?>">
                                <div class="operation">
                                        <div class="btn-group" style="display:none;">
                                          <a class="btn btn-small" data-toggle="modal" href="<?php echo "#".$key;?>"><i class="fa fa-eye"></i> Ver</a>
                                        </div>
                                </div>
                                
                                
                                <div id="<?php echo $key;?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow:auto;">
                                  <div class="modal-dialog modal-lg">
                                       <center>
                                       <img style="margin:auto;" src="<?php echo site_url().'static/backoffice/images/soporte/'.$value->img;?>" height="800"/>
                                       </center>
                                  </div>
                                </div>
                                
                            </td>
                            <td align="center">
                                <textarea class="form-control" name="message<?php echo $key;?>" id="message<?php echo $key;?>" placeholder="Mensaje" style="height: 200px;width: 100% !important" placeholder="Message body"><?php echo ($value->answer != "") ? $value->answer : "";?></textarea>
                            </td>
                            <td align="center">
                                <?php if ($value->active == 1) {
                                    $valor = "Abierto";
                                    $stilo = "label label-warning";
                                }else{
                                    $valor = "Cerrado";
                                    $stilo = "label label-success";
                                } ?>
                                <span class="<?php echo $stilo;?>"><?php echo $valor;?></span>
                            </td>
                            <td align="center">
                                <div class="operation">
                                    <div class="btn-group">
                                       <button class="btn btn-small" onclick="actualizar_soporte('<?php echo $value->messages_id;?>','<?php echo "message".$key;?>','<?php echo $value->customer_id;?>');">Actualizar</button>
                                       <a class="btn btn-small" data-toggle="modal" href="<?php echo "#".$key;?>"><i class="fa fa-eye"></i> Ver</a>
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
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="<?php echo site_url();?>static/cms/js/support.js"></script>