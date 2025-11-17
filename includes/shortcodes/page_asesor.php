<?php

$asesores = [
   ['nombre' => 'Doris Ayala', 'slug' => 'doris-ayala', 'telefono' => '944 717 832', 'link' => 'https://bit.ly/4hQ45TV'],
   ['nombre' => 'Nancy Torres', 'slug' => 'nancy-torres', 'telefono' => '914 975 472', 'link' => 'https://bit.ly/47LIPdo'],
   ['nombre' => 'Ckyara Franco', 'slug' => 'ckyara-franco', 'telefono' => '959 129 011', 'link' => 'https://bit.ly/3JMUPn0'],
   ['nombre' => 'Cinthya Mendoza', 'slug' => 'cinthya-mendoza', 'telefono' => '973 701 035', 'link' => 'https://bit.ly/3LoQcQF'],
   ['nombre' => 'Zayuri Marcelo', 'slug' => 'zayuri-marcelo', 'telefono' => '949 024 271', 'link' => 'https://bit.ly/43OO8ri']
];

?>

<div class="asesor">
   <header class="asesor__header">
      <div class="asesor__contenedor">
         <div class="asesor__flex">
            <div class="asesor__item asesor__item--contenido">
               <h1 class="asesor__titulo">Nuestro equipo:</h1>
               <p class="asesor__texto asesor__texto--slogan">La experiencia que necesitas, la confianza que mereces.</p>
            </div>
            <div class="asesor__item asesor__item--header">
               <img class="asesor__imagen asesor__imagen--header" loading="lazy" width="350" height="1000" src="<?php echo IMAGENES; ?>asesor.svg" alt="Asesora comercial">
            </div>
         </div>
      </div>
   </header>

   <section class="asesor__section">
      <div class="asesor__contenedor">
         <h2 class="asesor__subtitulo"  data-aos="fade-up"><span>Asesores</span> comerciales</h2>
         <div class="asesor__asesores">
            <?php foreach ($asesores as $asesor): ?>
               <div class="asesor__asesor"  data-aos="fade-up">
                  <div class="asesor__foto">
                     <img class="asesor__imagen" src="<?php echo URL_BASE . '/RECURSOS_PROGRAMA/ASESORES/' . $asesor['slug']; ?>.webp" alt="<?php echo 'Asesor comercial: ' . $asesor['nombre']; ?>">
                  </div>
                  <div class="asesor__body">
                     <h3 class="asesor__nombre"><?php echo $asesor['nombre']; ?></h3>
                     <p class="asesor__slogan">Asesora Comercial</p>
                     <p class="asesor__telefono"><i class="fa-solid fa-phone"></i> <?php echo $asesor['telefono']; ?></p>
                     <a class="asesor__boton" href="<?php echo $asesor['link']; ?>" target="_blank" rel="noopener noreferrer">¡Hablamos!</a>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>

   </section>

   <section class="asesor__section asesor__section--barra">
      <div class="asesor__contenedor">
         <p class="asesor__frase"  data-aos="fade-up"> "La asesoría que necesitas, el trato que mereces." </p>
      </div>
   </section>
</div>