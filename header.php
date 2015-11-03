<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

	<!-- Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimal-ui">

	<title>
      <?php wp_title('&mdash;',true,'right'); ?>
  </title>

  <link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png">

	<!-- CSS -->
	<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- JavaScript -->
	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]><script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script><![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600|Pompiere' rel='stylesheet' type='text/css'>

  <meta name="description" content="Dé cityblog van Dordrecht. Jouw eigen local friend guide met de leukste adresjes in Dordrecht op het gebied van food, feest en design." />
  <meta name="keywords" content="dordrecht, dordt, cityblog, tips, restaurants, koffie, drinken, eten, winkelen, design, feest, uitgaan, dominique, do, bedrijven, bijzonder, straatjes, stad, creatief" />
  <meta name="author" content="Dominique van Dijk" />
  <meta name="copyright" content="Do in Dordt" />

  <meta property="og:title" content="Do in Dordt, dé cityblog van Dordrecht" />
  <meta property="og:type" content="blog" />
  <meta property="og:image" content="http://doindordt.nl/wp-content/themes/vanilla/img/logo@2x.png" />
  <meta property="og:url" content="http://www.doindordt.nl" />
  <meta property="og:description" content="Dé cityblog van Dordrecht. Jouw eigen local friend guide met de leukste adresjes in Dordrecht op het gebied van food, feest en design." />

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="Do in Dordt, dé cityblog van Dordrecht" />
  <meta name="twitter:description" content="Dé cityblog van Dordrecht. Jouw eigen local friend guide met de leukste adresjes in Dordrecht op het gebied van food, feest en design." />
  <meta name="twitter:image" content="http://doindordt.nl/wp-content/themes/vanilla/img/logo@2x.png" />

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-61750092-1', 'auto');
    ga('send', 'pageview');
  </script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header class="navigation">
    <div class="inner">
      <h1><a href="<?php echo home_url(); ?>">Do in Dordt</a></h1>

      <nav class="categories-nav">
        <?php wp_nav_menu( array(
          'theme_location' => 'cats',
          'container' => false,
          'menu_id' => false ) ); ?>
      </nav><!-- nav.categories-nav -->

      <nav class="main-nav">
        <?php wp_nav_menu( array(
          'theme_location' => 'pages',
          'container' => false,
          'menu_id' => false ) ); ?>
      </nav><!-- .main-nav -->

      <div class="search-container">
        <?php include 'inc/searchform.php'; ?>
      </div>

    </div><!-- .inner -->

    <div class="hamburger">
      <div></div><div></div><div></div>
    </div>
  </header><!-- header -->

  <section class="body">
