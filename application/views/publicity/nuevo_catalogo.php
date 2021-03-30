<div class="col-md-9 col-sm-12">
<div class="">
   <div class="">
      <a href="<?php echo site_url()."tienda";?>" class="back-to-account" rel="nofollow"> <i class="lnricons-arrow-left"></i> Regresar</a>
      <div id="stm_lms_manage_course" class="wpcfto-box">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                     <!---->
                     <div class="stm_lms_manage_course__form">
                        <div class="stm_lms_manage_course__add">
                           <div class="form-group">
                              <label>
                                <h1 class="stm_lms_course__title stm_lms_phantom">Nombre Aquí...</h1>
                                 <input type="text" class="form-control" placeholder="Ingresa Nombre de la empresa">
                              </label>
                           </div>
                        </div>
                     </div>
                  <div class="single_product_after_title">
                     <div class="clearfix">
                        <div class="pull-left meta_pull">
                           <div class="pull-left xs-product-cats-left">
                              <div class="stm_lms_manage_course stm_lms_manage_course__text stm_lms_manage_course__category stm_lms_wizard_step_2">
                                 <div class="meta-unit categories clearfix">
                                    <div class="pull-left"><i class="fa-icon-stm_icon_category secondary_color"></i></div>
                                    <div class="meta_values">
                                       <div class="label h6">Category:</div>
                                       <!---->
                                       <div class="stm_lms_samples_categories">
                                          <div class="stm_lms_manage_course__form">
                                             <div class="stm_lms_manage_course__add">
                                                <select name="category" class="form-control disable-select">
                                                   <option value="" label="Categoría"> Seleccionar Categoría</option>
                                                   <?php 
                                                   foreach($obj_category as $value){ ?>
                                                        <option value="<?php echo $value->category_id;?>" label="<?php echo $value->name;?>"><?php echo $value->name;?></option>    
                                                   <?php } ?>
                                                </select>
                                             </div>
                                             <div class="stm_lms_manage_course__add">
                                                <select name="sub_category" class="form-control disable-select">
                                                   <option value="" label="Sub Categoría"> Seleccionar Sub Categoría</option>
                                                   <?php 
                                                   foreach($obj_sub_category as $value){ ?>
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
                     </div>
                  </div>
                  <ul role="tablist" class="nav nav-tabs">
                     <li role="presentation" class="active"><a href="#description" data-toggle="tab" aria-expanded="true"> Description </a></li>
                  </ul>
                  <div class="tab-content">
                     <div role="tabpanel" id="description" mytextarea class="tab-pane active">
                        <div class="form-group">
                            <textarea id='description' name='description'></textarea>
                        </div>                 
                     </div>
                  </div>
                  <div class="stm_lms_manage_course__actions">
                     <a href="#" class="btn btn-default"><span>Publish Course</span></a>
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
                                          <input placeholder="Add Price* ($)" type="number" value=""   class="form-control">
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>Precio Anterior ($)</h4>
                                          <input placeholder="Add Sale Price ($)" type="number" oninput="this.value = Math.abs(this.value)" class="form-control">
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>HotLink</h4>
                                          <input placeholder="Ingrese Enlace" type="text"  class="form-control">
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <label>
                                          <h4>Granel</h4>
                                            <select name="category" class="form-control disable-select">
                                                <option value="" label="Seleccionar Granel"> Seleccionar Granel</option>
                                                <option value="1" label="Si">Si</option>
                                                <option value="0" label="No">No</option>
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
            </div>
            <div>
            </div>
         </div>
      </div>
   </div>
</div>   
</div>
<script src='<?php echo site_url().'static/publicity/js/campana.js';?>'></script>
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