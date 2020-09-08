<head>
    <title>Cultura Imparable | <?php echo $title; ?> </title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Somos la primera organización Neuronal de EMPRENDEDORES con PROPÓSITO en Latinoamérica, compartimos una cultura donde se crean en los sueños y se compartan herramientas para el logro de estos mismos">
    <meta name="author" content="Cultura Imparable">
    <meta name="keyword" content="Cultura Imparable, Movimiento Imparable, Imparable Perú, embajadores, Imparable social, red social, mlm, mmn, culturaimprable.com, desarrollo personal, catalogo de productos, productos, plataforma de cursos online">
    <meta name="robots" content="Index, Follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo site_url();?>">
    <!--//STAR FAVICON-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() . 'static/page_front/images/logo/favico/apple-touch-icon.png'; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-32x32.png'; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() . 'static/page_front/images/logo/favico/favicon-16x16.png'; ?>">
    <link rel="manifest" href="<?php echo site_url() . 'static/page_front/images/logo/favico/site.webmanifest'; ?>">
    <!--//END FAVICON-->
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <!-- Google Fonts ====================================================== -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Fira+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Kajabi CSS ======================================================== -->
    <link rel="stylesheet" media="screen" href="<?php echo site_url()."static/page_front/css/core-36d711acd6b6b6ebec34a694a9eef8bf1660c6ae66a0df925956db2bc4a92888.css"?>"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="<?php echo site_url()."static/page_front/css/styles.css?15964308185009978"?>"/>
    <!-- Customer CSS ====================================================== -->
    <link rel="stylesheet" media="screen" href="<?php echo site_url()."static/page_front/css/my_style.css";?>"/>
    <!-- Shopping ====================================================== -->
    <?php 
      $url = explode("/", uri_string());
      if (isset($url[0])) {
          $nav = $url[0];
      } else {
          $nav = "";
      }
      $home_syle = "";
      $courses_syle = "";
      $contact_syle = "";
      $catalog_syle = "";
      switch ($nav) {
          case "courses":
              $courses_syle = "current-menu-parent ";
              break;
          case "catalogo":
              $catalog_syle = "current-menu-parent ";
              $style = "responsive-movil";
              break;
          case "contact":
              $contact_syle = "current-menu-parent ";
              break;
          default:
              $home_syle = "current-menu-parent ";
              break;
      }
    if($nav == "catalogo"){ ?>
      <link rel="stylesheet" media="screen" href="<?php echo site_url()."static/page_front/css/theme.css";?>"/>
    <?php } ?>
    <!-- Boostrap ====================================================== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script src="https://checkout.culqi.com/js/v3"></script>
    <script type="text/javascript">
    var site = '<?php echo site_url();?>';
  </script>
</head>