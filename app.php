<?php

function woocommerce_acis_scripts() {
   $version = '1.0';
   $plugin_url = plugin_dir_url(__FILE__);

   wp_enqueue_style('woocommerce-acis', $plugin_url . 'build/css/app.css', array(), $version);
   wp_enqueue_script('woocommerce-acis', $plugin_url . 'build/js/app.min.js', array('jquery'), $version, true);
}

add_action('wp_enqueue_scripts', 'woocommerce_acis_scripts');