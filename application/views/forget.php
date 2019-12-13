<!DOCTYPE html>
<html>
<head>
        <title>Olvidó su contraseña - BCA Capital</title>
        <base href="<?php echo site_url();?>"/>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta name="description" content="Ganhe dinheiro no mercado multinível digital e financeiro, conheça a 18K Ronaldinho, uma empresa digital com produtos que aumentarão sua saúde física e financeira! #VEMPRATRIBO, a tribo lendária do R10! Clique no link e saiba mais.">
        <meta name="author" content="Ingresar Oficina Virtual">
        <meta name="keyword" content="bca capital, bca">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="favicon.png" rel="shortcut icon">
        <link href="apple-touch-icon.png" rel="apple-touch-icon">
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
    </head>
    <body class="auth-wrapper vanta-bg">
            <div class="all-wrapper menu-side">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="<?php echo site_url();?>">
                    <img src="<?php echo site_url().'static/page_front/images/logo/logo-black.png';?>" style="max-width: 350px;">
                </a>
            </div>
            <h4 class="auth-header">
                Recuperar Contraseña
            </h4>
            <form class="form" action="javascript:void(0);">
                <div class="form-group">
                    <label for="">Ingrese Usuario</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Usuario" autofocus="">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Lc684YUAAAAAKbiFYJvMx83vmSSJHH8N03PXnKx"></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="captcha_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Captcha no verificado</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="no_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">El usuario no existe.</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="messages">
                    <div class="alert alert-success validation-errors">
                        <p class="user_login_id" style="text-align: center;">Mensaje eviado al correo.</p>
                    </div>
                </div>  
                <div class="buttons-w">
                    <button onclick="login();" class="btn btn-primary btn-lg btn-block">Recuperar Contraseña</button>
                    <a href="<?php echo site_url().'login';?>" style="width: 100%; display: block; text-align: center;" class="link">Iniciar Sesión</a>
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
<script src='<?php echo site_url().'static/page_front/js/script/login.js';?>'></script>
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