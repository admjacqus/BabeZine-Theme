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
<!-- <h2 class="title">< ?php _e( '🤷', 'missguided' ); ?></h2> -->
<img src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/shrug_emoji-modifier-fitzpatrick-type-5_1f937-1f3fe_1f3fe.png" alt="">
</header>
<section class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'missguided' ); ?></p>
<?php get_template_part('search', 'menu'); ?>
<h3>here's some new, too</h3>
<ul class="recent">
<?php
	$recent_posts = wp_get_recent_posts();
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'<p>' . $recent["post_excerpt"] . '</p></a> </li> ';

	}
	wp_reset_query();
?>
</ul>


</section>
</article>
<?php endif; ?>
<?php get_footer(); ?>
