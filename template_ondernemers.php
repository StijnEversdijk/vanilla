<?php /* Template Name: Ondernemers */ ?>

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

	<title>Do In Dordt<?php wp_title(); ?></title>

	<!-- CSS -->
	<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- JavaScript -->
	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]><script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script><![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600|Pompiere' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<section class="body">


<section class="inner">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

</section><!-- .inner -->

<?php get_footer(); ?>