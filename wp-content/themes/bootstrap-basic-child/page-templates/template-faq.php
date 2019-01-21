<?php
/*
* Template Name: Template - FAQ
*/

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>

<div class="container">
	<div class="row">
		<div id="main-column" class="col-md-12 content-area">
			<main id="main" class="site-main" role="main">
				<?php while (have_posts()) {
					the_post();

					get_template_part('content', 'page');
				} ?>
				<div class="faqs">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<?php
						$faq_items = get_field('faq_items');
						if(!empty($faq_items)) {
							$faq_key_id = 1;
							while(has_sub_field('faq_items')): ?>
								<div class="panel panel-default">
									<div class="panel-heading<?php echo ($faq_key_id == 1) ? '' : ' collapsed'; ?>" role="tab" id="heading<?php echo $faq_key_id; ?>" data-parent="#accordion" data-toggle="collapse" data-target="#faq<?php echo $faq_key_id; ?>" aria-expanded="<?php echo ($faq_key_id == 1) ? 'true' : 'false'; ?>" aria-controls="faq<?php echo $faq_key_id; ?>">
										<h4 class="panel-title"><?php echo get_sub_field('faq_question'); ?></h4>
									</div>
									<div id="faq<?php echo $faq_key_id; ?>" class="panel-collapse collapse<?php echo ($faq_key_id == 1) ? ' in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $faq_key_id; ?>">
										<div class="panel-body"><?php echo get_sub_field('faq_answer'); ?></div>
									</div>
								</div><!-- .panel -->
								<?php $faq_key_id++;
							endwhile;
						} ?>
					</div><!-- /.panel-group -->
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>