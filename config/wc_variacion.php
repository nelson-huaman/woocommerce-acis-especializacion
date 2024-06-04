<p class="wc_info">Selecciona el cuadro haciendo Click para realizar el Pago</p>
<div class="wc_variaciones" id="variaciones">
   <?php foreach ($product->get_available_variations() as $variation) { ?>
      <?php foreach (wc_get_product($variation['variation_id'])->get_variation_attributes() as $nombreVariacion) { ?>
         <div class="wc_variaciones__variacion" data-id="<?php echo $variation['variation_id']; ?>" data-nombre="<?php echo $nombreVariacion; ?>">
            <p class="wc_variaciones__slogan"><?php echo $nombreVariacion; ?></p>
            <div class="wc_variaciones__precio"><?php echo $variation['price_html']; ?></div>
            <div class="wc_variaciones__descripcion">
               <?php if($variation['variation_description']) { ?>
                  <?php $atributos = explode(',', $variation['variation_description']); ?>
                  <?php foreach($atributos as $atributo) { ?>
                     <div class="wc_variaciones__atributo"><?php echo $atributo; ?></div>
                  <?php } ?>
               <?php } ?>
            </div>
         </div>
      <?php } ?>
   <?php } ?>
</div>
<div class="wcv_pagar"></div>