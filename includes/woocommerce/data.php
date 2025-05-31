<?php

$fechaUno = get_field('dia_inicio');
$fechaDos = get_field('dia_final');
$year = date('Y', strtotime($fechaUno));

$data = [
   'servicio' => get_field('servicio'),
   'dia_inicio' => $fechaUno,
   'dia_final' => $fechaDos,
   'creditos' => str_pad(get_field('creditos'), 2, "0", STR_PAD_LEFT),
   'duracion' => str_pad(get_field('duracion'), 2, "0", STR_PAD_LEFT),
   'beneficios' => get_field('beneficios'),
   'objetivos' => get_field('objetivos'),
   'area' => get_field('area'),
   'temario' => get_field('temario'),
   'dirigido' => get_field('dirigido'),
   'coordinador' => get_field('coordinador'),
   'docentes' => get_field('docentes'),
   'year' => $year,
   'fecha_actual' => strtotime(date("d-m-Y")),
   'fecha_inicio' => strtotime($fechaUno),
];

$link = "/RECURSOS_PROGRAMA/{$year}";
$isCurso = ($data['servicio'] === 'Curso');
$isVigente = ($data['fecha_actual'] < $data['fecha_inicio']);
$isDescargar = ($data['servicio'] === 'Curso') ? "{$link}/CURSOS/" : "{$link}/PROGRAMAS/";

if (!function_exists('fechaFormat')) {
   function fechaFormat($fecha) {
      $meses = [
         1 => 'Ene.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Abr.', 5 => 'May.', 6 => 'Jun.',
         7 => 'Jul.', 8 => 'Ago.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dic.'
      ];

      $timestamp = strtotime($fecha);
      if (!$timestamp) return '';
      $dia = date('d', $timestamp);
      $mes = $meses[(int)date('m', $timestamp)];
      $anio = date('Y', $timestamp);
      return "{$dia} de {$mes} {$anio}";
   }
}