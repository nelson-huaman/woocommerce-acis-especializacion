<?php
   $premium = wc_get_product(2390);
?>
<section class="pagina__seccion pagina__seccion--fondo">
   <div class="pagina__contenedor">
      <h2 class="pagina__h2 pagina__h2--blanco">
         <span class="pagina__h2--elige">Se parte de los</span>
         Miembros Premium
      </h2>
      <div class="pagina__membresias">
         <div class="pagina__membresia">
            <div class="pagina__cuerpo">
               <div class="pagina__cabecera">
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
            <div class="pagina__ul">
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
            <a href="?add-to-cart=<?php echo $premium->id; ?>" class="pagina__boton">Adquirir Plan</a>
            <img class="pagina__eira" loading="lazy" width="500" height="500"  src="<?php echo IMG . 'eira-premium'; ?>.svg" alt="Imagen Eira Premium">
         </div>
      </div>
   </div>
</section>