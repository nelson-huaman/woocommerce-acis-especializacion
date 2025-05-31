<?php

   $dataVariation = [];
   foreach ($product->get_available_variations() as $variation):
      $precio_regular = $variation['display_regular_price'];
      $precio_oferta = $variation['display_price'];
      $descuento = 0;
      
      if ($precio_regular > 0 && $precio_oferta < $precio_regular) {
         $descuento = round((($precio_regular - $precio_oferta) / $precio_regular) * 100);
      }

      foreach (wc_get_product($variation['variation_id'])->get_variation_attributes() as $nombreVariacion):
         if($descuento === 0) {
            $option = "{$nombreVariacion}";
         } else {
            $option = "{$nombreVariacion} (Inc. {$descuento}% dscto.)";
         }
         $dataVariation[] = [
            'id' => $variation['variation_id'],
            'name_option' => $option,
            'regular' => $precio_regular,
            'oferta' => $precio_oferta,
         ];
      endforeach;
   endforeach;

?>

<div class="precios">
   <p class="precios__texto precios__texto--titulo">Quiero Matricularme</p>
   <form class="precios__formulario" >
      <label for="precio">Elija un esquema de pago</label>
      <select name="precio" id="opciones-pago">
         <option value="">Seleccionar</option>
         <?php foreach ($dataVariation as $variacion): ?>
            <option
               value="<?php echo $variacion['id']; ?>"
               data-regular="<?php echo $variacion['regular']; ?>"
               data-oferta="<?php echo $variacion['oferta']; ?>"
            >
               <?php echo $variacion['name_option']; ?>
            </option>
         <?php endforeach; ?>
      </select>
   </form>

   <div class="precios__mostrar"></div>
</div>