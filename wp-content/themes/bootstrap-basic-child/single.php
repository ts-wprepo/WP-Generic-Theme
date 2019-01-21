<?php
/**
 * Template for displaying single post (read full post page).
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
				<?php 
				while (have_posts()) {
					the_post();

					get_template_part('content', get_post_format());

					echo "\n\n";
					
					bootstrapBasicPagination();

					echo "\n\n";
					
					// If comments are open or we have at least one comment, load up the comment template
					if (comments_open() || '0' != get_comments_number()) {
						comments_template();
					}

					echo "\n\n";

				} //endwhile;
				?> 
			</main>
		</div>
		<?php get_sidebar('right'); ?> 
	</div>
</div>
<?php get_footer(); ?> 
