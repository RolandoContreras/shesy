<div class="content-w">
  <ul class="breadcrumb">
      <li class="breadcrumb-item"> <a href="<?php echo site_url().'backoffice';?>">Tablero</a> </li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <style>
        .flag-materiais { width: 20px; border-radius: 2px; margin-top: -2px; margin-right: 5px; } .titulo-materiais { margin-top: 10px !important; margin-bottom: 10px !important; font-weight: 600 !important; padding: 0px 10px 0px 10px; } .pad-materiais { padding: 6px !important; } .miniatura-materiais { }
      </style>
      <div class="element-wrapper">
        <h6 class="element-header">Material de Apoyo</h6>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="element-info-with-icon">
                    <div class="element-info-icon">
                      <div class="os-icon os-icon-edit-1"></div>
                    </div>
                    <div class="element-info-text">
                      <h5 class="element-inner-header"> Información de Producto </h5>
                    </div>
                  </div>
                  <div class="body" style="margin-top: 30px;">
                    <div id="show_wallet_div">
                        <form class="form-horizontal" onsubmit="show_information();" enctype="multipart/form-data" action="javascript:void(0);"> 
                            <div class="form-group"> 
                                <label class="control-label"> Ingrese código de producto </label> 
                                <input type="text" name="catalog_id" id="catalog_id" class="form-control" placeholder="Ingrese Código">
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12" align="right"> 
                                  <button class="btn btn-success" type="submit" style="margin-top: 30px;">Buscar <i class="fa fa-search"></i></button>        
                              </div>
                            </div>
                          </form>
                    </div> 
                  </div>
            </div>
            <div class="col-md-6">
                <div class="element-box" id="show_information" style="display:none;">
                    <div id="res">
                        <p>Sin Información</p>
                        <p>Código no valido</p>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/images/imagen_presentacion.jpg';?>">
                    <p class="titulo-materiais">[ES] Presentación de negocios</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/presentacion_embajada_fk.pptx';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/files/fondo1_min.jpg';?>">
                    <p class="titulo-materiais">Logo Fondo Fuego</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/fondo1.jpg';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/files/fondo2_min.jpg';?>">
                    <p class="titulo-materiais">Logo Dorado</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/fondo2.jpg';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/files/fondo3_min.jpg';?>">
                    <p class="titulo-materiais">Logo WallPaper</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/fondo3.jpg';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/files/logo-azul_min.png';?>">
                    <p class="titulo-materiais">Logo Azul</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/logo-azul.png';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/files/logo_dorado_min.png';?>">
                    <p class="titulo-materiais">Logo Dorado</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/logo-dorado.png';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="element-box p-2">
                <div class="card">
                  <div class="body pad-materiais" align="center"> 
                      <img class="img-fluid img-thumbnail" src="<?php echo site_url().'static/backoffice/files/logo_dorado_min2.png';?>">
                    <p class="titulo-materiais">Logo Dorado 2</p> 
                    <a href="<?php echo site_url().'static/backoffice/files/logo-dorado2.png';?>" target="_blank" class="btn btn-primary btn-sm btn round btn-simple"> Hacer Descarga </a> 
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
<script src="<?php echo site_url(); ?>static/catalog/js/materiales.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>