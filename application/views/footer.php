<footer class="footer background-dark " kjb-settings-id="sections_footer_settings_background_color">
      <div class="footer__content">
        <div class="container footer__container media">
          <div id="block-1555988519593" class="footer__block ">
            <style>
              #block-1555988519593 { line-height: 1; } #block-1555988519593 .logo__image { display: block; width: 120px; }
            </style>
            <a class="logo" href="<?php echo site_url();?>"> 
                <img class="logo__image" src="<?php echo site_url()."static/page_front/images/logo/logo.png";?>" kjb-settings-id="sections_footer_blocks_1555988519593_settings_logo" alt="Logo Cultura Imparable"/> 
            </a>
          </div>
          <div id="block-1555988509126" class="footer__block media__body">
            <div class="link-list justify-content-right" kjb-settings-id="sections_footer_blocks_1555988509126_settings_menu"> 
                <a class="link-list__link" href="<?php echo site_url();?>" rel="noopener">Inicio</a> 
                <a class="link-list__link" href="<?php echo site_url()."cursos";?>" rel="noopener">Cursos</a> 
                <a class="link-list__link" href="<?php echo site_url()."catalogo";?>" rel="noopener">Catalogo</a>             
                <a class="link-list__link" href="<?php echo site_url()."contacto";?>" rel="noopener">Contacto</a> 
                <a class="link-list__link" href="<?php echo site_url()."registro";?>" rel="noopener">Registro</a> 
                <a class="link-list__link" href="<?php echo site_url()."iniciar-sesion";?>" rel="noopener">Iniciar Sesion</a> 
            </div>
          </div>
          <div class="footer__block "> 
              <span kjb-settings-id="sections_footer_blocks_1555988525205_settings_copyright"> &copy; 2020 Evolucion Web</span>
          </div>
        </div>
      </div>
    </footer>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="769313953214961"
  theme_color="#0084ff"
  logged_in_greeting="Hola!! ¿te puedo ayudar en algo?"
  logged_out_greeting="Hola!! ¿te puedo ayudar en algo?">
      </div>