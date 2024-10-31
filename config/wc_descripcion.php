<?php
   global $product;
   include 'wc_datos.php';
   include 'wc_fecha.php';
   include 'wc_informacion.php';
?>


<div class="wc_descripcion">
   <div class="wc_header">
      <div class="wc_datos">
         <h1 class="wc_header__h1"><span><?php echo ($categoria === 'Curso') ? $categoria . ' de Actualización' : $categoria; ?>:</span> <?php echo $product->name; ?></h1>
         <div class="wc_detalles wc_detalles--descripcion">
            <?php include 'wc_inicio.php'; ?>
         </div>
         <div class="wc_header__sku"><span>ID: </span><?php echo $product->sku; ?></div>
         <div class="wc_header__item">
            <p class="wc_header__coordinador">
               <span>Coordinador: </span>
               <?php echo $coordinador; ?>
            </p>
         </div>
      </div>
      <div class="wc_imagen">
         <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="<?php echo ($categoria === 'Curso') ? $categoria . ' de Actualización' : $categoria; ?>: <?php echo $product->name; ?>">
      </div>
   </div>

   <?php if($aviso) { ?>
      <div class="wc_membresia wc_membresia--limite">
         <i class="fa fa-bullhorn" aria-hidden="true"></i>
         <p class="wc_membresia__texto"><?php echo $aviso; ?></p>
      </div> 
   <?php } else {
      if($product->attributes) {
         include_once 'wc_variacion.php';
      } else {
         include_once 'wc_simple.php';
      }
   } ?>

   <div class="wc_acordion" id="acordion">
      <div class="wc_acordion__item">
         <h2 class="wc_acordion__header">
            <i class="wc_acordion__icono fa fa-plus-circle" aria-hidden="true"></i>
            Descripción
         </h2>
         <div class="wc_acordion__body">
            <div id="post-<?php the_ID(); ?>" >
               <?php the_content(); ?>
            </div>
         </div>
      </div>
      <div class="wc_acordion__item">
         <h2 class="wc_acordion__header">
            <i class="wc_acordion__icono fa fa-plus-circle" aria-hidden="true"></i>
            Plan de Estudio
         </h2>
         <div class="wc_acordion__body">
            <div class="wc_temario">
               <?php echo $temario; ?>
            </div>
         </div>
      </div>
      <div class="wc_acordion__item">
         <h2 class="wc_acordion__header">
            <i class="wc_acordion__icono fa fa-plus-circle" aria-hidden="true"></i>
            Dirigido a
         </h2>
         <div class="wc_acordion__body">
            <div class="wc_dirigido">
               <?php echo $dirigido; ?>
            </div>
         </div>
      </div>
      <div class="wc_acordion__item">
         <h2 class="wc_acordion__header">
            <i class="wc_acordion__icono fa fa-plus-circle" aria-hidden="true"></i>
            Objetivos
         </h2>
         <div class="wc_acordion__body">
            <div class="wc_objetivos">
               <?php echo $objetivos; ?>
            </div>
         </div>
      </div>
      <div class="wc_acordion__item">
         <h2 class="wc_acordion__header">
            <i class="wc_acordion__icono fa fa-plus-circle" aria-hidden="true"></i>
            Docentes
         </h2>
         <div class="wc_acordion__body">
            <div class="wc_docentes">
               <?php if( $docentes ) { ?>
                  <div class="wc_docentes__docente">
                     <?php foreach( $docentes as $docente ) {
                        $title = $docente->post_title;
                        $slug = $docente->post_name;
                        $lista = $docente->post_content;
                     ?>

                     <div class="wc_docentes__item">
                        <img loading="lazy" src="https://acis.edu.pe/RECURSOS_PROGRAMA/DOCENTES/<?php echo $slug; ?>.webp" alt="<?php echo $title; ?>" width="50" height="50" class="wc_docentes__imagen">
                        <label class="wc_docentes__label"><?php echo $title; ?></label>
                        <?php echo $lista; ?>
                     </div>

                     <?php } ?>
                  </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>

   <div class="wc_descripcion__descargar">
      <a href="<?php echo $botonDescargar . $product->sku; ?>.pdf" download="Brochure <?php echo $product->sku; ?>.pdf" target="_blank" class="">
         <i class="fa fa-download" aria-hidden="true"></i>
         Descargar Temario
      </a>
   </div>
   
</div>