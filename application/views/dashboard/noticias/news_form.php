<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/news.js"></script>
<form method="post" id="upload_form" enctype="multipart/form-data" action="<?php echo site_url()."dashboard/noticias/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Noticias</a>
                                </div>
                        </div>
                </div>
              <input type="hidden" name="news_id" id="franchise_id" value="<?php echo isset($obj_news)?$obj_news->news_id:"";?>">
              <strong>Título:</strong><br>              
              <input type="text" id="title" name="title" value="<?php echo isset($obj_news->title)?$obj_news->title:"";?>" class="input-xlarge-fluid" placeholder="Título">
              <br><br>
              <strong>Fecha:</strong><br>   
              <input type="text" id="date" name="date" value="<?php echo isset($obj_news->date)?formato_fecha_barras($obj_news->date):"";?>" class="input-xlarge-fluid" placeholder="dd/mm/yy">
              <br><br>
              <?php 
              if(isset($obj_news->news_id)){ ?>
              <img src='<?php echo site_url()."static/backoffice/images/new/$obj_news->img";?>' width="100" />
              <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_news)?$obj_news->img:"";?>">
              <br><br>
              <?php } ?>
              
              <strong>Imagen:</strong><br>   
              <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="status_value" id="status_value">
                         <option value="1" <?php echo isset($obj_news->status_value) == 1 ? "selected":"";?>>Activo</option>
                         <option value="0" <?php echo isset($obj_news->status_value) == 0 ? "selected":"";?>>Inactivo</option>
                  </select>
                  </div>
              </div>
              <div id="uploaded_image"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_news();">Cancelar</button>  
                    <button type="submit" name="upload" id="upload" class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
