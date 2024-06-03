<div class="wc_decripciones">
   <?php

   global $product;
   include 'wc_datos.php';
   include 'wc_fecha.php';

   $clasico = wc_get_product(2388);
   $premium = wc_get_product(2390);

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
         <div class="wc_tag">
            #Enfermeria
         </div>
         <div class="wc_header__contenido">
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
   <?php } else { ?>

   <?php if($product->attributes) {
      include_once 'wc_variacion.php';
      ?>

   <?php } else {

      include_once 'wc_simple.php';
      
      
      ?>

  
      <div class="wc_simple" id="simple">
         <div class="wc_simple__opcion wc_simple__opcion--regular">
            <div class="wc_simple__simple">
               <input class="wc_simple__radio" type="radio" name="simple" id="curso" value="<?php echo $product->id; ?>" data-id="0" checked>
            </div>
            <div class="wc_simple__contenido active">
               <p class="wc_simple__slogan">Accede <span>sólo</span> a este curso</p>
               <div class="wc_simple__precio">
                  <?php echo $product->get_price_html();?>
               </div>
               <p class="wc_simple__slogan">Duración 30 Días</p>
            </div>
         </div>
         <?php if(!$memberships) { ?>
            <div class="wc_simple__opcion wc_simple__opcion--clasico">
               <div class="wc_simple__simple">
                  <input class="wc_simple__radio" type="radio" name="simple" id="curso" value="<?php echo $clasico->id; ?>" data-id="1">
               </div>
               <div class="wc_simple__contenido active">
                  <p class="wc_simple__slogan">Accede a <span>todos</span> los cursos por <span class="wc_simple__tiempo">30 Días</span></p>
                  <div class="wc_simple__precio">
                     <?php echo $clasico->get_price_html();?>
                  </div>
                  <p class="wc_simple__slogan">Vuélvete <span>Miembro Clásico</span> y Certificate</p>
               </div>
            </div>
            <div class="wc_simple__opcion wc_simple__opcion--premium">
               <div class="wc_simple__simple">
                  <input class="wc_simple__radio" type="radio" name="simple" id="curso" value="<?php echo $premium->id; ?>"  data-id="2">
               </div>
               <div class="wc_simple__contenido active">
                  <p class="wc_simple__slogan">Accede a <span>todos</span> los cursos por <span class="wc_simple__tiempo">1 Año</span></p>
                  <div class="wc_simple__precio">
                     <?php echo $premium->get_price_html();?>
                  </div>
                  <p class="wc_simple__slogan">Vuélvete <span>Miembro Premium</span> y Certificate</p>
               </div>
            </div>
         </div>
      <?php } else { ?>
         </div>
      <div class="wc_membresia wc_membresia--activo">
         <p class="wc_membresia__texto">Su Membresia sigue Activo</p>
      </div>
      <?php } ?>
   <?php } ?>

   <div class="wc_pagar">
   </div>
   <?php } ?>
   <div class="wc_descripcion">
      <h2>Descripcion</h2>
      <article id="post-<?php the_ID(); ?>" >
         <?php the_content(); ?>
      </article>
   </div>

   <div class="wc_temario">
      <h2>Lo que Aprenderas</h2>
      <?php echo $temario; ?>
   </div>

   <div class="wc_objetivos">
      <h2>Dirigido a</h2>
      <?php echo $dirigido; ?>
   </div>

   <div class="wc_objetivos">
      <h2>Objetivos</h2>
      <?php echo $objetivos; ?>
   </div>

   <div class="wc_docentes">
      <h2>Docentes que Dictaran</h2>
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