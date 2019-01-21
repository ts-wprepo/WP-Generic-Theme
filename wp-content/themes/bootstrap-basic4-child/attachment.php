<?php get_header(); ?> 
<div class="container">
    <div class="row">
        <?php get_sidebar('left'); ?>
        <div id="main-column" class="col-md-<?php echo \BootstrapBasic4\Bootstrap4Utilities::getMainColumnSize(); ?> content-area">
            <main id="main" class="site-main" role="main">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content', 'attachment');
                    }// endwhile;
                } else {
                    get_template_part('template-parts/section', 'no-results');
                }// endif;
                ?>
            </main>
        </div>
        <?php get_sidebar('right'); ?>
    </div>
</div>
<?php get_footer(); ?>