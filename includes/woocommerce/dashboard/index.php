<?php

   $usuario = wp_get_current_user();

   if (is_user_logged_in()) {

      $membershipsActivo = wc_memberships_get_user_active_memberships($usuario->ID);
      $memberships = wc_memberships_get_user_memberships($usuario->ID);
      $planes = [];

      foreach ($memberships as $membresia) {
         $planes = [
            'nombre' => $membresia->plan->name,
            'estado' => $membresia->status,
            'dias_expiracion' => $membresia->get_end_date('timestamp'),
            'dia_actual' => time()
         ];
      }

      function dias_restantes($expiracion, $actual) {
         if (!$expiracion) {
            return 0;
         }
         $diferencia = $expiracion - $actual;
         $dias = ceil($diferencia / (60 * 60 * 24));
         return $dias > 0 ? $dias : 0;
      }

      $isActiveClass = $membershipsActivo ? 'activo' : 'inactivo';
      $isActiveText = $membershipsActivo ? 'Los certificados serán enviados siempre y cuando cuentes con membresía activa / vigente.' : 'No cuenta con una Membresía, obten uno aquí';
      $isActiveIcon = $membershipsActivo ? "<i class='fa-solid fa-bell'></i>" : "<i class='fa-solid fa-triangle-exclamation'></i>";

      if($planes) {
         $diasDiponibles = dias_restantes($planes['dias_expiracion'], $planes['dia_actual']);
         $planClass = ($planes['estado'] === 'wcm-active') ? 'activo' : 'expirado';
         $planText = ($planes['estado'] === 'wcm-active') ? "Su membresía <span>${planes['nombre']}</span> esta activo" : "Su membresía <span>${planes['nombre']}</span> finalizado";
         $planIcono = ($planes['estado'] === 'wcm-active') ? "<i class='fa-solid fa-bullhorn'></i>" : "<i class='fa-solid fa-eye-slash'></i>";
      }
   }
?>

<div class="cuenta">
   <div class="cuenta__usuario">
      Bienvenido/a de nuevo <span><?php echo $usuario->user_firstname; ?></span>
   </div>
   <div class="notificacion notificacion--<?php echo $isActiveClass; ?>">
      <div class="notificacion__flex">
         <?php echo $isActiveIcon; ?>
         <div class="notificacion__info">
            <p class="notificacion__texto"><?php echo $isActiveText; ?></p>
         </div>
      </div>
      <?php if (!$membershipsActivo) { ?>
         <a class="notificacion__boton" href="<?php echo URL_BASE; ?>/membresia/" target="_blank">Adquiere uno aquí</a>
      <?php } ?>
   </div>
   <?php if ($planes): ?>
      <div class="notificacion__aviso notificacion__aviso--<?php echo $planClass; ?>">
         <?php echo $planIcono; ?>
         <div>
            <p class="notificacion__texto notificacion__texto--membresia"><?php echo $planText; ?></p>
            <?php if($diasDiponibles > 0) { ?>
               <p class="notificacion__texto notificacion__texto--disponible">Disponible: <span><?php echo $diasDiponibles; ?> Días</span></p>
            <?php } ?>
         </div>
      </div>

      <h2 class="notificacion__h3">Beneficios de su Membresía Premium</h2>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Acceso a todos lo Cursos
      </p>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Compras por día (3)
      </p>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Acceso al aula virtual
      </p>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Certificación incluida
      </p>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Acceso a los talleres
      </p>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Acceso a la programación anual
      </p>
      <p class="notificacion__texto">
         <i class="fa fa-check-circle" aria-hidden="true"></i> Descuento en diplomado
      </p>
   <?php endif; ?>

</div>









<script>
   const hola = document.querySelector('.woocommerce-MyAccount-content')
   if (hola) {
      document.querySelectorAll('.woocommerce-MyAccount-content p').forEach((parrafo, index) => {
         if (index < 2) parrafo.remove();
      });
   }
</script>