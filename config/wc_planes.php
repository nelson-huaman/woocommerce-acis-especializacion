<div class="wc_planes__cart wc_planes__cart--clasico" data-id="2388" data-add="2">
   <i class="wc_planes__icono fa fa-star-half-o" aria-hidden="true"></i>
   <div class="wc_planes__info">
      <div class="wc_planes__name">Membresía Clásica</div>
      <div class="wc_planes__texto wc_planes__texto--slogan">Accede a <span>todos</span> los cursos por <span>30 Días</span></div>
      <div class="wc_planes__texto wc_planes__texto--precio">
         <?php if($membershipsActivo) { ?>
            <?php echo $clasico->get_price_html();?>
         <?php } else { ?>
            <?php echo 'S/. ' .$offSelinClasico; ?>
         <?php } ?>
      </div>
      <div class="wc_planes__texto wc_planes__texto--descripcion">Vuélvete <span>Miembro Clásico</span> y Certificate</div>
   </div>
</div>
<div class="wc_planes__cart wc_planes__cart--premium" data-id="2390" data-add="3">
   <i class="wc_planes__icono fa fa-star" aria-hidden="true"></i>
   <div class="wc_planes__info">
      <div class="wc_planes__name">Membresía Premium</div>
      <div class="wc_planes__texto wc_planes__texto--slogan">Accede a <span>todos</span> los cursos por <span>30 Días</span></div>
      <div class="wc_planes__texto wc_planes__texto--precio">
         <?php if($membershipsActivo) { ?>
            <?php echo $premium->get_price_html();?>
         <?php } else { ?>
            <?php echo 'S/. ' .$offSelinPremiun; ?>
         <?php } ?>
         
      </div>
      <div class="wc_planes__texto wc_planes__texto--descripcion">Vuélvete <span>Miembro Clásico</span> y Certificate</div>
   </div>
</div>