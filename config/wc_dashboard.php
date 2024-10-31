<?php

$clasico = wc_get_product(CLASICO);
$premium = wc_get_product(PREMIUM);
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
    <div class="wc_dashboard__user">
        Bienvenido/a de nuevo: <span><?php echo $usuario->user_firstname; ?></span>
    </div>
    <?php if($memberships) { ?>
        <div class="wc_notificacion wc_notificacion--aviso">
            <i class="fas fa-exclamation-circle"></i>
            <div class="wc_notificacion__info">
                <p class="wc_notificacion__texto">Los certificados serán enviados siempre y cuando cuentes con membresía activa / vigente.</p>
            </div>
        </div>
    <?php } else { ?>
        <div class="wc_notificacion wc_notificacion--inactivo">
            <i class="fas fa-shopping-cart"></i>
            <p class="wc_notificacion__texto">No cuenta con una Membresía, obten uno aquí</p>
        </div>
        <h2 class="wc_dashboard__titulo">Puede adquir una Membresía</h2>
        <div class="wc_planes" id="planes">
            <?php include 'wc_planes.php'; ?>
        </div>
    <?php } ?>
    <?php if($memberships) { ?>

        <div class="incluye">
            <h2 class="incluye__h2">Detalles</h2>
            <div class="incluye__detalle">
                <div class="incluye__campo">
                    <div class="incluye__header incluye__titulo"></div>
                    <div class="incluye__header--clasico incluye__clasico">Clásico</div>
                    <div class="incluye__header--premium incluye__premium">Premium</div>
                </div>
                <div class="incluye__campo">
                    <div class="incluye__body--titulo incluye__titulo">Acceso a curso por día</div>
                    <div class="incluye__body--clasico incluye__clasico">1</div>
                    <div class="incluye__body--premium incluye__premium">3</div>
                </div>
                <div class="incluye__campo">
                    <div class="incluye__body--titulo incluye__titulo">Acceso al aula virtual</div>
                    <div class="incluye__body--clasico incluye__clasico"><i class="fa fa-check" aria-hidden="true"></i></div>
                    <div class="incluye__body--premium incluye__premium"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
                <div class="incluye__campo">
                    <div class="incluye__body--titulo incluye__titulo">Certificación incluida</div>
                    <div class="incluye__body--clasico incluye__clasico"><i class="fa fa-check" aria-hidden="true"></i></div>
                    <div class="incluye__body--premium incluye__premium"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
                <div class="incluye__campo">
                    <div class="incluye__body--titulo incluye__titulo">Acceso a talleres</div>
                    <div class="incluye__body--clasico incluye__clasico"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
                    <div class="incluye__body--premium incluye__premium"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
                <div class="incluye__campo">
                    <div class="incluye__body--titulo incluye__titulo">Acceso a la programación anual</div>
                    <div class="incluye__body--clasico incluye__clasico"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
                    <div class="incluye__body--premium incluye__premium"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
                <div class="incluye__campo">
                    <div class="incluye__body--titulo incluye__titulo">Descuento en diplomado</div>
                    <div class="incluye__body--clasico incluye__clasico"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
                    <div class="incluye__body--premium incluye__premium"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>

        <div class="wc_dashboard__grid">
            <?php foreach( $planes as $plan ) : ?>
                <?php if($plan->estado === 'wcm-active') { ?>
                    <div class="wc_membresia wc_membresia--activo">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <div class="wc_membresia__info">
                            <p class="wc_membresia__texto">Su <?php echo $plan->nombre; ?> esta activo</p>
                            <p class="wc_membresia__texto wc_membresia__texto--disponible">
                                Disponible
                                <span><?php echo $plan->dias; ?> Días</span>
                            </p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="wc_membresia wc_membresia--expirado">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        <div class="wc_membresia__info">
                            <p class="wc_membresia__texto">Su <?php echo $plan->nombre; ?> a finalizado</p>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <div class="wc_dashboard__membresia">
            <?php foreach( $planes as $plan ) : ?>
                <?php if($plan->estado === 'wcm-active') { ?>
                    <?php if($plan->dias < 5 ) { ?>
                        <h2 class="wc_dashboard__titulo">Su Membresia esta por Finalizar - Renueva Aquí</h2>
                        <div class="wc_dashboard__descripcion">Promoción disponible hasta antes de finalizar su Membresía</div>
                        <div class="wc_planes" id="planes">
                            <?php include 'wc_planes.php'; ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    <?php } ?>
</div>