<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard - Cultura Imparable</title>
  <base href="<?php echo site_url();?>">
  <!--[if lt IE 10]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
  <meta name="author" content="Cultura Imparable">
  <meta name="keyword" content="Cultura Imparable, Movimiento Imparable, Imparable Perú, embajadores, Imparable social, Imparable corporación, mlm, mmn, culturaimprable.com">
  <meta name="robots" content="noindex, nofollow" />
 <!--//STAR FAVICON-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url().'static/page_front/images/logo/favico/apple-touch-icon.png';?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-32x32.png';?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url().'static/page_front/images/logo/favico/favicon-16x16.png';?>">
    <link rel="manifest" href="<?php echo site_url().'static/page_front/images/logo/favico/site.webmanifest';?>">
    <!--//END FAVICON-->
  <link rel="stylesheet" href="<?php echo site_url().'static/catalog/css/style.css';?>">
</head>

<body>
  <div class="auth-wrapper">
    <div class="auth-content">
      <div class="auth-bg">
          <span class="r"></span><span class="r s"></span><span class="r s"></span><span class="r"></span></div>
      <div class="card">
        <div class="card-body text-center">
            
          <div class="mb-4">
              <img src="<?php echo site_url().'static/page_front/images/logo/logo-ico.png'?>" alt="logo" width="150"/>
          </div>
            <form method="get" id="login">
              <h3 class="mb-4">Administración</h3>
              <div class="input-group mb-3">
                  <input class="form-control" id="username" type="text" placeholder="Email">
              </div>
              <div class="input-group mb-4">
                  <input class="form-control" id="password" type="password" placeholder="Contrseña">
              </div>
              <div class="form-group text-left">
              </div>
              <button type="button" class="btn btn-primary">Iniciar Sesión</button>
          </form>
            <br/>
            <div id="mensaje"></div>
        </div>
      </div>
    </div>
  </div>
    <script src="<?php echo site_url().'static/catalog/js/vendor-all.min.js';?>"></script>
    <script src="<?php echo site_url().'static/catalog/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo site_url().'static/catalog/js/pcoded.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/login.js';?>"></script>
</body>
</html>
