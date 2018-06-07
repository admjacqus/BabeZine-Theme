<?php get_header(); ?>
<style>.menu-search{display:none;}</style>
<article id="post-0" class="post not-found">
<header class="header">
<img src="" alt="" id="shrug">
</header>
<section class="entry-content">
<h2>try a search or pick a category instead?</h2>
<?php get_template_part('search', 'menu'); ?>
</section>

<h4>here's some new, too</h4>
<ul class="recent">
<?php
// except 'how to 223' and 'uncategorised 1'
$args = array ('category__not_in' => array( 223, 1 ) );
	$recent_posts = wp_get_recent_posts($args);
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	}
	wp_reset_query();
?>
</ul>

</article>

<!-- < ?php get_sidebar(); ?> -->
<?php get_footer(); ?>
