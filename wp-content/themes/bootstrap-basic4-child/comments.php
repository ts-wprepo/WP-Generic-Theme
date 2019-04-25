<?php
/** 
 * Comments template.
 * 
 * @package bootstrap-basic4
 */


if (post_password_required()) {
    return;
}

$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
?> 
<section id="comments" class="comments-area">
    <?php if (have_comments()) { ?> 
        <h3 class="comments-title">
            <small>
                <?php
                $comments_number = get_comments_number();
                if ($comments_number == '1') {
                    /* translators: %s: The post title */
                    printf(_x('1 comment on &ldquo;%s&rdquo;', 'comments title', 'bootstrap-basic4'), get_the_title());
                } else {
                    printf(
                        /* translators: %1$s: Number of comments, %2$s: Post title. */
                        _nx(
                            '%1$s comment on &ldquo;%2$s&rdquo;', 
                            '%1$s comments on &ldquo;%2$s&rdquo;', 
                            $comments_number, 
                            'comments title', 
                            'bootstrap-basic4'
                        ), 
                        number_format_i18n($comments_number), 
                        '<span>' . get_the_title() . '</span>'
                    );
                }
                unset($comments_number);
                ?>
            </small>
        </h3>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through  ?> 
            <h3 class="screen-reader-text sr-only"><?php _e('Comment navigation', 'bootstrap-basic4'); ?></h3>
            <ul id="comment-nav-above" class="comment-navigation clearfix" role="navigation">
                <li class="nav-previous previous"><?php previous_comments_link(__('&larr; Older Comments', 'bootstrap-basic4')); ?></li>
                <li class="nav-next next"><?php next_comments_link(__('Newer Comments &rarr;', 'bootstrap-basic4')); ?></li>
            </ul><!-- #comment-nav-above -->
        <?php } // check for comment navigation  ?> 

        <ul class="list-unstyled media-list">
            <?php
            /* Loop through and list the comments. Tell wp_list_comments()
             * to use $Bsb4Design->displayComments() to format the comments.
             * If you want to override this in a child theme, then you can
             * define displayComments() method and Bsb4Design class and that will be used instead.
             * See displayComments() in inc/classes/Bsb4Design.php for more.
             */
            wp_list_comments(array('avatar_size' => '64', 'callback' => array($Bsb4Design, 'displayComments')));
            ?> 
        </ul><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through  ?> 
            <h3 class="screen-reader-text sr-only"><?php _e('Comment navigation', 'bootstrap-basic4'); ?></h3>
            <ul id="comment-nav-below" class="comment-navigation comment-navigation-below clearfix" role="navigation">
                <li class="nav-previous previous"><?php previous_comments_link(__('&larr; Older Comments', 'bootstrap-basic4')); ?></li>
                <li class="nav-next next"><?php next_comments_link(__('Newer Comments &rarr;', 'bootstrap-basic4')); ?></li>
            </ul><!-- #comment-nav-below -->
        <?php } // check for comment navigation  ?> 

    <?php } // have_comments()  ?> 

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?> 
        <p class="no-comments"><?php _e('Comments are closed.', 'bootstrap-basic4'); ?></p>
    <?php 
    } //endif; 
    ?> 

    <?php
    comment_form(
        array(
            'title_reply_before'  => '<h3 id="reply-title" class="comment-reply-title mb-30"><small>',
            'title_reply_after'   => '</small></h3>',
            'class_submit'        => 'btn'
        )
    );
    ?> 
</section><!-- #comments -->
<?php unset($Bsb4Design); ?>