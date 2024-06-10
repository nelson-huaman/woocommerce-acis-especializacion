<?php if($memberships) { ?>
   <div class="wc_membresia wc_membresia--activo">
      <i class="fas fa-clipboard-check"></i>
      <div class="wc_membresia__info">
         <p class="wc_membresia__texto">Su Membresía sigue Activo</p>
      </div>
   </div>
   <p class="wc_info">Selecciona el cuadro haciendo Click para adquirir el Curso</p>
<?php } else {?>
   <p class="wc_info">Selecciona el cuadro haciendo Click para realizar el Pago</p>
<?php } ?>

<div class="wcm_shop wcm_shop--grid" id="simple">
   <div class="wcm_shop__cart wcm_shop__cart--regular" data-id="<?php echo $product->id; ?>" data-add="1">
      <i class="wcm_shop__icono wcm_shop__icono--simple fa fa-cart-plus" aria-hidden="true"></i>
      <div class="wcm_shop__info">
         <div class="wcm_shop__name">Precio</div>
         <div class="wcm_shop__texto wcm_shop__texto--slogan">Accede <span>sólo</span> a este Curso</div>
         <div class="wcm_shop__texto wcm_shop__texto--precio">
            <?php echo $product->get_price_html();?>
         </div>
         <div class="wcm_shop__texto wcm_shop__texto--descripcion">Duración 30 Días</div>
      </div>
   </div>
   <div class="wcm_shop__cart wcm_shop__cart--clasico" data-id="<?php echo $clasico->id; ?>" data-add="2">
      <i class="wcm_shop__icono wcm_shop__icono--simple fa fa-star-half-o"></i>
      <div class="wcm_shop__info">
         <div class="wcm_shop__name">Membresía Clásica</div>
         <div class="wcm_shop__texto wcm_shop__texto--slogan">Accede a <span>todos</span> los cursos por <span>30 Días</span></div>
         <div class="wcm_shop__texto wcm_shop__texto--precio">
            <?php echo $clasico->get_price_html();?>
         </div>
         <div class="wcm_shop__texto wcm_shop__texto--descripcion">Vuélvete <span>Miembro Clásico</span> y Certificate</div>
      </div>
   </div>
   <div class="wcm_shop__cart wcm_shop__cart--premium" data-id="<?php echo $premium->id; ?>" data-add="3">
      <i class="wcm_shop__icono wcm_shop__icono--simple fa fa-star"></i>
      <div class="wcm_shop__info">
         <div class="wcm_shop__name">Membresía Premium</div>
         <div class="wcm_shop__texto wcm_shop__texto--slogan">Accede a <span>todos</span> los cursos por <span>30 Días</span></div>
         <div class="wcm_shop__texto wcm_shop__texto--precio">
            <?php echo $premium->get_price_html();?>
         </div>
         <div class="wcm_shop__texto wcm_shop__texto--descripcion">Vuélvete <span>Miembro Clásico</span> y Certificate</div>
      </div>
   </div>
</div>

<div class="wc_pagar"></div>

<hr>

<?php if($memberships) { ?>
   Activo
<?php } else { ?>
   Inactivo
<?php } ?>