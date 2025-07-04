<?php
/**
 * Plugin Name: ACIS Especialización for WooCommerce 
 * Description: Plugin Personalizado -  Restrocturación de Woocommerce.
 * Version: 27.1.0
 * Author: Nelson Huamán H.
 * Author URI: https://facebook.com/nelson.huaman.20
 * Text Domain: woocommerce-acis-especializacion
 * Requires at least: 6.5
 * Requires PHP: 8.0
*/

define('URL_BASE', 'https://acis.edu.pe');
define('IMAGENES', plugin_dir_url(__FILE__) . 'build/img/');
define('CELULAR', '+51 973 701 035');
define('EMAIL', 'informes@acis.edu.pe');
define('DIRECCION', 'Av. Arnaldo Márquez 948, Jesús María');
define('PREMIUM', 696);

add_action('after_setup_theme','woocommerce_acis_especializacion');

function woocommerce_acis_especializacion() {

   include_once 'app.php';
   include_once 'includes/shortcode.php';
   include_once 'includes/woocommerce.php';

}