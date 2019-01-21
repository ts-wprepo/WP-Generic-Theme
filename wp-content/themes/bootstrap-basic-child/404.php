<?php get_header(); ?> 
<div class="container">
	<div class="row">
		<div id="main-column" class="col-md-12 content-area">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">
					<div class="text-center">

						<h1><?php _e( '404', 'bootstrap-basic' ); ?></h1>

						<h2><?php _e('Oops! That page can&rsquo;t be found.', 'bootstrap-basic'); ?></h2>

						<p>
							<?php esc_html_e( 'It looks like nothing was found at this location. You can go back to ', 'bootstrap-basic' ); ?> 
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'bootstrap-basic' ); ?></a> 
							<?php esc_html_e( 'or use search', 'bootstrap-basic' ); ?>
						</p>

						<!--search form-->
						<?php echo bootstrapBasicFullPageSearchForm(); ?>
						
					</div>
				</section><!-- .error-404 -->
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>