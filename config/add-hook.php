<?php

wc_delete_product_transients();
// Calendario shortcode
function wc_calendario ( $content = null ) {
   $args = [
      'status'    => 'publish',
      'limit'     => 20,
      'page'      => 1,
   ];
  
   $products = wc_get_products($args);
   $product_data = [];

   foreach ($products as $product) {
      $metaDato = get_post_meta($product->get_id()); // Meta Datos
      $link = $product->get_permalink(); // Link del Producto
      $fechaActual = strtotime(date("Y-m-d")); // Fecha Actual
      $diaDelServicio = isset($metaDato['dia_inicio'][0]) ? $metaDato['dia_inicio'][0] : ''; // Extraer y convertir

      // Convertir 'dia_inicio' al formato 'YYYY-MM-DD' para asegurar que strtotime lo entienda
      if (!empty($diaDelServicio) && strlen($diaDelServicio) == 8) {
         $fechaFinal = strtotime(substr($diaDelServicio, 0, 4) . '-' . substr($diaDelServicio, 4, 2) . '-' . substr($diaDelServicio, 6, 2));

         $fechaDiaTexto = date_i18n('l', $fechaFinal);
         $fechaDia = date_i18n('j', $fechaFinal);
         $fechaMes = date_i18n('F', $fechaFinal);
         $fechaYear = date_i18n('Y', $fechaFinal);

         // Guardar solo si la fecha es futura
         if ($fechaFinal > $fechaActual) {
            $product_data[] = [
               // 'product' => $product,
               'fecha' => $fechaFinal,
               'diaTexto' => $fechaDiaTexto,
               'dia' => $fechaDia,
               'mes' => $fechaMes,
               'year' => $fechaYear,
               'link' => $link,
               'sku' => $product->get_sku(),
               'titulo' => $product->get_name(),
               'servicio' => $metaDato['programa'][0],
               'horas' => $metaDato['horas'][0],
               'duracion' => $metaDato['duracion'][0],
               'imagen' => wp_get_attachment_url( $product->get_image_id() )
            ];
         }
      }
   }

   usort($product_data, function($a, $b) {
      return $a['fecha'] <=> $b['fecha']; // Ordernar por fecha
   });

   $content = "<div class='wc_calendario' id='calendario'>";
      ?>
         <!-- <div class="wc_calendario__header">
            <button type="button" class="wc_calendario__boton activo"><i class="fa fa-windows" aria-hidden="true"></i></button>
            <button type="button" class="wc_calendario__boton"><i class="fa fa-bars" aria-hidden="true"></i></button>
         </div> -->
         <div class="wc_calendario__contenido grid">
      <?php

  // Mostrar productos en orden de fecha
  foreach ($product_data as $data) {

      if($data['servicio'] === 'Curso') {
         $categoria = $data['servicio'] . ' de Actulizacion: ';
      } else {
         $categoria = $data['servicio'];
      }

      ?>
         <div class="wc_calendario__item">
            <img src="<?php echo esc_url($data['imagen']); ?>" alt="<?php echo esc_attr($data['titulo']); ?>" loading="lazy" width="800" height="100">
            <div class="wc_calendario__content">
               <h2 class="wc_calendario__h2"><?php echo esc_html($categoria . $data['titulo']); ?></h2>
               <div class="wc_calendario__info">
                  <div class="wc_calendario__fecha">
                     <span class="wc_calendario__fecha--texto">En vivo <?php echo esc_html($data['diaTexto']); ?></span>
                     <div class="wc_calendario__fecha--fecha">
                        <span class="wc_calendario__fecha--dia"><?php echo esc_html($data['dia']); ?></span>
                        <div class="wc_calendario__fecha--div">
                           <span class="wc_calendario__fecha--mes"><?php echo esc_html($data['mes']); ?></span>
                           <span class="wc_calendario__fecha--year"><?php echo esc_html($data['year']); ?></span>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="<?php echo esc_url($data['link']); ?>" class="wc_calendario__enlace">Comprar Curso</a>
            </div>
         </div>
      <?php
   }

      $content .= "</div>";
   $content .= "</div>";

   return do_shortcode( $content ); 
}
add_shortcode( 'calendario', 'wc_calendario' );

// Pagina de Membresia shortcode
function page_membresia ( $content = null ) {
   $content = "<div class='pagina'>";
   // $content .= "Hola";
      include 'page/membresia.php';
   $content .= "</div>";

   return do_shortcode( $content ); 
}
add_shortcode( 'page_membresia', 'page_membresia' );

