<?php

// Valiables

$clasico = wc_get_product(CLASICO);
$premium = wc_get_product(PREMIUM);
$usuario = wp_get_current_user();

$membershipsActivo = '';
$aviso = '';
$limite = 2;
$fechaHoy = date('Y-m-d');
$planes = [];

$precioClasio = $clasico->price;
$precioPremium = $premium->price;

// Funciones
function dias($fecha1, $fecha2) {
    $inicio = new DateTime($fecha1);
    $fin = new DateTime($fecha2);

    if ($fin < $inicio) { return 0; } else {
        $diferencia = $inicio->diff($fin);
        return $diferencia->days;
    }
}

if(is_user_logged_in()) {

    $membershipsActivo = wc_memberships_get_user_active_memberships($usuario->ID);    
    $membershipsUsuario = wc_memberships_get_user_memberships($usuario->ID);
    
    foreach($membershipsUsuario as $membresia) {
        $plan = wc_memberships_get_membership_plan($membresia->plan_id);
        $planes[] = (object)[
            'id' => $membresia->id,
            'nombre' => $membresia->plan->name,
            'dias' => dias(date('Y-m-d'), date('Y-m-d', $membresia->get_end_date('timestamp'))),
            'estado' => $membresia->status
        ];
    }

    $arreglo = array(
        'customer_id' => $usuario->ID,
        'date_created' => $fechaHoy,
        'status' => array('wc-completed', 'wc-processing', 'wc-on-hold'),
        'return' => 'ids',
    );

    $comprasHoy = wc_get_orders($arreglo);
    foreach ($planes as $plan) {
        if($plan->nombre === 'Plan Premium') {
            $limite = 3;
        }
    }
     
    if ( count($comprasHoy) >= $limite ) {
        $aviso = 'Has alcanzado tu límite diario de compras. Por favor, vuelve mañana.';
    }
}

?>