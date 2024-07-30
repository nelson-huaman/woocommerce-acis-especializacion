<?php
   $clasico = wc_get_product(2388);
   $premium = wc_get_product(2390);
?>
<header class="pagina__header">
   <div class="pagina__contenedor pagina__contenedor--header">
      <div>
         <h1 class="pagina__h1">
            <span class="pagina__h1--header">Lleva tu profesión</span>
            <span class="pagina__h1--body">al siguiente nivel</span>
            <span class="pagina__h1--footer">
               <span class="pagina__h1--peque">
                  <span>al convertirte</span>
                  <span>en miembro</span>
               </span>
               <span class="pagina__h1--premium">Premium</span>
            </span>
         </h1>
         <a href="#membresia" class="pagina__enlace pagina__enlace--header">
            Conoce todos nuestros planes
            <i class="fa fa-angle-double-down" aria-hidden="true"></i>
         </a>
      </div>
      <div class="pagina__imagen-enfermera">
         <picture>
            <source srcset="<?php echo IMG . 'enfermera'; ?>.webp" type="image/webp">
            <source srcset="<?php echo IMG . 'enfermera'; ?>.avif" type="image/avif">
            <source srcset="<?php echo IMG . 'enfermera'; ?>.png" type="image/png">
            <img loading="lazy" width="500" height="500"  src="<?php echo IMG . 'enfermera'; ?>.png" alt="Imagen Enfermera">
         </picture>
      </div>
   </div>
</header>

<section class="pagina__seccion">
   <div class="pagina__contenedor">
      <h2 class="pagina__h2">
         Consigue más
         <span class="pagina__h2--body">
            <span class="pagina__h2--span">con</span>
            <span class="pagina__h2--premiun">Premium</span>
         </span>
      </h2>
      <a href="#membresia" class="pagina__enlace">
         Comprar planes
         <i class="fa fa-angle-double-down" aria-hidden="true"></i>
      </a>
      <div class="pagina__flex">
         <picture class="pagina__picture">
            <source srcset="<?php echo IMG . 'enfermeras'; ?>.webp" type="image/webp">
            <source srcset="<?php echo IMG . 'enfermeras'; ?>.avif" type="image/avif">
            <source srcset="<?php echo IMG . 'enfermeras'; ?>.png" type="image/png">
            <img class="pagina__enfermeras" loading="lazy" width="500" height="500"  src="<?php echo IMG . 'enfermeras'; ?>.png" alt="Imagen enfermeras">
         </picture>
         <div class="pagina__iconos">
            <div class="pagina__icono">
               <div class="pagina__icono--img">
                  <img loading="lazy" width="500" height="500"  src="<?php echo IMG . 'computadora'; ?>.svg" alt="Icono Acceso ilimitado a +170 cursos eLearning">
               </div>
               <h3 class="pagina__h3">Acceso ilimitado a +170 cursos eLearning</h3>
            </div>
            <div class="pagina__icono">
               <div class="pagina__icono--img">
                  <img loading="lazy" width="500" height="500"  src="<?php echo IMG . 'calendario'; ?>.svg" alt="Icono Cursos programados para todo el año">
               </div>
               <h3 class="pagina__h3">Cursos programados para todo el año</h3>
            </div>
            <div class="pagina__icono">
               <div class="pagina__icono--img">
                  <img loading="lazy" width="500" height="500"  src="<?php echo IMG . 'taller'; ?>.svg" alt="Icono Acceso a talleres vivenciales">
               </div>
               <h3 class="pagina__h3">Acceso a talleres vivenciales</h3>
            </div>
            <div class="pagina__icono">
               <div class="pagina__icono--img">
                  <img loading="lazy" width="500" height="500"  src="<?php echo IMG . 'certificado'; ?>.svg" alt="Icono Certifícate con cada curso completado">
               </div>
               <h3 class="pagina__h3">Certifícate con cada curso completado</h3>
            </div>
            <div class="pagina__icono">
               <div class="pagina__icono--img">
                  <img loading="lazy" width="500" height="500"  src="<?php echo IMG . 'descuento'; ?>.svg" alt="Icono Descuentos en diplomados">
               </div>
               <h3 class="pagina__h3">Descuentos en diplomados</h3>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="pagina__seccion pagina__seccion--fondo" id="membresia">
   <div class="pagina__contenedor">
      <h2 class="pagina__h2 pagina__h2--blanco">
         <span class="pagina__h2--elige">Elige tu</span>
         membresía favorita
      </h2>
      <div class="pagina__membresias">
         <div class="pagina__membresia pagina__membresia--clasico">
            <div class="pagina__cuerpo pagina__cuerpo--clasico">
               <div class="pagina__cabecera pagina__cabecera--clasico">
                  <h3 class="pagina__nombre">Clásico</h3>
                  <div class="pagina__stars">
                     <i class="idos fa fa-star-o" aria-hidden="true"></i>
                  </div>
               </div>
               <div class="pagina__precio pagina__precio--clasico">
                  <?php echo $clasico->get_price_html();?>
               </div>
            </div>
            <div class="pagina__ul pagina__ul--clasico">
               <p class="pagina__li">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  Tu capacitación por 1 mes
               </p>
               <p class="pagina__li">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  +25 cursos
               </p>
               <p class="pagina__li">
                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  Acceso al aula virtual
               </p>
            </div>
            <a href="?add-to-cart=2388" class="pagina__boton pagina__boton--clasico">Adquirir Plan</a>
            <img class="pagina__eira" loading="lazy" width="500" height="500"  src="<?php echo IMG . 'eira-clasico'; ?>.svg" alt="Imagen Eira Clasico">
         </div>
         <div class="pagina__membresia pagina__membresia--premium">
            <div class="pagina__cuerpo pagina__cuerpo--premium">
               <div class="pagina__cabecera pagina__cabecera--premium">
                  <h3 class="pagina__nombre">Premium</h3>
                  <div class="pagina__stars">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="idos fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
               </div>
               <div class="pagina__precio pagina__precio--premium">
                  <?php echo $premium->get_price_html();?>
               </div>
            </div>
            <div class="pagina__ul pagina__ul--premium">
               <p class="pagina__li">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  Empoderate en 1 año
               </p>
               <p class="pagina__li">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  + 170 cursos
               </p>
               <p class="pagina__li">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  Certificación incluida
               </p>
               <p class="pagina__li">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  Acceso a la programación anual
               </p>
               <p class="pagina__li">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  Acceso a talleres
               </p>
               <p class="pagina__li">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  Descuentos en diplomados
               </p>
            </div>
            <a href="?add-to-cart=2390" class="pagina__boton pagina__boton--premium">Adquirir Plan</a>
            <pagina__enlace></pagina__enlace>
            <img class="pagina__eira" loading="lazy" width="500" height="500"  src="<?php echo IMG . 'eira-premium'; ?>.svg" alt="Imagen Eira Clasico">
         </div>
      </div>
   </div>
