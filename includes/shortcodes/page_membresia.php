<?php 

   $premium = wc_get_product(696);
   $discount_percentage = (((float)$premium->regular_price - (float)$premium->sale_price) / (float)$premium->regular_price) * 100;

   if (WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id($premium->get_id()))) {
      $add_to_cart_url = wc_get_checkout_url();
   } else {
      $add_to_cart_url = add_query_arg('add-to-cart', $premium->get_id(), wc_get_checkout_url());
   }

?>

<div class="membresia" >
   <div class="membresia__header">
      <div class="membresia__contenedor">
         <div class="membresia__flex">
            <div class="membresia__item membresia__item--contenido" data-aos="fade-right">
               <h1 class="membresia__h1">Adquiere nuestra <span>Membresía</span></h1>
               <div class="membresia__degradado">Premium</div>
               <p class="membresia__texto membresia__texto--capacitate">Capacítate por todo 1 año <span>a tan solo</span></p>
               <div class="membresia__precio">
                  <?php if(!empty($premium->sale_price)) { ?>
                     <span class="membresia__precio--blanco"><span>S/.</span> <?php echo $premium->regular_price; ?></span>
                  <?php } else { ?>
                     <span class="membresia__precio--precio"><span>S/.</span> <?php echo $premium->regular_price; ?></span>
                  <?php } ?>
                  <?php if(!empty($premium->sale_price)) { ?>
                     <span class="membresia__precio--actual">
                        <span>S/.</span> <?php echo $premium->sale_price; ?>
                        <span class="membresia__precio--descuento">-<?php echo $discount_percentage; ?>%</span>
                     </span>
                  <?php } ?>
               </div>
            </div>
            <div class="membresia__item" data-aos="fade-left">
               <picture>
                  <source srcset="<?php echo IMAGENES; ?>enfermeros-membresia.avif" type="image/avif" >
                  <source srcset="<?php echo IMAGENES; ?>enfermeros-membresia.webp" type="image/webp" >
                  <img loading="lazy" width="700" height="800" src="<?php echo IMAGENES; ?>enfermeros-membresia.png" alt="Enfermeros con nuestra Membresía" class="membresia__img">
               </picture>
            </div>
         </div>
      </div>
   </div>
   <div class="membresia__seccion membresia__seccion--accede" data-aos="zoom-in">
      <div class="membresia__contenedor">
         <p class="membresia__accede">Accede a <span>+170</span> Cursos</p>
      </div>
   </div>
   <div class="membresia__seccion membresia__seccion--benedicios">
      <div class="membresia__contenedor membresia__contenedor--padding">
         <div class="membresia__grid-4">
            <div class="membresia__grid-item membresia__grid-item--1" data-aos="zoom-in-up">
               <p>Beneficios Premium</p>
            </div>
            <div class="membresia__grid-item" data-aos="zoom-in-up">
               <i class="fa-solid fa-star"></i>
               <p>Certificación incluida</p>
            </div>
            <div class="membresia__grid-item" data-aos="zoom-in-up">
               <i class="fa-solid fa-star"></i>
               <p>Acceso a talleres</p>
            </div>
            <div class="membresia__grid-item" data-aos="zoom-in-up">
               <i class="fa-solid fa-star"></i>
               <p>Descuentos en diplomados</p>
            </div>
         </div>
      </div>
   </div>
   <div class="membresia__seccion" data-aos="zoom-out-up">
      <div class="membresia__contenedor">
         <h2 class="membresia__titulo">Vacantes Limitadas</h2>
         <div class="membresia__flex">
            <a href="" class="membresia__boton membresia__boton--whatsapp"><i class="fa-brands fa-whatsapp"></i> +51 997 001 966</a>
            <a href="<?php echo $add_to_cart_url; ?>" class="membresia__boton membresia__boton--shop"><i class="fa-solid fa-cart-shopping"></i> Comprar ahora</a>
         </div>
      </div>
   </div>
   <div class="membresia__seccion membresia__seccion--expereincia">
      <div class="membresia__contenedor">
         <h2 class="membresia__titulo">¿Por qué elegirnos?</h2>
         <div class="membresia__grid-4">
            <div class="membresia__item" data-aos="fade-up">
               <div class="membresia__elegirnos">
                  <img loading="lazy" width="100" height="100"  src="<?php echo IMAGENES; ?>alto-nivel.svg" alt="Alto Nivel" class="membresia__svg">
                  <div class="membresia__elegir membresia__elegir--azul">
                     <h3 class="membresia__name">Alto Nivel</h3>
                     <p class="membresia__texto membresia__texto--sinpading">En ponencias con docentes nacionales e internacionales</p>
                  </div>
               </div>
            </div>
            <div class="membresia__item" data-aos="fade-up">
               <div class="membresia__elegirnos">
                  <img loading="lazy" width="100" height="100"  src="<?php echo IMAGENES; ?>10-years.svg" alt="Alto Nivel" class="membresia__svg">
                  <div class="membresia__elegir membresia__elegir--verde">
                     <h3 class="membresia__name">+10 Años</h3>
                     <p class="membresia__texto membresia__texto--sinpading">De experiencia en el sector educativo superior</p>
                  </div>
               </div>
            </div>
            <div class="membresia__item" data-aos="fade-up">
               <div class="membresia__elegirnos">
                  <img loading="lazy" width="100" height="100"  src="<?php echo IMAGENES; ?>certificado-qr.svg" alt="Alto Nivel" class="membresia__svg">
                  <div class="membresia__elegir membresia__elegir--azul">
                     <h3 class="membresia__name">Certificado QR</h3>
                     <p class="membresia__texto membresia__texto--sinpading">Accede a tu certificado de manera imediata</p>
                  </div>
               </div>
            </div>
            <div class="membresia__item" data-aos="fade-up">
               <div class="membresia__elegirnos">
                  <img loading="lazy" width="100" height="100"  src="<?php echo IMAGENES; ?>10-years.svg" alt="Alto Nivel" class="membresia__svg">
                  <div class="membresia__elegir membresia__elegir--verde">
                     <h3 class="membresia__name">Plataforma Líder</h3>
                     <p class="membresia__texto membresia__texto--sinpading">Contamos con Moodle, la plataforma líder en educación</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="membresia__seccion">
      <div class="membresia__contenedor">
         <div class="membresia__flex">
            <div class="membresia__item membresia__item--left" data-aos="fade-up-right">
               <h2 class="membresia__titulo membresia__titulo--vive">Vive la experiencia <span>de nuestros</span> talleres presenciales</h2>
               <p class="membresia__texto membresia__texto--habilidades">Refuerza tus habilidades con práctica en escenarios reales</p>
               <p class="membresia__texto membresia__texto--boton">Únete a la membresía y participa</p>
            </div>
            <div class="membresia__item" data-aos="fade-up-left">
               <picture>
                  <source srcset="<?php echo IMAGENES; ?>galeria.avif" type="image/avif" >
                  <source srcset="<?php echo IMAGENES; ?>galeria.webp" type="image/webp" >
                  <img loading="lazy" width="700" height="800" src="<?php echo IMAGENES; ?>galeria.png" alt="Talleres Presenciales" class="membresia__imagen">
               </picture>
            </div>
         </div>
      </div>
   </div>
   <div class="membresia__seccion membresia__seccion--planes">
      <div class="membresia__contenedor">
         <div class="membresia__flex membresia__flex--espacio">
            <div class="membresia__item membresia__item--linea" data-aos="flip-up">
               <h2 class="membresia__titulo membresia__titulo--elige">Elige destacar con</h2>
               <p class="membresia__degradado">Membresía Premium</p>
               <p class="membresia__texto membresia__texto--azul">Accede a muchos beneficios <span>con un solo pago.</span></p>
            </div>
            <div class="membresia__item" data-aos="flip-down">
               <div class="membresia__precio">
                  <?php if(!empty($premium->sale_price)) { ?>
                     <span class="membresia__precio--rojo"><span>S/.</span> <?php echo $premium->regular_price; ?></span>
                  <?php } else { ?>
                     <span class="membresia__precio--precio-2"><span>S/.</span> <?php echo $premium->regular_price; ?></span>
                  <?php } ?>
                   
                  <?php if(!empty($premium->sale_price)) { ?>
                     <span class="membresia__precio--anaranjado">
                        <span>S/.</span> <?php echo $premium->sale_price; ?>
                        <span class="membresia__precio--descuento">-<?php echo $discount_percentage; ?>%</span>
                     </span>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="membresia__seccion membresia__seccion--barra" data-aos="zoom-in">
      <div class="membresia__contenedor">
         <div class="membresia__flex">
            <p class="membresia__texto membresia__texto--blanco">Promoción por tiempo limitado</p>
            <a href="<?php echo $add_to_cart_url; ?>" class="membresia__boton membresia__boton--shop"><i class="fa-solid fa-cart-shopping"></i> Añadir al carrito</a>
         </div>
      </div>
   </div>
   <div class="membresia__seccion" data-aos="zoom-in">
      <div class="membresia__contenedor">
         <picture>
            <source srcset="<?php echo IMAGENES; ?>socios.avif" type="image/avif" >
            <source srcset="<?php echo IMAGENES; ?>socios.webp" type="image/webp" >
            <img loading="lazy" width="700" height="800" src="<?php echo IMAGENES; ?>socios.png" alt="Nuestros Socios" class="membresia__imagen">
         </picture>
      </div>
   </div>
   <div class="membresia__seccion membresia__seccion--testimonio" data-aos="zoom-in-up">
      <div class="membresia__contenedor" data-aos="zoom-in-down">
         <h2 class="membresia__titulo">Testimonios</h2>
      </div>
      <div class="membresia__contenido" data-aos="zoom-in-right">
         <div class="membresia__contenedor">
            <div class="membresia__grid">
               <div class="membresia__item">
                  <p class="membresia__texto membresia__texto--years"><span>+10 años</span> formando expertos en salud</p>
                  <div class="membresia__flex">
                     <div class="membresia__item membresia__item--separador">
                        <p class="membresia__texto membresia__texto--nombre">Profecionales <span>capacitados</span></p>     
                     </div>
                     <div class="membresia__item">
                        <p class="membresia__texto membresia__texto--numero">+20.000</p> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="membresia__seccion" data-aos="zoom-out">
      <div class="membresia__contenedor">
         <h2 class="membresia__titulo">Medios de pago</h2>
         <picture>
            <source srcset="<?php echo IMAGENES; ?>pagos.avif" type="image/avif" >
            <source srcset="<?php echo IMAGENES; ?>pagos.webp" type="image/webp" >
            <img loading="lazy" width="700" height="800" src="<?php echo IMAGENES; ?>pagos.png" alt="Medios de Pagos" class="membresia__imagen">
         </picture>
      </div>
   </div>
</div>