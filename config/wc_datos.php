<?php

$categoria = get_field('programa');
$fechaUno = get_field('dia_inicio');
$fechaDos = get_field('dia_final');
$creditos = str_pad(get_field('creditos'), 2, "0", STR_PAD_LEFT);
$duracion = str_pad(get_field('duracion'), 2, "0", STR_PAD_LEFT);
$horas = get_field('horas');

$beneficios = get_field('beneficios');
$objetivos = get_field('objetivos');
$temario = get_field('temario');
$dirigido = get_field('dirigido');
$coordinador = get_field('coordinador');
$docentes = get_field('docentes');