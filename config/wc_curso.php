<?php if($membershipsActivo) { ?>
   <div class="wc_notificacion wc_notificacion--activo">
      <i class="fa fa-bullhorn" aria-hidden="true"></i>
      <div class="wc_notificacion__descripcion">
         <div class="wc_notificacion__texto">Su Membresía sigue Activo</div>
      </div>
   </div>
<?php } ?>

<div class="wc_guiadecompra">Elige una opción de compra</div>

<div class="wc_curso" id="wc_curso">
   <?php foreach ($product->get_available_variations() as $variation) { ?>
      <?php foreach (wc_get_product($variation['variation_id'])->get_variation_attributes() as $nombreVariacion) { ?>
         <?php
            $precio = $variation['display_price'];
         ?>
         <div class="wc_curso__item">
            <div class="wc_curso__recomendado wc_curso__recomendado--oculto"><?php echo $nombreVariacion; ?></div>
            <div class="wc_curso__contenido">
               <div class="wc_curso__header">
                  <h3 class="wc_curso__h3"><?php echo $nombreVariacion; ?></h3>
                  <div class="wc_curso__slogan">Vigencia x 30 Días</div>
                  <div class="wc_curso__precio"><?php echo $variation['price_html']; ?></div>
                  <a href="?add-to-cart=<?php echo $variation['variation_id']; ?>" class="wc_curso__boton">Pagar Ahora</a>
               </div>
            </div>
         </div>
      <?php } ?>
   <?php } ?>
   <?php if(!$membershipsActivo) { ?>
      <?php include 'wc_premium.php'; ?>
   <?php } ?>
</div>