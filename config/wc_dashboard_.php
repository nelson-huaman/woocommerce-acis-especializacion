<?php

$clasico = wc_get_product(2388);
$premium = wc_get_product(2390);
$usuario = wp_get_current_user();

if ( is_user_logged_in() ) {
   $memberships = wc_memberships_get_user_active_memberships($usuario->ID);

   foreach($memberships as $membresia) {
      $fechaExpitacion = date('d-m-Y', strtotime($membresia->get_end_date()));
      $fechaActualInt= date("d-m-Y");
      function dias($inicio, $final) {
         $dias = (strtotime($inicio)-strtotime($final))/86400;
         $dias = abs($dias);
         $dias = floor($dias);
         return $dias;
      }
   }

}

?>

<div class="wc_dashboard">
   <div class="wc_dashboard__user">
      Bienvenido/a de nuevo: <span><?php echo $usuario->user_firstname; ?></span>
   </div>
   <?php if($memberships) { ?>
      <div class="wc_dashboard__aviso wc_dashboard__aviso--activo">
         <div class="wc_membresia wc_membresia--activo">
            <p class="wc_membresia__texto">Cuenta con un <?php echo $membresia->plan->name; ?></p>
            <p class="wc_membresia__texto wc_membresia__texto--disponible">Disponible Durante <span><?php echo dias($fechaExpitacion, $fechaActualInt); ?> Días</span></p>
         </div>
      </div>

      <?php if(dias($fechaExpitacion, $fechaActualInt) < 15 ) { ?>
         <div class="wc_dashboard__aviso wc_dashboard__aviso--inactivo">
            <h2 class="wc_dashboard__titulo">Su Membresia esta por Finalizar - Renueva</h2>
            <div class="wcm_dashboard" id="simple">
               <div class="wcm_dashboard__opcion wcm_dashboard__opcion--clasico">
                  <div class="wcm_dashboard__simple">
                     <input class="wcm_dashboard__radio" type="radio" name="simple" id="curso" value="<?php echo $clasico->id; ?>" data-id="1">
                  </div>
                  <div class="wcm_dashboard__contenido active">
                     <p class="wcm_dashboard__slogan">Accede a <span>todos</span> los cursos por <span class="wcm_dashboard__tiempo">30 Días</span></p>
                     <div class="wcm_dashboard__precio">
                        <?php echo $clasico->get_price_html();?>
                     </div>
                     <p class="wcm_dashboard__slogan">Vuélvete <span>Miembro Clásico</span> y Certificate</p>
                  </div>
               </div>
               <div class="wcm_dashboard__opcion wcm_dashboard__opcion--premium">
                  <div class="wcm_dashboard__simple">
                     <input class="wcm_dashboard__radio" type="radio" name="simple" id="curso" value="<?php echo $premium->id; ?>"  data-id="2">
                  </div>
                  <div class="wcm_dashboard__contenido active">
                     <p class="wcm_dashboard__slogan">Accede a <span>todos</span> los cursos por <span class="wcm_dashboard__tiempo">1 Año</span></p>
                     <div class="wcm_dashboard__precio">
                        <?php echo $premium->get_price_html();?>
                     </div>
                     <p class="wcm_dashboard__slogan">Vuélvete <span>Miembro Premium</span> y Certificate</p>
                  </div>
               </div>
            </div>
            <div class="wc_pagar"></div>
         </div>
      <?php } ?>
   <?php } else { ?>
      <div class="wc_dashboard__aviso wc_dashboard__aviso--activo">
         <div class="wc_membresia wc_membresia--vacio">
            <p class="wc_membresia__texto">No Cuenta con una Membresía o Su Membresia a Finalizado </p>
         </div>
      </div>
      <div class="wc_dashboard__aviso wc_dashboard__aviso--inactivo">
         <div class="wcm_dashboard" id="simple">
            <div class="wcm_dashboard__opcion wcm_dashboard__opcion--clasico">
               <div class="wcm_dashboard__simple">
                  <input class="wcm_dashboard__radio" type="radio" name="simple" id="curso" value="<?php echo $clasico->id; ?>" data-id="1">
               </div>
               <div class="wcm_dashboard__contenido active">
                  <p class="wcm_dashboard__slogan">Accede a <span>todos</span> los cursos por <span class="wcm_dashboard__tiempo">30 Días</span></p>
                  <div class="wcm_dashboard__precio">
                     <?php echo $clasico->get_price_html();?>
                  </div>
                  <p class="wcm_dashboard__slogan">Vuélvete <span>Miembro Clásico</span> y Certificate</p>
               </div>
            </div>
            <div class="wcm_dashboard__opcion wcm_dashboard__opcion--premium">
               <div class="wcm_dashboard__simple">
                  <input class="wcm_dashboard__radio" type="radio" name="simple" id="curso" value="<?php echo $premium->id; ?>"  data-id="2">
               </div>
               <div class="wcm_dashboard__contenido active">
                  <p class="wcm_dashboard__slogan">Accede a <span>todos</span> los cursos por <span class="wcm_dashboard__tiempo">1 Año</span></p>
                  <div class="wcm_dashboard__precio">
                     <?php echo $premium->get_price_html();?>
                  </div>
                  <p class="wcm_dashboard__slogan">Vuélvete <span>Miembro Premium</span> y Certificate</p>
               </div>
            </div>
         </div>
         <div class="wc_pagar"></div>
      </div>
   <?php } ?>
