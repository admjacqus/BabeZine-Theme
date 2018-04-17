<div class="menu-home">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h5>babeZine</h5></a>
	<div id="mobile-btn" class="mobile-btn">
		<svg x="0px" y="0px" viewBox="0 0 100 100"><g transform="translate(0,-952.36218)"><path d="m 8.9999985,970.36218 0,12 82.0000035,0 0,-12 z m 0,26 0,12.00002 82.0000035,0 0,-12.00002 z m 0,26.00002 0,12 82.0000035,0 0,-12 z" style="text-indent:0;text-transform:none;direction:ltr;block-progression:tb;baseline-shift:baseline;color:#000000;enable-background:accumulate;" fill="#000000" fill-opacity="1" stroke="none" marker="none" visibility="visible" display="inline" overflow="visible"></path></g></svg>
	</div>	
</div>
<div class="categories">
	<?php wp_nav_menu(array(
				'theme_location' => 'top-menu',
				'container' => '',
				'echo' => true,
				'depth' => 1 )
			);
			?>
			<div class="mobile-search"><?php get_template_part('search', 'menu'); ?></div>
			
			</div>
<div class="menu-search">
	<?php get_template_part('search', 'menu'); ?>
</div>


