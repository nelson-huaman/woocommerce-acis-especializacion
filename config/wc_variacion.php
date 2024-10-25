<div class="wc_variaciones">
   <h3 class="wc_variaciones__h3">Quiero Matricularme</h3>
   <div class="wc_variaciones__variacion">
      <?php foreach ($product->get_available_variations() as $variation) { ?>
         <?php foreach (wc_get_product($variation['variation_id'])->get_variation_attributes() as $nombreVariacion) { ?>
            <?php
               $cuotasCantidad = (int) $variation['variation_cuotas_field'];
               $precioRegular = (int) $variation['variation_regular_price_field'];
               $precioPago = (int) $variation['display_regular_price'];

               $calculoPrecio = $cuotasCantidad * $precioPago;
               $ahorro = $precioRegular - $calculoPrecio;

               $regular = $variation['display_regular_price'];
               $rebajado = $variation['display_price'];
               
               if($precioRegular > $calculoPrecio) {
                  $descuento = ( ( $precioRegular - $calculoPrecio ) / $precioRegular) * 100;
                  $etiqueta = 'Incluye ' . round($descuento) . '% de dscto.';
               }
               if($cuotasCantidad === 1) {
                  $cuotas = 'Cuota única de:';
               } else {
                  $cuotas =  $cuotasCantidad . ' Cuotas de:';
               }
            ?>
            <?php if($nombreVariacion === 'Precio Regular') { ?>
               <div class="wc_variaciones__item wc_variaciones__item--regular">
                  <div class="wc_variaciones__contenido wc_variaciones__contenido--regular">
                     <h4 class="wc_variaciones__h4"><?php echo $nombreVariacion ?></h4>
                     <p class="wc_variaciones__dscto">Pago total</p>
                     <p class="wc_variaciones__dscto-final">S/. <?php echo $regular; ?></p>
                  </div>
               </div>
            <?php } else if($nombreVariacion === 'Opción 1') { ?>
               <div class="wc_variaciones__item">
                  <div class="wc_variaciones__recomendado">Recomendado</div>
                  <div class="wc_variaciones__contenido wc_variaciones__contenido--recomendado">
                     <h4 class="wc_variaciones__h4"><?php echo $nombreVariacion ?></h4>
                     <span class="wc_variaciones__cuota wc_variaciones__cuota--recomendado"><?php echo $cuotas; ?></span>
                     <span class="wc_variaciones__precio wc_variaciones__precio--recomendado">S/. <?php echo $rebajado; ?></span>
                     <span class="wc_variaciones__etiqueta"><?php echo $etiqueta; ?></span>
                     <span class="wc_variaciones__ahorro">AHORRAS</span>
                     <span class="wc_variaciones__dscto">S/. <?php echo $ahorro; ?></span>
                     <a href="?add-to-cart=<?php echo $variation['variation_id']; ?>" class="wc_variaciones__boton wc_variaciones__boton--recomendado">Pagar</a>
                  </div>
               </div>
            <?php } else { ?>
               <div class="wc_variaciones__item">
                  <div class="wc_variaciones__contenido">
                     <h4 class="wc_variaciones__h4"><?php echo $nombreVariacion ?></h4>
                     <span class="wc_variaciones__cuota"><?php echo $cuotas; ?></span>
                     <span class="wc_variaciones__precio">S/. <?php echo $rebajado; ?></span>
                     <span class="wc_variaciones__etiqueta"><?php echo $etiqueta; ?></span>
                     <span class="wc_variaciones__ahorro">AHORRAS</span>
                     <span class="wc_variaciones__dscto">S/. <?php echo $ahorro; ?></span>
                     <a href="?add-to-cart=<?php echo $variation['variation_id']; ?>" class="wc_variaciones__boton">Pagar</a>
                  </div>
               </div>
            <?php } ?>
         <?php } ?>
      <?php } ?>
   </div>
</div>