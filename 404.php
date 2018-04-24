<?php get_header(); ?>
<style>.menu-search{display:none;}</style>
<article id="post-0" class="post not-found">
<header class="header">
<h2 class="title"><?php _e( '🤷', 'missguided' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Try a search or pick a category instead?', 'missguided' ); ?></p>
<!-- < ?php get_search_form(); ?> -->
<?php get_template_part('search', 'menu'); ?>
</section>

<h3>here's some new, too</h3>
<ul class="recent">
<?php
	$recent_posts = wp_get_recent_posts();
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	}
	wp_reset_query();
?>
</ul>

</article>

<!-- < ?php get_sidebar(); ?> -->
<?php get_footer(); ?>
