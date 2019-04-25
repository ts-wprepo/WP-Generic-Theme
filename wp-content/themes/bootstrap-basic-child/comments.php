<?php
/**
 * Template for displaying comments
 * 
 * @package bootstrap-basic
 */


if (post_password_required()) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if (have_comments()) { ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: %1$s: Number of comments, %2$s: Post title. */
				_nx(
					'One comment on &ldquo;%2$s&rdquo;', 
					'%1$s comments on &ldquo;%2$s&rdquo;', 
					get_comments_number(), 
					'comments title', 
					'bootstrap-basic'
				), 
				number_format_i18n(get_comments_number()), 
				'<span>' . get_the_title() . '</span>'
			);
			?> 
		</h2>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through  ?> 
			<h3 class="screen-reader-text sr-only"><?php _e('Comment navigation', 'bootstrap-basic'); ?></h3>
			<ul id="comment-nav-above" class="comment-navigation pager" role="navigation">
				<li class="nav-previous previous"><?php previous_comments_link(__('&larr; Older Comments', 'bootstrap-basic')); ?></li>
				<li class="nav-next next"><?php next_comments_link(__('Newer Comments &rarr;', 'bootstrap-basic')); ?></li>
			</ul><!-- #comment-nav-above -->
		<?php } // check for comment navigation  ?> 

		<ul class="media-list">
			<?php
			/* Loop through and list the comments. Tell wp_list_comments()
			 * to use bootstrapBasicComment() to format the comments.
			 * If you want to override this in a child theme, then you can
			 * define bootstrapBasicComment() and that will be used instead.
			 * See bootstrapBasicComment() in inc/template-tags.php for more.
			 */
			wp_list_comments(array('avatar_size' => '64', 'callback' => 'bootstrapBasicComment'));
			?>
		</ul><!-- .comment-list -->

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through  ?> 
			<h3 class="screen-reader-text sr-only"><?php _e('Comment navigation', 'bootstrap-basic'); ?></h3>
			<ul id="comment-nav-below" class="comment-navigation comment-navigation-below pager" role="navigation">
				<li class="nav-previous previous"><?php previous_comments_link(__('&larr; Older Comments', 'bootstrap-basic')); ?></li>
				<li class="nav-next next"><?php next_comments_link(__('Newer Comments &rarr;', 'bootstrap-basic')); ?></li>
			</ul><!-- #comment-nav-below -->
		<?php } // check for comment navigation  ?> 

	<?php } // have_comments()  ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?> 
		<p class="no-comments"><?php _e('Comments are closed.', 'bootstrap-basic'); ?></p>
	<?php 
	} //endif; 
	?> 

	<?php
	ob_start();
	comment_form(
		array(
			'title_reply_before'  => '<h3 id="reply-title" class="comment-reply-title mb-30"><small>',
			'title_reply_after'   => '</small></h3>',
			'class_submit'        => 'btn'
		)
	);
	
	/**
	 * WordPress comment form does not support action/filter form and input submit elements. Rewrite these code when there is support available.
	 * @todo Change form class modification to use WordPress hook action/filter when it's available.
	 */
	$comment_form = str_replace('class="comment-form', 'class="comment-form form form-horizontal', ob_get_clean());
	echo $comment_form;
	?>

</div><!-- #comments -->
