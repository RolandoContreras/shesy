<div class="content-w">
  <ul class="breadcrumb">
    <li class="breadcrumb-item"> <a href="https://18kworld.com">Tablero</a> </li>
  </ul>
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
        <h6 class="element-header"> Mi Red Unilevel </h6>
      </div>
      <div class="row" id="tree-family">
        <div class="col-md-12">
          <div class="" style="">
            <div class="row">
              <div class="col-md-12" style="margin-top: -20px;">
                <div class="card widget_2">
                  <div class="header" style="padding-bottom: 20px;">
                    <div class="text-center">
                      <h6>Vista de personas en la red <br><small class="text-muted" style="text-transform:none !important; color:red">Para calificar a los rangos se necesita 2 líneas como mínimo.</small>                        </h6>
                    </div>
                  </div>
                  <ul class="row clearfix list-unstyled m-b-0 text-center">
                    <li class="col-lg-6 col-md-6 col-sm-12">
                      <div class="element-box el-tablo centered trend-in-corner smaller">
                        <div class="display-5" style="font-size: 30px; font-weight: 700"> <?php echo $obj_total_referidos;?> </div>
                        <div class="label"> Personas total en red* </div>
                      </div>
                    </li>
                    <li class="col-lg-6 col-md-6 col-sm-12">
                      <div class="element-box el-tablo centered trend-in-corner smaller">
                        <div class="display-5" style="font-size: 30px; font-weight: 700"> <?php echo $obj_total_direct;?> </div>
                        <div class="label"> Personas directas </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="element-box">
                <div class="tree container" style="padding: 0px !important;">
                  <div class="card widget" align="center">
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-6"></div>
                    </div>
                    <ul class="arvore">
                      <li style="float: none !important;width:100%">
                        <div align="center">
                            <!------------->
                            <!--//NIVEL 1-->
                            <!------------->
                          <ul class="init">
                            <li>
                              <!-- Meu Usuario -->
                              <a href="javascript:void(0);">
                                  <?php 
                                  switch ($obj_customer->kit_id) {
                                        case 1:$kit = "Membership";$img = "pack_1.png";break;
                                        case 2:$kit = "Inicio";$img = "pack_2.png";break;
                                        default:$kit = "-";$img = "libre.png";break;
                                  }
                                  switch ($obj_customer->range_id) {
                                        case 1:$range = "Embajdor G1";break;
                                        case 2:$range = "Embajdor G2";break;
                                        case 3:$range = "Embajdor G3";break;
                                        case 4:$range = "Embajdor G4";break;
                                        case 5:$range = "Embajdor G5";break;
                                        default:$range = "-";break;
                                  }?>
                                  <div id="level-0" data-html="true" data-toggle="popover" data-content="&lt;b&gt;Usuario:&lt;/b&gt; <?php echo $obj_customer->username;?> &lt;br&gt; &lt;b&gt;Nombre:&lt;/b&gt; <?php echo $obj_customer->first_name." ".$obj_customer->last_name;?> &lt;br&gt; &lt;b&gt;Plan:&lt;/b&gt; <?php echo $kit;?>  &lt;/b&gt; &lt;br&gt; &lt;b&gt;Rango:&lt;/b&gt; <?php echo $range;?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                      <img src='<?php echo site_url()."static/backoffice/images/plan/$img";?>' class="img-responsive" style="width: 110px;"> </div>
                              </a>
                                    <!------------->
                                    <!--//NIVEL 2-->
                                    <!------------->
                              <?php if(count($obj_customer_n2) > 0){ ?>
                                  <ul>
                                      <?php foreach ($obj_customer_n2 as $value) {
                                            switch ($value->kit_id) {
                                                    case 1:$kit = "Membership";$img = "pack_1.png";break;
                                                    case 2:$kit = "Inicio";$img = "pack_2.png";break;
                                                    default:$kit = "-";$img = "libre.png";break;
                                              }
                                            switch ($value->range_id) {
                                                case 1:$range = "Embajdor G1";break;
                                                case 2:$range = "Embajdor G2";break;
                                                case 3:$range = "Embajdor G3";break;
                                                case 4:$range = "Embajdor G4";break;
                                                case 5:$range = "Embajdor G5";break;
                                        }?>
                                                <li>
                                                    <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value->customer_id);?>">
                                                        <div id="level-1" data-html="true" data-toggle="popover" data-content="&lt;b&gt;Usuario:&lt;/b&gt; <?php echo $value->username;?> &lt;br&gt; &lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value->first_name." ".$value->last_name;?> &lt;br&gt; &lt;b&gt;Plan:&lt;/b&gt; <?php echo $kit;?>  &lt;/b&gt; &lt;br&gt; &lt;b&gt;Rango:&lt;/b&gt; <?php echo $range;?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                        <img src="<?php echo site_url()."static/backoffice/images/plan/$img";?>" class="img-responsive"> </div>
                                                    </a>
                                                    <!------------->
                                                    <!--//NIVEL 3-->
                                                    <!------------->
                                                    <?php if(count($obj_customer_n3) > 0){ 
                                                                ?>
                                                        <ul class="d-none d-sm-block">
                                                            <?php foreach ($obj_customer_n3 as $value3) { 
                                                                    switch ($value3->kit_id) {
                                                                       case 1:$kit = "Membership";$img = "pack_1.png";break;
                                                                       case 2:$kit = "Inicio";$img = "pack_2.png";break;
                                                                       default:$kit = "-";$img = "libre.png";break;
                                                                      }
                                                                    switch ($value3->range_id) {
                                                                        case 1:$range = "Embajdor G1";break;
                                                                        case 2:$range = "Embajdor G2";break;
                                                                        case 3:$range = "Embajdor G3";break;
                                                                        case 4:$range = "Embajdor G4";break;
                                                                        case 5:$range = "Embajdor G5";break;
                                                                }?>
                                                                <?php if($value->customer_id == $value3->parend_id){ ?>
                                                                    <li>
                                                                          <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value3->customer_id);?>">
                                                                            <div id="level-2" data-html="true" data-toggle="popover" data-content="&lt;b&gt;Usuario:&lt;/b&gt; <?php echo $value3->username;?> &lt;br&gt; &lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value3->first_name." ".$value3->last_name;?> &lt;br&gt; &lt;b&gt;Plan:&lt;/b&gt; <?php echo $kit;?>  &lt;/b&gt; &lt;br&gt; &lt;b&gt;Rango:&lt;/b&gt; <?php echo $range;?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                            <img src="<?php echo site_url()."static/backoffice/images/plan/$img";?>" class="img-responsive"> </div>
                                                                          </a>
                                                                            <!------------->
                                                                            <!--//NIVEL 4-->
                                                                            <!------------->
                                                                            <?php if(count($obj_customer_n4) > 0){ ?>
                                                                                 <ul class="d-none d-sm-block">
                                                                                     <?php 
                                                                                        foreach ($obj_customer_n4 as $value4) { switch ($value4->kit_id) {
                                                                                                    case 1:$kit = "Membership";$img = "pack_1.png";break;
                                                                                                   case 2:$kit = "Inicio";$img = "pack_2.png";break;
                                                                                                   default:$kit = "-";$img = "libre.png";break;
                                                                                                  }
                                                                                                switch ($value4->range_id) {
                                                                                                    case 1:$range = "Embajdor G1";break;
                                                                                                    case 2:$range = "Embajdor G2";break;
                                                                                                    case 3:$range = "Embajdor G3";break;
                                                                                                    case 4:$range = "Embajdor G4";break;
                                                                                                    case 5:$range = "Embajdor G5";break;
                                                                                            }?>
                                                                                            <?php if($value3->customer_id == $value4->parend_id){ ?>
                                                                                                    <li>
                                                                                                          <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value4->customer_id);?>">
                                                                                                            <div id="level-3" data-html="true" data-toggle="popover" data-content="&lt;b&gt;Usuario:&lt;/b&gt; <?php echo $value4->username;?> &lt;br&gt; &lt;b&gt;Nombre:&lt;/b&gt; <?php echo $value4->first_name." ".$value4->last_name;?> &lt;br&gt; &lt;b&gt;Plan:&lt;/b&gt; <?php echo $kit;?>  &lt;/b&gt; &lt;br&gt; &lt;b&gt;Rango:&lt;/b&gt; <?php echo $range;?> &lt;/b&gt; &lt;br&gt; &lt;b&gt;">
                                                                                                            <img src="<?php echo site_url()."static/backoffice/images/plan/$img";?>" class="img-responsive"> </div>
                                                                                                          </a>
                                                                                                    </li>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                </ul>
                                                                            <?php } ?>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>                                
                                      <?php } ?>
                                  </ul>
                              <?php } ?>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
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