// Home Membresia shortcode
function home_membresia ( $content = null ) {
   $content = "<div class='pagina'>";
   // $content .= "Hola";
   include 'page/homemembresia.php';
   $content .= "</div>";

   return do_shortcode( $content ); 
}
add_shortcode( 'home_membresia', 'home_membresia' );

function my_account_menu_order() {
   $menuOrder = array(
      'dashboard'          => __( 'Inicio', 'woocommerce' ),
      'orders'             => __( 'Mis Compras', 'woocommerce' ),
      'edit-account'    => __( 'Mis Datos', 'woocommerce' ),
      'customer-logout'    => __( 'Cerrar Sesión', 'woocommerce' ),
   );
   return $menuOrder;
} add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


function add_endpoint_membresia( $menu_links ){
   
   $new = array(
      'skucursos' => 'Mis Cursos',
      'tutoriales' => 'Tutoriales'
   );
   $menu_links = array_slice( $menu_links, 0, 2, true ) 
   + $new 
   + array_slice( $menu_links, 2, NULL, true );
   return $menu_links;

} add_filter ( 'woocommerce_account_menu_items', 'add_endpoint_membresia' );

// Add link de la pagina al Menú
function add_endpoint_url_membresia( $url, $endpoint, $value, $permalink ){

   if ( 'skucursos' === $endpoint ) {
      $url = site_url('/intranet/eb_my_courses/');
   }

   if( 'tutoriales' === $endpoint) {
      $url = site_url('/intranet/tutoriales/');
   }
   return $url;

} add_filter( 'woocommerce_get_endpoint_url', 'add_endpoint_url_membresia', 10, 4 );


// ADD class menu Mi Membresía
add_filter('woocommerce_account_menu_item_classes', function( $classes, $endpoint ){
   if ( $endpoint == "skucursos" ) {
      $urlStub = "/intranet/eb_my_courses/";
      if( substr_compare( $_SERVER['REQUEST_URI'], $urlStub, -strlen( $urlStub ) ) === 0 ) $classes[] = 'is-active';
   }

   if ( $endpoint == "tutoriales" ) {
      $urlStub = "/intranet/tutoriales/";
      if( substr_compare( $_SERVER['REQUEST_URI'], $urlStub, -strlen( $urlStub ) ) === 0 ) $classes[] = 'is-active';
   }
   return $classes;
},10,2);


add_action( 'init', 'endpoin_tutoriales' );
function endpoin_tutoriales() {
	add_rewrite_endpoint( 'tutoriales', EP_PAGES );
}

add_action( 'woocommerce_account_tutoriales_endpoint', 'wc_tutoriales' );
function wc_tutoriales() {
   require 'tutoriales.php';
}

// Añadir acción en todas las categorías de WooCommerce
function mi_accion_personalizada_todas_categorias() {
   if (is_product_category()) {
      ?>
         <div class="buscar">
            <?php echo do_shortcode('[fibosearch]'); ?>
         </div>
      <?php
   }
}

// Hook para ejecutar la función antes del loop de productos
add_action('woocommerce_before_shop_loop', 'mi_accion_personalizada_todas_categorias');


// Añadir campos personalizados para las cuotas en la página de edición de productos variables
add_action('woocommerce_product_after_variable_attributes', 'custom_variation_fields', 10, 3);
function custom_variation_fields($loop, $variation_data, $variation) {
   // Campo de Cuotas
   woocommerce_wp_text_input( array(
      'id' => 'variation_cuotas_field[' . $variation->ID . ']',
      'label' => __('Cantidad de Cuotas', 'woocommerce'),
      'desc_tip' => 'true',
      'description' => __('Número de cuotas para esta variación.', 'woocommerce'),
      'value' => get_post_meta($variation->ID, '_variation_cuotas_field', true)
   ));

}

// Guardar los valores de los campos personalizados
add_action('woocommerce_save_product_variation', 'save_custom_variation_fields', 10, 2);
function save_custom_variation_fields($variation_id, $i) {
   // Guardar el valor de las Cuotas
   $custom_variation_cuotas_value = $_POST['variation_cuotas_field'][$variation_id];
   update_post_meta($variation_id, '_variation_cuotas_field', esc_attr($custom_variation_cuotas_value));
}

// Mostrar el valor de los campos personalizados en la página del producto
add_filter('woocommerce_available_variation', 'display_custom_variation_fields');
function display_custom_variation_fields($variations) {
   // Obtener el ID de la variación
   $variation_id = $variations['variation_id'];
   $cuotas = get_post_meta($variation_id, '_variation_cuotas_field', true); // Obtener los campos personalizados
   $variations['variation_cuotas_field'] = $cuotas ? $cuotas : __('No disponible', 'woocommerce'); // Añadir los campos personalizados a las variaciones disponibles
   return $variations;
}