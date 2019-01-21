<?php
/*
* Template Name: Full Width Without Container
*/

get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div id="main-column" class="col-md-12 content-area">
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
	</div>
</div>

<?php get_footer(); ?>