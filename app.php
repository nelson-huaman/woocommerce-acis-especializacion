<?php

function woocommerce_acis_scripts() {
   $plugin_url = plugin_dir_url(__FILE__);
   $plugin_path = plugin_dir_path(__FILE__);

   // Versión dinámica basada en la última modificación del archivo
   $css_version = filemtime($plugin_path . 'build/css/app.css');
   $js_version = filemtime($plugin_path . 'build/js/app.min.js');

   wp_enqueue_style('woocommerce-acis', $plugin_url . 'build/css/app.css', array(), $css_version);
   wp_enqueue_script('woocommerce-acis', $plugin_url . 'build/js/app.min.js', array('jquery'), $js_version, true);
   if (!is_admin()) {
      wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css', array(), null);
   }
}

add_action('wp_enqueue_scripts', 'woocommerce_acis_scripts');

// footer
add_action('wp_footer', function () {
   ?>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
         AOS.init();
      </script>
   <?php
});