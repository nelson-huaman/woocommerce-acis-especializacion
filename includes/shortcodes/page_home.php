<?php

   $categorias = [
      ['nombre' => 'Emergencia', 'slug' => 'emergencia'],
      ['nombre' => 'UCI Adulto', 'slug' => 'uci-adulto'],
      ['nombre' => 'UCI Neonatal', 'slug' => 'uci-neonatal'],
      ['nombre' => 'UCI Pediátrico', 'slug' => 'uci-pediatrico'],
      ['nombre' => 'CRED', 'slug' => 'cred'],
      ['nombre' => 'Inmunización', 'slug' => 'inmunizacion'],
      ['nombre' => 'Cardiología', 'slug' => 'cardiologia'],
      ['nombre' => 'Nefrología', 'slug' => 'nefrologia'],
      ['nombre' => 'Quirúrgico', 'slug' => 'quirurgico'],
   ];

?>

<div class="inicio">
   <header class="inicio__header">
      <div class="inicio__contenedor">
         <div class="inicio__flex">
            <div class="inicio__item inicio__item--contenido">
               <h1 class="inicio__h1">Formando Profesionales en Salud con <span>Pasión y Vocación</span></h1>
               <p class="inicio__texto inicio__texto--slogan">Cursos y Diplomados en Salud</p>
            </div>
            <div class="inicio__item inicio__item--header">
               <img class="inicio__imagen inicio__imagen--header" loading="lazy" width="350" height="1000" src="<?php echo IMAGENES; ?>eira-y-rafael.svg" alt="Eira y Rafael">
            </div>
         </div>
      </div>
   </header>

   <section class="inicio__section">
      <div class="inicio__contenedor">
         <h2 class="inicio__h2" data-aos="fade-up"><span>Conoce Nuestra Extraordinaria</span> Oferta Académica</h2>
         <div class="inicio__academicas">

            <?php foreach ($categorias as $categoria): ?>
               <div class="inicio__academica" data-aos="zoom-in">
                  <a href="<?php echo URL_BASE . '/categoria-programa/cursos/' . $categoria['slug']; ?>/">
                     <picture>
                        <source srcset="<?php echo IMAGENES . $categoria['slug']; ?>.avif" type="image/avif">
                        <source srcset="<?php echo IMAGENES . $categoria['slug']; ?>.webp" type="image/webp">
                        <img loading="lazy" width="1000" height="700" src="<?php echo IMAGENES . $categoria['slug']; ?>.jpg" alt="Cursos de <?php echo $categoria['nombre']; ?>" class="inicio__imagen">
                     </picture>
                  </a>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

   <section class="inicio__section inicio__section--maniqui">
      <div class="inicio__contenedor">
         <h2 class="inicio__h2 inicio__h2--movil" data-aos="zoom-in"><span>¡Aprende con una</span> Metodología Pedagógica Revolucionaria!</h2>
         <div class="inicio__metodologias">
            <div class="inicio__metodologia" data-aos="fade-up">
               <picture>
                  <source srcset="<?php echo IMAGENES; ?>taller.avif" type="image/avif">
                  <source srcset="<?php echo IMAGENES; ?>taller.webp" type="image/webp">
                  <img loading="lazy" width="1000" height="1000" src="<?php echo IMAGENES; ?>taller.png" alt="Enfermeras realizando el taller practico" class="inicio__imagen">
               </picture>
            </div>
            <div class="inicio__metodologia" data-aos="zoom-in">
               <h2 class="inicio__h2 inicio__h2--desktop"><span>¡Aprende con una</span> Metodología Pedagógica Revolucionaria!</h2>
               <p class="inicio__texto">Descubre una nueva forma de capacitarte en el área de la salud con nuestra empresa especializada en clases en vivo por Zoom. Nuestros talleres combinan enseñanza teórica de alta calidad con prácticas, utilizando material biomédico real, como maniquíes clínicos para procedimientos esenciales como:</p>
               <p class="inicio__texto">Nuestra metodología está diseñada para que aprendas haciendo, desde la comodidad de tu hogar, con instructores altamente capacitados y tecnología médica de última generación.</p>
            </div>
         </div>
      </div>
   </section>

   <section class="inicio__section inicio__section--experiencia">
      <div class="inicio__contenedor">
         <div class="inicio__experiencias">
            <div class="inicio__experiencia" data-aos="fade-up">
               <p class="inicio__texto inicio__texto--years">+11 Años <span>Formando Expertos en Salud</span></p>
               <div class="inicio__data">
                  <p class="inicio__texto inicio__texto--nombre">Profecionales <span>capacitados</span></p>
                  <p class="inicio__texto inicio__texto--numero">+22.000</p>
               </div>
            </div>
            <div class="inicio__experiencia" data-aos="zoom-in">
               <picture>
                  <source srcset="<?php echo IMAGENES; ?>galeria.avif" type="image/avif">
                  <source srcset="<?php echo IMAGENES; ?>galeria.webp" type="image/webp">
                  <img loading="lazy" width="1000" height="900" src="<?php echo IMAGENES; ?>galeria.png" alt="Talleres Presenciales" class="inicio__imagen">
               </picture>
            </div>
         </div>
      </div>
   </section>

   <section class="inicio__section">
      <div class="inicio__contenedor">
         <h2 class="inicio__h2" data-aos="zoom-in"><span>Capacítate con Nosotros</span> y Obtén Estos Beneficios</h2>
         <div class="inicio__beneficios">
            <div class="inicio__beneficio" data-aos="fade-up">
               <i class="fa-solid fa-video"></i>
               <h3 class="inicio__h3">Clases virtuales <span>100% en vivo</span></h3>
            </div>
            <div class="inicio__beneficio" data-aos="fade-up">
               <i class="fa-solid fa-user-tie"></i>
               <h3 class="inicio__h3">Asesoría <span>académica</span></h3>
            </div>
            <div class="inicio__beneficio" data-aos="fade-up">
               <i class="fa-solid fa-person-chalkboard"></i>
               <h3 class="inicio__h3">Plataforma <span>e-learning</span></h3>
            </div>
            <div class="inicio__beneficio" data-aos="fade-up">
               <i class="fa-solid fa-graduation-cap"></i>
               <h3 class="inicio__h3">Certificación <span>por capacitación</span></h3>
            </div>
         </div>
      </div>
   </section>

</div>