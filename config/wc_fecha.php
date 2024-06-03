<?php

$inicio = date('d M. Y', strtotime($fechaUno));
$year = date('Y', strtotime($fechaUno));
$fechaActual = strtotime(date("d-m-Y"));
$fechaFinal = strtotime($fechaDos);

if($categoria === 'Curso') {
   if($fechaActual <= $fechaFinal) {
      $textoIcono = 'en Vivo';
      $fechaIcono = $inicio;
      $duracionIcono = $duracion . ' Días';
   } else {
      $textoIcono = 'E-learning';
      $fechaIcono = 'Online';
      $duracionIcono = '30 Días';
   }

   $programa = 'Cetificado';
   $botonDescargar = "/RECURSOS_PROGRAMA/" . $year . "/CURSOS/BROCHURE-";
} else {

   if($fechaActual <= $fechaFinal) {
      $textoIcono = 'en Vivo';
      $fechaIcono = $inicio;
      $duracionIcono = $duracion . ' Meses';
   } else {
      $textoIcono = 'Finalizado';
      $fechaIcono = 'Proximamente';
      $duracionIcono = $duracion . ' Meses';
   }

   $programa = 'Diploma';
   $botonDescargar = "/RECURSOS_PROGRAMA/" . $year . "/PROGRAMAS/BROCHURE-";
}