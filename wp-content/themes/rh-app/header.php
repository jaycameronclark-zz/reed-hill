<!doctype html>
<html>

<head data-template-set="rh-app-theme">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!--[if IE ]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>

	<title><?php wp_title(); ?></title>

	<meta name="viewport" content="width=device-width, minimum-scale=1.0">
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="Copyright" content="Copyright &copy; Reed-Hill <?php echo date('Y'); ?>. All Rights Reserved.">

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/style.min.css" />

	<script src="<?php bloginfo( 'template_directory' ); ?>/_/js/modernizr.custom.02510.js"></script>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	<script>var customPath = "<?php bloginfo('template_directory'); ?>/_"</script>
</head>

<body class="stretched-background">
	<div class="grid--full">
		<div class="grid__item one-whole palm--one-whole">
			<header class="masthead" id="header" role="header">
				<div class="grid__item two-eighths">
					<a class="push--two-twelfths push--palm-one-twelfth logo" href="<?php bloginfo('url'); ?>">
						<img src="<?php bloginfo( 'template_directory' ); ?>/_/images/rh-logo-58x58.png">
					</a>
				</div><!--

			--><div class="grid__item six-eighths soft--right">
					<nav id="nav" role="navigation">
						<div class="grid--full">
							<div class="grid__item one-quarter palm-one-half">
								<div class="page-title flush--left">
									<?php wp_nav_menu( array('theme_location' => 'work_shop', 'menu_class' => 'page-title') ); ?>
								</div>
							</div><!--

					 --><div class="grid__item three-quarters palm-one-half">
								<div class="float--right push--right locations">
									<?php wp_nav_menu( array('theme_location' => 'locations') ); ?>
								</div>
							</div>
							<hr class="push--right">
						<!--CLIENT PAGE-->
							<?php if (is_page('client') ) { ?>
							<?php wp_nav_menu( array('theme_location' => 'work', 'menu_class' => 'sub-menu') ); ?>

						<!--CLIENT SUB PAGE-->
							<?php } elseif ( is_tree(742) ) { ?>
							<?php wp_nav_menu( array('theme_location' => 'work', 'menu_class' => 'sub-menu') ); ?>
							
							<hr class="push--right">
							<div class="other-breadcrumb">
	    					<?php if(function_exists('the_other_breadcrumb')) { the_other_breadcrumb(); } ?>
	    				</div>

							<!--INDUSTRY SUB PAGE-->
	    					<?php } elseif ( is_tree(22) && is_tree(5) ) { ?>
									<?php wp_nav_menu( array('theme_location' => 'work', 'menu_class' => 'sub-menu') ); ?>
								
									<hr class="push--right">
									<?php wp_nav_menu( array('theme_location' => 'industry', 'menu_class' => 'sub-sub-menu') ); ?>
									<?php if( count(get_post_ancestors($post->ID)) == 3 ){ ?>
									  <hr class="push--right">
										<div class="other-breadcrumb">
			    						<?php if(function_exists('the_other_breadcrumb')) { the_other_breadcrumb(); } ?>
			    					</div>
		    					<?php } ?>

							<!--MEDIUM SUB PAGE-->
								<?php } elseif ( is_tree(22) && is_tree(6) ) { ?>
									<?php wp_nav_menu( array('theme_location' => 'work', 'menu_class' => 'sub-menu') ); ?>
									<hr class="push--right">
									<?php wp_nav_menu( array('theme_location' => 'medium', 'menu_class' => 'sub-sub-menu') ); ?>
									<?php if( count(get_post_ancestors($post->ID)) == 3 ){ ?>
									  <hr class="push--right">
										<div class="other-breadcrumb">
			    						<?php if(function_exists('the_other_breadcrumb')) { the_other_breadcrumb(); } ?>
			    					</div>
		    				<?php } ?>


	    					<?php } elseif (is_tree(26) || is_tree(45) ) { ?>
									<?php wp_nav_menu( array('theme_location' => 'shop') ); ?>
									<hr class="push--right">
									<?php wp_nav_menu( array('theme_location' => 'about', 'menu_class' => 'sub-sub-menu') ); ?>
									<?php if ( is_tree(39) ){ ?>
										<hr class="push--right">
										<div class="other-breadcrumb">
											<?php if(function_exists('the_other_breadcrumb')) { the_other_breadcrumb(); }?>
										</div>
									<?php }  ?>

    					<?php } ?>
							</div>
						</div>
					</nav>
				</div>
			</header>
		</div>
	</div>


