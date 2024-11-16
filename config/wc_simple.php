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
   <div class="wc_curso__item">
      <div class="wc_curso__recomendado wc_curso__recomendado--oculto">Profesional</div>
      <div class="wc_curso__contenido">
         <div class="wc_curso__header">
            <h3 class="wc_curso__h3">Profesional</h3>
            <div class="wc_curso__slogan">Vigencia x 30 Días</div>
            <div class="wc_curso__precio"><?php echo $product->get_price_html();?></div>
            <a href="?add-to-cart=<?php echo $product->id; ?>" class="wc_curso__boton">Pagar Ahora</a>
         </div>
      </div>
   </div>
   <?php if(!$membershipsActivo) { ?>
      <?php include 'wc_premium.php'; ?>
   <?php } ?>
</div>