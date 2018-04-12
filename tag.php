<?php get_header(); ?>

  <?php get_template_part('title-container') ?>
<header class="header">
<h1 class="title"><?php single_tag_title('everything tagged with '); ?>.</h1>
</header>
  <div class="grid are-images-unloaded">
  <div class="gutter-sizer"></div>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $currTag = get_tag(get_query_var('tag'));
    $tag_name = $currTag;
    $args = array(
      'tag' => $tag,
      'posts_per_page' => 10,
      'paged'          => $paged
    );
    $tag_query = new WP_Query( $args );
    ?>
    <?php if ( $tag_query->have_posts() ) : while ( $tag_query->have_posts() ) : $tag_query->the_post(); // run the loop ?>
      <?php get_template_part( 'entry-summary' ); ?>
      <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <?php if ($tag_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
<nav id="nav-below" role="navigation">
 <div class="nav-previous">
   <?php echo get_next_posts_link( 'Older', $tag_query->max_num_pages ); // display older posts link ?>
 </div>
   <div class="nav-next">
   <?php echo get_previous_posts_link( 'Newer' ); // display newer posts link ?>
 </div>
</nav>

<?php } endif; ?>


<?php get_footer(); ?>
