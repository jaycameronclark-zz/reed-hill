<?php /*
Plugin Name: RH Custom Backgrounds
Plugin URI: 
Description: Set custom, full screen backgrounds on a per page/post basis.
Author: Jay Clark
Version: 0.3
*/

if (!defined("BPP_url")) { define("BPP_url", WP_PLUGIN_URL.'/background-per-page'); } //NO TRAILING SLASH

if (!defined("BPP_dir")) { define("BPP_dir", WP_PLUGIN_DIR.'/background-per-page'); } //NO TRAILING SLASH

include_once('meta-boxes/meta-box.php');

$prefix = '_bpp_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
	'id' => 'bbp',

	'title' => 'Background Image',

	'pages' => array( 'post', 'page', 'bpp_settings'),

	'context' => 'normal',

	'priority' => 'high',

	'fields' => array(
		array(
			'name'	=> 'Background Image',
			'desc'	=> 'Upload the image you would like to use as the background for this page/post.',
			'id'	=> "{$prefix}background",
			'type'	=> 'plupload_image',
			'max_file_uploads' => 1,
		),
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function _bpp__register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', '_bpp__register_meta_boxes' );

function add_background_per_page(){

	global $post;
	
	$data = get_data($post->ID);
	
	if($data['src'] == ''){
			
		$data = get_data($post->post_parent);
		
		if($data['src'] == ''){
		
			$get = get_post($post->post_parent);
			$id = $get->post_parent;
			
			$data = get_data($id);
			
			if($data['src'] == ''){
		
				$get = get_post($get->post_parent);
				$id = $get->post_parent;
				
				$data = get_data($id);
				
				if($data['src'] == ''){
			
					$get = get_post($get->post_parent);
					$id = $get->post_parent;
					
					$data = get_data($id);
				
				}

			
			}
		
		}
	
	}
	
	$element = $data['element'];
	$src = $data['src'];
						
	if($src != ''){
		
		?><style type="text/css">
		
			<?php echo 'body'; ?>, <?php echo $element; ?>.custom-background  { 
				<?php if($src != ''){ ?>
					background: url('<?php echo $src; ?>') no-repeat center center fixed; 
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
				<?php } ?>
			}
			
		</style><?php
	
	}

}

function get_data($id){

	$element = '';
	$src = '';
	
	$element = get_post_meta( $id, '_bpp_element', true );
	
	$images = get_post_meta( $id, '_bpp_background', false );
	
	if(is_array($images)){
	
		foreach ( $images as $att ){
		    $src = wp_get_attachment_image_src( $att, 'full' );
		    $src = $src[0];
		}
	
	}

	$data = array();

	$data['element'] = $element;
	$data['src'] = $src;

	return $data;

}

add_action( 'wp_head', 'add_background_per_page', 999999 );

add_custom_background();

?>