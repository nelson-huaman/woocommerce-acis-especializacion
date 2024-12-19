<div class="wc_curso__item">
   <div class="wc_curso__recomendado wc_curso__recomendado--oculto">Clásico</div>
   <div class="wc_curso__contenido wc_curso__contenido--clasico">
      <div class="wc_curso__header">
         <h3 class="wc_curso__h3 wc_curso__h3--clasico">Miembro Clasico</h3>
         <div class="wc_curso__slogan wc_curso__slogan--clasico">+15 Cursos (1 Mes)</div>
         <div class="wc_curso__precio wc_curso__precio--clasico">S/ <span>8</span></div>
         <button type="button" id="afiliarme" class="wc_curso__boton wc_curso__boton--clasico">Afiliarme</button>
      </div>
      <div class="wc_curso__body wc_curso__body--clasico">
         <svg class="wc_curso__vector wc_curso__vector--clasico" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 39.86">
            <path d="M297.64,39.86C271.71,39.86,0,0,0,0H595.28S326.14,39.86,297.64,39.86Z"/>
         </svg>
         <div class="wc_curso__ul">
            <p class="wc_curso__li wc_curso__li--clasico"><i class="fa fa-star" aria-hidden="true"></i> Tu capacitación por 1 mes</p>
            <p class="wc_curso__li wc_curso__li--clasico"><i class="fa fa-star" aria-hidden="true"></i> +15 cursos</p>
            <p class="wc_curso__li wc_curso__li--clasico"><i class="fa fa-star" aria-hidden="true"></i> Certificación digital incluida</p>
            <p class="wc_curso__li wc_curso__li--clasico"><i class="fa fa-star" aria-hidden="true"></i> Acceso al aula virtual</p>
            <p class="wc_curso__li wc_curso__li--clasico"><i class="fa fa-star" aria-hidden="true"></i> Certificado por curso</p>
         </div>
         <div class="wc_curso__pagar">
            <div class="wc_curso__pagar--label-clasico">Total a pagar</div>
            <div class="wc_curso__pagar--clasico"><?php echo $clasico->get_price_html(); ?></div>
         </div>
         <div class="wc_curso__enlace">
            <a href="?add-to-cart=<?php echo $clasico->id; ?>" class="wc_curso__boton wc_curso__boton--clasico">Pagar Ahora</a>
         </div>
      </div>
   </div>
</div>
<div class="wc_curso__item">
   <div class="wc_curso__recomendado">Recomendado</div>
   <div class="wc_curso__contenido wc_curso__contenido--premium">
      <div class="wc_curso__header">
         <h3 class="wc_curso__h3 wc_curso__h3--premium">Miembro Premium</h3>
         <div class="wc_curso__slogan wc_curso__slogan--premium">+170 Cursos (1 Año)</div>
         <div class="wc_curso__precio wc_curso__precio--premium">S/ <span>2</span></div>
         <button type="button" id="afiliarme" class="wc_curso__boton wc_curso__boton--premium">Afiliarme</button>
      </div>
      <div class="wc_curso__body">
         <svg class="wc_curso__vector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 39.86">
            <path d="M297.64,39.86C271.71,39.86,0,0,0,0H595.28S326.14,39.86,297.64,39.86Z"/>
         </svg>
         <div class="wc_curso__ul">
            <p class="wc_curso__li"><i class="fa fa-star" aria-hidden="true"></i> Empoderate en 1 año</p>
            <p class="wc_curso__li"><i class="fa fa-star" aria-hidden="true"></i> +170 cursos</p>
            <p class="wc_curso__li"><i class="fa fa-star" aria-hidden="true"></i> Certificación digital incluida</p>
            <p class="wc_curso__li"><i class="fa fa-star" aria-hidden="true"></i> Acceso a la programación anual</p>
            <p class="wc_curso__li"><i class="fa fa-star" aria-hidden="true"></i> Acceso a talleres</p>
            <p class="wc_curso__li"><i class="fa fa-star" aria-hidden="true"></i> Descuentos en diplomados</p>
         </div>
         <div class="wc_curso__pagar">
            <div class="wc_curso__pagar--label-premium">Total a pagar</div>
            <div class="wc_curso__pagar--premium"><?php echo $premium->get_price_html();?></div>
         </div>
         <div class="wc_curso__enlace">
            <a href="?add-to-cart=<?php echo $premium->id; ?>" class="wc_curso__boton wc_curso__boton--premium">Pagar Ahora</a>
         </div>
      </div>
   </div>
</div>