</div>



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
    $data = [];

    foreach($memberships as $membresia) {
        $plan = wc_memberships_get_membership_plan($membresia->plan_id);
        $data[] = [
            'id' => $membresia->id,
            'plan' => $membresia->plan->name,
            'dias' => dias(date('Y-m-d'), date('Y-m-d', $membresia->get_end_date('timestamp'))),
            'estado' => $membresia->status
        ];
    }

    if($data[0]) {
        echo $data[0]['estado'];

        echo '<pre>';
        var_dump($data[0]);
        echo '</pre>';
    }

    if($data[1]) {
        echo $data[1]['estado'];

        echo '<pre>';
        var_dump($data[1]);
        echo '</pre>';
    }

    if($data[2]) {
        echo $data[2]['estado'];

        echo '<pre>';
        var_dump($data[2]);
        echo '</pre>';
    }

    
    ?>
        <div class="wc_dashboard">
            <div class="wc_dashboard__user">
                Bienvenido/a de nuevo: <span><?php echo $usuario->user_firstname; ?></span>
            </div>
            <?php if($memberships) { ?>
                <div class="wc_membresia wc_membresia--aviso">
                    <i class="fas fa-exclamation-circle"></i>
                    <div class="wc_membresia__info">
                        <p class="wc_membresia__texto">Los certificados serán enviados siempre y cuando cuentes con membresía activa / vigente.</p>
                    </div>
                </div>
                <?php foreach($memberships as $membresia) {
                    $plan = wc_memberships_get_membership_plan($membresia->plan_id);
                    $datos = (object) [
                        'id' => $membresia->id,
                        'plan' => $membresia->plan->name,
                        'dias' => dias(date('Y-m-d'), date('Y-m-d', $membresia->get_end_date('timestamp'))),
                        'estado' => $membresia->status
                    ]; ?>

                    <?php if($datos->estado === 'wcm-active') { ?>
                        <div class="wc_membresia wc_membresia--activo">
                            <i class="fas fa-clipboard-check"></i>
                            <div class="wc_membresia__info">
                                <p class="wc_membresia__texto">Su Membresía <?php echo $datos->plan; ?> esta Activo</p>
                                <p class="wc_membresia__texto wc_membresia__texto--disponible">Disponible durante los <span><?php echo $datos->dias; ?> Días</span></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="wc_membresia wc_membresia--expirado">
                            <i class="fas fa-eye-slash"></i>
                            <p class="wc_membresia__texto">Su Membresía <?php echo $datos->plan; ?> a Finalizado pipipi</p>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <div class="wc_membresia wc_membresia--expirado">
                    <i class="fas fa-shopping-cart"></i>
                    <p class="wc_membresia__texto">No Cuenta con una Membresía, Obten uno aquí</p>
                </div>
            <?php } ?>
        </div>
    <?php

}