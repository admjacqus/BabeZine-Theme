<?php get_header(); ?>
  <div class="grid are-images-unloaded">
  <div class="gutter-sizer"></div>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $currCat = get_category(get_query_var('cat'));
    $cat_name = $currCat->name;
    $args = array(
      'category_name' => $cat_name,
      'posts_per_page' => 10,
      'paged'          => $paged
    );
    $cat_query = new WP_Query( $args );
    ?>
    <?php if ( $cat_query->have_posts() ) : while ( $cat_query->have_posts() ) : $cat_query->the_post(); // run the loop ?>
      <?php get_template_part( 'entry-summary' ); ?>
      <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <?php if ($cat_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
<nav id="nav-below" role="navigation">
 <div class="nav-previous">
   <?php echo get_next_posts_link( 'Older', $cat_query->max_num_pages ); // display older posts link ?>
 </div>
   <div class="nav-next">
   <?php echo get_previous_posts_link( 'Newer' ); // display newer posts link ?>
 </div>
</nav>

<?php } endif; ?>

<?php get_template_part('title-container') ?>

<?php get_footer(); ?>