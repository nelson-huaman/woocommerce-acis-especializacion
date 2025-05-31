<div class="pagina">
   <h1 class="pagina__h1">Nuestro Convenios</h1>
</div>

<div class="container">
   <?php
   $args = array(
      'post_type' => 'docente',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'DESC'
   );

   $docentes = new WP_Query($args);

   if ($docentes->have_posts()) : ?>
      <ul>
         <?php while ($docentes->have_posts()) : $docentes->the_post(); ?>
            <li><?php the_title(); ?></li>
         <?php endwhile; ?>
      </ul>
      <?php wp_reset_postdata(); ?>
   <?php else : ?>
      <p>No hay docentes disponibles.</p>
   <?php endif; ?>
</div>