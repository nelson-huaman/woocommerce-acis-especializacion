<?php
/**
 * Plugin Name: ACIS Especialización for WooCommerce 
 * Description: Plugin personalizado! restrocturación de Woocommerce.
 * Version: 17.10
 * Author: Nelson Huamán H.
 * Author URI: https://nelsondev.info
 * Text Domain: woocommerce-acis-especializacion
 * Requires at least: 6.5
 * Requires PHP: 8.0
*/

define('IMG', plugin_dir_url(__FILE__) . 'build/img/');
define('PREMIUM', 2390);
define('CLASICO', 2388);

add_action('after_setup_theme','producto_woocommerce');

function producto_woocommerce() {

   include_once 'app.php';
   include_once 'config/remove-hook.php';
   include_once 'config/add-hook.php';

   // Listado de Programas - Detalles
   add_action('woocommerce_shop_loop_item_title','wc_detalles_inicio', 10);
   function wc_detalles_inicio() {

      global $product;
      $categoria = get_field('programa');

      ?>
         <img width="1000" height="660" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="Imagen del Curso">
         <div class="wc_etiqueta">
            <p><?php echo ($categoria === 'Curso') ? $categoria . ' de Actualización' : $categoria; ?></p>
         </div>
         <div class="wc_titulo">
            <h2 class="wc_titulo__title"><?php echo $product->name; ?></h2>
         </div>
         <div class="wc_detalles wc_inicio">
            <?php include 'config/wc_inicio.php'; ?>
         </div>
      <?php

   }

   // Listados de Programas -> Boton
   add_action('woocommerce_after_shop_loop_item','wc_inicio_boton', 25, 2 );
   function wc_inicio_boton() {

      global $product;
      $link = $product->get_permalink();
      $categoria = get_field('programa');

      ?>
         <div class="wc_btn_inicio">
            <div class="wc_btn_inicio--precio">
               <?php echo $product->get_price_html(); ?>
            </div>
            <div class="wc_btn_inicio--id">
               <span>ID: </span>
               <?php echo $product->sku; ?>
            </div>
            <a class="wc_btn_inicio__boton" href="<?php echo $link; ?>">
               
               <?php echo ($categoria === 'Curso') ? 'Ver Curso' : 'Ver ' . $categoria; ?>
            </a>
         </div>
      <?php

   }

   // Contennido del Programa
   add_action('woocommerce_single_product_summary', "wc_descripcion", 1 );
   function wc_descripcion() {
      include 'config/wc_descripcion.php';
   }

   // Dashboard
   add_action( 'woocommerce_account_dashboard', 'wc_dashboard' );
   function wc_dashboard() {
      include 'config/wc_dashboard.php';
   }

}