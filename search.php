<?php get_header(); ?>
<section id="content" role="main">
<?php get_template_part('title-container') ?>
<?php if ( have_posts() ) : ?>
<header class="header">
<h1 class="entry-title"><?php printf( __( 'everything %s', 'missguided' ), get_search_query() ); ?></h1>
</header>
    <div class="grid are-images-unloaded">
     <div class="gutter-sizer"></div>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry-summary' ); ?>
<?php endwhile; ?>
  </div>
<?php get_template_part( 'nav', 'below' ); ?>
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
</section>
<?php get_footer(); ?>
