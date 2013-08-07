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
/* PAGE EXCERPTS */
/*-------------------------------------------------------------------------------------------*/
add_action('init', 'page_excerpts');
function page_excerpts() {
  add_post_type_support( 'page', 'excerpt' );
}


/*-------------------------------------------------------------------------------------------*/
/* IMAGES */
/*-------------------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );  
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'client-thumb', 238, 194, false );
    // add_image_size( 'featured-image', 960, 428, false );
    add_image_size( 'inner-background', 955, 611, false );
}

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

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
/* CUSTOM BREADCRUMBS */
/*-------------------------------------------------------------------------------------------*/
function the_breadcrumb() {
   $current = $post->ID;
   $parent = $post->post_parent;
   $grandparent_get = get_post($parent);
   $grandparent = $grandparent_get->post_parent;

   echo '<ul class="">';
   if (!is_home()) {
      // echo '<ul class="sub-menu">';
      // echo '<li><a href="'; echo get_option('home'); echo '">';
      // echo "</a></li> ";
      // echo '</ul>';
      if (is_category() || is_single() || is_archive()) {
         the_category('title_li=');
         if (is_single()) {
            
            echo " <li>";
            the_title();
            echo "</li>";

         }
      } elseif (is_page()) {
         if( count(get_post_ancestors($post->ID)) == 3 ){
            echo "<li><a href='";
            echo get_permalink($grandparent_get->post_parent);
            echo "'>";
            echo get_the_title($grandparent);
            echo "</a>";
            echo "</li>";
         }
         echo '<li class="current">';
         echo the_title();
         echo '</li>';
      }
   } else if ( is_home() ) {
      echo '<li><a href="';
      echo get_option('home');
      echo '">';
      echo 'Blog';
      echo "</a></li>";
   };
   echo '</ul>';
}

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