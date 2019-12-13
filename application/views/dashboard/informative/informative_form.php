<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<link href="<?php echo site_url();?>static/cms/plugins/tags/chosen.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/plugins/tags/chosen.jquery.js"></script>
<script src="<?php echo site_url();?>static/cms/js/informative.js"></script>
<script src="<?php echo site_url();?>static/cms/plugins/ckeditor/ckeditor.js"></script>
<!-- main content -->

<form id="customer-form" name="customer-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/informativos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Mensajes Informativos</a>
                                </div>
                        </div>
                </div>
                <!--GET CUSTOMER ID-->
                <input type="hidden" name="otros_id" id="otros_id" value="<?php echo isset($obj_informative)?$obj_informative->otros_id:"";?>">
              
                <div class="well nomargin" style="">
                    <div class="inner">
                        <strong>Página:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="page" id="page">
                                <option value="1" <?php if(isset($obj_informative)){if($obj_informative->page == 1){echo "selected";}}else{echo "";}?>>Dashboard - Home</option>
                                <option value="2" <?php if(isset($obj_informative)){if($obj_informative->page == 2){echo "selected";}}else{echo "";}?>>Mi Perfil</option>
                                <option value="3" <?php if(isset($obj_informative)){if($obj_informative->page == 3){echo "selected";}}else{echo "";}?>>Productos</option>
                                <option value="4" <?php if(isset($obj_informative)){if($obj_informative->page == 4){echo "selected";}}else{echo "";}?>>Upgrade</option>
                                <option value="5" <?php if(isset($obj_informative)){if($obj_informative->page == 5){echo "selected";}}else{echo "";}?>>Unilevel</option>
                                <option value="6" <?php if(isset($obj_informative)){if($obj_informative->page == 6){echo "selected";}}else{echo "";}?>>Mis Comisiones</option>
                                <option value="7" <?php if(isset($obj_informative)){if($obj_informative->page == 7){echo "selected";}}else{echo "";}?>>Billetera</option>
                                <option value="8" <?php if(isset($obj_informative)){if($obj_informative->page == 8){echo "selected";}}else{echo "";}?>>Soporte</option>
                                <option value="9" <?php if(isset($obj_informative)){if($obj_informative->page == 9){echo "selected";}}else{echo "";}?>>Cobros</option>
                            </select>
                    </div>
                </div>
              <br><br>
              <input type="text" id="title" name="title" value="<?php echo isset($obj_informative->title)?$obj_informative->title:"";?>" class="input-xlarge-fluid" placeholder="Título">
              <br><br>
              <textarea class="input-large" id="text" name="text" rows="5" style="width:97%;height:180px;" placeholder="Contenido"><?php echo isset($obj_informative->text)?$obj_informative->text:"";?></textarea>
              <br><br>
              <select name="position" id="position">
                <option value="1" <?php if(isset($obj_informative->position) == 1){echo "selected";}else{echo "";}?>>Principal</option>
                <option value="2" <?php if(isset($obj_informative->position) == 2){echo "selected";}else{echo "";}?>>Secundario</option>
              </select>
              <br><br>
                    <div class="well nomargin" style="width: 200px;">
                        <div class="inner">
                            <strong>Estado para el sistema:</strong>
                            <select name="active" id="active">
                                        <option value="">[ Seleccionar ]</option>
                                        <option value="0" <?php if(isset($obj_informative)){
                                            if($obj_informative->active == 0){ echo "selected";}
                                        }else{echo "";} ?>>No Publicar</option>
                                        <option value="1" <?php if(isset($obj_informative)){
                                            if($obj_informative->active == 1){ echo "selected";}
                                        }else{echo "";} ?>>Publicar</option>
                            </select>

                        </div>
                    </div>
                <br><br>
                <br><br>
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_informative();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
