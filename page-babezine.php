<?php get_header(); ?>
<?php get_template_part('title-container') ?>
     <div id="hero">
       <?php   $do_not_duplicate = array(); ?>
       <?php   $heros = new WP_Query('category_name=hero&posts_per_page=1'); ?>
       <?php   while ($heros->have_posts()) : $heros->the_post(); ?>
      <?php  $do_not_duplicate[] = $post->ID; ?>
         <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
             <img src="<?php the_field('bz_image');?>" />
          <?php if ( is_singular() ) { echo '<h1 class="title">'; } else { echo '<h2 class="title">'; } ?>
            <?php the_title(); ?>
          <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
          <h5 class="subtitle"><?php the_field('bz_excerpt'); ?></h5>
          <button class="button"><?php the_field('bz_button'); ?></button>
        </a>
        <?php   endwhile; wp_reset_postdata(); ?>
     </div>

      <section class="grid are-images-unloaded">
       <div class="gutter-sizer"></div>
       
        <?php
          // set up or arguments for our custom query
          $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
          $query_args = array(
            'post_type' => 'post',
            'category_name' => 'BabeZine',
            'posts_per_page' => 5,
            'paged' => $paged,
            'post__not_in' => $do_not_duplicate
          );
          // create a new instance of WP_Query
          $babeposts = new WP_Query( $query_args );
        ?>
        <?php if ( $babeposts->have_posts() ) : while ( $babeposts->have_posts() ) : $babeposts->the_post(); // run the loop ?>
        <?php   $do_not_duplicate[] = $post->ID; ?>
        <?php get_template_part( 'entry-summary' ); ?>
        <?php endwhile; wp_reset_postdata(); ?>
</section>

     <?php if ($babeposts->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav id="nav-below" role="navigation">
    <div class="nav-previous">
      <?php echo get_next_posts_link( 'Older', $babeposts->max_num_pages ); // display older posts link ?>
    </div>
      <div class="nav-next">
      <?php echo get_previous_posts_link( 'Newer' ); // display newer posts link ?>
    </div>
  </nav>

<?php } ?>

<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>
<?php endif; ?>


<?php get_footer(); ?>
