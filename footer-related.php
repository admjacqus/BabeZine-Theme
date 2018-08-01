<?php $orig_post = $post;
  global $post;
  $categories = get_the_category($post->ID);
  if ($categories) {
  $category_ids = array();
  foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

  $args=array(
  'category__in' => $category_ids,
  'post__not_in' => array($post->ID),
  'posts_per_page'=> 3, // Number of related posts that will be shown.
  'ignore_sticky_posts'=>1
  );

  $my_query = new wp_query( $args );
  if( $my_query->have_posts() ) {
  echo '<div class="related_posts"><h3>more cool stuff</h3><ul class="flex_list horiz-on-mob">';
  while( $my_query->have_posts() ) {
  $my_query->the_post();?>


  <li><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><div class="relatedthumb"><?php the_post_thumbnail(); ?></div>
  <div class="relatedcontent">
  <h4 class="title"><?php the_title(); ?></h4>
<p class="subtitle"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
  <?php if( get_field('bz_button') ){ ?>
  <button class="button"><?php the_field('bz_button'); ?></button>
    <?php } else { ?>
        <button class="button">check it out</button>
        <?php } ?>
          </div>
    </a></li>

  <?php }
  echo '</ul></div>';
  }
  }
  $post = $orig_post;
  wp_reset_query();
	// wp_footer();
  ?>
