<div class="wc_planes__item">
   <div class="wc_planes__contenido wc_planes__contenido--clasico">
      <div class="wc_planes__header wc_planes__header--clasico">
         <div class="wc_planes__icono"><i class="fa fa-star-o" aria-hidden="true"></i></div>
         <div class="wc_planes__informacion">
            <div class="wc_planes__precio wc_planes__precio--clasico">
               <span class="wc_planes__precio--moneda">S/.</span>
               <span class="wc_planes__precio--precio">8</span>
               <span class="wc_planes__precio--slogan">x curso</span>
            </div>
            <span class="wc_planes__frase">Vuélvete Miembro Clásico</span>
         </div>
      </div>
      <div class="wc_planes__body">
         <button class="wc_planes__plus wc_planes__plus--clasico" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
         <div class="wc_planes__descripcion wc_planes__descripcion--clasico">
            <svg class="wc_planes__vector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 39.86">
               <path class="wc_planes__vector--clasico" d="M297.64,39.86C271.71,39.86,0,0,0,0H595.28S326.14,39.86,297.64,39.86Z"/>
            </svg>
            <div class="wc_planes__ul">
               <p class="wc_planes__li"><i class="fa fa-chevron-right" aria-hidden="true"></i> Tu capacitación por 1 mes</p>
               <p class="wc_planes__li"><i class="fa fa-chevron-right" aria-hidden="true"></i> +25 cursos</p>
               <p class="wc_planes__li"><i class="fa fa-chevron-right" aria-hidden="true"></i> Acceso al aula virtual</p>
               <p class="wc_planes__li"><i class="fa fa-chevron-right" aria-hidden="true"></i> Certificado por curso</p>
            </div>
            <div class="wc_planes__total wc_planes__total--clasico">Precio total</div>
            <div class="wc_planes__eira">
               <img class="wc_planes__img" src="<?php echo IMG . 'eira-clasico'; ?>.svg" alt="Eira Membresía Clásico">
               <div class="wc_planes__monto wc_planes__monto--clasico">
                  <?php echo $clasico->get_price_html();?>
               </div>
            </div>
         </div>
      </div>
      <div class="wc_planes__footer wc_planes__footer--clasico">
         <a href="?add-to-cart=<?php echo $clasico->id; ?>" class="wc_planes__boton">Comprar Membresía Clásico</a>
      </div>
   </div>
</div>
<div class="wc_planes__item">
   <div class="wc_planes__contenido wc_planes__contenido--premium">
      <div class="wc_planes__header wc_planes__header--premium">
         <div class="wc_planes__icono"><i class="fa fa-star-o" aria-hidden="true"></i></div>
         <div class="wc_planes__informacion">
            <div class="wc_planes__precio wc_planes__precio--premium">
               <span class="wc_planes__precio--moneda">S/.</span>
               <span class="wc_planes__precio--precio">2</span>
               <span class="wc_planes__precio--slogan">x curso</span>
            </div>
            <span class="wc_planes__frase">Vuélvete Miembro Premium</span>
         </div>
      </div>
      <div class="wc_planes__body">
         <button class="wc_planes__plus wc_planes__plus--premium" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
         <div class="wc_planes__descripcion wc_planes__descripcion--premium">
            <svg class="wc_planes__vector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 39.86">
               <path class="wc_planes__vector--premium" d="M297.64,39.86C271.71,39.86,0,0,0,0H595.28S326.14,39.86,297.64,39.86Z"/>
            </svg>
            <div class="wc_planes__ul">
               <p class="wc_planes__li"><i class="fa fa-star" aria-hidden="true"></i> Empoderate en 1 año </p>
               <p class="wc_planes__li"><i class="fa fa-star" aria-hidden="true"></i> + 170 cursos</p>
               <p class="wc_planes__li"><i class="fa fa-star" aria-hidden="true"></i> Certificación incluida</p>
               <p class="wc_planes__li"><i class="fa fa-star" aria-hidden="true"></i> Acceso a la programación anual</p>
               <p class="wc_planes__li"><i class="fa fa-star" aria-hidden="true"></i> Acceso a talleres</p>
               <p class="wc_planes__li"><i class="fa fa-star" aria-hidden="true"></i> Descuentos en diplomados</p>
            </div>
            <div class="wc_planes__total wc_planes__total--premium">Total a pagar</div>
            <div class="wc_planes__eira">
               <img class="wc_planes__img" src="<?php echo IMG . 'eira-premium'; ?>.svg" alt="Eira Membresía Premium">
               <div class="wc_planes__monto wc_planes__monto--premium">
                  <?php echo $premium->get_price_html();?>
               </div>
            </div>
         </div>
      </div>
      <div class="wc_planes__footer wc_planes__footer--premium">
         <a href="?add-to-cart=<?php echo $premium->id; ?>" class="wc_planes__boton">Comprar Membresia Premium</a>
      </div>
   </div>
</div>