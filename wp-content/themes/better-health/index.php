<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
get_header();

 $blog_page_title = better_health_get_option('better_health_blog_title_option');
 $better_health_breadcrump_option = better_health_get_option('better_health_breadcrumb_setting_option');
 $better_health_designlayout = better_health_get_option('better_health_sidebar_layout_option');
 $better_health_hide_breadcrump_option = better_health_get_option('better_health_hide_breadcrumb_front_page_option');
 if( ($better_health_hide_breadcrump_option== 1 && is_front_page()) || !is_front_page())
{
?>
    <section id="inner-title" class="inner-title" <?php echo $header_style; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2><?php echo esc_html($blog_page_title); ?></h2>
                </div>
                <?php
                if ($better_health_breadcrump_option == "enable") {
                    ?>
                    <div class="col-md-5">
                        <div class="breadcrumbs">
                            <?php breadcrumb_trail(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>    
    <section id="section14" class="section-margine">
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php if ($better_health_designlayout == 'no-sidebar') {
                    echo "12";
                } else {
                    echo "9";
                } ?> col-md-<?php if ($better_health_designlayout == 'no-sidebar') {
                    echo "12";
                } else {
                    echo "9";
                } ?> left-block">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div><!--div -->
                <?php if ($better_health_designlayout != 'no-sidebar') { ?>
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>

            </div>
        </div><!-- div -->
    </section>

<?php get_footer();
