<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
			<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
		<![endif]-->
		
		<?php do_action('before'); ?>
		<header class="site-header" role="banner">

			<?php echo get_top_header(); ?>

			<div class="main-navigation">
				<div class="container">
					<div class="row flex-box align-middle">
						<div class="header-cell site-branding flex-grow-1">
							<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo get_field('header_logo', 'option'); ?>" alt="<?php echo get_field('logo_alt_text', 'option'); ?>"/></a>
						</div><!--.site-branding-->
						<div class="header-cell site-nav flex-grow-1">
							<nav class="navbar navbar-default" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
										<span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								
								<div class="collapse navbar-collapse navbar-primary-collapse">
									<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 
									<?php dynamic_sidebar('navbar-right'); ?> 
								</div><!--.navbar-collapse-->
							</nav>
						</div>
					</div>
				</div>
			</div><!--.main-navigation-->
		</header>
		<!-- banner section -->
		<div class="banner-section">
			<?php echo get_banner(); ?>
		</div>

		<div class="page-container">
			<div id="content" class="site-content">
