<div class="col-md-9 col-sm-12">
<div class="">
   <div class="">
      <a href="<?php echo site_url()."tienda";?>" class="back-to-account" rel="nofollow"> <i class="lnricons-arrow-left"></i> Regresar</a>
      <div id="stm_lms_manage_course" class="wpcfto-box">
         <div class="container">
            <div class="row">
               <form action="javascript:void(0);" name="form_catalog" method="post" onsubmit="save_catalog();" enctype="multipart/form-data">
               <input type="hidden" name="catalog_id" value="<?php echo isset($obj_catalog->catalog_id) ? $obj_catalog->catalog_id : ""; ?>"/>
               <input type="hidden" name="customer_id" value="<?php echo $obj_profile->customer_id;?>"/>
               <div class="col-md-9">
                     <!---->
                     <div class="stm_lms_manage_course__form">
                        <div class="stm_lms_manage_course__add">
                           <div class="form-group">
                                <h1 class="stm_lms_course__title stm_lms_phantom">Nombre Aquí...</h1>
                                 <input type="text" name="name" value="<?php echo isset($obj_catalog->name) ? $obj_catalog->name : ""; ?>" class="form-control" placeholder="Ingresa Nombre de la empresa" required>
                           </div>
                        </div>
                     </div>
                  <div class="single_product_after_title">
                     <div class="clearfix">
                        <div class=" xs-product-cats-left">
                           <div class="stm_lms_manage_course stm_lms_manage_course__text stm_lms_manage_course__category stm_lms_wizard_step_2">
                              <div class="meta-unit categories clearfix">
                                 <i class="fa-icon-stm_icon_category secondary_color"></i>
                                 <h4>Categorías</h4>
                                    <!---->
                                    <div class="stm_lms_samples_categories">
                                       <div class="stm_lms_manage_course__form">
                                          <div class="stm_lms_manage_course__add">
                                             <select name="category_id" class="form-control disable-select" required>
                                                <option value="" label="Seleccionar Categoría"> Seleccionar Categoría</option>
                                                <?php 
                                                foreach($obj_category as $value){ ?>
                                                      <option value="<?php echo $value->category_id;?>" <?php
                                                         if (isset($obj_catalog->category_id)) {
                                                            if ($obj_catalog->category_id == $value->category_id) {
                                                               echo "selected";
                                                            }
                                                         } else {
                                                            echo "";
                                                         }
                                                         ?> label="<?php echo $value->name;?>"><?php echo $value->name;?></option>    
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <h4>Enlace de Video (Vimeo o youtube)</h4>
                     <input type="text" name="video" value="<?php echo isset($obj_catalog->video) ? $obj_catalog->video : ""; ?>" placeholder="Ingresar Enlace*"  class="form-control">
                  </div>
                  <div class="form-group">
                     <textarea id='description' name='description'><?php echo isset($obj_catalog->description) ? $obj_catalog->description : ""; ?></textarea>
                  </div>   
                  <?php if (isset($obj_catalog->img3) && $obj_catalog->img3 != null) { ?>
                        <div class="form-group">
                           <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img3"; ?>' width="100" />
                           <input class="form-control" type="hidden" name="img_4" id="img_4" value="<?php echo isset($obj_catalog) ? $obj_catalog->img3 : ""; ?>">
                        </div>
                     <?php } ?>
                  <div class="form-group">
                     <h4>Imagen Portada (Tamaño 1024 x 469)</h4>
                     <input type="file" name="image_file4" id="image_file4" class="form-control">
                  </div>
                  <!--mostrar imagen-->
                  <?php if (isset($obj_catalog->img4) && $obj_catalog->img4 != null) { ?>
                     <div class="form-group">
                        <label>Banner Principal Landing</label><br/>
                        <img src='<?php echo site_url() . "static/catalog/$obj_catalog->img4"; ?>' width="100" />
                        <input class="form-control" type="hidden" name="img_5" id="img_5" value="<?php echo isset($obj_catalog) ? $obj_catalog->img4 : ""; ?>">
                     </div>
                  <?php } ?>
                  <div class="form-group">
                     <h4>Imagen Interna (Tamaño 700 x 700)</h4>
                     <input type="file" name="image_file3" id="image_file3" class="form-control">
                  </div>
                   
                  <div class="stm_lms_manage_course__actions">
                     <button type="submit" id="submit" style="background-color:green" class="btn btn-default"><span>Guardar</span></button>
                     <a class="btn btn-default" onclick="regresar();"><span>Regresar</span><a>
                  </div>
                  <!---->
               </div>
               <div class="col-md-3">
                  <div class="stm-lms-course__sidebar">
                     <div class="stm-lms-buy-buttons stm_lms_wizard_step_5">
                        <div>
                           <div class="stm_lms_manage_course_price">
                              <div class="stm_lms_manage_course__form">
                                 <div class="stm_lms_manage_course__add">
                                    <div class="form-group">
                                       <label>
                                          <h4>Agregar Precio* ($)</h4>
                                          <input type="number" name="price" value="<?php echo isset($obj_catalog->price) ? $obj_catalog->price : ""; ?>"  step="any" class="form-control" placeholder="Agregar Precio* ($)" required>
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>Precio Anterior ($)</h4>
                                          <input type="number" name="price_del" value="<?php echo isset($obj_catalog->price_del) ? $obj_catalog->price_del : ""; ?>" placeholder="Agregar Precio Anterior($)" step="any" class="form-control" required>
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>Stock</h4>
                                          <input type="number" name="stock" type="text" value="<?php echo isset($obj_catalog->stock) ? $obj_catalog->stock : ""; ?>" class="form-control" placeholder="Ingrese Cantidad" required>
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>HotLink</h4>
                                          <input type="text" value="<?php echo isset($obj_catalog->hot_link) ? $obj_catalog->hot_link : ""; ?>" name="hot_link" placeholder="Ingrese Enlace" class="form-control">
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>Granel</h4>
                                            <select name="granel" class="form-control disable-select" required>
                                                <option value="" label="Seleccionar Granel"> Seleccionar Granel</option>
                                                <option value="1" <?php
                                                            if (isset($obj_catalog)) {
                                                                if ($obj_catalog->granel == 1) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?> label="Si">Si</option>
                                                <option value="0" <?php
                                                            if (isset($obj_catalog)) {
                                                                if ($obj_catalog->granel == 0) {
                                                                    echo "selected";
                                                                }
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?> label="No">No</option>
                                            </select>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
               </form>
            </div>
            <div>
            </div>
         </div>
      </div>
   </div>
</div>   
</div>
<script src='<?php echo site_url().'static/publicity/js/shop.js';?>'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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