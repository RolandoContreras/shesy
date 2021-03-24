<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<footer class="footer background-dark " kjb-settings-id="sections_footer_settings_background_color">
      <div class="footer__content">
        <div class="container footer__container media">
          <div id="block-1555988519593" class="footer__block center">
            <a class="logo" href="<?php echo site_url();?>"> 
                <img class="logo__image" src="<?php echo site_url()."static/page_front/images/logo/logo.png";?>" kjb-settings-id="sections_footer_blocks_1555988519593_settings_logo" alt="Logo Cultura Imparable"/> 
            </a>
          </div>
          <div id="block-1555988509126" class="footer__block media__body">
            <div class="link-list justify-content-right" kjb-settings-id="sections_footer_blocks_1555988509126_settings_menu"> 
                <a class="link-list__link" href="<?php echo site_url();?>" >Inicio</a> 
                <a class="link-list__link" href="#">Cursos</a> 
                <a class="link-list__link" href="<?php echo site_url()."catalogo";?>">Catalogo</a>             
                <a class="link-list__link" href="<?php echo site_url()."contacto";?>">Contacto</a> 
                <a class="link-list__link" href="<?php echo site_url()."registro";?>">Registro</a> 
                <a class="link-list__link" href="<?php echo site_url()."iniciar-sesion";?>">Iniciar Sesion</a> 
                <a class="link-list__link" href="<?php echo site_url()."terminos-condiciones";?>">Términos y Condiciones</a> 
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