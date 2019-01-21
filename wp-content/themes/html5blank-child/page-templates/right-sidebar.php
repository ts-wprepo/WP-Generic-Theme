<?php
/*
* Template Name: Right Sidebar
*/

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = getMainColumnSize();
?>
<div class="container">
	<div class="row">
		<div id="main-column" class="col-md-<?php echo $main_column_size; ?> content-area">
			<main id="main" class="site-main" role="main">
				<section>

					<h1><?php the_title(); ?></h1>

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<!-- article -->
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php the_content(); ?>

							<?php comments_template( '', true ); // Remove if you don't want comments ?>

							<br class="clear">

							<?php edit_post_link(); ?>

						</article>
						<!-- /article -->

					<?php endwhile; ?>

					<?php else: ?>

						<!-- article -->
						<article>

							<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

						</article>
						<!-- /article -->

					<?php endif; ?>

				</section>
			</main>
		</div>
		<?php get_sidebar('right'); ?>
	</div>
</div>
<?php get_footer(); ?>