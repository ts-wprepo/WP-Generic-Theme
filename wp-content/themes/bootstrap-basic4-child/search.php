<?php get_header(); ?> 
<div class="container">
    <div class="row">
        <?php get_sidebar('left'); ?>
        <div id="main-column" class="col-md-<?php echo \BootstrapBasic4\Bootstrap4Utilities::getMainColumnSize(); ?> content-area">
            <main id="main" class="site-main search-result" role="main">
                <?php if (have_posts()) { ?> 
                    <header class="page-header">
                        <h1 class="page-title"><?php 
                        /* translators: %s: The search query string (search value). */
                        printf(__('Search Results for: %s', 'bootstrap-basic4'), '<span>' . get_search_query() . '</span>'); 
                        ?></h1>
                    </header><!-- .page-header -->
                    <div class="page-content row-with-vspace">
                        <?php get_template_part('template-parts/partial', 'search-form'); ?> 
                    </div><!-- .page-content -->
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content', get_post_format());
                    }// endwhile;

                    $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                    $Bsb4Design->pagination();
                    unset($Bsb4Design);
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