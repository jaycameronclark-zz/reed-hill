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
	wp_enqueue_style( 'video-js-css', get_template_directory_uri() . '/_/js/video-js/video-js.min.css' );
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

function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'posts_to_pages',
		'from' => 'rh_client_work',
		'to' => 'page'
	) );
}
add_action( 'p2p_init', 'my_connection_types' );



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

// add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
// function add_menu_parent_class( $items ) {
	
// 	$parents = array();
// 	foreach ( $items as $item ) {
// 		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
// 			$parents[] = $item->menu_item_parent;
// 		}
// 	}
	
// 	foreach ( $items as $item ) {
// 		if ( in_array( $item->ID, $parents ) ) {
// 			$item->classes[] = 'menu-parent-item'; 
// 		}
// 	}
	
// 	return $items;    
// }

// class rh_nav_menu extends Walker_Nav_Menu {
  
// // add classes to ul sub-menus
// function start_lvl( &$output, $depth ) {
//     // depth dependent classes
//     $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
//     $display_depth = ( $depth + 1); // because it counts the first submenu as 0
//     $classes = array(
//         'sub-menu',
//         ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
//         ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
//         'menu-depth-' . $display_depth
//         );
//     $class_names = implode( ' ', $classes );
  
//     // build html
//     $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
// }
  
// // add main/sub classes to li's and links
//  function start_el( &$output, $item, $depth, $args ) {
//     global $wp_query;
//     $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
  
//     // depth dependent classes
//     $depth_classes = array(
//         ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
//         ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
//         ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
//         'menu-item-depth-' . $depth
//     );
//     $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
  
//     // passed classes
//     $classes = empty( $item->classes ) ? array() : (array) $item->classes;
//     $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
  
//     // build html
//     $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
  
//     // link attributes
//     $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//     $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//     $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
//     $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//     $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
  
//     $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
//         $args->before,
//         $attributes,
//         $args->link_before,
//         apply_filters( 'the_title', $item->title, $item->ID ),
//         $args->link_after,
//         $args->after
//     );
  
//     // build html
//     $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
// }
// }

// Register Theme Features
function custom_theme_features()  {

	$formats = array( 'gallery', 'image', 'video', );
	add_theme_support( 'post-formats', $formats );	

}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'custom_theme_features' );
add_post_type_support( 'rh_client_work', 'post-formats' );

/*-------------------------------------------------------------------------------------------*/
/* rh_client_work Post Type */
/*-------------------------------------------------------------------------------------------*/
class rh_client_work {
	
	function rh_client_work() {
		add_action('init',array($this,'create_post_type'));
	}
	
	function create_post_type() {
		$labels = array(
	    'name' => 'Client Work',
	    'singular_name' => 'Client',
	    'add_new' => 'New Client Work',
	    'all_items' => 'All Client Work',
	    'add_new_item' => 'New Client Work',
	    'edit_item' => 'Edit Client Work',
	    'new_item' => 'New Client Work',
	    'view_item' => 'View Client Work',
	    'search_items' => 'Search Client Work',
	    'not_found' =>  'No Client Work found',
	    'not_found_in_trash' => 'No Client Work found in trash',
	    'parent_item_colon' => 'Parent Client:',
	    'parent' => 'Client',
	    'menu_name' => 'Client Work'
		);
		$args = array(
			'labels' => $labels,
			'description' => "Client Work",
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
			'rewrite' => array('slug' => 'work/client'),
			'supports' => array('page-attributes','title','editor','thumbnail','excerpt','custom-fields','revisions','author'),
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true
		); 
		register_post_type('rh_client_work',$args);
	}
}

$rh_client_work = new rh_client_work();				

function rh_client_work_taxonomy() {
	$labels = array(
		'name'              => _x( 'Client Work Categories', '' ),
		'singular_name'     => _x( 'Client Work Category', '' ),
		'search_items'      => __( 'Search Client Work Categories' ),
		'all_items'         => __( 'All Client Work Categories' ),
		'parent_item'       => __( 'Parent Client Work Category' ),
		'parent_item_colon' => __( 'Parent Client Work Category:' ),
		'edit_item'         => __( 'Edit Client Work Category' ), 
		'update_item'       => __( 'Update Client Work Category' ),
		'add_new_item'      => __( 'Add New Client Work Category' ),
		'new_item_name'     => __( 'New Client Work Category' ),
		'menu_name'         => __( 'Client Work Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'client_work_category', 'rh_client_work', $args );
}
add_action( 'init', 'rh_client_work_taxonomy', 0 );	


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