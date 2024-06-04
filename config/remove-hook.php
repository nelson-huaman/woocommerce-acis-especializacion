<?php

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 ); // Elimina Categoria de Productos
add_filter( 'woocommerce_sale_flash', '__return_null' ); // Elimina la Etiqueta Ofetas.

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

function woo_remove_product_tabs( $tabs ) {
   unset( $tabs['description'] );      	    // Remove the description tab
   unset( $tabs['reviews'] ); 			        // Remove the reviews tab
   unset( $tabs['additional_information'] );  	// Remove the additional information tab
   return $tabs;
} add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// Elimina los Filtros de orden de la Categoría
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

add_action('woocommerce_archive_description', 'remove_term_description', 5);

function remove_term_description() {
    if (is_product_category() || is_product_tag()) {
        remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
    }
}