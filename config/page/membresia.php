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
            <img class="pagina__enfermeras" loading="lazy" width="500" height="500" src="<?php echo IMG . 'enfermeras'; ?>.png" alt="Imagen enfermeras">
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

<?php require 'homemembresia.php'; ?>

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
            <td class="pagina__td pagina__td--titulo">Acceso a talleres</td>
            <td class="pagina__td pagina__td--clasico">
               <i class="fa fa-window-minimize" aria-hidden="true"></i>
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