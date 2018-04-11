
  <?php get_template_part('title-container') ?>
     <div id="hero">
       <?php   $do_not_duplicate = array(); ?>
       <?php   $heros = new WP_Query('category_name=hero&posts_per_page=1'); ?>
       <?php   while ($heros->have_posts()) : $heros->the_post(); ?>
      <?php  $do_not_duplicate[] = $post->ID; ?>

         <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
             <img src="< ?php the_field('bz_image');?>" />
        <?php if ( is_singular() ) { echo '<h1 class="title">'; } else { echo '<h2 class="title">'; } ?>
          <h2 class="title"><?php the_title(); ?></h2>
          <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
          <h4 class="subtitle"><?php the_field('bz_excerpt'); ?></h4>
          <button class="button"><?php the_field('bz_button'); ?></button>
        </a>
        <?php   endwhile; wp_reset_postdata(); ?>
     </div>
      <section class="grid are-images-unloaded">
       <div class="gutter-sizer"></div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'entry-summary' ); ?>
        <?php endwhile; endif; ?>
     </section>
     <?php get_template_part( 'nav', 'below' ); ?>
