<?php include_once 'wc_informacion.php'; ?>

<?php if($membershipsActivo) { ?>
   <div class="wc_notificacion wc_notificacion--activo">
      <i class="wc_notificacion__icono fa fa-check" aria-hidden="true"></i>
      <div class="wc_notificacion__descripcion">
         <div class="wc_notificacion__texto">Su Membresía sigue Activo</div>
      </div>
      
   </div>
   <p class="wc_guiadecompra">Realice click en el cuadro para realizar su compra</p>
<?php } else {?>
   <p class="wc_guiadecompra">Realice click en el cuadro para realizar su compra</p>
<?php } ?>

<div class="wc_planes">
   <div class="wc_planes__simple">
      <div class="wc_planes__cart wc_planes__cart--regular" data-id="<?php echo $product->id; ?>" data-add="1">
         <i class="wc_planes__icono wc_planes__icono--simple fa fa-cart-plus" aria-hidden="true"></i>
         <div class="wc_planes__info">
            <div class="wc_planes__name">Precio</div>
            <div class="wc_planes__texto wc_planes__texto--slogan">Accede <span>sólo</span> a este Curso</div>
            <div class="wc_planes__texto wc_planes__texto--precio">
               <?php echo $product->get_price_html();?>
            </div>
            <div class="wc_planes__texto wc_planes__texto--descripcion">Duración 30 Días</div>
         </div>
      </div>

      <?php if($membershipsActivo) { ?>
         <?php foreach( $planes as $plan ) { ?>
            <?php if($plan->estado === 'wcm-active') { ?>
               <?php if($plan->dias < 15 ) { ?>
                  <h2 class="wc_dashboard__titulo">Su Membresia esta por Finalizar - Renueva Aquí</h2>
                  <div class="wc_dashboard__descripcion">Promoción disponible hasta antes de finalizar su Membresía</div>
                  <?php include 'wc_planes.php'; ?>
               <?php } ?>
            <?php } ?>
         <?php } ?>
      <?php } else { ?>
         <h2>Promosion Exlusiva</h2>
         <?php include 'wc_planes.php'; ?>
      <?php } ?>
      
   </div>
   <div class="wc_simples__detalle">
      <div class="wc_simples__contenido"></div>
   </div>
</div>











<!-- <div class="wcm_shop wcm_shop--grid" id="simple">
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
</div> -->

<div class="wc_pagar"></div>

<hr>