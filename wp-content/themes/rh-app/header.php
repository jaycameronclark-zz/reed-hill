<!doctype html>

<html class="no-js">

<head data-template-set="rh-app-theme">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>

	<title><?php wp_title(); ?></title>

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
	
	<div class="wrapper">

		<header id="header" role="header" class="masthead">
			<nav id="nav" role="navigation">
				<?php wp_nav_menu( array('menu' => 'primary') ); ?>
			</nav>
		</header>

