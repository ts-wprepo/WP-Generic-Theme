<?php
/**
 * The main template file
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<div class="container">
	<div class="row">
		<?php get_sidebar('left'); ?> 
		<div id="main-column" class="col-md-<?php echo $main_column_size; ?> content-area">
			<main id="main" class="site-main" role="main">
				<?php if (have_posts()) { ?> 
				<?php 
				// start the loop
				while (have_posts()) {
					the_post();
					
					/* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part('content', get_post_format());
				}// end while
				
				bootstrapBasicPagination();
				?> 
				<?php } else { ?> 
				<?php get_template_part('no-results', 'index'); ?>
				<?php } // endif; ?> 
			</main>
		</div>
		<?php get_sidebar('right'); ?>
	</div>
</div>
<?php get_footer(); ?> 