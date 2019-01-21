<?php
/*
* Template Name: No Sidebar (Full Width)
*/

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="main-column" class="col-md-12 content-area">
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