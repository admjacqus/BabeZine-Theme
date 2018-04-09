<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
<?php the_post(); ?>
<h1 class="title author"><?php _e( 'all posts by', 'missguided' ); ?> <?php the_author_link(); ?></h1>
<?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
<?php rewind_posts(); ?>
</header>

<div class="grid are-images-unloaded">
 <div class="gutter-sizer"></div>
  <?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
 $auth_name = $curauth->ID;
  $args = array(
    'author'=>  $auth_name,
    'posts_per_page' => 10,
    'paged'          => $paged
  );
  $auth_query = new WP_Query( $args );
  ?>
  <?php if ( $auth_query->have_posts() ) : while ( $auth_query->have_posts() ) : $auth_query->the_post(); // run the loop ?>
    <?php get_template_part( 'entry-summary' ); ?>
    <?php endwhile; wp_reset_postdata(); ?>
</div>
<?php if ($auth_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>

<nav id="nav-below" class="navigation" role="navigation">
<div class="nav-previous">
 <?php echo get_next_posts_link( 'Older', $auth_query->max_num_pages ); // display older posts link ?>
</div>
 <div class="nav-next">
 <?php echo get_previous_posts_link( 'Newer' ); // display newer posts link ?>
</div>
</nav>

<?php } endif; ?>
</section>
<?php get_footer(); ?>
