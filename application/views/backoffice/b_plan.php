<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/jquery.modal.min.css';?>"/>
<div class="content-w">
        <div class="top-bar color-scheme-dark"> </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="<?php echo site_url().'backoffice';?>">Tablero</a> 
            </li>
        </ul>
<div class="content-i">
  <div class="content-box">
      <div class="row">
              <div class="col-sm-12 col-xxl-12">
                <div class="element-wrapper">
                  <h6 class="element-header"> Pack </h6>
                  <div class="row">
                    <?php foreach ($obj_kit as $value) { ?>
                     <!--CREATE MODAL-->
                      <div class="modal text-center" id="modal_<?php echo $value->kit_id;?>">
                          <div class="onboarding-media" style="padding-top: 20px;">
                            <h4 class="onboarding-title" id="modalMsgTitle">PAGAR FACTURA</h4>
                          </div>
                          <div class="onboarding-content with-gradient">
                            <div class="onboarding-text" id="modalMsgBody">
                              <form > 
                                <div class="form-group"> <br>
                                  <div class="col-lg-12"> <label class="control-label"><br>Valor total:</label> <b><h3 style="font-weight: 900 !important"><?php echo format_number_dolar($value->price);?></h3></b> </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-lg-12"> 
                                        <label class="control-label"><br>Ahorro Dólares BCP:</label>
                                        <b>125-26514981321</b>
                                        <label class="control-label">Número Interbancario (CCI):</label>
                                        <b>1351-125-26514981321-89</b>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-12"> 
                                      <img width="100" src="<?php echo site_url().'static/backoffice/images/bcp_logo.png';?>">
                                  </div>
                                </div>
                                  <div class="form-group"> 
                                    <div class="col-lg-12"> 
                                        <label class="control-label"><br>Ahorro Dólares BCP:</label>
                                        <b>125-26514981321</b>
                                        <label class="control-label">Número Interbancario (CCI):</label>
                                        <b>1351-125-26514981321-89</b>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-12"> 
                                      <img width="100" src="<?php echo site_url().'static/backoffice/images/interbank_loco.png';?>">
                                  </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-lg-12"> 
                                        <label class="control-label"><br/>
                                            <a onclick='create_invoice("<?php echo $value->kit_id;?>","<?php echo $value->price;?>");' style="cursor: pointer;  color: rgb(0,0,255);" >Si ya realizo el envío clic aquí :</a>
                                        </label> 
                                    </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                     <!--END MODAL--> 
                        <div class="pricing-plan col-md-3">
                          <div class="plan-head">
                                 <div class="plan-image"> 
                                     <img alt="" src='<?php echo site_url()."static/backoffice/images/plan/$value->img";?>'> 
                                 </div> 
                                <div class="plan-name">
                                    <h1 class="display-4" style="font-size: 24px; font-weight: 900 !important; letter-spacing: normal !important; color: #585858;"><?php echo str_to_mayusculas($value->name);?></h1>
                                </div>
                              </div>
                              <div class="plan-body">
                                <div class="plan-price-w">
                                    <div class="price-value" style="font-size: 30px;"> <span style="font-size: 10px;"></span> <?php echo format_number_dolar($value->price);?> </div>
                                </div>
                                  <div class="plan-btn-w"> 
                                      <a href="#modal_<?php echo $value->kit_id;?>" rel="modal:open">
                                          <button  class="mr-2 mb-2 btn btn-warning" <?php echo $value->active == "0"? "disabled":"";?>> Selecionar Pack</button>
                                      </a> 
                                  </div>
                              </div>
                              <div class="plan-description">
                                <?php echo $value->description;?>
                              </div>
                        </div>
                    <?php } ?>  
                  </div>
                </div>
              </div>
        </div>
  </div>
</div>
</div>

<script src="<?php echo site_url().'static/backoffice/js/script/plan.js';?>"></script>

