<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Formulario de Catalogo</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/panel'; ?>">
                                            <span class="pcoded-micon"><i data-feather="home"></i></span>
                                        </a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo site_url() . 'dashboard/catalogo'; ?>">Listado de Catalogo</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Catalogo</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Datos</h5>
                                    </div>
                                    <div class="card-body">
                                        <form name="form-validate" enctype="multipart/form-data" method="post" action="javascript:void(0);" onsubmit="validate();">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <?php if (isset($obj_catalog)) { ?>
                                                        <div class="form-group">
                                                            <label>ID</label>
                                                            <input class="form-control" type="text" value="<?php echo isset($obj_catalog->catalog_id) ? $obj_catalog->catalog_id : ""; ?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
                                                            <input type="hidden" id="catalog_id" name="catalog_id" value="<?php echo isset($obj_catalog->catalog_id) ? $obj_catalog->catalog_id : ""; ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input class="form-control" type="text" id="name" name="name" value="<?php echo isset($obj_catalog->name) ? $obj_catalog->name : ""; ?>" class="input-xlarge-fluid" placeholder="Titulo" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Precio Eliminado</label>
                                                        <input class="form-control" type="text" id="price_del" name="price_del" value="<?php echo isset($obj_catalog->price_del) ? $obj_catalog->price_del : ""; ?>" class="input-xlarge-fluid" placeholder="Precio Marketing">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Precio</label>
                                                        <input class="form-control" type="text" id="price" name="price" value="<?php echo isset($obj_catalog->price) ? $obj_catalog->price : ""; ?>" class="input-xlarge-fluid" placeholder="Precio">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea id='description' name='description'><?php echo isset($obj_catalog->description) ? $obj_catalog->description : ""; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Enlace Vídeo</b><br/> VIMEO - <b>(https://vimeo.com/12149946)</b><br/>
                                                                    Youtube - <b>(https://youtu.be/3uUJCvdbH3k)</b></label>
                                                        <input class="form-control" type="text" id="video" name="video" value="<?php echo isset($obj_catalog->video) ? $obj_catalog->video : ""; ?>" class="input-xlarge-fluid" placeholder="Ingrese Enlace Vimeo / Youtube">
                                                    </div>
                                                    <?php if (isset($obj_catalog->img4) && $obj_catalog->img4 != null) { ?>
                                                        <div class="form-group">
                                                            <label>Banner Principal Landing</label><br/>
                                                            <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img4"; ?>' width="100" />
                                                            <input class="form-control" type="hidden" name="img_5" id="img_5" value="<?php echo isset($obj_catalog) ? $obj_catalog->img4 : ""; ?>">
                                                        </div>
                                                        <button class="btn btn-danger" type="reset" onclick="delete_img('<?php echo $obj_catalog->catalog_id;?>', '<?php echo 'img4';?>');"><i data-feather="trash-2"></i> Eliminar</button>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label>Primera Imagen Landing - Portada (Tamaño 1024 x 469)</label>
                                                        <div class="custom-file">
                                                        <input type="file" name="image_file4" id="image_file4" class="custom-file-input" onchange="upload_img4();">
                                                            <label id="label_img4" class="custom-file-label invalid">Elegir archivos...</label>
                                                            <div id="respose_img4"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label>Bonificación N°1</label>
                                                            <input class="form-control" type="text" step="any" id="bono_n1" name="bono_n1" value="<?php echo isset($obj_catalog->bono_n1) ? $obj_catalog->bono_n1 : ""; ?>" class="input-xlarge-fluid" placeholder="Bonificación N°1">
                                                        </div>    
                                                        <div class="form-group">
                                                            <label>Bonificación N°2</label>
                                                            <input class="form-control" type="text" step="any" id="bono_n2" name="bono_n2" value="<?php echo isset($obj_catalog->bono_n2) ? $obj_catalog->bono_n2 : ""; ?>" class="input-xlarge-fluid" placeholder="Bonificación N°2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bonificación N°3</label>
                                                            <input class="form-control" type="text" step="any" id="bono_n3" name="bono_n3" value="<?php echo isset($obj_catalog->bono_n3) ? $obj_catalog->bono_n3 : ""; ?>" class="input-xlarge-fluid" placeholder="Bonificación N°3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <div class="form-group">
                                                            <label>Bonificación N°4</label>
                                                            <input class="form-control" type="text" step="any" id="bono_n4" name="bono_n4" value="<?php echo isset($obj_catalog->bono_n4) ? $obj_catalog->bono_n4 : ""; ?>" class="input-xlarge-fluid" placeholder="Bonificación N°4">
                                                        </div>    
                                                        <div class="form-group">
                                                            <label>Bonificación N°5</label>
                                                            <input class="form-control" type="text" step="any" id="bono_n5" name="bono_n5" value="<?php echo isset($obj_catalog->bono_n5) ? $obj_catalog->bono_n5 : ""; ?>" class="input-xlarge-fluid" placeholder="Bonificación N°5">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php if (isset($obj_catalog->img) && $obj_catalog->img != null) { ?>
                                                        <div class="form-group">
                                                            <label>Segunda Imagen Landing</label><br/>
                                                            <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img"; ?>' width="100" />
                                                            <input class="form-control" type="hidden" name="img_2" id="img_2" value="<?php echo isset($obj_catalog) ? $obj_catalog->img : ""; ?>">
                                                        </div>
                                                        <button class="btn btn-danger" type="reset" onclick="delete_img('<?php echo $obj_catalog->catalog_id;?>', '<?php echo 'img';?>');"><i data-feather="trash-2"></i> Eliminar</button>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label>Segunda Imagen Landing (Tamaño 1024 x 469)</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image_file" id="image_file" class="custom-file-input" onchange="upload_img();" <?php echo isset($obj_catalog->img) ? "" : ""; ?> >
                                                            <label id="label_img" class="custom-file-label invalid">Elegir archivos...</label>
                                                            <div id="respose_img"></div>
                                                        </div>
                                                    </div>

                                                    <?php if (isset($obj_catalog->img2) && $obj_catalog->img2 != null) { ?>
                                                        <div class="form-group">
                                                            <label>Tercera Imagen - Certificado</label><br/>
                                                            <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img2"; ?>' width="100" />
                                                            <input class="form-control" type="hidden" name="img_3" id="img_3" value="<?php echo isset($obj_catalog) ? $obj_catalog->img2 : ""; ?>">
                                                        </div>
                                                        <button class="btn btn-danger" type="reset" onclick="delete_img('<?php echo $obj_catalog->catalog_id;?>', '<?php echo 'img2';?>');"><i data-feather="trash-2"></i> Eliminar</button>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label>Tercera Imagen - Certificado (Tamaño 1024 x 469)</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image_file2" id="image_file2" class="custom-file-input" onchange="upload_img2();" <?php echo isset($obj_catalog->img2) ? "" : ""; ?>>
                                                            <label id="label_img2" class="custom-file-label invalid">Elegir archivos...</label>
                                                            <div id="respose_img2"></div>
                                                        </div>
                                                    </div>
                                                    <?php if (isset($obj_catalog->img3) && $obj_catalog->img3 != null) { ?>
                                                        <div class="form-group">
                                                            <label>Imagen Interna del Backoffice / Landing Derecha</label><br/>
                                                            <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' width="100" />
                                                            <input class="form-control" type="hidden" name="img_4" id="img_4" value="<?php echo isset($obj_catalog) ? $obj_catalog->img3 : ""; ?>">
                                                        </div>
                                                        <button class="btn btn-danger" type="reset" onclick="delete_img('<?php echo $obj_catalog->catalog_id;?>', '<?php echo 'img3';?>');"><i data-feather="trash-2"></i> Eliminar</button>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label><b>Imagen Interna del Backoffice / Landing Derecha</b></label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image_file3" id="image_file3" class="custom-file-input" onchange="upload_img3();" <?php echo isset($obj_catalog->img3) ? "" : ""; ?>>
                                                            <label id="label_img3" class="custom-file-label invalid">Elegir archivos...</label>
                                                            <div id="respose_img3"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Industria</label>
                                                        <select name="industry_id" id="industry_id" class="disable-select form-control" data-live-search="true" onchange="get_sub_industry(this.value)">
                                                            <option value="">[ Seleccionar ]</option>
                                                            <?php foreach ($obj_industry as $value): ?>
                                                                <option value="<?php echo $value->id; ?>"
                                                                <?php
                                                                if (isset($obj_catalog->industry_id)) {
                                                                    if ($obj_catalog->industry_id == $value->id) {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><?php echo $value->name; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Sub Industria</label>
                                                        <?php 
                                                        if(isset($obj_catalog)){ ?>
                                                            <select name="sub_industry_id" id="sub_industry_id" class="disable-select form-control" data-live-search="true">
                                                                <option value="">[ Seleccionar Sub Industria]</option>
                                                                <?php foreach ($obj_sub_industry as $value): ?>
                                                                    <option value="<?php echo $value->id; ?>"
                                                                    <?php
                                                                    if (isset($obj_catalog->sub_industry_id)) {
                                                                        if ($obj_catalog->sub_industry_id == $value->id) {
                                                                            echo "selected";
                                                                        }
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                    ?>><?php echo $value->name; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        <?php  }else{ ?>
                                                            <select name="sub_industry_id" id="sub_industry_id" class="disable-select form-control"></select>    
                                                        <?php } ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Categoría</label>
                                                        <select name="category_id" id="category_id" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <?php foreach ($obj_category as $value): ?>
                                                                <option value="<?php echo $value->category_id; ?>"
                                                                <?php
                                                                if (isset($obj_catalog->category_id)) {
                                                                    if ($obj_catalog->category_id == $value->category_id) {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><?php echo $value->name; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Sub Categoría</label>
                                                        <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                            <option value="">[ Seleccionar Sub Categoría ]</option>
                                                            <?php foreach ($obj_sub_category as $value): ?>
                                                                <option value="<?php echo $value->sub_category_id; ?>"
                                                                <?php
                                                                if (isset($obj_catalog->sub_category_id)) {
                                                                    if ($obj_catalog->sub_category_id == $value->sub_category_id) {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>><?php echo $value->name; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputState">Granel (Kg)</label>
                                                        <select name="granel" id="granel" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <option value="1" <?php
                                                            if (isset($obj_catalog)) {
                                                                if ($obj_catalog->granel == 1) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>Si</option>
                                                            <option value="0" <?php
                                                            if (isset($obj_catalog)) {
                                                                if ($obj_catalog->granel == 0) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <input class="form-control" type="number" id="stock" name="stock" value="<?php echo isset($obj_catalog->stock) ? $obj_catalog->stock : ""; ?>" class="input-xlarge-fluid" placeholder="Stock del Producto" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Enlace Hot Link</label>
                                                        <input class="form-control" type="text" id="hot_link" name="hot_link" value="<?php echo isset($obj_catalog->hot_link) ? $obj_catalog->hot_link : ""; ?>" class="input-xlarge-fluid" placeholder="Enlace de Pago Hot Link">
                                                    </div>        
                                                    
                                                    <div class="form-group">
                                                        <label for="inputState">Estado</label>
                                                        <select name="active" id="active" class="form-control" required>
                                                            <option value="">[ Seleccionar ]</option>
                                                            <option value="1" <?php
                                                            if (isset($obj_catalog)) {
                                                                if ($obj_catalog->active == 1) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>Activo</option>
                                                            <option value="0" <?php
                                                            if (isset($obj_catalog)) {
                                                                if ($obj_catalog->active == 0) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?>>Inactivo</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
                                            <button class="btn btn-danger" type="reset" onclick="cancel_catalog();">Cancelar</button>                    
                                        </form>
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
<script src="<?php echo site_url() . 'static/cms/js/catalog.js' ?>"></script>
  <script>
  tinymce.init({
  selector: 'textarea#description',
  height: 600,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>



