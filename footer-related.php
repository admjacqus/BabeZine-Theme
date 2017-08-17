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
  echo '<div id="related_posts"><h3>more cool stuff</h3><ul class="flex_list">';
  while( $my_query->have_posts() ) {
  $my_query->the_post();?>

  <li><div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
  <div class="relatedcontent">
  <h2 class="title"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
  </div>
  <?php if( get_field('bz_button') ){ ?>
  <button class="cta"><?php the_field('bz_button'); ?></button>
    <?php } else { ?>
        <button class="cta">check it out</button>
        <?php } ?>
  </li>
  <?
  }
  echo '</ul></div>';
  }
  }
  $post = $orig_post;
  wp_reset_query();
	wp_footer();
  ?>
