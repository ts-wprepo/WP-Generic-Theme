<?php get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = getMainColumnSize();
?>
<div class="container">
	<div class="row">
		<?php get_sidebar('left'); ?> 
		<div id="main-column" class="col-md-<?php echo $main_column_size; ?> content-area">
			<main id="main" class="site-main" role="main">
				<!-- section -->
				<section>

					<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>

				</section>
				<!-- /section -->
			</main>
		</div>
		<?php get_sidebar('right'); ?>
	</div>
</div>
<?php get_footer(); ?>