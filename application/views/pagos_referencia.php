<!doctype html>
<html lang="es-PE">
    <?php $this->load->view("head"); ?>
    <body>
        <div id="section-header" data-section-id="header">
            <?php $this->load->view("header"); ?>
        </div>
        <main>
            <div data-content-for-index data-dynamic-sections="index">
                <div id="section-1590554804411" data-section-id="1590554804411">
                    <!-- Section Virables -->
                    <div class="background-image background-image--1590554804411">
                        <div id=""
                             class="section section--opt_in section--middle section--xs-small section--dark section--1590554804411"
                             kjb-settings-id="sections_1590554804411_settings_background_color">
                            <div class="container">
                                <div class="row text-xs-center">
                                    <div class="col-md-6">
                                        <div class="section--middle optin__panel optin__panel--boxed">
                                            <div class="row optin optin--stacked">
                                                <div class="col-md-12">
                                                    <?php foreach ($this->cart->contents() as $items): ?>
                                                    <div class="checkout-content">
                                                        
                                                        <img class="img-responsive checkout-content-img" src="<?php echo site_url()."static/catalog/".$items['img'];?>" alt="Snhsaytjrbepnkhdyyhi correos 1">
                                                        <div class="checkout-content-body">
                                                            <div class="space-20"></div>
                                                            <h2 style="text-align: center;"><span style="color: #57de1d;"><strong>Estas apunto de comprar.<br>&nbsp;</strong></span></h2>
                                                            
                                                                <h3>
                                                                    <span style="color: #000000;">
                                                                        <i class="fa fa-check"></i>&nbsp;&nbsp;<?php echo $items['name']; ?><br><br>
                                                                    </span>
                                                                </h3>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 offset-md-1">
                                        <form action="javascript:void(0);" method="post" onsubmit="send_message();">
                                            <div class="section--middle optin__panel optin__panel--boxed">
                                                <div class="row optin optin--stacked">
                                                    <div class="col-md-12">
                                                        <h2 class="checkout-panel-title js-checkout-panel-price-discountable" style="color: #000000;">
                                                            &dollar;<?php echo $this->cart->format_number($this->cart->total()); ?>
                                                        </h2>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <p class="optin__subheading">Déjanos tus datos para hacerte el envió</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="optin__subheading"><b>Recomendado por:</b> <?php echo $obj_customer->first_name. " ".$obj_customer->last_name;?></p>
                                                    </div>
                                                    <div class="col-md-12" style="text-align: left">
                                                        <div class="space-20"></div>
                                                        <div class="text-field form-group">
                                                            <p class="optin__subheading">Ingrese su nombre</p>
                                                            <input type="text" name="name" id="name" required="required" class="form-control" placeholder="Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="text-align: left">
                                                        <div class="space-20"></div>
                                                        <div class="text-field form-group">
                                                            <p class="optin__subheading">Apellidos</p>
                                                            <input type="text" name="last_name" id="last_name" required="required" class="form-control" placeholder="Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="text-align: left">
                                                        <div class="email-field form-group">
                                                            <p class="optin__subheading">Teléfono</p>
                                                            <input required="required" class="form-control" placeholder="Teléfono:" type="text" name="phone" id="phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="text-align: left">
                                                        <div class="email-field form-group">
                                                            <p class="optin__subheading">Dirección / Referencia</p>
                                                            <textarea name="address" id="address" cols="20" rows="5" class="form-control" placeholder="Ingrese su dirección / referencia"  required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn--sections_1590554804411_settings_btn_text btn--block btn--solid btn-form form-control" type="submit">Pagar</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </main>
                    <div id="section-footer">
                        <?php $this->load->view("footer"); ?>
                    </div>
                    <script src='https://www.google.com/recaptcha/api.js'></script>
                    <script src='<?php echo site_url() . 'static/page_front/js/script/contact.js'; ?>'></script>
                    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>