<div class="wc_variaciones" id="variaciones">
         <?php foreach ($product->get_available_variations() as $variation) { ?>
            
            <?php foreach (wc_get_product($variation['variation_id'])->get_variation_attributes() as $nombreVariacion) { ?>
               <div class="wc_variaciones__opcion">
                  <div class="wc_variaciones__div">
                     <input class="wc_variaciones__radio" type="radio" name="variation" value="<?php echo $variation['variation_id']; ?>" checked data-id="<?php echo $nombreVariacion; ?>">
                  </div>
                  <div class="wc_variaciones__contenido">
                     <p class="wc_variaciones__slogan"><?php echo $nombreVariacion; ?></p>
                     <div class="wc_variaciones__precio">
                        <?php echo $variation['price_html']; ?>
                     </div>
                     <div class="wc_variaciones__descripcion">
                        <?php if($variation['variation_description']) { ?>
                           <?php $atributos = explode(',', $variation['variation_description']); ?>
                           <?php foreach($atributos as $atributo) { ?>
                              <div class="wc_variaciones__atributo"><?php echo $atributo; ?></div>
                           <?php } ?>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            <?php } ?>
         <?php } ?>
      </div>