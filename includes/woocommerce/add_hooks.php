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
// Mejorar búsqueda por SKU y título en productos WooCommerce
add_filter('posts_search', 'acis_search_by_sku_or_title', 10, 2);
function acis_search_by_sku_or_title($search, $wp_query)
{
   global $wpdb;

   // Solo en frontend, tipo producto y si hay término de búsqueda
   if (!is_admin() && $wp_query->is_search() && isset($wp_query->query_vars['post_type']) && $wp_query->query_vars['post_type'] === 'product' && !empty($wp_query->query_vars['s'])) {
      $search_term = esc_sql($wpdb->esc_like($wp_query->query_vars['s']));
      $search = " AND (
         ({$wpdb->posts}.post_title LIKE '%{$search_term}%')
         OR ({$wpdb->posts}.ID IN (
            SELECT post_id FROM {$wpdb->postmeta}
            WHERE (meta_key = '_sku' AND meta_value LIKE '%{$search_term}%')
         ))
      ) ";
   }
   return $search;
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
      $translated_text = 'Usuario o Correo';
   }

   if ('Username or email' === $text && 'woocommerce' === $domain) {
      $translated_text = 'Usuario o Correo';
   }

   if ('Password' === $text && 'woocommerce' === $domain) {
      $translated_text = 'Contraseña';
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
      $translated_text = 'Contraseña';
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
   $items['tutoriales'] = __('Tutoriales', 'woocommerce');
   // $items['mis-certificados'] = __('Mis Certificados', 'woocommerce');
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
function acis_text_above_product_image_loop()
{
   include 'data.php';

   ?>
      <div class="banner <?php echo $isCurso ? 'curso' : 'diplomado'; ?>">
         <div class="left"><?php echo $data['servicio']; ?></div>
         <div class="right"><?php echo $data['area']; ?></div>
      </div>
   <?php
}
add_action('woocommerce_before_shop_loop_item_title', 'acis_text_above_product_image_loop', 5);


/** Boton para cambiar de Producto */

// 1) Endpoint AJAX que vacía el carrito
add_action('wp_ajax_mi_vaciar_carrito', 'mi_vaciar_carrito');
add_action('wp_ajax_nopriv_mi_vaciar_carrito', 'mi_vaciar_carrito');
function mi_vaciar_carrito() {
   check_ajax_referer('mi_vaciar_carrito_nonce', 'nonce');
   if (WC()->cart) {
      WC()->cart->empty_cart();
   }
   wp_send_json_success();
}

// 2) Inyectar el botón y el JS SOLO en checkout
add_action('wp_footer', function () {
   if (! is_checkout() || is_order_received_page()) return;

   // ⚠️ Cambia esta URL por la categoría a la que quieres enviar al usuario
   $redirect = home_url('/categoria-programa/cursos/');
   $nonce = wp_create_nonce('mi_vaciar_carrito_nonce');
   
   ?>
      <script>
         jQuery(function($) {

            // Variables
            var MiCambiarCurso = {
               ajaxUrl: "<?php echo admin_url('admin-ajax.php'); ?>",
               redirectUrl: "<?php echo esc_js($redirect); ?>",
               nonce: "<?php echo esc_js($nonce); ?>",
               buttonText: "Cambiar a otro curso o diplomado"
            };

            // Inserta el botón SOLO si no existe (evita duplicados al refrescar checkout)
            function colocarBoton() {
               if ($('#btn-cambiar-curso').length) return;

               var $orderTable = $('.woocommerce-checkout-review-order-table');
               var $rowTotal = $orderTable.find('.order-total').last();

               // Fila contenedora dentro de la tabla (queda justo debajo del "Total")
               var $fila = $('<tr class="change-course-row"><td colspan="2"><div id="change-course-container" style="margin-top:12px;"></div></td></tr>');
               var $boton = $('<button type="button" id="btn-cambiar-curso" class="button alt" style="background:#ff6f00;color:#fff;">' + MiCambiarCurso.buttonText + '</button>');

               if ($rowTotal.length) {
                  $rowTotal.after($fila);
                  $('#change-course-container').append($boton);
               } else {
                  // Fallback por si el tema no usa tabla clásica
                  var $wrap = $('.woocommerce-checkout-review-order');
                  if ($wrap.length) {
                     $wrap.append('<div id="change-course-container" style="margin-top:12px;"></div>');
                     $('#change-course-container').append($boton);
                  }
               }
            }

            // Colocar al cargar y cada vez que WooCommerce refresque el checkout por AJAX
            colocarBoton();
            $(document.body).on('updated_checkout', colocarBoton);

            // Click: vaciar carrito y redirigir (funciona al primer clic)
            $(document).on('click', '#btn-cambiar-curso', function(e) {
               e.preventDefault();
               e.stopPropagation();
               e.stopImmediatePropagation(); // evita que otros handlers interfieran

               var $btn = $(this);
               if ($btn.data('processing')) return; // evita doble envíos
               $btn.data('processing', true).prop('disabled', true);

               $.ajax({
                  type: 'POST',
                  url: MiCambiarCurso.ajaxUrl,
                  data: {
                     action: 'mi_vaciar_carrito',
                     nonce: MiCambiarCurso.nonce
                  },
                  complete: function() {
                     // Redirigir siempre, incluso si hubiese algún error de red
                     window.location.href = MiCambiarCurso.redirectUrl;
                  }
               });
            });
         });
      </script>
   <?php
});