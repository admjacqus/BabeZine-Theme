<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
<title><?php wp_title(''); ?></title>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<div class="navbar">
<div class="navigation">
	<ul>
		<li>
			<a href="https://www.missguided.co.uk/blog"><h5>back to babe zine</h5></a>
		</li>
		<li>
			<a href="https://www.missguided.co.uk/"><h5>shop missguided</h5></a>
		</li>
	</ul>
</div>
				<div class="social-sharing">
					<ul>
					</ul>
					<ul>
						<li>
							<a data-mobile-iframe="true" data-size="small" href="https://www.facebook.com/missguidedcouk/" target="_blank">
								<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 78 78"><defs><style>.cls-1{fill:#010002;}</style></defs><title>facebook</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path id="f" class="cls-1" d="M42,58.26V40.69h5.9l.88-6.85H42V29.48c0-2,.55-3.33,3.39-3.33H49V20a49.12,49.12,0,0,0-5.28-.27c-5.23,0-8.81,3.19-8.81,9v5.05H29v6.85h5.91V58.26Z"/></g></g><path d="M39,8A31,31,0,1,1,8,39,31,31,0,0,1,39,8m0-8A39,39,0,1,0,78,39,39,39,0,0,0,39,0Z"/></g></g></svg>
							</a>
						</li>
						<li>
							<a href="https://twitter.com/intent/tweet?text=Just%20reading%20<?php the_title(); ?> - via @missguided <?php the_permalink(); ?>%20%23babesofmissguided" title="Tweet this!">
								<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 78 78"><title>twitter</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M39,8A31,31,0,1,1,8,39,31,31,0,0,1,39,8m0-8A39,39,0,1,0,78,39,39,39,0,0,0,39,0Z"/><path d="M32.26,53.74c13.69,0,21.18-11.33,21.18-21.17q0-.48,0-1a15.15,15.15,0,0,0,3.72-3.85,14.85,14.85,0,0,1-4.28,1.18,7.47,7.47,0,0,0,3.28-4.12,14.94,14.94,0,0,1-4.73,1.81,7.45,7.45,0,0,0-12.69,6.79,21.14,21.14,0,0,1-15.37-7.79,7.45,7.45,0,0,0,2.3,9.94,7.39,7.39,0,0,1-3.37-.93v.1a7.45,7.45,0,0,0,6,7.3,7.44,7.44,0,0,1-3.36.13,7.45,7.45,0,0,0,7,5.17,14.94,14.94,0,0,1-9.25,3.19,15.13,15.13,0,0,1-1.77-.1,21.08,21.08,0,0,0,11.41,3.33"/></g></g></svg>
							</a>
						</li>

					</ul>
				</div>

						<div id="categories">
							<?php wp_nav_menu(array(
								'theme_location' => 'top-menu',
								'container' => '',
								'echo' => true,
								'depth' => 1 )
							);
							?>
							<div class="grad"></div>
						</div>
<!-- can add serach to pages real easy (need styling) -->
<!-- < ?php get_search_form(); ?> -->

			</div>
			</header>
<div id="container">
