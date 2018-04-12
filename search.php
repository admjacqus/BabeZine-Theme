<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<!-- < ?php get_template_part('title-container') ?> -->
<header class="header">
<h1 class="entry-title"><?php printf( __( 'everything %s', 'missguided' ), get_search_query() ); ?></h1>
</header>
    <div class="grid are-images-unloaded">
     <div class="gutter-sizer"></div>
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$s = get_search_query();
$args = array(
  's' =>$s,
  'posts_per_page' => 10,
  'paged' => $paged
);
// The Query
$search_query = new WP_Query( $args ); ?>
<?php if ( $search_query->have_posts() ) : while ( $search_query->have_posts() ) : $search_query->the_post(); // run the loop ?>
<?php get_template_part( 'entry-summary' ); ?>
<?php endwhile; wp_reset_postdata(); ?>
  </div>
  <?php if ($search_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
<nav id="nav-below" role="navigation">
 <div class="nav-previous">
   <?php echo get_next_posts_link( 'Older', $search_query->max_num_pages ); // display older posts link ?>
 </div>
   <div class="nav-next">
   <?php echo get_previous_posts_link( 'Newer' ); // display newer posts link ?>
 </div>
</nav>

<?php } endif; ?>
<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="title"><?php _e( 'Nothing Found', 'missguided' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'missguided' ); ?></p>
<?php get_search_form(); ?>
</section>
</article>
<?php endif; ?>
<?php get_footer(); ?>
