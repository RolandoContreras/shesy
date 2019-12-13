<!DOCTYPE html>
<html>
<head>
        <title>Registro - Corporacion FK</title>
        <base href="<?php echo site_url();?>"/>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta name="description" content="Multiplica tu dinero en el mercado financiero con nosotros BCA CAPITAL, una empresa financiera que te ayudará a aumentar tus finanzas, Clic en el siguiente enlace">
        <meta name="author" content="Ingresar Oficina Virtual">
        <meta name="keyword" content="bca capital, bca">
        <meta content="width=device-width, initial-scale=1" name="viewport">
         <!--//STAR FAVICON-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-57x57.png';?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-60x60.png';?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-72x72.png';?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-76x76.png';?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-114x114.png';?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-120x120.png';?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-144x144.png';?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-152x152.png';?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-icon-180x180.png';?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo site_url().'static/page_front/images/logo/favico/android-icon-192x192.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-96x96.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/manifest.json';?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo site_url().'static/page_front/images/logo/favico/ms-icon-144x144.png';?>">
    <meta name="theme-color" content="#ffffff">
    <!--//END FAVICON-->
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
        <link href="<?php echo site_url().'static/page_front/css/login/main.css?version=4.4.0';?>" rel="stylesheet">
               <style>
            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }
            .goog-tooltip {
                display: none !important;
            }
            .goog-tooltip:hover {
                display: none !important;
            }
            .goog-text-highlight {
                background-color: transparent !important;
                border: none !important;
                box-shadow: none !important;
            }
            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }
            body {
                top: 0px !important; 
            }
            *::first-letter {
                    text-transform: uppercase;
            }
        </style>
        <script>
            var site = '<?php echo site_url();?>';
        </script>
        <script src="https://use.fontawesome.com/3aa4a6fd0b.js"></script>
    </head>
    <body class="auth-wrapper vanta-bg">
            <div class="all-wrapper menu-side">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="<?php echo site_url();?>">
                    <img src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" style="max-width: 150px;">
                </a>
            </div>
            <h4 class="auth-header">
                NUEVO SOCIO
            </h4>
            <form class="form" action="javascript:void(0);">
                <?php if(isset($obj_customer->username)){ ?>
                <div class="form-group">
                    <p>Usted serás patrocinado por:
                        <br><b><?php echo str_to_first_capital($obj_customer->first_name)." ".str_to_first_capital($obj_customer->last_name);?> <?php echo "- "."@".$obj_customer->username?></b>
                    </p>
                </div>
                <?php } ?>
                <?php 
                 if(isset($obj_customer)){
                     $parent_id = $obj_customer->customer_id;
                 }else{
                     $parent_id = "1";
                 }
                ?>
                <input type="text" id="parent_id" name="parent_id" value="<?php echo $parent_id;?>" style="display:none;">
                <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="text" onkeyup="this.value=Numtext(this.value)" onblur="validate_username(this.value);" class="form-control" id="username" name="username" placeholder="Usuario"  style="text-transform:lowercase;" autofocus="">
                    <span class="alert-0"></span>
                    <div class="pre-icon os-icon "><i class="fa fa-user-secret"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_username">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese usuario válido</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input name="pass" id="pass" class="form-control" placeholder="Contraseña" type="password" autocomplete="off">
                    <div class="pre-icon os-icon "><i class="fa fa-unlock"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_pass">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese contraseña válida</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input name="name" id="name" class="form-control" placeholder="Nombres" type="text" autocomplete="off">
                    <div class="pre-icon os-icon"><i class="fa fa-address-book"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_name">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese nombres válidos</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input name="last_name" id="last_name" class="form-control" placeholder="Apellidos" type="text" autocomplete="off">
                    <div class="pre-icon os-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_last_name">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese apellidos válidos</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" id="email" class="form-control" placeholder="Email" type="text" autocomplete="off">
                    <div class="pre-icon os-icon "><i class="fa fa-envelope-open"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_email">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese email válido</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">DNI / Cedula</label>
                    <input name="dni" id="dni" class="form-control" placeholder="DNI / Cedula" type="text" autocomplete="off">
                    <div class="pre-icon os-icon "><i class="fa fa-id-card"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_dni">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese documento válido</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Teléfono</label>
                    <input name="phone" id="phone" class="form-control" placeholder="Teléfono" type="text" autocomplete="off">
                    <div class="pre-icon os-icon "><i class="fa fa-phone"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_phone">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese teléfono válido</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input name="address" id="address" class="form-control" placeholder="Dirección" type="text" autocomplete="off">
                    <div class="pre-icon os-icon "><i class="fa fa-map-pin"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_address">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Ingrese dirección válida</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">País</label>
                    <select class="form-control" name="country" id="country">
                        <option  selected value="">selección país</option>
                        <?php  foreach ($obj_paises as $key => $value) { ?>
                               <option style="border-style: solid !important" value="<?php echo $value->id;?>"><?php echo $value->nombre;?></option>
                        <?php } ?>
                    </select>
                    <div class="pre-icon os-icon "><i class="fa fa-flag"></i></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="message_pais">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Seleccione país válido</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LcW6sEUAAAAAAh3immabJ9S9rpvQFM2FDQsKTCL"></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="captcha_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Captcha no verificado</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="messages">
                    <div class="alert alert-success validation-errors">
                        <p class="user_login_id" style="text-align: center;">Registro creado con éxito.</p>
                    </div>
                </div>  
                <div class="buttons-w">
                    <button onclick="register();" class="btn btn-primary btn-lg btn-block">Registar</button>
                    <a href="<?php echo site_url().'forget';?>" style="width: 100%; display: block; text-align: center;" class="link">¿Olvido su contraseña?</a>
                    <div style="margin-top:20px;">
                        <style>
                            .langselector img {
                                width: 30px;
                                height: 20px;
                            }
                        </style>
                    </div>
                </div>
            </form>
        </div>
    </div>
           </body>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='<?php echo site_url().'static/page_front/js/script/register.js';?>'></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/jquery.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/popper.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/bootstrap.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/jquery-confirm.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/jquery.blockUI.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/sweetalert.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/stats.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/functions.js?r=3617';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/three.min.js';?>"></script>
<script src="<?php echo site_url().'static/page_front/js/script/login/vanta.globe.min.js';?>"></script>
    <script>
        VANTA.GLOBE({
            el: ".vanta-bg",
            color:  0x897431           

        });
    </script>
</body>
</html>