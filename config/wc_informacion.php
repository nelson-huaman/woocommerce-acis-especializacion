<?php

$clasico = wc_get_product(2388);
$premium = wc_get_product(2390);
$usuario = wp_get_current_user();

$precioClasio = $clasico->price;
$precioPremium = $premium->price;

function dias($fecha1, $fecha2) {
    $inicio = new DateTime($fecha1);
    $fin = new DateTime($fecha2);

    if ($fin < $inicio) { return 0; } else {
        $diferencia = $inicio->diff($fin);
        return $diferencia->days;
    }
}

$membershipsActivo = '';

if(is_user_logged_in()) {

    $membershipsActivo = wc_memberships_get_user_active_memberships($usuario->ID);    
    $membershipsUsuario = wc_memberships_get_user_memberships($usuario->ID);
    $planes = [];

    foreach($membershipsUsuario as $membresia) {
        $plan = wc_memberships_get_membership_plan($membresia->plan_id);
        $planes[] = (object)[
            'id' => $membresia->id,
            'nombre' => $membresia->plan->name,
            'dias' => dias(date('Y-m-d'), date('Y-m-d', $membresia->get_end_date('timestamp'))),
            'estado' => $membresia->status
        ];
    }
}

?>