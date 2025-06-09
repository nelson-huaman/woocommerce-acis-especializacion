<?php

   // Make sure WordPress functions are available
   if (! function_exists('is_user_logged_in')) {
      require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
   }

   $activo = is_user_logged_in() ? true : false;

?>
<div class="campus">
   <?php if(!$activo): ?>
      <h1 class="campus__titulo">¿Dónde debo ingresar?</h1>
      <p class="campus__descripcion">Elije un tipo de acceso para continuar</p>
      <div class="campus__accesos">
         <div class="campus__item campus__item--premium">
            <h2 class="campus__subtitulo">Comprastes en la web o eres Miembro Premium</h2>
            <p class="campus__texto"><i class="fa-solid fa-check"></i> Comprastes una membresia o curso en esta pagina</p>
            
            <a class="campus__link campus__link--premium" href="<?php echo URL_BASE; ?>/mi-cuenta/">Ingresar a la Intranet web</a>
            <p class="campus__texto campus__texto--nuevo">Aún no tienes una cuenta? <a href="<?php echo URL_BASE; ?>/mi-cuenta/">Crea una aquí</a></p>
         </div>
         <div class="campus__item campus__item--aula">
            <h2 class="campus__subtitulo">Te matriculaste por WhatsApp o un asesor</h2>
            <p class="campus__texto"><i class="fa-solid fa-check"></i> Se matriculó con un Asesor</p>
            <p class="campus__texto"><i class="fa-solid fa-check"></i> Recibiste acceso por WhatsApp o Correo</p>
            <a class="campus__link campus__link--aula" href="https://acis.pe" target="_blank" rel="noopener noreferrer">Ingresar a la Aula Virtual</a>
         </div>
      </div>
   <?php else: ?>
      <div class="campus__nuevo">
         <h3 class="campus__h3">¡Ya accediste a tu cuenta!</h3>
         <p class="campus__texto">Ahora puedes visitar tu Aula Virtual o comprar un curso para comenzar a estudiar.</p>
         <div class="campus__botones">
            <a class="campus__link campus__link--perfil" href="<?php echo URL_BASE; ?>/mi-cuenta/">Ver mi Perfil</a>
            <a class="campus__link campus__link--aula" href="https://acis.pe" target="_blank" rel="noopener noreferrer">Ir a la Aula Virtual</a>
            <a class="campus__link campus__link--premium" href="<?php echo URL_BASE; ?>/categoria-programa/cursos/">Comprar un curso</a>
         </div>
      </div>
   <?php endif; ?>
</div>