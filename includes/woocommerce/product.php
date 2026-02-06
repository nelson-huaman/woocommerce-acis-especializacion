<?php
global $product;
include 'data.php';
$categoria = wc_get_product_category_list(get_the_ID());
$isCategoria = $isCurso ? 'Curso de ' . $categoria : $categoria;
$isDuracion = $isCurso ? $data['duracion'] . ' Días' : $data['duracion'] . ' Meses';
?>

<div class="servicio">
   <div class="servicio__flex">
      <div class="servicio__contenido">
         <div class="servicio__header">
            <h1 class="servicio__h1">
               <?php echo sprintf('%s de %s', esc_html($data['servicio']), esc_html($product->get_name())); ?>
            </h1>
            <p class="servicio__texto">
               Sé parte del futuro de la salud con nuestro <span><?php echo $isCategoria; ?></span>. Actualiza tus conocimientos, potencia tus habilidades y fortalece tu vocación con formación práctica y de calidad. Prepárate para ofrecer el mejor cuidado a quienes más lo necesitan, en los momentos más decisivos.
            </p>
            <div class="servicio__detalles">
               <!-- Cursos -->
               <?php if ($isCurso) { ?>
                  <?php if ($isVigente) { ?>
                     <p class="servicio__texto"><span>Inicio</span> <?php echo fechaFormat($data['dia_inicio']); ?></p>
                  <?php } else { ?>
                     <p class="servicio__texto"><span>Clases</span> Grabadas</p>
                  <?php } ?>
               <?php } ?>

               <!-- Diplomado -->
               <?php if ($isDiplomado) { ?>
                  <?php if ($isDiplomadoVirtual) { ?>
                     <p class="servicio__texto"><span>Clases:</span> Grabadas</p>
                  <?php } else { ?>
                     <?php if ($isVigente) { ?>
                        <p class="servicio__texto"><span>Inicio</span> <?php echo fechaFormat($data['dia_inicio']); ?></p>
                     <?php } else { ?>
                        <p class="servicio__texto servicio__texto--icono"><i class="fa-solid fa-lock"></i> <span>Próximamente</span></p>
                     <?php } ?>
                  <?php } ?>
               <?php } ?>

               <p class="servicio__texto"><span>Duración:</span> <?php echo $isDuracion; ?></p>
               <?php if (!$isMembresia) { ?>
                  <p class="servicio__coordinador">
                     <span>Coordinador: </span>
                     <?php
                     if (!empty($data['coordinador'])) {
                        $coordinadores = array_map(function ($coordinador_id) {
                           $coordinador = get_post($coordinador_id);
                           return esc_html($coordinador->post_title);
                        }, $data['coordinador']);
                        echo implode(', ', $coordinadores);
                     }
                     ?>
                  </p>
               <?php } ?>

               <p class="servicio__codigo"><span>ID: </span><?php echo $product->sku; ?></p>

               <?php if ($data['alianza']): ?>
                  <div class="servicio__alianza">
                     <span class="titulo">Curso realizado por el <?php echo $data['alianza']; ?></span>
                     <span class="frase">Este curso no incluye a una Membresía</span>
                  </div>
               <?php endif; ?>
            </div>
         </div>

         <div class="acordion" id="acordion">
            <div class="acordion__item">
               <h2 class="acordion__header"><i class="fa-solid fa-angle-right"></i> Descripción</h2>
               <div class="acordion__body" style="display: none;">
                  <?php echo wpautop($product->get_description()); ?>
               </div>
            </div>
            <div class="acordion__item">
               <h2 class="acordion__header"><i class="fa-solid fa-angle-right"></i> Plan de Estudio</h2>
               <div class="acordion__body" style="display: none;">
                  <div class="acordion__temario"><?php echo $data['temario']; ?></div>
               </div>
            </div>
            <div class="acordion__item">
               <h2 class="acordion__header"><i class="fa-solid fa-angle-right"></i> Dirigido a</h2>
               <div class="acordion__body" style="display: none;">
                  <div class="acordion__dirigido"><?php echo $data['dirigido']; ?></div>
               </div>
            </div>
            <div class="acordion__item">
               <h2 class="acordion__header"><i class="fa-solid fa-angle-right"></i> Objetivos</h2>
               <div class="acordion__body" style="display: none;">
                  <div class="acordion__objetivos"><?php echo $data['objetivos']; ?></div>
               </div>
            </div>
            <div class="acordion__item">
               <h2 class="acordion__header"><i class="fa-solid fa-angle-right"></i> Docentes</h2>
               <div class="acordion__body" style="display: none;">
                  <div class="acordion__docentes">
                     <?php if (!empty($data['docentes'])) : ?>
                        <?php foreach ($data['docentes'] as $docente) : ?>
                           <div class="acordion__docente">
                              <img loading="lazy"
                                 src="https://acis.edu.pe/RECURSOS_PROGRAMA/DOCENTES/<?php echo esc_attr($docente->post_name); ?>.webp"
                                 alt="<?php echo esc_attr($docente->post_title); ?>"
                                 width="80" height="80"
                                 class="acordion__imagen">
                              <label class="acordion__label"><?php echo esc_html($docente->post_title); ?></label>
                              <?php echo wpautop($docente->post_content); ?>
                           </div>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="servicio__sidebar">
         <div class="servicio__contenido-sidebar">
            <div class="servicio__precio">
               <?php
               if ($product->attributes) {
                  if ($data['servicio'] === 'Curso') {
                     include_once 'price/curso.php';
                  } else {
                     include_once 'price/displomado.php';
                  }
               } else {
                  include_once 'price/simple.php';
               }
               ?>
            </div>
            <h3 class="servicio__h3">Este <?php echo $data['servicio']; ?> Incluye</h3>
            <ul class="servicio__incluye">
               <?php if ($isCurso) { ?>
                  <li class="servicio__lista"><i class="fa-solid fa-graduation-cap"></i> <?php echo $data['creditos']; ?> Créditos</li>
                  <li class="servicio__lista"><i class="fa-solid fa-video"></i> Clases <?php echo $isVigente ? ' por ZOOM' : 'Virtuales'; ?></li>
                  <li class="servicio__lista"><i class="fa-solid fa-file"></i> Material de Estudio</li>
                  <li class="servicio__lista"><i class="fa-solid fa-tv"></i> Acceso a la Aula Virtual</li>
                  <li class="servicio__lista"><i class="fa-solid fa-unlock-keyhole"></i> Acceso por 30 Días</li>
                  <li class="servicio__lista"><i class="fa-solid fa-award"></i> Cuestionario</li>
                  <li class="servicio__lista"><i class="fa-solid fa-trophy"></i>Certificado Incluido</li>
               <?php } ?>

               <?php if ($isDiplomado) { ?>
                  <li class="servicio__lista"><i class="fa-solid fa-graduation-cap"></i> <?php echo $data['creditos']; ?> Créditos</li>
                  <li class="servicio__lista"><i class="fa-solid fa-video"></i> Clases <?php echo $isVigente ? ' por ZOOM' : 'Virtuales'; ?></li>
                  <li class="servicio__lista"><i class="fa-solid fa-list-ol"></i> <?php echo $data['duracion']; ?> Unidades</li>
                  <li class="servicio__lista"><i class="fa-solid fa-file"></i> Material de Estudio</li>
                  <li class="servicio__lista"><i class="fa-solid fa-tv"></i> Acceso a la Aula Virtual</li>
                  <li class="servicio__lista"><i class="fa-solid fa-award"></i> Cuestionario por Unidad</li>
                  <li class="servicio__lista"><i class="fa-solid fa-trophy"></i>Diploma Incluido</li>
               <?php } ?>

               <?php if ($isMembresia) { ?>
                  <li class="servicio__lista"><i class="fa-solid fa-video"></i> Clases <?php echo $isVigente ? ' por ZOOM' : 'Virtuales'; ?></li>
                  <li class="servicio__lista"><i class="fa-solid fa-file"></i> Material de Estudio</li>
                  <li class="servicio__lista"><i class="fa-solid fa-tv"></i> Acceso a la Aula Virtual</li>
                  <li class="servicio__lista"><i class="fa-solid fa-unlock-keyhole"></i> Acceso por 30 Días</li>
                  <li class="servicio__lista"><i class="fa-solid fa-award"></i> Cuestionario</li>
                  <li class="servicio__lista"><i class="fa-solid fa-trophy"></i>Certificado Incluido</li>
               <?php } ?>
            </ul>

            <?php if ($isCurso && $isVigente) {  ?>
               <a
                  href="<?php echo URL_BASE . '/RECURSOS_PROGRAMA/TEMP/' . $product->sku; ?>.pdf"
                  class="servicio__descargar"
                  download="BROCHURE <?php echo $product->sku; ?>.pdf"
                  target="_blank">
                  <i class="fa-solid fa-download"></i>
                  Descargar Temario
               </a>
            <?php } ?>

            <?php if ($isDiplomado || $isCurso && !$isVigente) { ?>
               <a
                  href="<?php echo URL_BASE . $isDescargar . $product->sku; ?>.pdf"
                  class="servicio__descargar"
                  download="BROCHURE <?php echo $product->sku; ?>.pdf"
                  target="_blank">
                  <i class="fa-solid fa-download"></i>
                  Descargar Temario
               </a>
            <?php } ?>
         </div>
      </div>
   </div>
</div>