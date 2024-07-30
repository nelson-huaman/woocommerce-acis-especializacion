<?php

function woocommerce_acis_style() {

   wp_enqueue_style (
      'public-css',
      plugins_url('/build/css/app.css', __FILE__),
      array(), '1.0'
   );

   wp_enqueue_script (
      'public-js',
      plugins_url('/build/js/app.min.js', __FILE__),
      array('jquery'), '1.0', true
   );

}

add_action( 'wp_enqueue_scripts', 'woocommerce_acis_style' );