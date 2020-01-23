<!DOCTYPE html>
<html lang="es">
<head>
        <title>Corporación FK - Inicio de Sesión</title>
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
    </head>
    <body class="auth-wrapper vanta-bg">
            <div class="all-wrapper menu-side">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="<?php echo site_url();?>">
                    <img alt="logo" src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png';?>" style="max-width: 150px;">
                </a>
            </div>
            <h4 class="auth-header">
                INICIAR SESIÓN
            </h4>
            <form class="form" action="javascript:void(0);">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Usuario" autofocus="">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>

                <div class="form-group">
                    <label>Contraseña</label>
                    <input name="pass" id="pass" class="form-control" placeholder="Contraseña" type="password" autocomplete="off">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>

                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Lfql9EUAAAAAOijHIuhHoq8ZrcDN8GeTX-95onx"></div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="captcha_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">Captcha no verificado</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="no_messages">
                    <div class="alert alert-danger validation-errors">
                        <p class="user_login_id" style="text-align: center;">El usuario y/o contraseña incorrectas.</p>
                    </div>
                </div>
                <div class="form-group has-feedback" style="display: none;" id="messages">
                    <div class="alert alert-success validation-errors">
                        <p class="user_login_id" style="text-align: center;">Bienvenido.</p>
                    </div>
                </div>  
                <div class="buttons-w">
                    <a href="<?php echo site_url().'register';?>" style="width: 100%; display: block; text-align: center;" class="link">¿Aún no tienes una cuenta?</a>
                    <button onclick="login();" class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button><br/>
                    <a href="<?php echo site_url().'forget';?>" style="width: 100%; display: block; text-align: center;" class="link">¿Olvido su contraseña?</a>
                    <a href="<?php echo site_url();?>" style="width: 100%; display: block; text-align: center;" class="link">Volver al Inicio</a>
                </div>
            </form>
        </div>
    </div>
<script src='<?php echo site_url().'static/page_front/js/script/login_2.js';?>'></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
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