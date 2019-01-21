<?php
/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */
?>
            </div><!--.site-content-->
        </div><!--.page-container-->

        <footer id="site-footer" class="">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-s-3">
                            <div class="footer-logo"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo get_field('footer_logo', 'option'); ?>" alt="<?php echo get_field('footer_logo_alt_text', 'option'); ?>"/></a></div>
                            <div class="footer-description"><?php dynamic_sidebar('footer-top-1'); ?></div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-s-3">
                            <?php dynamic_sidebar('footer-top-2'); ?>
                        </div>
                        <div class="col-sm-6 col-md-3 col-s-3">
                            <?php dynamic_sidebar('footer-top-3'); ?>
                        </div>
                        <div class="col-sm-6 col-md-3 col-s-3">
                            <?php dynamic_sidebar('footer-top-4'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="colophon" class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-s-6 footer-left copyrights">
                            <?php echo get_field('footer_copyrights', 'option'); ?>
                        </div>
                        <div class="col-sm-6 col-s-6 footer-right text-right website-by">
                            <?php echo get_field('footer_site_credits', 'option'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--.page-footer-->
        
        <?php if(get_field('enable_floating_cta', 'options')) {
            get_template_part( 'template-parts/content', 'floating-cta' );
        } ?>
        <!--wordpress footer-->
        <?php wp_footer(); ?> 
        <!--end wordpress footer-->
    </body>
</html>
