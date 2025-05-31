<?php

   $premium = wc_get_product(PREMIUM);
   $precioNormal = $product->get_regular_price();
   $precioOferta = $product->get_sale_price();
   $planNormal = $premium->get_regular_price();
   $planOferta = $premium->get_sale_price();

   $descuentoCurso = ($precioOferta === '') ? '' : $descuentoCurso = round((($precioNormal - $precioOferta) / $precioNormal) * 100);
   $descuentoPlan = ($planOferta === '') ? '' : "<span>Oferta</span>especial";

   $usuario = wp_get_current_user();
   $membershipsActivo = wc_memberships_get_user_active_memberships($usuario->ID);

   if (!empty($membershipsActivo)) {
      $precioPlanActivo = 0;
   } else {
      $precioPlanActivo = $precioNormal;
   }
?>

<div class="simple" id="opcion-pago">
   <div class="simple__item">
      <div class="simple__contenido">
         <p class="simple__texto">Plan de <span>Membresía</span></p>
         <div class="simple__flex">
            <div class="simple__div">
               <div class="simple__input"></div>
            </div>
            <div class="simple__precios">
               <?php if($planOferta) { ?>
                  <span class="simple__precios simple__precios--descuento">S/. <?php echo $planNormal; ?></span>
                  <span class="simple__precios simple__precios--shop">S/. <?php echo $planOferta; ?></span>
               <?php } else { ?>
                  <span class="simple__precios simple__precios--shop">S/. <?php echo $planNormal; ?></span>
               <?php } ?>
            </div>
            <?php if($planOferta) { ?>
               <div>
                  <div class="simple__oferta"><?php echo $descuentoPlan; ?></div>
               </div>
            <?php } ?>
         </div>
         <p class="simple__texto simple__texto--slogan">100% dscto. en todo los Curso</p>
      </div>
      <div class="simple__body">
         <span><i class="fa-solid fa-check"></i>Disfruta de este curso y otros de manera ilimitada.</span>
         <span><i class="fa-solid fa-eye"></i>Después de tu período de la Membresía sera precio regular los Cursos</span>
         <span><i class="fa-solid fa-clock"></i>Duración de la Membresía (un Año)</span>
         <a href="?add-to-cart=<?php echo $premium->id; ?>" class="simple__boton"><i class="fa-solid fa-cart-shopping"></i> Pagar Ahora</a>
      </div>
   </div>
   <div class="simple__item">
      <div class="simple__contenido">
         <p class="simple__texto">Precio <span>Regular</span></p>
         <div class="simple__flex">
            <div>
               <div class="simple__input"></div>
            </div>
            <div class="simple__precios">
               <?php if($precioOferta) { ?>
                  <span class="simple__precios simple__precios--descuento">S/. <?php echo $precioNormal; ?></span>
                  <span class="simple__precios simple__precios--shop">S/. <?php echo $precioOferta; ?></span>
               <?php } else { ?>
                  <span class="simple__precios simple__precios--shop">S/. <?php echo $precioPlanActivo; ?></span>
               <?php } ?>
            </div>
            <?php if($precioOferta) { ?>
               <div>
                  <div class="simple__oferta"><span>Inc. <?php echo $descuentoCurso; ?>%</span>dscto.</div>
               </div>
            <?php } ?>
         </div>
         <p class="simple__texto simple__texto--slogan">Solo este curso</p>
      </div>
      <div class="simple__body">
         <a href="?add-to-cart=<?php echo $product->get_id(); ?>" class="simple__boton"><i class="fa-solid fa-cart-shopping"></i> Pagar Ahora</a>
      </div>
   </div>
</div>