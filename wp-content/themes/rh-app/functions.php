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
    // add_image_size( 'small-icon-thumb', false );
    // add_image_size( 'featured-description', 292, 310, false );
    // add_image_size( 'press-thumb', 200, 104, false );
    // add_image_size( 'pricing-support', 100, 100, false );
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
    	'primary' => __( 'Primary' ),
      'work' => __( 'Work' ),
      'shop' => __( 'Shop' ),
      'locations' => __( 'Locations' ),
      'about' => __( 'About' )
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
/* rh_pt_client Post Type */
/*-------------------------------------------------------------------------------------------*/
class rh_pt_client {
	
	function rh_pt_client() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Clients',
		    'singular_name' => 'Client',
		    'add_new' => 'Add New Client',
		    'all_items' => 'All Clients',
		    'add_new_item' => 'Add New Client',
		    'edit_item' => 'Edit Client',
		    'new_item' => 'New Client',
		    'view_item' => 'View Client',
		    'search_items' => 'Search Clients',
		    'not_found' =>  'No Clients found',
		    'not_found_in_trash' => 'No Clients found in trash',
		    'parent_item_colon' => 'Parent Post:',
		    'menu_name' => 'Clients'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Reed-Hill Clients",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 20,
			'menu_icon' => get_bloginfo('template_directory') . '/_/images/rh-admin-icon.png',
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','editor','thumbnail','excerpt','custom-fields','revisions'),
			'has_archive' => true,
			'rewrite' => false,
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('rh_pt_client',$args);
	}
}

$rh_pt_client = new rh_pt_client();				

function rh_clients_taxonomy() {
	$labels = array(
		'name'              => _x( 'Client Categories', '' ),
		'singular_name'     => _x( 'Client Category', '' ),
		'search_items'      => __( 'Search Client Categories' ),
		'all_items'         => __( 'All Client Categories' ),
		'parent_item'       => __( 'Parent Client Category' ),
		'parent_item_colon' => __( 'Parent Client Category:' ),
		'edit_item'         => __( 'Edit Client Category' ), 
		'update_item'       => __( 'Update Client Category' ),
		'add_new_item'      => __( 'Add New Client Category' ),
		'new_item_name'     => __( 'New Client Category' ),
		'menu_name'         => __( 'Client Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'client_category', 'rh_pt_client', $args );
}
add_action( 'init', 'rh_clients_taxonomy', 0 );	


/*-------------------------------------------------------------------------------------------*/
/* rh_pt_industry Post Type */
/*-------------------------------------------------------------------------------------------*/
class rh_pt_industry {
	
	function rh_pt_industry() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Industries',
		    'singular_name' => 'Industry',
		    'add_new' => 'Add New Industry',
		    'all_items' => 'All Industries',
		    'add_new_item' => 'Add New Industry',
		    'edit_item' => 'Edit Industry',
		    'new_item' => 'New Industry',
		    'view_item' => 'View Industry',
		    'search_items' => 'Search Industries',
		    'not_found' =>  'No Industries found',
		    'not_found_in_trash' => 'No Industries found in trash',
		    'parent_item_colon' => 'Parent Post:',
		    'menu_name' => 'Industries'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Reed-Hill Industries",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 20,
			'menu_icon' => get_bloginfo('template_directory') . '/_/images/rh-admin-icon.png',
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','editor','thumbnail','excerpt','custom-fields','revisions'),
			'has_archive' => true,
			'rewrite' => false,
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('rh_pt_industry',$args);
	}
}

$rh_pt_industry = new rh_pt_industry();				

function rh_industries_taxonomy() {
	$labels = array(
		'name'              => _x( 'Industry Categories', '' ),
		'singular_name'     => _x( 'Industry Category', '' ),
		'search_items'      => __( 'Search Industry Categories' ),
		'all_items'         => __( 'All Industry Categories' ),
		'parent_item'       => __( 'Parent Industry Category' ),
		'parent_item_colon' => __( 'Parent Industry Category:' ),
		'edit_item'         => __( 'Edit Industry Category' ), 
		'update_item'       => __( 'Update Industry Category' ),
		'add_new_item'      => __( 'Add New Industry Category' ),
		'new_item_name'     => __( 'New Industry Category' ),
		'menu_name'         => __( 'Industry Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'industry_category', 'rh_pt_industry', $args );
}
add_action( 'init', 'rh_industries_taxonomy', 0 );	



/*-------------------------------------------------------------------------------------------*/
/* rh_pt_medium Post Type */
/*-------------------------------------------------------------------------------------------*/
class rh_pt_medium {
	
	function rh_pt_medium() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
		    'name' => 'Mediums',
		    'singular_name' => 'Medium',
		    'add_new' => 'Add New Medium',
		    'all_items' => 'All Mediums',
		    'add_new_item' => 'Add New Medium',
		    'edit_item' => 'Edit Medium',
		    'new_item' => 'New Medium',
		    'view_item' => 'View Medium',
		    'search_items' => 'Search Mediums',
		    'not_found' =>  'No Mediums found',
		    'not_found_in_trash' => 'No Mediums found in trash',
		    'parent_item_colon' => 'Parent Post:',
		    'menu_name' => 'Mediums'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Reed-Hill mediums",
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_nav_menus' => true, 
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 20,
			'menu_icon' => get_bloginfo('template_directory') . '/_/images/rh-admin-icon.png',
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array('title','editor','thumbnail','excerpt','custom-fields','revisions'),
			'has_archive' => true,
			'rewrite' => false,
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('rh_pt_medium',$args);
	}
}

$rh_pt_medium = new rh_pt_medium();				

function rh_mediums_taxonomy() {
	$labels = array(
		'name'              => _x( 'Medium Categories', '' ),
		'singular_name'     => _x( 'Medium Category', '' ),
		'search_items'      => __( 'Search Medium Categories' ),
		'all_items'         => __( 'All Medium Categories' ),
		'parent_item'       => __( 'Parent Medium Category' ),
		'parent_item_colon' => __( 'Parent Medium Category:' ),
		'edit_item'         => __( 'Edit Medium Category' ), 
		'update_item'       => __( 'Update Medium Category' ),
		'add_new_item'      => __( 'Add New Medium Category' ),
		'new_item_name'     => __( 'New Medium Category' ),
		'menu_name'         => __( 'Medium Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'medium_category', 'rh_pt_medium', $args );
}
add_action( 'init', 'rh_mediums_taxonomy', 0 );	
				

?>