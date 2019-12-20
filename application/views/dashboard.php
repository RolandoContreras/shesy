<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dashboard - FK Coportación</title>
  <base href="<?php echo site_url();?>">
  <!--[if lt IE 10]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="author" content="Cultura Fk" />
  <meta name="robots" content="noindex, nofollow" />
  <!--START FAVICON-->
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
  <!--END FAVICON-->
  <link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo site_url().'static/course/css/style.css';?>">
</head>

<body>
  <div class="auth-wrapper">
    <div class="auth-content">
      <div class="auth-bg">
          <span class="r"></span><span class="r s"></span><span class="r s"></span><span class="r"></span></div>
      <div class="card">
        <div class="card-body text-center">
            
          <div class="mb-4">
              <img src="<?php echo site_url().'static/page_front/images/logo/logo_negro.png'?>" alt="logo" width="80"/>
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
    <script src="<?php echo site_url().'static/course/js/vendor-all.min.js';?>"></script>
    <script src="<?php echo site_url().'static/course/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo site_url().'static/course/js/pcoded.min.js';?>"></script>
  <script src="<?php echo site_url().'static/cms/js/login.js';?>"></script>
</body>
</html>
