<div class="menu-home">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h5>babeZine</h5></a>
</div>
<div class="categories">
	<?php wp_nav_menu(array(
				'theme_location' => 'top-menu',
				'container' => '',
				'echo' => true,
				'depth' => 1 )
			);
			?>
	<div class="grad"></div>
</div>
<div class="menu-search">
	<?php get_template_part('search', 'menu'); ?>
</div>


