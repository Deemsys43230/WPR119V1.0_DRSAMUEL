<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
$better_health_breadcrump_option = better_health_get_option('better_health_breadcrumb_setting_option');
$better_health_designlayout = get_post_meta(get_the_ID(), 'better_health_sidebar_layout', true  );
$better_health_hide_breadcrump_option = better_health_get_option('better_health_hide_breadcrumb_front_page_option');
get_header(); 
if( ($better_health_hide_breadcrump_option== 1 && is_front_page()) || !is_front_page())
{
?>
 <!--    <section id="inner-title" class="inner-title" <?php echo $header_style; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-8"><h2><?php the_title(); ?></h2></div>
                <?php
                if ($better_health_breadcrump_option == "enable") {
                    ?>
                    <div class="col-md-4">
                        <div class="breadcrumbs">
                            <?php breadcrumb_trail(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section> -->
 <?php } ?>   
    <section id="section16" class="section16">
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php if ($better_health_designlayout == 'no-sidebar') {
                    echo "12";
                } else {
                    echo "12";
                } ?> col-md-<?php if ($better_health_designlayout == 'no-sidebar') {
                    echo "12";
                } else {
                    echo "9";
                } ?> left-block">
                    <?php
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/content', 'page');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div><!-- div -->
                <?php if ($better_health_designlayout != 'no-sidebar') { ?>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div><!-- div -->
        </div>
    </section>

<?php get_footer();
