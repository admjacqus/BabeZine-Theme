<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="title"><?php _e( 'Tag Archives: ', 'missguided' ); ?><?php single_tag_title(); ?></h1>
</header>
<section id="grid">
 <div class="gutter-sizer"></div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'entry-summary' ); ?>
  <?php endwhile; endif; ?>
</section>
<!-- < ?php get_search_form(); ?> -->
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<!-- < ?php get_sidebar(); ?> -->
<?php get_footer(); ?>
