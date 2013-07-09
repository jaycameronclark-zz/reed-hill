<?php


/*-------------------------------------------------------------------------------------------*/
/* JQUERY */
/*-------------------------------------------------------------------------------------------*/
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );

				wp_enqueue_script( 'video-js', get_template_directory_uri() . '/_/js/video-js/video.js' );
	wp_enqueue_style( 'video-js-css', get_template_directory_uri() . '/_/js/video-js/video-js.css' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}


/*-------------------------------------------------------------------------------------------*/
/* RSS */
/*-------------------------------------------------------------------------------------------*/
  add_theme_support('automatic-feed-links');


/*-------------------------------------------------------------------------------------------*/
/* LOGIN LOGO */
/*-------------------------------------------------------------------------------------------*/
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_url').'/_/images/rh-logo-58x58.png) !important; background-size:58px 58px!important;}
    </style>';
}
add_action('login_head', 'custom_login_logo');


/*-------------------------------------------------------------------------------------------*/
/* IMAGES */
/*-------------------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );  
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'client-thumb', 238, 194, false );
    // add_image_size( 'featured-image', 960, 428, false );
}

/*-------------------------------------------------------------------------------------------*/
/* CLEAN HEAD */
/*-------------------------------------------------------------------------------------------*/
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');

/*-------------------------------------------------------------------------------------------*/
/* MENUS */
/*-------------------------------------------------------------------------------------------*/
function register_rh_app_menus() {
  register_nav_menus(
    array(
    	'work_shop' => __( 'Work/Shop' ),
      'work' => __( 'Work' ),
      'shop' => __( 'Shop' ),
      'locations' => __( 'Locations' ),
      'about' => __( 'About' ),
			'industry' => __( 'Industry' ),
			'client' => __( 'Client' ),
			'medium' => __( 'Medium' ),
    )
  );
}
add_action( 'init', 'register_rh_app_menus' );

/*-------------------------------------------------------------------------------------------*/
/* WIDGETS */
/*-------------------------------------------------------------------------------------------*/
	function rh_app_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar Widgets', 'rh_app' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'rh_app_widgets_init' );


/*-------------------------------------------------------------------------------------------*/
/* SUBPAGE */
/*-------------------------------------------------------------------------------------------*/
function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) )
        return true;            // we're at the page or at a sub page

    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }

    return false;  // we arn't at the page, and the page is not an ancestor
}


// Register Theme Features
function custom_theme_features()  {
	$formats = array( 'gallery', 'image', 'video', );
	add_theme_support( 'post-formats', $formats );	
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'custom_theme_features' );
add_post_type_support( 'rh_client_work', 'post-formats' );


?>