<?php get_header(); ?>
<!-- <?php dynamic_sidebar( 'social-bar' ); ?> -->
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- not working :( -->
		<div class="post-nav"><p><?php posts_nav_link('&#8734;','Go Forward In Time','Go Back in Time'); ?></p></div>
		<?php get_template_part( 'entry' ); ?>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	<div class="totop"> <a href="#top"><svg viewBox="0 0 15.7 9.1" id="icon-arrow-up" width="100%" height="100%"> <path d="M7.8,0l7.6,7.6c0.3,0.3,0.3,0.9,0,1.2s-0.9,0.3-1.2,0L7.8,2.4L1.5,8.8c-0.3,0.3-0.9,0.3-1.2,0s-0.3-0.9,0-1.2L7.8,0z"></path> </svg></a> </div>
	<footer class="footer">
		<!--< ?php get_template_part( 'nav', 'below-single' ); ?>-->
		<?php $entries = get_post_meta( get_the_ID(), 'product_group', true ); ?>
		<!-- < ?php echo '<p>' . var_dump($entries) . '</p>'?> -->
		<?php if ( $entries > 0) : ?>
			<h3 class="widget-title">shop the look</h3>
			<ul class="related_product flex_list">
				<?php
				// $entries = get_post_meta( get_the_ID(), 'product_group', true );
				foreach ( (array) $entries as $key => $entry ) {

					$img = $title = $price = $link = '';

					if ( isset( $entry['title'] ) ) {
						$title = esc_html( $entry['title'] );
					}

					if ( isset( $entry['image'] ) ) {
						//$img = wp_get_attachment_image( $entry['image'], 'share-pick', null, array(
						$img = esc_url( $entry['image'], 'share-pick', null, array(
							'class' => 'thumb',
						) );
					}

					if ( isset( $entry['price'] ) ) {
						$price = esc_html( $entry['price'] );
					}

					if ( isset( $entry['link'] ) ) {
						$link = esc_url( $entry['link'] );
					}

					// Do something with the data

					echo '<li><a href="'. $link .'">';
					echo '<img class="product_img" src="'. $img .'" alt="product_img"/>';
					echo '<p class="product_title">'. $title .'</p>';
					echo '<p class="product_price">'. $price .'</p>';
					echo '</a></li>';
				}
				?>
			</ul>

		<?php endif; ?>
	</footer>
</section>

<?php get_footer(); ?>
