
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

function my_account_menu_order() {
   $menuOrder = array(
      'dashboard'          => __( 'Inicio', 'woocommerce' ),
      'orders'             => __( 'Mis Comprar', 'woocommerce' ),
      'edit-account'    => __( 'Mis Datos', 'woocommerce' ),
      'customer-logout'    => __( 'Cerrar Sesión', 'woocommerce' ),
      
   );
   return $menuOrder;
} add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


function add_endpoint_membresia( $menu_links ){
   
   $new = array(
      'skucursos' => 'Mis Cursos'       
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
   return $url;

} add_filter( 'woocommerce_get_endpoint_url', 'add_endpoint_url_membresia', 10, 4 );


// ADD class menu Mi Membresía
add_filter('woocommerce_account_menu_item_classes', function( $classes, $endpoint ){
   if ( $endpoint == "skucursos" ) {
      $urlStub = "/intranet/eb_my_courses/";
      if( substr_compare( $_SERVER['REQUEST_URI'], $urlStub, -strlen( $urlStub ) ) === 0 ) $classes[] = 'is-active';
   }
   return $classes;
},10,2);


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

