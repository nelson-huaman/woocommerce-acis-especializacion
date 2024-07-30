<?php
   $clasico = wc_get_product(2388);
   $premium = wc_get_product(2390);
?>
<section class="pagina__seccion pagina__seccion--fondo">
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