<?php if($membershipsActivo) { ?>
   <div class="wc_notificacion wc_notificacion--activo">
      <i class="fa fa-bullhorn" aria-hidden="true"></i>
      <div class="wc_notificacion__descripcion">
         <div class="wc_notificacion__texto">Su Membresía sigue Activo</div>
      </div>
   </div>
<?php } ?>

<div class="wc_guiadecompra">Elige una opción de compra</div>

<div class="wc_planes" id="planes">
   <div class="wc_planes__simple">
      <div class="wc_planes__item">
         <div class="wc_planes__info wc_planes__info--basico">
            <div class="wc_planes__icono">
               <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <div class="wc_planes__shop">
               <div class="wc_planes__datos wc_planes__datos--basico">
                  <?php echo $product->get_price_html();?>
               </div>
               <div class="wc_planes__frase">Sólo este Curso</div>
            </div>
            <div class="wc_planes__cursor">
               <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
            </div>
         </div>
         <a class="wc_planes__boton" href="?add-to-cart=<?php echo $product->id; ?>">Comprar el Curso</a>
      </div>
      <?php include 'wc_planes.php'; ?>
   </div>
</div>