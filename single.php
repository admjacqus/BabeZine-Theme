<?php get_header(); ?>
<!-- < ?php dynamic_sidebar( 'social-bar' ); ?> -->
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- not working :( -->
		<div class="post-nav"><p><?php posts_nav_link('&#8734;','Go Forward In Time','Go Back in Time'); ?></p></div>
		<?php get_template_part( 'entry' ); ?>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	<div class="totop"> <a href="#top"><svg viewBox="0 0 15.7 9.1" id="icon-arrow-up" width="100%" height="100%"> <path d="M7.8,0l7.6,7.6c0.3,0.3,0.3,0.9,0,1.2s-0.9,0.3-1.2,0L7.8,2.4L1.5,8.8c-0.3,0.3-0.9,0.3-1.2,0s-0.3-0.9,0-1.2L7.8,0z"></path> </svg></a> </div>
	<?php get_footer(); ?>
</section>
