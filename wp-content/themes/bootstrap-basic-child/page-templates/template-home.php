<?php
/*
* Template Name: Template - Home
*/

get_header(); ?>

<div class="">
	<div class="">
		<div id="main-column" class="content-area">
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