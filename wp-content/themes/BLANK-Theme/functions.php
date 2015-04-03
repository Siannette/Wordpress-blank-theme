<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	//styles
    function enqueue_styles() {
        wp_enqueue_style( 'style', get_stylesheet_uri());
        }  
        add_action('wp_enqueue_scripts', 'enqueue_styles');
        
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    if (function_exists('register_nav_menus')) {
        register_nav_menus(
            array (
            'main_nav' => 'Main Navigation Menu'
            )
    );
    }

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function create_posttype() {
register_post_type( 'products',
array(
'labels' => array(
'name' => __( 'Products' ),
'singular_name' => __( 'Product' )),
'public' => true,
'has_archive' => true,
'show_in_admin_bar'   => true,
'rewrite' => array('slug' => 'product'),
));
}

add_action( 'init', 'create_posttype' );


register_taxonomy( 'price', 'products', array(
        'hierarchical' => true,
        'query_var' => 'category_name',
        'rewrite' => $rewrite['category'],
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        '_builtin' => true,
    ) );

?>