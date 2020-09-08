<?php 
      $url = explode("/", uri_string());
      if (isset($url[0])) {
          $nav = $url[0];
      }
    if($nav == "catalogo"){ 
        $style = "responsive-movil";
     }else{
        $style = "";
     } ?>
<header class="header header--static <?php echo $style;?>">
    <div class="header__wrap">
        <div class="header__content header__content--desktop background-dark">
            <div class="container header__container media">
                <div id="block-1555988494486" class="header__block header__block--logo header__block--show">
                    <a class="logo" href="<?php echo site_url();?>">
                        <img class="logo__image" src="<?php echo site_url() . 'static/page_front/images/logo/logo-fuego.png'; ?>" alt="Logo" width="50"/>
                    </a>
                </div>
                <div id="block-1555988491313"
                    class="header__block header__switch-content header__block--menu media__body">
                    <div class="link-list justify-content-right"
                        kjb-settings-id="sections_header_blocks_1555988491313_settings_menu">
                        <a class="link-list__link" href="<?php echo site_url(); ?>">Inicio</a>
                        <a class="link-list__link" href="#">Cursos</a>
                        <a class="link-list__link" href="<?php echo site_url() . "catalogo"; ?>">Catalogo</a>
                        <a class="link-list__link" href="<?php echo site_url() . 'contacto'; ?>">Contacto</a>
                        <a class="link-list__link" href="<?php echo site_url() . 'registro'; ?>">Registro</a>
                    </div>
                </div>
                <div id="login-boton" class="header__block header__switch-content header__block--cta">
                    <a id="font-15" class="color-black btn btn-medium btn-solid btn- background-dark" href="<?php echo site_url() . 'iniciar-sesion'; ?>"> INGRESAR</a>
                </div>
                <!--boton login-->
                <div id="login-boton" class="boton-login hidden--desktop">
                    <a id="font-15" class="color-white btn btn-medium btn-solid background-dark" href="<?php echo site_url() . 'iniciar-sesion'; ?>" style="font-size:15px;"> INGRESAR</a>
                </div>
                <!--end boton login-->
                <div class="hamburger hidden--desktop" onclick="show_nav_mobile();">
                    <div class="hamburger__slices">
                        <div class="hamburger__slice hamburger--slice-1"></div>
                        <div class="hamburger__slice hamburger--slice-2"></div>
                        <div class="hamburger__slice hamburger--slice-3"></div>
                        <div class="hamburger__slice hamburger--slice-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__content header__content--mobile background-light"></div>
    </div>
</header>
<div class="header__content header__content--mobile background-light hidden--desktop" id="nav_mobile" style="display:none">
    <div id="block-1555988491313" class="header__block header__switch-content header__block--menu media__body">
        <div class="link-list justify-content-right"
            kjb-settings-id="sections_header_blocks_1555988491313_settings_menu">
            <a class="link-list__link" href="<?php echo site_url(); ?>">Inicio</a>
            <a class="link-list__link" href="#">Cursos</a>
            <a class="link-list__link" href="<?php echo site_url() . 'catalogo'; ?>">Catalogo</a>
            <a class="link-list__link" href="<?php echo site_url() . 'contacto'; ?>">Contacto</a>
            <a class="link-list__link" href="<?php echo site_url() . 'registro'; ?>">Registro</a>
        </div>
    </div>
</div>
<script>
function show_nav_mobile() {
    var value = document.getElementById('nav_mobile');
    if (value.style.display === 'none') {
        value.style.display = 'block';
    } else {
        value.style.display = 'none';
    }
}
</script>