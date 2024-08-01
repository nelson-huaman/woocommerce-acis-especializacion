<?php
// $inicio = date('d M Y', strtotime($fechaUno));
$dia = date('d', strtotime($fechaUno));
$mes = date('F', strtotime($fechaUno));
$year = date('Y', strtotime($fechaUno));
$fechaActual = strtotime(date("d-m-Y"));
$fechaFinal = strtotime($fechaDos);

$meses = array(
   'January' => 'Ene.',
   'February' => 'Feb.',
   'March' => 'Mar.',
   'April' => 'Abr.',
   'May' => 'May.',
   'June' => 'Jun.',
   'July' => 'Jul.',
   'August' => 'Ago.',
   'September' => 'Sep.',
   'October' => 'Oct.',
   'November' => 'Nov.',
   'December' => 'Dic.'
);

$inicio = $dia . ' ' . $meses[$mes] . ' ' . $year;

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