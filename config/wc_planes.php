<div class="wc_planes__item">
   <div class="wc_planes__info wc_planes__info--clasico">
      <div class="wc_planes__icono">
         <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <div class="wc_planes__shop">
         <div class="wc_planes__datos">
            <span class="wc_planes__datos--moneda">S/</span>
            <span class="wc_planes__datos--precio">8</span>
            <span class="wc_planes__datos--slogan">x curso</span>
         </div>
         <div class="wc_planes__frase">Vuélvete Miembro Clásico</div>
      </div>
      <div class="wc_planes__cursor">
         <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
      </div>
   </div>
   <div class="wc_planes__contenido wc_planes__contenido--clasico">
      <svg class="wc_planes__forma" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 39.86">
         <path class="wc_planes__forma--clasico" d="M297.64,39.86C271.71,39.86,0,0,0,0H595.28S326.14,39.86,297.64,39.86Z"/>
      </svg>
      <div class="wc_planes__ul">
         <p class="wc_planes__li">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            Tu capacitación por 1 mes
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            +25 cursos
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            Acceso al aula virtual
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            Certificado por curso
         </p>
      </div>
      <div class="wc_planes__total wc_planes__total--clasico">Precio total</div>
      <div class="wc_planes__eira">
         <img class="wc_planes__img" src="https://acis.edu.pe/RECURSOS_PROGRAMA/ICON/eira-clasico.svg" alt="Eira Membresía Clásico">
         <div class="wc_planes__monto wc_planes__monto--clasico">
            <?php echo $clasico->get_price_html();?>
         </div>
      </div>
   </div>
   <a href="?add-to-cart=<?php echo $clasico->id; ?>" class="wc_planes__boton">Pagar Membresía Clásico</a>
</div>
<div class="wc_planes__item">
   <div class="wc_planes__info wc_planes__info--premium">
      <div class="wc_planes__icono">
         <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <div class="wc_planes__shop">
         <div class="wc_planes__datos">
            <span class="wc_planes__datos--moneda">S/</span>
            <span class="wc_planes__datos--precio">2</span>
            <span class="wc_planes__datos--slogan">x curso</span>
         </div>
         <div class="wc_planes__frase">Vuélvete Miembro Premium</div>
      </div>
      <div class="wc_planes__cursor">
         <i class="fa fa-mouse-pointer" aria-hidden="true"></i>
      </div>
   </div>
   <div class="wc_planes__contenido wc_planes__contenido--premium">
      <svg class="wc_planes__forma" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 39.86">
         <path class="wc_planes__forma--premium" d="M297.64,39.86C271.71,39.86,0,0,0,0H595.28S326.14,39.86,297.64,39.86Z"/>
      </svg>
      <div class="wc_planes__ul">
         <p class="wc_planes__li">
            <i class="fa fa-star" aria-hidden="true"></i>
            Empoderate en 1 año
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-star" aria-hidden="true"></i>
            + 170 cursos
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-star" aria-hidden="true"></i>
            Certificación incluida
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-star" aria-hidden="true"></i>
            Acceso a la programación anual
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-star" aria-hidden="true"></i>
            Acceso a talleres
         </p>
         <p class="wc_planes__li">
            <i class="fa fa-star" aria-hidden="true"></i>
            Descuentos en diplomados
         </p>
      </div>
      <div class="wc_planes__total wc_planes__total--premium">Precio total</div>
      <div class="wc_planes__eira">
         <img class="wc_planes__img" src="https://acis.edu.pe/RECURSOS_PROGRAMA/ICON/eira-premium.svg" alt="Eira Membresía Clásico">
         <div class="wc_planes__monto wc_planes__monto--premium">
            <?php echo $premium->get_price_html();?>
         </div>
      </div>
   </div>
   <a href="?add-to-cart=<?php echo $premium->id; ?>" class="wc_planes__boton">Pagar Membresia Premium</a>
</div>