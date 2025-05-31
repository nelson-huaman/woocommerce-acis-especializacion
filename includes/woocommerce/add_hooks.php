<?php

// Validar que solo se puede comprar un curso a la vez
add_filter('woocommerce_add_to_cart_validation', 'limit_cart_to_one_product', 10, 2);
function limit_cart_to_one_product($passed, $product_id)
{
   if (WC()->cart->get_cart_contents_count() > 0) {
      $checkout_url = wc_get_checkout_url();
      wc_add_notice(__('Solo puedes comprar un Curso o Diplomado a la vez. Por favor, finaliza tu compra actual antes de añadir otro servicio. <a href="' . esc_url($checkout_url) . '" class="button wc-forward">Finalizar Compra</a>'), 'error');
      return false;
   }
   return $passed;
}

// Agregar un buscador de producto por SKU y título en la categoría de productos
add_action('woocommerce_before_shop_loop', 'add_product_search_by_sku_and_title', 15);
function add_product_search_by_sku_and_title()
{
   if (is_product_category()) {
?>
      <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
         <label for="woocommerce-product-search-field" class="screen-reader-text"><?php esc_html_e('Buscar productos:', 'woocommerce'); ?></label>
         <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php esc_attr_e('Encuentra lo que estas buscando aquí', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
         <input type="hidden" name="post_type" value="product" />
         <button type="submit" value="<?php esc_attr_e('Buscar', 'woocommerce'); ?>"><?php esc_html_e('Buscar', 'woocommerce'); ?></button>
      </form>
   <?php
   }
}

// Modificar la consulta de búsqueda para incluir SKU
add_filter('woocommerce_product_query_meta_query', 'search_by_sku_or_title', 10, 2);
function search_by_sku_or_title($meta_query, $query)
{
   if (!is_admin() && isset($_GET['s']) && !empty($_GET['s'])) {
      $search_term = sanitize_text_field($_GET['s']);
      $meta_query[] = array(
         'relation' => 'OR',
         array(
            'key' => '_sku',
            'value' => $search_term,
            'compare' => 'LIKE'
         ),
         array(
            'key' => '_title',
            'value' => $search_term,
            'compare' => 'LIKE'
         )
      );
   }
   return $meta_query;
}

// Añadir campos personalizados para las cuotas en la página de edición de productos variables
function custom_variation_fields($loop, $variation_data, $variation)
{
   // Campo de Cuotas
   woocommerce_wp_text_input(array(
      'id' => 'variation_cuotas_field[' . $variation->ID . ']',
      'label' => __('Cantidad de Cuotas', 'woocommerce'),
      'desc_tip' => 'true',
      'description' => __('Número de cuotas para esta variación.', 'woocommerce'),
      'value' => get_post_meta($variation->ID, '_variation_cuotas_field', true)
   ));
}
add_action('woocommerce_product_after_variable_attributes', 'custom_variation_fields', 10, 3);

// Guardar los valores de los campos personalizados
function save_custom_variation_fields($variation_id, $i)
{
   // Guardar el valor de las Cuotas
   $custom_variation_cuotas_value = $_POST['variation_cuotas_field'][$variation_id];
   update_post_meta($variation_id, '_variation_cuotas_field', esc_attr($custom_variation_cuotas_value));
}
add_action('woocommerce_save_product_variation', 'save_custom_variation_fields', 10, 2);

// Mostrar el valor de los campos personalizados en la página del producto
function display_custom_variation_fields($variations)
{
   // Obtener el ID de la variación
   $variation_id = $variations['variation_id'];
   $cuotas = get_post_meta($variation_id, '_variation_cuotas_field', true); // Obtener los campos personalizados
   $variations['variation_cuotas_field'] = $cuotas ? $cuotas : __('No disponible', 'woocommerce'); // Añadir los campos personalizados a las variaciones disponibles
   return $variations;
}
add_filter('woocommerce_available_variation', 'display_custom_variation_fields');


// Forzar la carga de Script de WooCommerce
function force_wc_cart_scripts()
{
   if (class_exists('WooCommerce')) {
      wp_enqueue_script('wc-add-to-cart');
      wp_localize_script('wc-add-to-cart', 'wc_add_to_cart_params', array(
         'ajax_url' => admin_url('admin-ajax.php'),
         'wc_ajax_url' => WC_AJAX::get_endpoint('%%endpoint%%'),
         'i18n_view_cart' => esc_attr__('View cart', 'woocommerce'),
         'cart_url' => wc_get_cart_url(),
         'is_cart' => is_cart(),
         'cart_redirect_after_add' => get_option('woocommerce_cart_redirect_after_add') === 'yes' ? 'yes' : 'no'
      ));
   }
}
add_action('wp_enqueue_scripts', 'force_wc_cart_scripts', 20);

// Añada candidad de compras por dia y por mes
add_filter('woocommerce_add_to_cart_validation', 'limit_cart_purchases_per_day_and_month', 20, 2);
function limit_cart_purchases_per_day_and_month($passed, $product_id)
{
   if (!is_user_logged_in()) {
      return $passed; // Solo aplica a usuarios logueados
   }

   $user_id = get_current_user_id();
   $today = date('Y-m-d');
   $month = date('Y-m');

   // Obtener historial de pedidos completados del usuario
   $args = array(
      'customer_id' => $user_id,
      'status'      => array('completed', 'processing'),
      'limit'       => -1,
      'return'      => 'ids',
   );
   $orders = wc_get_orders($args);

   $count_day = 0;
   $count_month = 0;

   foreach ($orders as $order_id) {
      $order = wc_get_order($order_id);
      $order_date = $order->get_date_created();
      if (!$order_date) continue;
      $order_date_str = $order_date->date('Y-m-d');
      $order_month_str = $order_date->date('Y-m');

      foreach ($order->get_items() as $item) {
         $qty = $item->get_quantity();
         if ($order_date_str === $today) {
            $count_day += $qty;
         }
         if ($order_month_str === $month) {
            $count_month += $qty;
         }
      }
   }

   // Sumar lo que hay en el carrito actual
   foreach (WC()->cart->get_cart() as $cart_item) {
      $count_day += $cart_item['quantity'];
      $count_month += $cart_item['quantity'];
   }

   if ($count_day >= 3) {
      wc_add_notice(__('Has alcanzado el límite de 3 compras por día. Intenta nuevamente mañana.'), 'error');
      return false;
   }
   if ($count_month >= 20) {
      wc_add_notice(__('Has alcanzado el límite de 20 compras por mes. Intenta nuevamente el próximo mes.'), 'error');
      return false;
   }

   return $passed;
}

// Cambiar el texto del label de "Username or Email Address"
function wc_form_personalizado($translated_text, $text, $domain)
{
   if ('Username or email address' === $text && 'woocommerce' === $domain) {
      $translated_text = 'DNI o Correo';
   }

   if ('Username or email' === $text && 'woocommerce' === $domain) {
      $translated_text = 'DNI o Correo';
   }

   if ('Password' === $text && 'woocommerce' === $domain) {
      $translated_text = 'Contraseña (DNI)';
   }

   if ('Username' === $text && 'woocommerce' === $domain) {
      $translated_text = 'DNI';
   }

   if ('Email address' === $text && 'woocommerce' === $domain) {
      $translated_text = 'Correo';
   }

   if ('Account username' === $text && 'woocommerce' === $domain) {
      $translated_text = 'DNI';
   }

   if ('Create account password' === $text && 'woocommerce' === $domain) {
      $translated_text = 'Contraseña (DNI)';
   }

   return $translated_text;
}
add_filter('gettext', 'wc_form_personalizado', 20, 3);

/**
 * Añadir un nuevo ítem de menú a Mi Cuenta de WooCommerce
 */
// 1. Añadir varios ítems de menú personalizados
function acis_add_custom_my_account_menu_items($items)
{
   $logout = $items['customer-logout'];
   unset($items['customer-logout']);
   $items['tutoriales'] = __('Tuturiales', 'woocommerce');
   $items['mis-certificados'] = __('Mis Certificados', 'woocommerce');
   $items['customer-logout'] = $logout;
   return $items;
}
add_filter('woocommerce_account_menu_items', 'acis_add_custom_my_account_menu_items');

// 2. Registrar endpoints para cada menú
function acis_add_custom_my_account_endpoints()
{
   add_rewrite_endpoint('tutoriales', EP_ROOT | EP_PAGES);
   add_rewrite_endpoint('mis-certificados', EP_ROOT | EP_PAGES);
}
add_action('init', 'acis_add_custom_my_account_endpoints');

// 3. Mostrar el contenido de cada endpoint
function acis_custom_my_account_content1()
{
   include 'dashboard/tutoriales.php';
}
add_action('woocommerce_account_tutoriales_endpoint', 'acis_custom_my_account_content1');

function acis_custom_my_account_content2()
{
   include 'dashboard/certificados.php';
}
add_action('woocommerce_account_mis-certificados_endpoint', 'acis_custom_my_account_content2');

/**
 * Mostrar texto encima de la imagen del producto en la página de producto individual
 */
function acis_text_above_product_image_loop() {
   include 'data.php';

   ?>
      <div class="banner <?php echo $isCurso ? 'curso' : 'diplomado'; ?>">
         <div class="left"><?php echo $data['servicio']; ?></div>
         <div class="right"><?php echo $data['area']; ?></div>
      </div>
   <?php
}
add_action('woocommerce_before_shop_loop_item_title', 'acis_text_above_product_image_loop', 5);
