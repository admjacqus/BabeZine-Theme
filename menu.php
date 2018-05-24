<div class="menu-home">
	 <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h5>babeZine</h5></a>
	<div id="mobile-btn" class="mobile-btn">
		<svg class="icon icon-menu-toggle" aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 50">
		<g class="svg-menu-toggle">
<path class="line line-1" d="M0,0H90V10H0Z"/>
<path class="line line-2" d="M0,20H90V30H0Z"/>
<path class="line line-3" d="M0,40H90V50H0Z"/>

</g>
</svg>
	</div>	



</div>

<div class="categories">

<div class="mobile-search">
	<a class="back-home" href="https://www.missguided.co.uk">
<h5>back to missguided</h5>
</a>
	<?php get_template_part('search', 'menu'); ?></div>
	<?php wp_nav_menu(array(
				'theme_location' => 'top-menu',
				'container' => '',
				'echo' => true,
				'depth' => 1 )
			);
			?>
			
			
</div>

<div class="menu-search"><?php get_template_part('search', 'menu'); ?></div>

