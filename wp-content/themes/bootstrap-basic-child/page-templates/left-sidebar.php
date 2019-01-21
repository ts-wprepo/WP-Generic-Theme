<?php
/*
* Template Name: Left Sidebar
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
				<?php while (have_posts()) {
					the_post();

					get_template_part('content', 'page');

					echo "\n\n";
					
					if (comments_open() || '0' != get_comments_number()) {
						comments_template();
					}

					echo "\n\n";

				} ?>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>