<?php
   $sliders = [
      ['nombre' => 'Jack Cotera Ruiz', 'slug' => 'jack-cotera-ruiz'],
      ['nombre' => 'Clorinda De La Cruz', 'slug' => 'clorinda-de-la-cruz'],
      ['nombre' => 'Carlos Lescano Alva', 'slug' => 'carlos-lescano-alva'],
      ['nombre' => 'Joaquin De Los Santos Castilla', 'slug' => 'joaquin-de-los-santos-castilla']
   ];
?>

<div class="acispro">
   <header class="acispro__header">
      <div class="acispro__contenedor acispro__contenedor--header">
         <div class="acispro__grid">
            <div>
               <h1 class="acispro__titulo"><span>¿Necesitas organizar tu evento</span> y no sabes por dónde empezar?</h1>
               <p class="acispro__slagan">Descubre cómo hacerlo más fácil con <span>ACIS Especialización</span></p>
            </div>
            <div class="acispro__item">
               <div class="acispro__imagen acispro__imagen--contacto">
                  <img loading="lazy" width="150" height="150" src="<?php echo IMAGENES; ?>acispro-contacto.svg" alt="ACISPRO contacto" class="acispro__img">
               </div>
            </div>

         </div>
      </div>
   </header>

   <section class="acispro__section">
      <div class="acispro__contenedor">
         <div class="acispro__servicios">
            <div class="acispro__servicio" data-aos="fade-up">
               <h2 class="acispro__h2 acispro__h2--negro">Presentamos nuestro <span>nuevo servicio</span></h2>

               <div class="acispro__imagen acispro__imagen--logo">
                  <img loading="lazy" width="500" height="200" src="<?php echo IMAGENES; ?>acispro-logo.svg" alt="ACISPRO Logo" class="acispro__img">
               </div>
               <p class="acispro__texto acispro__texto--evento">Tu evento académico, con soporte especializado</p>
               <a class="acispro__boton" href="#">Más información</a>
            </div>
            <div class="acispro__servicio" data-aos="fade-up">
               <div class="acispro__imagen">
                  <picture>
                     <source srcset="<?php echo IMAGENES; ?>acispro-servicio.avif" type="image/avif">
                     <source srcset="<?php echo IMAGENES; ?>acispro-servicio.webp" type="image/webp">
                     <img loading="lazy" width="1280" height="720" src="<?php echo IMAGENES; ?>acispro-servicio.png" alt="Servios Especializado" class="acispro__img">
                  </picture>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="acispro__section acispro__section--barra" data-aos="fade-up">
      <div class="acispro__contenedor">
         <h2 class="acispro__h2">Beneficios</h2>
      </div>
   </section>

   <section class="acispro__section">
      <div class="acispro__contenedor">
         <div class="acispro__beneficios">
            <div class="acispro__beneficio" data-aos="fade-up">
               <div class="acispro__head acispro__head--azul">
                  <div class="acispro__imagen acispro__imagen--icono">
                     <img loading="lazy" width="150" height="150" src="<?php echo IMAGENES; ?>acispro-publicidad.svg" alt="Diseño Publicitario" class="acispro__img">
                  </div>
               </div>
               <div class="acispro__body">
                  <h3 class="acispro__h3">Diseño Publicitario</h3>
                  <p class="acispro__texto"><span>Creamos piezas gráficas</span> que posicionan tu evento, atraen participantes y refuerzan tu identidad institucional.</p>
                  <div class="acispro__redes">
                     <p><span>Facebook</span><i class="fa-brands fa-facebook"></i></p>
                     <p><span>Instagram</span><i class="fa-brands fa-instagram"></i></p>
                     <p><span>TikTok</span><i class="fa-brands fa-tiktok"></i></p>
                     <p><span>YouTube</span><i class="fa-brands fa-youtube"></i></p>
                  </div>
               </div>
            </div>
            <div class="acispro__beneficio" data-aos="fade-up">
               <div class="acispro__head acispro__head--verde">
                  <div class="acispro__imagen acispro__imagen--icono">
                     <img loading="lazy" width="150" height="150" src="<?php echo IMAGENES; ?>acispro-live.svg" alt="Diseño Publicitario" class="acispro__img">
                  </div>
               </div>
               <div class="acispro__body">
                  <h3 class="acispro__h3">Transmición en Redes</h3>
                  <p class="acispro__texto">Comparte tu <span>evento en vivo con miles de personas</span> y amplía su alcance más allá.</p>
                  <div class="acispro__redes">
                     <p><span>Facebook</span><i class="fa-brands fa-facebook"></i></p>
                     <p><span>TikTok</span><i class="fa-brands fa-tiktok"></i></p>
                     <p><span>YouTube</span><i class="fa-brands fa-youtube"></i></p>
                  </div>
               </div>
            </div>
            <div class="acispro__beneficio" data-aos="fade-up">
               <div class="acispro__head acispro__head--azul">
                  <div class="acispro__imagen acispro__imagen--icono">
                     <img loading="lazy" width="150" height="150" src="<?php echo IMAGENES; ?>acispro-plataforma.svg" alt="Diseño Publicitario" class="acispro__img">
                  </div>
               </div>
               <div class="acispro__body">
                  <h3 class="acispro__h3">Plataforma Virtual</h3>
                  <p class="acispro__texto"><span>Un espacio confiable e interactivo</span> para desarrollar tu evento sin complicaciones técnicas.</p>
               </div>
            </div>
            <div class="acispro__beneficio" data-aos="fade-up">
               <div class="acispro__head acispro__head--verde">
                  <div class="acispro__imagen acispro__imagen--icono">
                     <img loading="lazy" width="150" height="150" src="<?php echo IMAGENES; ?>acispro-certificado.svg" alt="Diseño Publicitario" class="acispro__img">
                  </div>
               </div>
               <div class="acispro__body">
                  <h3 class="acispro__h3">Certificación</h3>
                  <p class="acispro__texto">Reconocimientos con valor y estilo: <span>certificados digitales</span> reflejan excelencia académica.</p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="acispro__section acispro__section--testimonios">
      <div class="acispro__contenedor">
         <h2 class="acispro__h2" data-aos="fade-up">Testimonios</h2>

         <div class="acispro__slider" data-aos="fade-up">
            <div class="swiper slider" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff">
               <div class="swiper-wrapper">
                  <?php foreach ($sliders as $slider): ?>
                     <div class="swiper-slide">
                        <img class="acispro__imagen" src="<?php echo URL_BASE . '/RECURSOS_PROGRAMA/TESTIMONIOS/' . $slider['slug']; ?>.webp" alt="<?php echo 'Testimonio de ' . $slider['nombre']; ?>">
                     </div>
                  <?php endforeach; ?>
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
   </section>

   <section class="acispro__section acispro__section--gris" data-aos="fade-up">
      <div class="acispro__contenedor">
         <h2 class="acispro__h2 acispro__h2--azul">Resultados</h2>
      </div>
   </section>

   <section class="acispro__section">
      <div class="acispro__contenedor">
         <div class="acispro__imagen" data-aos="fade-up">
            <picture>
               <source srcset="<?php echo IMAGENES; ?>acispro-galeria.avif" type="image/avif">
               <source srcset="<?php echo IMAGENES; ?>acispro-galeria.webp" type="image/webp">
               <img loading="lazy" width="1280" height="720" src="<?php echo IMAGENES; ?>acispro-galeria.png" alt="Talleres Presenciales" class="acispro__img">
            </picture>
         </div>
      </div>
   </section>
</div>