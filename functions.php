<?php


function theme_styles() {
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/build/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'bootstrap_js'), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

add_filter( 'show_admin_bar', '__return_false' );  //uncomment to hide admin bar

add_theme_support( 'menus' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header_menu' => __('Header Menu')
			)
		);
}
add_action('init', 'register_theme_menus');

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );


function create_widget($name, $id, $description) {

	register_sidebar(array(
		'name'=> __( $name ),
		'id' => $id,
		'description' => ( $description ),
		'before_widget' => '<div id="' .$id. '" class="widget %1$s %2$s col-md-2 col-md-offset-9">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="gone">',
		'after_title' => '</h3>'
		));
}

create_widget("widget area", "uptop", "Displays on the right of pages using the p_w_widget template");

?>