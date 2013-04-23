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
	<div class="grid">
		<div class="grid__item one-whole palm--one-whole">
			<header id="header" role="header" class="masthead">

				<div class="grid__item one-quarter">
					<a href=""><img class="" src="<?php bloginfo( 'template_directory' ); ?>/_/images/rh-logo-60x60.png"></a>
				</div>

				<div class="">
					<nav id="nav" role="navigation">
						<h1 class="page-title"><span class="active">Work</span><span class="inactive">Shop</span></h1>
						<?php wp_nav_menu( array('menu' => 'primary') ); ?>
					</nav>
				</div>

			</header>
		</div>

