<?php 

   include 'data.php';
   global $product;

   if (isset($product) && is_object($product)) {
      $titulo = $product->get_name();
      $link = $product->get_permalink();
      $sku = $product->get_sku();
   }

?>

<div class="productos">
   <div class="productos__flex">
      <a href="<?php echo $link; ?>">
         <h2 class="productos__titulo"><?php echo "{$data['servicio']} de {$titulo}"; ?></h2>
      </a>
      <div>
         <div class="productos__contendio">
            <?php if($isVigente){ ?>
               <p class="productos__texto"><i class="fa-solid fa-calendar-days"></i> <span>Inicio</span> <?php echo fechaFormat($data['dia_inicio']); ?></p>
            <?php } else { ?>
               <p class="productos__texto"><i class="fa-solid fa-video"></i> <span>Clases</span> Grabadas</p>
            <?php } ?>
            <p class="productos__texto"><i class="fa-solid fa-graduation-cap"></i> <?php echo $data['creditos']; ?> <span>Créditos</span></p>
            <p class="productos__texto"><i class="fa-solid fa-trophy"></i> <?php echo $isCurso ? 'Certificado' : 'Diploma'; ?> <span>Incluido</span></p>
            <p class="productos__texto productos__texto--sku"><span>ID: </span><?php echo $sku; ?></p>
         </div>
         <a href="<?php echo $link; ?>" class="productos__show"><i class="fa-solid fa-eye"></i> Ver <?php echo $data['servicio']; ?></a>
      </div>
   </div>
</div>