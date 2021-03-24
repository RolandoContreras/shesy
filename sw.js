//asignar un nombre y versión al cache
const CACHE_NAME = 'v1_cache_cultura_emprendedora',
  urlsToCache = [
    '//fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic|Fira+Sans:400,700,400italic,700italic',
    'https://code.jquery.com/jquery-3.3.1.slim.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
    'https://use.fontawesome.com/releases/v5.8.1/css/all.css',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
    '//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js',
    '//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css',
    './static/page_front/css/bootstrap.min.css',
    './static/page_front/css/catalog.css',
    './static/page_front/css/core-36d711acd6b6b6ebec34a694a9eef8bf1660c6ae66a0df925956db2bc4a92888.css',
    './static/page_front/css/hot.css',
    './static/page_front/css/new_style.css',
    './static/page_front/css/styles.css',
    './static/page_front/css/theme.css',
    './static/page_front/css/login/main.css',
    './static/page_front/images/ayuda_social.png',
    './static/page_front/images/background_video.png',
    './static/page_front/images/banner_1.png',
    './static/page_front/images/bg_black.jpg',
    './static/page_front/images/bg_embajada_video.jpg',
    './static/page_front/images/bg_foco.jpg',
    './static/page_front/images/cultura.png',
    './static/page_front/images/emabajda_texto_2.png',
    './static/page_front/images/embajada.png',
    './static/page_front/images/embajada_texto.png',
    './static/page_front/images/emprender.png',
    './static/page_front/images/logo_embajada.png',
    './static/page_front/images/objetivos.png',
    './static/page_front/images/quienes-somos.jpg',
    './static/page_front/images/registro_img.png',
    './static/page_front/images/respaldo.png',
    './static/page_front/images/somos_banner.jpg',
    './static/page_front/images/talleres.png',
    './static/page_front/images/texto_quienes_somos.png',
    './static/page_front/images/video_embajada.png',
    './static/page_front/images/video_img.jpg',
    './static/page_front/images/logo/favico/android-chrome-192x192.png',
    './static/page_front/images/logo/favico/android-chrome-512x512.png',
    './static/page_front/images/logo/favico/apple-touch-icon.png',
    './static/page_front/images/logo/favico/favicon-16x16.png',
    './static/page_front/images/logo/favico/favicon-32x32.png',
    './static/page_front/images/logo/logo-fuego.png',
    './static/page_front/images/logo/logo-fuegox240.png',
    './static/page_front/images/logo/logo-ico.png',
    './static/page_front/images/logo/logo.png',
    './static/page_front/images/logo/sombreado.png',
    './static/page_front/js/bootstrap.min.js',
    './static/page_front/js/encore_core-391b174ddfaf72e8ec9615d1579235b5c2c755e7cd65e22cf10938c815f7f394.js',
    './static/page_front/js/scripts.js',
    './static/page_front/js/script/login/bootstrap.min.js',
    './static/page_front/js/script/login/functions.js',
    './static/page_front/js/script/login/jquery-confirm.min.js',
    './static/page_front/js/script/login/jquery.blockUI.js',
    './static/page_front/js/script/login/jquery.min.js',
    './static/page_front/js/script/login/popper.min.js',
    './static/page_front/js/script/login/stats.min.js',
    './static/page_front/js/script/login/sweetalert.min.js',
    './static/page_front/js/script/login/three.min.js',
    './static/page_front/js/script/login/three.r92.min.js',
    './static/page_front/js/script/login/vanta.globe.min.js',
    './script.js'
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})