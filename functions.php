<?php
function my_assets() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css'));

	wp_enqueue_script( 'twitter', 'https://platform.twitter.com/widgets.js', array(), '1', true);
	// https://github.com/desandro/masonry
	wp_enqueue_script( 'infinte', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.0b2.120519/jquery.infinitescroll.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'masonry', array('jquery'), null, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array(), '4.2511235' , true);
}
add_action( 'wp_enqueue_scripts', 'my_assets' );

//theme support
add_action( 'after_setup_theme', 'theme_functions' );
function theme_functions() {
    add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
}

// Remove p tags from images, scripts, and iframes.
function remove_some_ptags( $content ) {
  $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  $content = preg_replace('/<p>\s*(<script.*>*.<\/script>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p>\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
	$content = preg_replace('/<p style="text-align: center;">\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  $content = preg_replace('/<p style="text-align: center;">\s*(<script.*>*.<\/script>)\s*<\/p>/iU', '\1', $content);
  $content = preg_replace('/<p style="text-align: center;">\s*(<iframe.*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
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

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'wp_' with your project's prefix.
 * https://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Missguided
 * @package  mg_CMB2
 * @license  https://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'wp_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function wp_register_repeatable_group_field_metabox() {
	// removed prefix on all ids below $prefix = 'wp_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		//'id'           => $prefix . 'metabox',
		'id'           => 'product_metabox',
		'title'        => esc_html__( 'Realted product group', 'cmb2' ),
		'object_types' => array( 'page', 'post' ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		//'id'          => $prefix . 'demo',
		'id'          => 'product_group',
		'type'        => 'group',
		//'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
		'description' => esc_html__( 'Add related products below, rearranage order by dragging.', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Product {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Product', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Product', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Product Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Product Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Price', 'cmb2' ),
		'desc' => esc_html__( 'price with &pound;, incl .00. eg: 20.00', 'cmb2' ),
		'id'   => 'price',
		'type' => 'text_money',
		'before_field' => '&pound;', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Product URL', 'cmb2' ),
		'id'   => 'link',
		'type' => 'text_url',
	) );

}
?>
