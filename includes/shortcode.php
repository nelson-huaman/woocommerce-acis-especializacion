<?php

// Optimized Shortcode Implementation
$shortcodes = [
   'page_home' => 'page_home',
   'page_membresia' => 'page_membresia',
   'page_nosotros' => 'page_nosotros',
   'page_nuestro_equipo' => 'page_nuestro_equipo',
   'page_calendario' => 'page_calendario',
   'page_convenios' => 'page_convenios',
   'page_contacto' => 'page_contacto',
   'page_reclamos' => 'page_reclamos',
   'page_campus' => 'page_campus',
   'page_politica_privacidad' => 'page_politica_privacidad',
   'page_certificacion_iso' => 'page_certificacion_iso',
   'seccion_footer' => 'seccion_footer'
];

foreach ($shortcodes as $shortcode => $page) {
   add_shortcode($shortcode, function ($atts, $content = null) use ($page) {
      ob_start();
      include "shortcodes/$page.php";
      return ob_get_clean();
   });
}
