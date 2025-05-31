<?php

// Remove product image from WooCommerce single product page
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// Remove WooCommerce tabs from single product page
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

// Elimina la Etiqueta Ofetas.
add_filter( 'woocommerce_sale_flash', '__return_null' );
