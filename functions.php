<?php

// Add theme suport

function kuosc_theme_support(){
	add_theme_support('title-tag'); // Adds title tag in the header of every page dynamically
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','kuosc_theme_support');


// Inject class on menu anchor tags
function add_class_on_a_tag($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
return $classes;
}

add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);

// Inject class on menu li tags
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// Create Dynamic Menus in Header and Footer

function kuosc_menus(){
	$locations = array(
		'primary' => "Header Menu",
		'footer' => "Footer Menu"

	);

	register_nav_menus($locations);

}

add_action('init','kuosc_menus');

// Custom Post Types

function kuosc_community_type(){
	$args = array(
		'labels'=> array(
			'name' => 'Communities',
			'singular_name' => 'Community',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive'=> true,
		'menu_icon' => 'dashicons-admin-site-alt3',
		'supports' => array('title','editor','thumbnail','custom-fields',),
		'rewrite' => array('slug'=> 'communities'),
	);	

	register_post_type('communities',$args);

}


add_action('init', 'kuosc_community_type');

function kuosc_event_type(){
	$args = array(
		'labels'=> array(
			'name' => 'Events',
			'singular_name' => 'Event',
		),
		'hierarchical' => true,
		'public' => true,
		'has_archive'=> true,
		'menu_icon' => 'dashicons-tickets-alt',
		'supports' => array('title','editor','thumbnail','custom-fields','comments'),
		'rewrite' => array('slug'=> 'events'),
	);	

	register_post_type('events',$args);

}


add_action('init', 'kuosc_event_type');





// Enqueue all static files

function kuosc_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('kuosc-style', get_template_directory_uri() . "/style.css", array('kuosc-bootstrap'), $version, 'all');
    wp_enqueue_style('kuosc-bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' , [], '4.3.1', 'all');
    wp_enqueue_style('kuosc-fontawesome', "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", [], '4.7.0', 'all');
    wp_enqueue_style('kuosc-googlefonts', "https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap", [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'kuosc_register_styles');

function kuosc_register_scripts()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script('kuosc-jquery', "https://code.jquery.com/jquery-3.3.1.slim.min.js",[], '3.3.1', 'all',true);
    wp_enqueue_script('kuosc-popper',"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" , [], '4.3.1', 'all',true);
    wp_enqueue_script('kuosc-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js",  array('kuosc-jquery'), '4.7.0', 'all',true);
    wp_enqueue_script('kuosc-polyfills', get_template_directory_uri()."/assets/scripts/smooth-scroll.polyfills.min.js", [], $version, 'all',true);
}

add_action('wp_enqueue_scripts', 'kuosc_register_scripts');

?>
