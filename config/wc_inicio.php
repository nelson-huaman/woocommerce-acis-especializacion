<?php
   global $product;
   include 'wc_datos.php';
   include 'wc_fecha.php';
?>

<div class="wc_detalles__detalle">
   <p class="wc_detalles__icono">
      <i class="fa fa-youtube-play" aria-hidden="true"></i>
      <?php echo $textoIcono; ?>
   </p>
   <p class="wc_detalles__icono">
      <i class="fa fa-calendar" aria-hidden="true"></i>
      <?php echo $fechaIcono; ?>
   </p>
   <p class="wc_detalles__icono">
      <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
      <?php echo $duracionIcono; ?>
   </p>
</div>
<div class="wc_detalles__detalle">
   <p class="wc_detalles__icono">
      <i class="fa fa-desktop" aria-hidden="true"></i>
      <?php echo $horas; ?> Hr. Acad.
   </p>
   <p class="wc_detalles__icono">
      <i class="fa fa-graduation-cap" aria-hidden="true"></i>
      <?php echo $creditos; ?> Créditos
   </p>
   <p class="wc_detalles__icono">
      <i class="fa fa-trophy" aria-hidden="true"></i>
      <?php echo $programa; ?>
   </p>
</div>