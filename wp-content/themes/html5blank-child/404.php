<?php get_header(); ?> 
<div class="container">
	<div class="row">
		<div id="main-column" class="col-md-12 content-area">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">
					<div class="text-center">

						<h1><?php _e( '404', 'html5blank' ); ?></h1>

						<h2><?php _e('Oops! That page can&rsquo;t be found.', 'html5blank'); ?></h2>

						<p>
							<?php esc_html_e( 'It looks like nothing was found at this location. You can go back to ', 'html5blank' ); ?> 
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'html5blank' ); ?></a> 
							<?php esc_html_e( 'or use search', 'html5blank' ); ?>
						</p>

						<!--search form-->
						<?php get_template_part('searchform'); ?>
						
					</div>
				</section><!-- .error-404 -->
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>