<?php

include_once 'woocommerce/add_hooks.php';
include_once 'woocommerce/remove_hooks.php';

// Listado de Programas - Detalles
add_action('woocommerce_after_shop_loop_item','wc_detalles_inicio', 10);
function wc_detalles_inicio() {
   include 'woocommerce/products.php';
}

// Añadir contenido personalizado a cada producto ocupando toda la pantalla
add_action('woocommerce_after_single_product', 'wc_contenido_completo', 5);
function wc_contenido_completo() {
   include 'woocommerce/product.php';
}


// Dashboard
add_action( 'woocommerce_account_dashboard', 'wc_dashboard' );
function wc_dashboard() {
   include 'woocommerce/dashboard/index.php';
}

// Remove related products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);