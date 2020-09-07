<!doctype html>
<html lang="es-PE">
<?php $this->load->view("head"); ?>
<body">
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
                                    <div class="position-contact">
                                        <h2 id="title-contact">CONTÁCTANOS</h2>
                                    </div>
                                </div>
                                <div class="col-md-5 offset-md-1">
                                    <form action="javascript:void(0);" method="post" onsubmit="send_message();">
                                        <div class="section--middle optin__panel optin__panel--boxed">
                                            <div class="row optin optin--stacked">
                                                <div class="col-md-12">
                                                    <p class="optin__subheading">Déjanos un mensaje y breves minutos nos
                                                        comunicaremos con usted</p>
                                                </div>
                                                <div class="col-md-12" style="text-align: left">
                                                    <div class="space-20"></div>
                                                    <div class="text-field form-group">
                                                        <p class="optin__subheading">Ingrese su nombre</p>
                                                        <input type="text" name="name" id="name" required="required"
                                                            class="form-control" placeholder="Nombre">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="text-align: left">
                                                    <div class="email-field form-group">
                                                        <p class="optin__subheading">Ingrese su correo electrónico</p>
                                                        <input required="required" class="form-control"
                                                            placeholder="Correo:" type="email" name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="text-align: left">
                                                    <div class="email-field form-group">
                                                        <p class="optin__subheading">Ingrese el asunto</p>
                                                        <input required="required" class="form-control"
                                                            placeholder="Asunto" type="text" name="subject"
                                                            id="subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="text-align: left">
                                                    <div class="email-field form-group">
                                                        <p class="optin__subheading">Ingrese el mensaje</p>
                                                        <textarea name="message" id="message" cols="20" rows="5"
                                                            class="form-control" placeholder="Mensaje"
                                                            required="required"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button
                                                        class="btn btn--sections_1590554804411_settings_btn_text btn--block btn--solid btn-form form-control"
                                                        type="submit">ENVIAR</button>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="section-footer">
        <?php $this->load->view("footer"); ?>
    </div>
    <script src='<?php echo site_url().'static/page_front/js/script/contact.js';?>'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='<?php echo site_url().'static/page_front/js/script/contact.js';?>'></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>