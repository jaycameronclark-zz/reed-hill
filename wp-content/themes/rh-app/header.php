<!doctype html>
<html class="no-js">

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

	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/style.min.css" />

	<script src="<?php bloginfo( 'template_directory' ); ?>/_/js/modernizr.custom.02510.js"></script>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	
</head>

<body class="stretched-background">
	<div class="grid--full">
		<div class="grid__item one-whole palm--one-whole">
			<header class="masthead" id="header" role="header">
				<div class="grid__item two-eighths">
					<a class="push--two-twelfths push--palm-one-twelfth" href="<?php bloginfo('url'); ?>">
						<img src="<?php bloginfo( 'template_directory' ); ?>/_/images/rh-logo-60x60.png">
					</a>
				</div><!--

			--><div class="grid__item six-eighths soft--right">
					<nav id="nav" role="navigation">
						<div class="grid--full">
							<div class="grid__item one-quarter palm-one-half">
								<div class="page-title flush--left">
									<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
								</div>
							</div><!--

							--><div class="grid__item three-quarters palm-one-half">
								<div class="float--right push--right locations">
									<?php wp_nav_menu( array('theme_location' => 'locations') ); ?>
								</div>
							</div>
						</div>
						<hr class="push--right">
						<?php if (is_page('work') || $post->post_parent == '22') { ?>

							<?php wp_nav_menu( array('theme_location' => 'work') ); ?>

						<?php } elseif (is_page('shop') || $post->post_parent == '26') { ?>

							<?php wp_nav_menu( array('theme_location' => 'shop') ); ?>
						
						<?php } elseif (is_page('about') || is_page('contact')  ) { ?>
						<hr class="push--right">
							<?php wp_nav_menu( array('theme_location' => 'about') ); ?>
						<?php } ?>
					</nav>
				</div>
			</header>
		</div>
	</div>


