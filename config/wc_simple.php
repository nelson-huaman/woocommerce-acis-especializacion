<?php include_once 'wc_informacion.php'; ?>

<?php if($membershipsActivo) { ?>
   <div class="wc_notificacion wc_notificacion--activo">
      <i class="wc_notificacion__icono fa fa-check" aria-hidden="true"></i>
      <div class="wc_notificacion__descripcion">
         <div class="wc_notificacion__texto">Su Membresía sigue Activo</div>
      </div>
   </div>
<?php } ?>

<div class="wc_planes" id="planes">
   <div class="wc_planes__simple">
      <div class="wc_planes__item" data-producto="<?php echo $product->id; ?>" data-id="1">
      <div class="wc_planes__tag wc_planes__tag--oculto">Curso</div>
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
         </div>
      </div>
      <?php include 'wc_planes.php'; ?>
   </div>
   <div class="wc_planes__compra"></div>
</div>