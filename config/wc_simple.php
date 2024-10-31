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
   <div class="wc_planes__item">
      <div class="wc_planes__contenido wc_planes__contenido--regular">
         <div class="wc_planes__header wc_planes__header--regular">
            <div class="wc_planes__icono"><i class="fa fa-star-o" aria-hidden="true"></i></div>
            <div class="wc_planes__informacion">
               <div class="wc_planes__precio wc_planes__precio--regular"><?php echo $product->get_price_html();?></div>
               <span class="wc_planes__frase">Sólo este Curso</span>
            </div>
         </div>
         <div class="wc_planes__footer wc_planes__footer--regular">
            <a href="?add-to-cart=<?php echo $product->id; ?>" class="wc_planes__boton">Comprar Curso</a>
         </div>
      </div>
   </div>
   <?php include 'wc_planes.php'; ?>
</div>