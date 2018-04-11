<?php get_header(); ?>

<?php get_template_part( 'header', 'archive' ); ?>
<section class="grid are-images-unloaded">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'entry-summary' ); ?>
  <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
