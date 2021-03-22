<div class="col-md-9 col-sm-12">
      <div id="stm_lms_create_announcement" class="stm_lms_create_announcement">
         <div class="stm_lms_user_info_top">
            <h1>Nueva campaña</h1>
         </div>
         <form name="campana" action="javascript:void(0);" method="post" onsubmit="save_campana();" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($obj_publicity)?$obj_publicity->id:""; ?>"/>
            <input type="hidden" name="type_2" value="<?php echo isset($type)?$type:""; ?>"/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="heading_font">Nombre de Campaña</label> 
                        <input type="text" name="name" class="disable-select form-control" placeholder="ingrese nombre" value="<?php echo isset($obj_publicity)?$obj_publicity->name:""; ?>"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="heading_font">Tipo de Campaña</label> 
                        <select name="type" class="disable-select form-control" required="" <?php echo isset($type)?"disabled":"";?>>
                            <option value=""> Seleccionar tipo de campaña</option>
                            <option value="1" onclick="get_campana('1');" <?php if(isset($type) && $type ==1){echo 'selected';}?>> Cursos</option>
                            <option value="2" onclick="get_campana('2');" <?php if(isset($type) && $type ==2){echo 'selected';}?>> Empresas</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="heading_font">Seleccionar Campaña</label> 
                        <select name="campana" class="form-control" id="sub_campana" required="">
                            <?php 
                                if(isset($obj_publicity)){
                                    foreach($obj_campana_type as $value){ 
                                        if($type == 1){ ?>
                                            <option value="<?php echo $value->course_id;?>" <?php echo $value->course_id == $obj_publicity->course_id ? "selected":"";?>><?php echo $value->name;?></option>       
                                        <?php }else{ ?>
                                            <option value="<?php echo $value->catalog_id;?>" <?php echo $value->catalog_id == $obj_publicity->catalog_id ? "selected":"";?>><?php echo $value->name;?></option>       
                                        <?php }  ?>  
                                        
                                    <?php } ?>
                                <?php  }else{ ?>
                                    <option value=""> Seleccionar Campaña</option>   
                                <?php } ?>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                            <label class="heading_font"> Pexel de Facebook </label>
                            <textarea name="pexel" placeholder="Ingresar script código Pexel" required=""><?php echo isset($obj_publicity)?$obj_publicity->pexel:""; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" id="submit" class="btn btn-success"><span>Crear Campaña</span></button>
                        <a href="<?php echo site_url()."publicidad";?>" class="btn btn-default"><span>Regresar</span></a>
                    </div>
                </div>
            </div>
      <form>
</div>
<script src='<?php echo site_url().'static/publicity/js/campana.js';?>'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>