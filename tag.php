<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
<h1 class="title"><?php _e( 'Tag Archives: ', 'missguided' ); ?><?php single_tag_title(); ?></h1>
</header>
  <div id="grid">
  <div class="gutter-sizer"></div>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $currTag = get_tag(get_query_var('tag'));
    $tag_name = $currTag->name;
    $args = array(
      'tag' => $tag,
      'posts_per_page' => 5,
      'paged'          => $paged
    );
    $tag_query = new WP_Query( $args );
    ?>
    <?php if ( $tag_query->have_posts() ) : while ( $tag_query->have_posts() ) : $tag_query->the_post(); // run the loop ?>
      <?php get_template_part( 'entry-summary' ); ?>
      <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <?php if ($tag_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
<nav id="nav-below" class="navigation" role="navigation">
 <div class="nav-previous">
   <?php echo get_next_posts_link( 'Older', $tag_query->max_num_pages ); // display older posts link ?>
 </div>
   <div class="nav-next">
   <?php echo get_previous_posts_link( 'Newer' ); // display newer posts link ?>
 </div>
</nav>

<?php } endif; ?>

  <div class="title-container">
  <svg id="babe" data-name="Layer 1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 878.43 260.55"><defs><style>.cls-1{fill:#fff;}</style></defs><title>babe</title><path class="cls-1" d="M201.85,219.79Q190,242.47,170.38,255.66a95.26,95.26,0,0,1-23.69,11.17A93.45,93.45,0,0,1,120,270.55q-21.32,0-36.54-6.43-15.23-6.76-30.12-22.67v24.7H11V10H57V91.89q13.53-13.2,27.07-18.95Q98,67.19,116.91,67.19a92.66,92.66,0,0,1,27.41,4.06,92.47,92.47,0,0,1,24,10.83,95.15,95.15,0,0,1,32.82,35.87q12.18,22.67,12.18,50.76Q213.35,197.12,201.85,219.79ZM151.09,126.4q-16.24-16.92-40.94-16.92-24,0-39.93,16.58T54.31,168.7q0,26.39,15.9,43,16.24,16.58,40.94,16.58T151.43,212Q167,195.44,167,169,167,143.33,151.09,126.4Z" transform="translate(-11 -10)"></path><path class="cls-1" d="M392,266.15v-25q-13.88,15.57-28.76,22.67-14.89,6.77-35.19,6.77-42,0-69.37-28.08-27.08-28.08-27.07-71.74T259,98.32q27.74-28.76,70-28.76,21,0,35.87,7.44Q380.17,84.1,392,99.67V74.29h42.3V266.15ZM374.76,128.77q-15.91-16.92-40.61-16.92t-40.61,16.92Q278,145.7,278,171.75q0,25.38,15.9,40.94,15.56,15.57,40.94,15.57,26.05,0,40.94-16.24,14.89-16.58,14.89-40.61Q390.66,145.35,374.76,128.77Z" transform="translate(-11 -10)"></path><path class="cls-1" d="M659.34,219.79q-11.85,22.67-31.47,35.87a95.29,95.29,0,0,1-23.69,11.17,93.46,93.46,0,0,1-26.73,3.72q-21.32,0-36.55-6.43-15.23-6.76-30.12-22.67v24.7h-42.3V10h46V91.89Q528,78.69,541.58,72.94q13.87-5.75,32.82-5.75a98.1,98.1,0,0,1,51.43,14.89,95.14,95.14,0,0,1,32.82,35.87q12.18,22.67,12.18,50.76Q670.84,197.12,659.34,219.79ZM608.58,126.4q-16.24-16.92-40.94-16.92-24,0-39.93,16.58T511.8,168.7q0,26.39,15.9,43,16.24,16.58,40.94,16.58T608.92,212q15.56-16.58,15.57-43Q624.48,143.33,608.58,126.4Z" transform="translate(-11 -10)"></path><path class="cls-1" d="M889.09,181.9a54.35,54.35,0,0,1-1.69,8.8H738.85a45.34,45.34,0,0,0,18.27,27.41q14.21,10.15,34.85,10.15,14.21,0,23.69-4.06,9.81-4.39,18.61-14.89h50.08q-9.48,29.78-35.87,45.34-26.39,15.91-55.49,15.9-28.77,0-51.77-12.52a99.73,99.73,0,0,1-36.88-34.18,90.24,90.24,0,0,1-11.17-24.7,98.37,98.37,0,0,1-4.06-28.42A99.71,99.71,0,0,1,702,120.65a101.31,101.31,0,0,1,34.51-35.87,111.14,111.14,0,0,1,25.38-11.17,98.35,98.35,0,0,1,28.42-4.06Q818,69.55,840,82.41a92.38,92.38,0,0,1,34.85,34.85,99.33,99.33,0,0,1,10.83,26.05,114.65,114.65,0,0,1,3.72,29.78Q889.43,178.17,889.09,181.9Zm-63.28-60.23q-13.54-9.81-34.85-9.81-20.64,0-34.18,9.81-13.88,9.82-19.29,28.42H843.75Q839.35,131.48,825.82,121.66Z" transform="translate(-11 -10)"></path></svg>
  <h1 class="subtitle">ZINE</h1>
  </div>

</section>
<!-- < ?php get_sidebar(); ?> -->
<?php get_footer(); ?>
