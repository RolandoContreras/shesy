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
                                      <button type="button" class="buyButton btn btn-primary" data-price="<?php echo quitar_punto_number($value->price);?>" data-price2="<?php echo $value->price;?>" data-kit="<?php echo $value->kit_id;?>">Selecionar Pack</button>
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
        <div class="form-group has-feedback" id="pay_success_2" style="display: none">
              <center>
                 <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" type="button">×</button>
                    <p>La venta se realizo éxitosamente</p>
                 </div>                 
             </center>
          </div>
          <div class="form-group has-feedback" id="pay_info" style="display: none">
                 <center>
                     <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert" type="button">×</button>
                        <p>Hubo un error, verifique los datos de la tarjeta</p>
                     </div>                 
                 </center>
            </div>
  </div>
</div>
</div>
<script src="<?php echo site_url().'static/backoffice/js/script/plan.js';?>"></script>
<script>
  Culqi.publicKey = 'pk_test_igI3EctoA17FeNUD';
  var  price = "";
  var  price2 = "";
  var  kit_id = "";
  $('.buyButton').on('click', function(e) {
      price = $(this).attr('data-price');
      price2 = $(this).attr('data-price2');
      kit_id = $(this).attr('data-kit');
      Culqi.settings({
        title: 'Cultura Imparable',
        currency: 'PEN',
        description: 'Venta de Producto y/o Servicio',
        amount: price
      });
    Culqi.open();
    e.preventDefault();
    });
    
    function culqi() {
      if (Culqi.token) { // ¡Objeto Token creado exitosamente!
          var token = Culqi.token.id;
          var email = Culqi.token.email;
          var url = site + "backoffice/plan/create_invoice_recompra";
          $.ajax({
             url: url,
             method : 'post',
             data: {
                 price:price,
                 price2:price2,
                 kit_id:kit_id,
                 email:email,
                 token:token
             },
             dataType: 'JSON',  
             success: function(data){
                 if(data.object == "charge"){
                    document.getElementById("pay_success_2").style.display = "block";
                    location.href = site + "backoffice/invoice";
                }else {
                    document.getElementById("pay_info").style.display = "block";
                 } 
             },
             error : function(data){
                 alert(data.user_message);
             }
          });
      } else { 
          console.log(Culqi.error);
          alert(Culqi.error.user_message);
      }
    };

</script>

