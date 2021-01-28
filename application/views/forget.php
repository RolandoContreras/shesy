<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Recuperar Contraseña - <?php echo $title; ?></title>
        <base href="<?php echo site_url(); ?>"/>
        <meta charset="utf-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta name="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
        <meta name="author" content="Cultura Imparable">
        <meta name="keyword" content="Cultura Imparable, Movimiento Imparable, Imparable Perú, embajadores, Imparable social, Imparable corporación, mlm, mmn, culturaimprable.com">
        <meta name="robots" content="Index, Follow">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="googlebot" content="index, follow" />
    <meta name="author" content="Evolution Web">
    <meta name="distribution" content="Global">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url();?>">
    <meta property="og:title" content="Cultura Emprendedora | Organización Neuronal de emprendedores">
    <meta property="og:url" content="<?php echo site_url();?>">
    <meta property="og:description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
    <meta property="og:image" content="<?php echo site_url().'static/page_front/images/logo/logo-fuego.png';?>">
    <meta property="og:type" content="video_lecture">
    <meta property="og:site_name" content="Cultura Emprendedora">
    <meta property="og:locale" content="es_PE">
    <meta itemprop="name" content="Cultura Emprendedora | Organización Neuronal de emprendedores">
    <meta itemprop="url" content="<?php echo site_url();?>">
    <meta itemprop="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
    <meta itemprop="image" content="<?php echo site_url().'static/page_front/images/logo/logo-fuego.png';?>">
    <meta name="description" content="Cultura Emprendedora - Organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica"> 
    <meta name="keywords" content="Cultura Emprendedora, Movimiento Emprendedor, Cultura Emprendedora Perú, Embajadores, Emprendedor Social, red social, mlm, culturaemprendedora.online, desarrollo personal, catalogo de productos, productos, plataforma de cursos online"> 
    <meta name="author" content="Evolucion Web"> 
    <meta name="robots" content="follow, index"/> 
    <meta name="googlebot" content="index, follow" /> 
    <meta property="og:title" content="Cultura Emprendedora | Organización Neuronal de emprendedores"> 
    <meta property="og:url" content="<?php echo site_url(); ?>"> 
    <meta property="og:description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos"> 
    <meta property="og:image" content="<?php echo site_url().'static/page_front/images/logo/logo-fuego.png';?>"> 
    <meta property="og:type" content="website"> 
    <meta property="og:site_name" content="Cultura Emprendedora"> 
    <meta property="og:locale" content="es"> 
    <meta itemprop="name" content="Cultura Emprendedora | Organización Neuronal de emprendedores"> 
    <meta itemprop="url" content="<?php echo site_url();?>"> 
    <meta itemprop="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos"> 
    <meta itemprop="image" content="<?php echo site_url().'static/page_front/images/logo/logo-fuego.png';?>"> 
    <meta name="twitter:card" content="summary_large_image"> 
    <meta name="twitter:title" content="Cultura Emprendedora | Organización Neuronal de emprendedores"> 
    <link rel="canonical" href="<?php echo site_url(); ?>" /> 
        <!--//STAR FAVICON-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() . 'static/page_front/images/logo/favico/apple-touch-icon.png'; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-32x32.png'; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-16x16.png'; ?>">
        <link rel="manifest" href="<?php echo site_url() . 'static/page_front/images/logo/favico/site.webmanifest'; ?>">
        <!--//END FAVICON-->
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
        <link href="<?php echo site_url() . 'static/page_front/css/login/main.css?version=4.4.0'; ?>" rel="stylesheet">
        <!----- SWEET ALER  ---->
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
        <script>
            var site = '<?php echo site_url(); ?>';
        </script>
        <script src="https://use.fontawesome.com/3aa4a6fd0b.js"></script>
    </head>
    <body class="auth-wrapper vanta-bg">
        <div class="all-wrapper menu-side">
            <div class="auth-box-w">
                <div class="logo-w">
                    <a href="<?php echo site_url(); ?>">
                        <img alt="logo" src="<?php echo site_url() . 'static/page_front/images/logo/sombreado.png'; ?>" style="max-width: 200px;">
                    </a>
                </div>
                <h4 class="auth-header">
                    Recuperar Contraseña
                </h4>
                <form class="form" action="javascript:void(0);" id="forger-form" onsubmit="forget();" method="post">
                    <div class="form-group">
                        <label>Ingrese Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" autofocus="">
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    </div>
                    <div class="buttons-w">
                        <input type="hidden" name="google-response-token" id="google-response-token">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Recuperar Contraseña</button>
                        <div class="buttons-w">
                            <a href="<?php echo site_url() . 'iniciar-sesion'; ?>" style="width: 100%; display: block; text-align: center;" class="link">Iniciar Sesión</a>
                            <a href="<?php echo site_url(); ?>" style="width: 100%; display: block; text-align: center;" class="link">Volver a Inicio</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src='https://www.google.com/recaptcha/api.js?render=6LenFywaAAAAADc77bVcFP4pFKkXGNG8GKkRaRoY'></script>
        <script type="text/javascript">
            function forget() {
                var form = $('#forger-form');
                $.ajax(
                        {
                            type: "POST",
                            url: site + "login/forget",
                            data: form.serialize(),
                            success: function (data)
                            {
                                var data = JSON.parse(data);
                                if (data.status == true) {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Mensaje enviado',
                                        text: 'Velique su email que le llegará un correo ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                } else if (data.status == "false2") {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'info',
                                        title: 'Capcha no verificado',
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    window.setTimeout(function () {
                                        window.location = site + "forget";
                                    }, 1000);
                                } else {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Usuario no registrado',
                                        text: 'Verifique el Email ingresado'
                                    });
                                }

                            }
                        });
            }
            grecaptcha.ready(function () {
                grecaptcha.execute('6LenFywaAAAAADc77bVcFP4pFKkXGNG8GKkRaRoY', {action: 'homepage'})
                        .then(function (token) {
                            $('#google-response-token').val(token);
                        });
            });
        </script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/jquery.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/popper.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/jquery-confirm.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/jquery.blockUI.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/stats.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/functions.js?r=3617'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/three.min.js'; ?>"></script>
        <script src="<?php echo site_url() . 'static/page_front/js/script/login/vanta.globe.min.js'; ?>"></script>
        <script>
            VANTA.GLOBE({
                el: ".vanta-bg",
                color: 0xa49b0a,
                backgroundColor: 0x141316
            });
        </script>
    </body>
</html>