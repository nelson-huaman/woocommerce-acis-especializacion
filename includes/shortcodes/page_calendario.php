<?php

$args = ['status' => 'publish', 'limit' => 20, 'page' => 1,];

$products = wc_get_products($args);
$product_data = [];

foreach ($products as $product) {
   $metaDato = get_post_meta($product->get_id());
   $link = $product->get_permalink();
   $fechaActual = strtotime(current_time('Y-m-d'));
   $diaDelServicio = $metaDato['dia_inicio'][0] ?? '';

   if (!empty($diaDelServicio) && strlen($diaDelServicio) === 8) {
      $fechaFinal = strtotime(sprintf('%s-%s-%s', substr($diaDelServicio, 0, 4), substr($diaDelServicio, 4, 2), substr($diaDelServicio, 6, 2)));

      if ($fechaFinal > $fechaActual) {
         $product_data[] = [
            'fecha'    => $fechaFinal,
            'diaTexto' => date_i18n('l', $fechaFinal),
            'dia'      => date_i18n('j', $fechaFinal),
            'mes'      => date_i18n('F', $fechaFinal),
            'year'     => date_i18n('Y', $fechaFinal),
            'link'     => $link,
            'sku'      => $product->get_sku(),
            'titulo'   => $product->get_name(),
            'servicio' => $metaDato['servicio'][0] ?? '',
            'area'    => $metaDato['area'][0] ?? '',
            'duracion' => $metaDato['duracion'][0] ?? '',
            'creditos' => isset($metaDato['creditos'][0]) ? str_pad($metaDato['creditos'][0], 2, '0', STR_PAD_LEFT) : '',
            'imagen'   => wp_get_attachment_url($product->get_image_id()) ?: '',
            'categoria' => wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'names'])[0] ?? '',
         ];
      }
   }
}

usort($product_data, fn($a, $b) => $a['fecha'] <=> $b['fecha']);

?>

<div class="pagina">
   <h1 class="pagina__h1" data-aos="fade-up">Nuestros Próximos Cursos y Diplomados</h1>

   <div class="calendarios">
      <div class="calendarios__grid">
         <?php foreach ($product_data as $data): ?>
            <?php
            $fecha = ucfirst(strtolower($data['diaTexto'])) . ', ' . $data['dia'] . ' de ' . ucfirst(strtolower($data['mes']));
            $fondo = $data['imagen'];
            $color = ($data['servicio'] === 'Curso') ? 'curso' : 'diplomado';
            ?>

            <div class="calendarios__calendario calendarios__calendario--<?php echo $color; ?>" data-aos="fade-up">
               <a href="<?php echo $data['link']; ?>" class="calendarios__link">
                  <div class="banner <?php echo ($data['servicio'] === 'Curso') ? 'curso' : 'diplomado'; ?>">
                     <div class="left"><?php echo $data['servicio']; ?></div>
                     <div class="right"><?php echo $data['area']; ?></div>
                  </div>
                  <div class="calendarios__contenidos calendarios__contenidos--<?php echo ($data['servicio'] === 'Curso') ? 'curso' : 'diplomado'; ?>">
                     <div class="calendarios__contenido">
                        <h2 class="calendarios__titulo"><?php echo $data['servicio'] . ' de ' . $data['titulo']; ?></h2>
                        <div class="calendarios__detalle">
                           <p class="calendarios__texto"><i class="fa-solid fa-calendar-days"></i> <?php echo $fecha; ?></p>
                           <p class="calendarios__texto"><i class="fa-solid fa-award"></i> <?php echo $data['creditos']; ?> Creditos</p>
                        </div>
                     </div>
                     <div class="calendarios__destacado">
                        <img class="calendarios__imagen" src="<?php echo URL_BASE . '/RECURSOS_PROGRAMA/CALENDARIO/' . $data['sku']; ?>.webp" alt="<?php echo $data['servicio'] . ' de ' . $data['titulo']; ?>">
                     </div>
                  </div>
               </a>
            </div>
         <?php endforeach; ?>
      </div>
   </div>

</div>