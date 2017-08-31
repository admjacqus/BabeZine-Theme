<?php get_header(); ?>
<!-- < ?php dynamic_sidebar( 'social-bar' ); ?> -->
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- not working :( -->
		<div class="post-nav"><p><?php posts_nav_link('&#8734;','Go Forward In Time','Go Back in Time'); ?></p></div>
		<?php get_template_part( 'entry' ); ?>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	<?php get_footer(); ?>
</section>
