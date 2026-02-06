<?php

$anual = wc_get_product(ANUAL);
$dual = wc_get_product(DUAL);
$semestral = wc_get_product(SEMESTRAL);

$premium = wc_get_product(PREMIUM);

?>

<div class="membresia">
   <header class="membresia__header">
      <div class="membresia__contenedor">
         <div class="membresia__navegacion">
            <div class="logo">
               <div class="icono">
                  <i class="fa-solid fa-graduation-cap"></i>
               </div>
               Membresía             
            </div>
            <div class="menus">
               <nav class="mobile">
                  <a href="#planes">Planes</a>
                  <a href="#beneficios">Beneficios</a>
                  <a href="#cursos">Cursos</a>
                  <a href="#testimonios">Testimonios</a>
                  <a href="#preguntas">Preguntas Frecuentes</a>
               </nav>
               <nav class="desktop">
                  <a href="#planes">Planes</a>
                  <a href="#beneficios">Beneficios</a>
                  <a href="#cursos">Cursos</a>
                  <a href="#testimonios">Testimonios</a>
                  <a href="#preguntas">Preguntas Frecuentes</a>
               </nav>
            </div>
            <div class="botones">
               <a href="#planes" class="boton">Activar Membresía</a>
               <button type="button" class="menu"><i class="fa-solid fa-bars"></i></button>
            </div>
         </div>
      </div>
   </header>

   <!-- Hero -->
   <section class="membresia__hero">
      <div class="membresia__contenedor">
         <div class="membresia__head">
            <div class="tag">
               <i class="fa-solid fa-graduation-cap"></i>
               <span>
                  Membresía Premium de Capacitación Clínica
               </span>
            </div>
            <h1 class="membresia__titulo">
               Capacítate sin límites y trabaja con más
               <span>seguridad clínica</span>.
            </h1>
            <p>Accede a +180 cursos, certificación inmediata y práctica real sin pagar curso por curso.</p>
            <div>
               <p><i class="fa-solid fa-book-open"></i> +180 Cursos</p>
               <p><i class="fa-solid fa-award"></i> Certificación Inmediata</p>
            </div>
            <a href="#planes" class="membresia__boton">Activar mi Membresía</a>
         </div>
      </div>
   </section>

   <!-- Planes -->
   <section class="membresia__section membresia__section--gris" id="planes">
      <div class="membresia__contenedor">
         <h2 class="membresia__sub-titulo center">Plan Anual, Dual & Semestral</h2>
         <p class="membresia__descripcion center">Elige el plan que mejor se adapte a tus necesidades de formación profesional.</p>
         <div class="membresia__planes">
            <div class="membresia__plan">
               <div class="texto"><i class="fa-solid fa-user-group"></i> Opción A:</div>
               <h3 class="titulo">Plan Dual <span>(2 Personas)</span></h3>
               <div class="precio">
                  S/.
                  <span>400</span>
               </div>
               <span class="slogan">(Pago único por persona/año)</span>
               <a href="?add-to-cart=<?php echo $dual->get_id(); ?>" class="boton">Inscribirme Ahora</a>
            </div>
            <div class="membresia__plan membresia__plan--anual">
               <div class="recomendado">
                  <span>
                     <i class="fa-solid fa-trophy"></i>
                     Más Popular
                  </span>
               </div>
               <div class="texto"><i class="fa-solid fa-user"></i> Opción B:</div>
               <h3 class="titulo">Plan Anual <span>(Individual)</span></h3>
               <div class="precio">
                  S/.
                  <span><?php echo $anual->regular_price; ?></span>
               </div>
               <span class="slogan">(Pago único por año)</span>
               <a href="?add-to-cart=<?php echo $anual->get_id(); ?>" class="boton">Inscribirme Ahora</a>
            </div>
            <div class="membresia__plan">
               <div class="texto"><i class="fa-solid fa-check"></i> Opción C:</div>
               <h3 class="titulo">Plan Semestral <span>(Corto Plazo)</span></h3>
               <div class="precio">
                  S/.
                  <span><?php echo $semestral->regular_price; ?></span>
               </div>
               <span class="slogan">(Pago único por 6 meses)</span>
               <a href="?add-to-cart=<?php echo $semestral->get_id(); ?>" class="boton">Inscribirme Ahora</a>
            </div>
         </div>
      </div>
   </section>

   <!-- Beneficios -->
   <section class="membresia__section membresia__section--color" id="beneficios">
      <div class="membresia__contenedor">
         <h2 class="membresia__sub-titulo membresia__sub-titulo--blanco center">Beneficios Incluidos</h2>
         <p class="membresia__descripcion membresia__descripcion--blanco center">Todo lo que necesitas para tu formación profesional.</p>
         <div class="membresia__beneficios">
            <div class="membresia__beneficio">
               <div class="icono">
                  <i class="fa-solid fa-qrcode"></i>
               </div>
               <h5 class="titulo">Certificación con QR</h5>
               <p class="texto">(Válida y verificable)</p>
            </div>
            <div class="membresia__beneficio">
               <div class="icono">
                  <i class="fa-solid fa-book-open"></i>
               </div>
               <h5 class="titulo">+180 Cursos Certificados</h5>
               <p class="texto">(Biblioteca completa)</p>
            </div>
            <div class="membresia__beneficio">
               <div class="icono">
                  <i class="fa-regular fa-calendar"></i>
               </div>
               <h5 class="titulo">Entrenamiento Práctico</h5>
               <p class="texto">Talleres de Simulación + Full Days (Según plan)</p>
            </div>
            <div class="membresia__beneficio">
               <div class="icono">
                  <i class="fa-solid fa-percent"></i>
               </div>
               <h5 class="titulo">Bonus Exclusivo</h5>
               <p class="texto">20% Dscto. en Diplomados en Vivo (Todos los planes)</p>
            </div>
         </div>
      </div>
   </section>

   <!-- Compara los Planes -->
   <section class="membresia__section membresia__section--gris">
      <div class="membresia__contenedor">
         <h2 class="membresia__sub-titulo center">Compara los Planes</h2>
         <p class="membresia__descripcion center">Encuentra el plan perfecto para ti.</p>
         <div class="membresia__tabla-planes">
            <table class="w-full">
               <thead>
                  <tr>
                     <th>Característica</th>
                     <th>DUAL</th>
                     <th class="recomendado">ANUAL</th>
                     <th>SEMESTRAL</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Cursos Biblioteca</td>
                     <td class="center">160+</td>
                     <td class="center recomendado">160+</td>
                     <td class="center">160+</td>
                  </tr>
                  <tr>
                     <td>Certificación Digital con QR</td>
                     <td class="center"><i class="fa-solid fa-check"></i></td>
                     <td class="center recomendado"><i class="fa-solid fa-check"></i></td>
                     <td class="center"><i class="fa-solid fa-check"></i></td>
                  </tr>
                  <tr>
                     <td>Acceso Talleres Simulación</td>
                     <td class="center">15</td>
                     <td class="center recomendado">15</td>
                     <td class="center">5</td>
                  </tr>
                  <tr>
                     <td>Talleres Full Day</td>
                     <td class="center">5</td>
                     <td class="center recomendado">5</td>
                     <td class="center">2</td>
                  </tr>
                  <tr>
                     <td>Programación Anual (40 cursos)</td>
                     <td class="center"><i class="fa-solid fa-check"></i></td>
                     <td class="center recomendado"><i class="fa-solid fa-check"></i></td>
                     <td class="center"><i class="fa-solid fa-check"></i></td>
                  </tr>
                  <tr>
                     <td>Descuento Diplomados E-learning</td>
                     <td class="center">30%</td>
                     <td class="center recomendado">30%</td>
                     <td class="center">10%</td>
                  </tr>
                  <tr>
                     <td>Descuento Diplomados En Vivo</td>
                     <td class="center">15%</td>
                     <td class="center recomendado">15%</td>
                     <td class="center">15%</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </section>

   <!-- Cupos -->
   <section class="membresia__section membresia__section--promo">
      <div class="membresia__contenedor">
         <div class="membresia__cupos">
            <h2 class="titulo">¡Cupos Limitados Para Talleres!</h2>
            <p class="descripcion">Inscríbete hoy y asegura tu certificación..</p>
            <a href="#planes" class="boton">Inscribirme Ahora</a>
         </div>
      </div>
   </section>

   <!-- Soluciones -->
   <section class="membresia__section membresia__section--color">
      <div class="membresia__contenedor">
         <p class="membresia__slogan center">La Solución</p>
         <h2 class="membresia__sub-titulo membresia__sub-titulo--blanco center">Membresía Premium</h2>
         <p class="membresia__descripcion membresia__descripcion--blanco center">Una inversión, un año completo de capacitación clínica sin límites.</p>
         <div class="membresia__grid">
            <div class="membresia__item">
               <div class="membresia__soluciones">
                  <div class="membresia__solucion">
                     <i class="fa-solid fa-book-open"></i>
                     <p>
                        <span>Acceso ilimitado</span>
                        +180 cursos especializados en áreas clínicas
                     </p>
                  </div>
                  <div class="membresia__solucion">
                     <i class="fa-solid fa-award"></i>
                     <p>
                        <span>Certificación por curso</span>
                        Obtén tu constancia al completar cada formación
                     </p>
                  </div>
                  <div class="membresia__solucion">
                     <i class="fa-regular fa-calendar"></i>
                     <p>
                        <span>Ruta formativa anual</span>
                        Planificación clara de tu desarrollo profesional
                     </p>
                  </div>
                  <div class="membresia__solucion">
                     <i class="fa-solid fa-user-group"></i>
                     <p>
                        <span>Talleres y simulación</span>
                        Práctica clínica real con casos reales
                     </p>
                  </div>
                  <div class="membresia__solucion">
                     <i class="fa-solid fa-percent"></i>
                     <p>
                        <span>Descuentos exclusivos</span>
                        Beneficios especiales en eventos y diplomados
                     </p>
                  </div>
               </div>

               <a href="#planes" class="membresia__boton">Activar mi Membresía Premium</a>
            </div>
            <div class="membresia__item">
               <div class="membresia__relativo">
                  <div class="membresia__margen">
                     <picture>
                        <source srcset="<?php echo IMAGENES; ?>membresia/solution-learning.avif" type="image/avif">
                        <source srcset="<?php echo IMAGENES; ?>membresia/solution-learning.webp" type="image/webp">
                        <img loading="lazy" width="700" height="800" src="<?php echo IMAGENES; ?>membresia/solution-learning.jpg" alt="Enfermera" class="membresia__imagen membresia__imagen--margen">
                     </picture>
                  </div>
                  <div class="membresia__disponibles">
                     <i class="fa-regular fa-circle-check"></i>
                     <p>
                        <span>+180</span>
                        Cursos disponibles
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Áreas de Especialización -->
   <section class="membresia__section membresia__section--gris" id="cursos">
      <div class="membresia__contenedor">
         <p class="membresia__slogan center">Áreas de Especialización</p>
         <h2 class="membresia__sub-titulo center">Formación en todas las áreas clínicas</h2>
         <p class="membresia__descripcion center">Cursos especializados diseñados por expertos para cada área de atención.</p>
         <div class="membresia__areas">
            <div class="membresia__area">
               <div class="adulto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-activity w-6 h-6 text-card">
                     <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path>
                  </svg>
               </div>
               <p>UCI Adulto</p>
            </div>
            <div class="membresia__area">
               <div class="pediatrico">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-baby w-6 h-6 text-card">
                     <path d="M9 12h.01"></path>
                     <path d="M15 12h.01"></path>
                     <path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"></path>
                     <path d="M19 6.3a9 9 0 0 1 1.8 3.9 2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5s-.9 2.5-2 2.5c-.8 0-1.5-.4-1.5-1"></path>
                  </svg>
               </div>
               <p>UCI Pediátrico</p>
            </div>
            <div class="membresia__area">
               <div class="neonatal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-6 h-6 text-card">
                     <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                  </svg>
               </div>
               <p>UCI Neonatal</p>
            </div>
            <div class="membresia__area">
               <div class="emergencia">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap w-6 h-6 text-card">
                     <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                  </svg>
               </div>
               <p>Emergencia</p>
            </div>
            <div class="membresia__area">
               <div class="cardiologia">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope w-6 h-6 text-card">
                     <path d="M11 2v2"></path>
                     <path d="M5 2v2"></path>
                     <path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"></path>
                     <path d="M8 15a6 6 0 0 0 12 0v-3"></path>
                     <circle cx="20" cy="10" r="2"></circle>
                  </svg>
               </div>
               <p>Cardiología</p>
            </div>
            <div class="membresia__area">
               <div class="nefrologia">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-syringe w-6 h-6 text-card">
                     <path d="m18 2 4 4"></path>
                     <path d="m17 7 3-3"></path>
                     <path d="M19 9 8.7 19.3c-1 1-2.5 1-3.4 0l-.6-.6c-1-1-1-2.5 0-3.4L15 5"></path>
                     <path d="m9 11 4 4"></path>
                     <path d="m5 19-3 3"></path>
                     <path d="m14 4 6 6"></path>
                  </svg>
               </div>
               <p>Nefrología</p>
            </div>
            <div class="membresia__area">
               <div class="quirurgico">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scissors w-6 h-6 text-card">
                     <circle cx="6" cy="6" r="3"></circle>
                     <path d="M8.12 8.12 12 12"></path>
                     <path d="M20 4 8.12 15.88"></path>
                     <circle cx="6" cy="18" r="3"></circle>
                     <path d="M14.8 14.8 20 20"></path>
                  </svg>
               </div>
               <p>Quirúrgico</p>
            </div>
            <div class="membresia__area">
               <div class="cred">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-6 h-6 text-card">
                     <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                     <circle cx="9" cy="7" r="4"></circle>
                     <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                     <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
               </div>
               <p>CRED / General</p>
            </div>
         </div>
         <div class="membresia__mas">
            <p>+ Inmunizaciones y más especialidades</p>
         </div>
      </div>
   </section>

   <!-- Testimonio -->
   <section class="membresia__section membresia__section--gris" id="testimonios">
      <div class="membresia__contenedor">
         <p class="membresia__slogan center">Testimonio</p>
         <h2 class="membresia__sub-titulo center">Profesionales que ya confían en nosotros</h2>
         <div class="membresia__testimonios">
            <div class="membresia__testimonio">
               <div class="icono">
                  <i class="fa-solid fa-quote-right"></i>
               </div>
               <div class="estrellas">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
               </div>
               <p class="texto">"Trabajaba en UCI pero sentía que me faltaba base en varios temas. Con la membresía pude capacitarme de forma ordenada y ahora tomo decisiones con mucha más seguridad."</p>
               <div class="usuario">
                  <i class="fa-regular fa-user"></i>
                  <p>
                     <span>Lic. en Enfermería</span>
                     UCI Adulto
                  </p>
               </div>
            </div>
            <div class="membresia__testimonio">
               <div class="icono">
                  <i class="fa-solid fa-quote-right"></i>
               </div>
               <div class="estrellas">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
               </div>
               <p class="texto">"Gastaba en cursos sueltos y no aplicaba casi nada. Con la membresía tengo todo en un solo lugar y siento que sí estoy avanzando."</p>
               <div class="usuario">
                  <i class="fa-regular fa-user"></i>
                  <p>
                     <span>Enfermero asistencial</span>
                     Emergencia
                  </p>
               </div>
            </div>
            <div class="membresia__testimonio">
               <div class="icono">
                  <i class="fa-solid fa-quote-right"></i>
               </div>
               <div class="estrellas">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
               </div>
               <p class="texto">"Tenía miedo de cometer errores por falta de actualización. Hoy trabajo con más confianza."</p>
               <div class="usuario">
                  <i class="fa-regular fa-user"></i>
                  <p>
                     <span>Enfermera</span>
                     UCI Neonatal
                  </p>
               </div>
            </div>
            <div class="membresia__testimonio">
               <div class="icono">
                  <i class="fa-solid fa-quote-right"></i>
               </div>
               <div class="estrellas">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
               </div>
               <p class="texto">"No sabía por dónde empezar. La membresía me dio una ruta clara y certificaciones reales."</p>
               <div class="usuario">
                  <i class="fa-regular fa-user"></i>
                  <p>
                     <span>Interno de Enfermería</span>
                     Estudiante
                  </p>
               </div>
            </div>
            <div class="membresia__testimonio">
               <div class="icono">
                  <i class="fa-solid fa-quote-right"></i>
               </div>
               <div class="estrellas">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
               </div>
               <p class="texto">"No podía pagar cursos cada mes. Ahora estudio a mi ritmo y siento que mi inversión sí vale."</p>
               <div class="usuario">
                  <i class="fa-regular fa-user"></i>
                  <p>
                     <span>Profesional de Salud</span>
                     Área General
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Preguntas Frecuentes -->
   <section class="membresia__section" id="preguntas">
      <div class="membresia__contenedor">
         <p class="membresia__slogan center">Preguntas Frecuentes</p>
         <h2 class="membresia__sub-titulo center">Resolvemos tus dudas</h2>
         <div class="membresia__preguntas">
            <div class="membresia__pregunta">
               <h3 class="titulo">¿Los cursos son solo teóricos?</h3>
               <p class="texto">No. Nuestros cursos combinan fundamentos teóricos con casos clínicos reales, simulaciones y talleres prácticos. Cada formación está diseñada para que puedas aplicar lo aprendido directamente en tu práctica profesional.</p>
            </div>
            <div class="membresia__pregunta">
               <h3 class="titulo">¿Sirve si tengo poco tiempo disponible?</h3>
               <p class="texto">Absolutamente. La membresía te da acceso 24/7 para estudiar a tu ritmo. Los cursos están divididos en módulos cortos que puedes completar en tus tiempos libres, incluso entre turnos. Tú decides cuándo y cuánto avanzar.</p>
            </div>
            <div class="membresia__pregunta">
               <h3 class="titulo">¿La certificación es válida?</h3>
               <p class="texto">Sí. Cada curso completado te otorga una constancia de capacitación con respaldo institucional. Las certificaciones incluyen el nombre del curso, horas académicas y código de verificación que puedes agregar a tu currículum.</p>
            </div>
            <div class="membresia__pregunta">
               <h3 class="titulo">¿Es más económico que pagar cursos sueltos?</h3>
               <p class="texto">Mucho más económico. Un solo curso especializado puede costar entre S/150 y S/300. Con la membresía premium accedes a más de 180 cursos por una única inversión anual, lo que representa un ahorro de más del 90% comparado con comprar cada curso por separado.</p>
            </div>
            <div class="membresia__pregunta">
               <h3 class="titulo">¿Puedo acceder desde cualquier dispositivo?</h3>
               <p class="texto">Sí. La plataforma es 100% responsive y puedes acceder desde computadora, tablet o celular. Tu progreso se guarda automáticamente y puedes continuar donde lo dejaste en cualquier momento.</p>
            </div>
         </div>
      </div>
   </section>

   <!-- Invierte una vez -->
   <section class="membresia__invierte">
      <div class="membresia__contenedor">
         <div class="flex">
            <div class="contenido">
               <div class="tag">
                  <p><i class="fa-solid fa-shield"></i> Garantía de satisfacción</p>
                  <p><i class="fa-solid fa-clock"></i> Acceso inmediato</p>
                  <p><i class="fa-solid fa-award"></i> Certificación incluida</p>
               </div>
               <h2 class="titulo">Invierte una vez. <span>Capacítate todo el año.</span></h2>
               <p class="texto">Únete a miles de profesionales de salud que ya decidieron invertir en su seguridad clínica. Tu paciente merece un profesional preparado. Tú mereces sentirte seguro.</p>
               <a href="#planes" class="boton">Activar mi Membresía ahora</a>
               <p class="nota">Pago seguro • Acceso inmediato • Soporte incluido</p>
            </div>
         </div>
      </div>
   </section>

</div>