</section>

<section class="pagina__seccion">
   <div class="pagina__contenedor">
      <h2 class="pagina__h2">Detalles</h2>
      <table class="pagina__tabla">
         <tr class="pagina__tr">
            <th class="pagina__th"></th>
            <th class="pagina__th pagina__th--clasico">Clásico</th>
            <th class="pagina__th pagina__th--premium">Premium</th>
         </tr>
         <tr>
            <td class="pagina__td pagina__td--titulo">Acceso al aula virtual</td>
            <td class="pagina__td pagina__td--clasico">
               <i class="fa fa-check" aria-hidden="true"></i>
            </td>
            <td class="pagina__td pagina__td--premium">
               <i class="fa fa-check" aria-hidden="true"></i>
            </td>
         </tr>
         <tr>
            <td class="pagina__td pagina__td--titulo">Certificación incluida</td>
            <td class="pagina__td pagina__td--clasico">
               <i class="fa fa-check" aria-hidden="true"></i>
            </td>
            <td class="pagina__td pagina__td--premium">
               <i class="fa fa-check" aria-hidden="true"></i>
            </td>
         </tr>
         <tr>
            <td class="pagina__td pagina__td--titulo">Acceso a la programación anual</td>
            <td class="pagina__td pagina__td--clasico">
               <i class="fa fa-window-minimize" aria-hidden="true"></i>
            </td>
            <td class="pagina__td pagina__td--premium">
               <i class="fa fa-check" aria-hidden="true"></i>
            </td>
         </tr>
         <tr>
            <td class="pagina__td pagina__td--titulo">Descuento en diplomado</td>
            <td class="pagina__td pagina__td--clasico">
               <i class="fa fa-window-minimize" aria-hidden="true"></i>
            </td>
            <td class="pagina__td pagina__td--premium">
               <i class="fa fa-check" aria-hidden="true"></i>
            </td>
         </tr>
      </table>
   </div>
</section>