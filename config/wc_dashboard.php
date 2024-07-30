<?php

$clasico = wc_get_product(2388);
$premium = wc_get_product(2390);
$usuario = wp_get_current_user();

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
    $memberships = wc_memberships_get_user_memberships($usuario->ID);
    $planes = [];

    foreach($memberships as $membresia) {
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

<div class="wc_dashboard">
    <div class="wc_dashboard__user">Bienvenido/a de nuevo: <span><?php echo $usuario->user_firstname; ?></span></div>
    <?php if($memberships) { ?>
        <div class="wc_membresia wc_membresia--aviso">
            <i class="fas fa-exclamation-circle"></i>
            <div class="wc_membresia__info">
                <p class="wc_membresia__texto">Los certificados serán enviados siempre y cuando cuentes con membresía activa / vigente.</p>
            </div>
        </div>
        <div class="wc_dashboard__grid">
            <?php foreach( $planes as $plan ) { ?>
                <?php if($plan->nombre === 'Clásico') { ?>
                    <?php if($plan->estado === 'wcm-active') { ?>
                        <div class="wc_membresia wc_membresia--activo">
                            <i class="fas fa-clipboard-check"></i>
                            <div class="wc_membresia__info">
                                <p class="wc_membresia__texto">Su Membresía <?php echo $plan->nombre; ?> esta Activo</p>
                                <p class="wc_membresia__texto wc_membresia__texto--disponible">Disponible <span><?php echo $plan->dias; ?> Días</span></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="wc_membresia wc_membresia--expirado">
                            <i class="fas fa-eye-slash"></i>
                            <div class="wc_membresia__info">
                                <p class="wc_membresia__texto">Su Membresía <?php echo $plan->nombre; ?> a Finalizado</p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php if($plan->nombre === 'Premium') { ?>
                    <?php if($plan->estado === 'wcm-active') { ?>
                        <div class="wc_membresia wc_membresia--activo">
                            <i class="fas fa-clipboard-check"></i>
                            <div class="wc_membresia__info">
                                <p class="wc_membresia__texto">Su Membresía <?php echo $plan->nombre; ?> esta Activo</p>
                                <p class="wc_membresia__texto wc_membresia__texto--disponible">Disponible <span><?php echo $plan->dias; ?> Días</span></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="wc_membresia wc_membresia--expirado">
                            <i class="fas fa-eye-slash"></i>
                            <div class="wc_membresia__info">
                                <p class="wc_membresia__texto">Su Membresía <?php echo $plan->nombre; ?> a Finalizado</p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="wc_dashboard__membresia">
            <?php foreach( $planes as $plan ) { ?>
                <?php if($plan->estado === 'wcm-active') { ?>
                    <?php if($plan->dias < 15 ) { ?>
                        <h2 class="wc_dashboard__titulo">Su Membresia esta por Finalizar - Renueva Aquí</h2>
                        <div class="wc_dashboard__descripcion">Promoción disponible hasta antes de finalizar su Membresía</div>
                        <?php include 'wc_membresia.php'; ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="wc_membresia wc_membresia--expirado">
            <i class="fas fa-shopping-cart"></i>
            <p class="wc_membresia__texto">No Cuenta con una Membresía, Obten uno aquí</p>
        </div>

        <h2 class="wc_dashboard__titulo">Puede adquir una Membresía</h2>
        <div class="wc_dashboard__descripcion">Accesdo a +170 Cursos con un solo Pago</div>

        <?php include 'wc_membresia.php'; ?>
        
    <?php } ?>
</div>
<div class="wc_dashboard__pagar"></div>
