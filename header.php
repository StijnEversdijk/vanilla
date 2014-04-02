<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

	<!-- Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title(); ?></title>

	<!-- CSS -->
	<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- JavaScript -->
	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]><script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script><![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav>

		<?php
			wp_nav_menu( array(
			  'theme_location' => 'header',
				'container' => false,
				'menu_id' => false ) );
		?>

	</nav>