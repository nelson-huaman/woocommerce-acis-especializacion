<div class="login_account">
   <?php if (! is_user_logged_in()) : ?>
      <div class="login_account__item">
         <p class="slogan"><i class="fa-solid fa-hand-point-right"></i> ¿Tienes dudas sobre usar tu membrasía?</p>
         <iframe width="600" height="315" src="https://www.youtube.com/embed/ChBK8U1foTQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
   <?php endif; ?>
   <div class="login_account__item">
      <?php
      echo do_shortcode('[woocommerce_my_account]');
      ?>
   </div>
</div>