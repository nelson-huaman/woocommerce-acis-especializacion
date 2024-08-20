<div class="wc_decripciones">
   <?php

   global $product;
   include 'wc_datos.php';
   include 'wc_fecha.php';

   $clasico = wc_get_product(2388);
   $premium = wc_get_product(2390);

   $offSelinClasico = $clasico->price - $product->price;
   $offSelinPremiun = $premium->price - $product->price;

   $notificacion = '';
   $memberships = '';
   $limiteDiario = 3;

   if ( is_user_logged_in() ) {

      $usuarioID = get_current_user_id();
      $fechaHoy = date('Y-m-d');
      $args = array(
         'customer_id' => $usuarioID,
         'date_created' => $fechaHoy . '...now',
         'status' => array('wc-completed', 'wc-processing', 'wc-on-hold'),
         'return' => 'ids',
      );
   
      $pedidosHoy = wc_get_orders($args);
      if ( count($pedidosHoy) >= $limiteDiario ) {
         $notificacion = 'Has alcanzado tu límite diario de compras. Por favor, vuelve mañana.';
      }

      $memberships = wc_memberships_get_user_active_memberships($usuarioID);
   }

?>
   <div class="wc_header">
      <div class="wc_datos">
         <h1><span><?php echo ($categoria === 'Curso') ? $categoria . ' de Actualización' : $categoria; ?>:</span> <?php echo $product->name; ?></h1>
         <!-- <p class="wc_header__descripcion"></p> -->
         <div class="wc_detalles">
            <?php include 'wc_inicio.php'; ?>
         </div>
         <div class="wc_header__sku"><span>ID: </span><?php echo $product->sku; ?></div>
         <div class="wc_header__item">
            <p class="wc_header__coordinador">
               <span>Coordinador: </span>
               <?php echo $coordinador; ?>
            </p>
            <a href="<?php echo $botonDescargar . $product->sku; ?>.pdf" download="Brochure <?php echo $product->sku; ?>.pdf" target="_blank" class="wc_header__descargar">
               <i class="fa fa-download" aria-hidden="true"></i>
               Descargar Brochure
            </a>
         </div>
      </div>
      <div class="wc_imagen">
         <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="Imagen del Curso">
      </div>
   </div>

   <?php if($notificacion) { ?>
      <div class="wc_membresia wc_membresia--limete">
         <p class="wc_membresia__texto"><?php echo $notificacion; ?></p>
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
</div>