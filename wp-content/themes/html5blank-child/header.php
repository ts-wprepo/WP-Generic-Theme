<!doctype html>
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

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
     </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- header -->
		<header class="site-header clear" role="banner">

			<?php echo get_top_header(); ?>

			<div class="main-navigation">
				<div class="container">
					<div class="row flex-box align-middle">
						<div class="header-cell site-branding flex-grow-1">
							<?php
							$logo_alt_text = get_field('logo_alt_text', 'option');
							$blog_name = get_bloginfo('name', 'display');
							?>
							<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr($blog_name); ?>" rel="home"><img src="<?php echo get_field('header_logo', 'option'); ?>" alt="<?php echo (!empty($logo_alt_text)) ? $logo_alt_text : esc_attr($blog_name); ?>"/></a>
						</div><!--.site-branding-->

						<div class="header-cell site-nav flex-grow-1">
							<nav class="navbar navbar-default" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								
								<div class="collapse navbar-collapse navbar-primary-collapse">
									<?php html5blank_nav(); ?>
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