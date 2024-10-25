
<?php
// Calendario shortcode
function wc_calendario ( $content = null ) {
   $args = array (
      'status' => 'publish',
      'limit' => 20,
      'page'  => 1,
   );
   $products = wc_get_products($args);

   $content = "<div class='wc_calendario'>";
 
      foreach ($products as $product) {
         $metaDato = get_post_meta($product->id);
         $link = $product->get_permalink();
         $fechaActual = strtotime(date("d-m-Y"));
         $fechaFinal = strtotime($metaDato['dia_final'][0]);

         if($fechaFinal > $fechaActual) {
            ?>
               <a href="<?php echo $link; ?>" class="wc_calendario__link">
                  <img class="wc_calendario__imagen" loading="lazy" width="800" height="100" src="https://acis.edu.pe/RECURSOS_PROGRAMA/CALENDARIO/<?php echo $product->sku; ?>.webp" alt="<?php echo $product->name; ?>">
               </a>
            <?php            
         }
      }

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


// Añadir campos personalizados para las cuotas, precio regular y precio rebajado en la página de edición de productos variables
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
  
   // Campo de Precio Regular
   woocommerce_wp_text_input( array(
      'id' => 'variation_regular_price_field[' . $variation->ID . ']',
      'label' => __('Precio Regular', 'woocommerce'),
      'desc_tip' => 'true',
      'description' => __('Precio regular para esta variación.', 'woocommerce'),
      'value' => get_post_meta($variation->ID, '_variation_regular_price_field', true)
   ));
}

// Guardar los valores de los campos personalizados
add_action('woocommerce_save_product_variation', 'save_custom_variation_fields', 10, 2);
function save_custom_variation_fields($variation_id, $i) {
   // Guardar el valor de las Cuotas
   $custom_variation_cuotas_value = $_POST['variation_cuotas_field'][$variation_id];
   update_post_meta($variation_id, '_variation_cuotas_field', esc_attr($custom_variation_cuotas_value));

   // Guardar el valor del Precio Regular
   $custom_variation_regular_price_value = $_POST['variation_regular_price_field'][$variation_id];
   update_post_meta($variation_id, '_variation_regular_price_field', esc_attr($custom_variation_regular_price_value));
}

// Mostrar el valor de los campos personalizados en la página del producto
add_filter('woocommerce_available_variation', 'display_custom_variation_fields');
function display_custom_variation_fields($variations) {
   // Obtener el ID de la variación
   $variation_id = $variations['variation_id'];

   // Obtener los campos personalizados
   $cuotas = get_post_meta($variation_id, '_variation_cuotas_field', true);
   $regular_price = get_post_meta($variation_id, '_variation_regular_price_field', true);

   // Añadir los campos personalizados a las variaciones disponibles
   $variations['variation_cuotas_field'] = $cuotas ? $cuotas : __('No disponible', 'woocommerce');
   $variations['variation_regular_price_field'] = $regular_price ? $regular_price : __('No disponible', 'woocommerce');

   return $variations;
}



