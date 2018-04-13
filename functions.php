<?php
//Removed: File Limit
//Removed: Making jQuery to load from Google Library (bad practice)

function my_assets() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css'));
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array(), '1.22' , true);
if ( is_single() ) {
	wp_enqueue_script( 'twitter', 'https://platform.twitter.com/widgets.js', array(), '1', true);
}else if ( is_page( 'babezine' ) || is_category() || is_archive() || is_search() ) {
	wp_enqueue_script( 'infinte', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.0b2.120519/jquery.infinitescroll.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'masonry', array('jquery'), null, true);
}

}
add_action( 'wp_enqueue_scripts', 'my_assets' );

//theme support
add_action( 'after_setup_theme', 'theme_functions' );
function theme_functions() {
    add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form' ) );
}


// Remove p tags from images, scripts, and iframes.
function remove_some_ptags( $content ) {
if ( is_single() ){
  $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  $content = preg_replace('/<p>\s*(<script.*>*.<\/script>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p>\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p style="text-align: center;">\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  $content = preg_replace('/<p style="text-align: center;">\s*(<script.*>*.<\/script>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p style="text-align: center;">\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
    // Returns the content.
    return $content;
}
add_filter( 'the_content', 'remove_some_ptags' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '">...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**Set the content width based on the theme's design and stylesheet.*/
if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
 function mg_widgets_init() {
 if ( function_exists('register_sidebar') ) {

	register_sidebar( array(
		'name'          => 'Right sidebar',
		'id'            => 'right-sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'social bar',
		'id'            => 'social-bar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="">',
		'after_title'   => '</h2>',
	) );

}
//Adding a custom menu location
register_nav_menus( array( 'top-menu' => 'Top primary menu') );
}
add_action( 'widgets_init', 'mg_widgets_init' );

//inlcude custom shortcodes, but not on admin
function product_short() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		include(WP_CONTENT_DIR . '/custom_shortcodes.php');
		add_shortcode( 'product', 'product_func' );
	} else {
		//which can also remove
		remove_shortcode( 'product' );
	}
}
add_action('init', 'product_short');
?>