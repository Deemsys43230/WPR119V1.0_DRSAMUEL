<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */

get_header(); 

//Retrieving breadcrump value from customizer field
$better_health_breadcrump_option = better_health_get_option('better_health_breadcrumb_setting_option');

//Retrieving Sidebar designlayout value from customizer field
$better_health_designlayout = better_health_get_option('better_health_sidebar_layout_option');

//Condition to check breadcrump option
 if ($better_health_breadcrump_option == "enable") {
?>

    <section id="inner-title" class="inner-title">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2> <?php the_archive_title('<h2 class="page-title">', '</h2>') ?></h2>
                </div><!--.col-md-7 -->
                    <div class="col-md-5">
                        <div class="breadcrumbs">
                            <?php 
                             // Function to display breadcrump
                              breadcrumb_trail(); 
                            ?>
                        </div><!--.breadcrumbs -->
                    </div><!--.col-md-5 -->
            </div><!--.row -->
        </div><!--.container -->
    </section><!--.inner-title -->
  <?php } ?>
    <section id="section14" class="section-margine blog-list">
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

                        // Function to display navigation
                         the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div><!--.left-block -->
                <?php if ($better_health_designlayout != 'no-sidebar') { ?>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <?php 
                         // Function to display search form
                          get_sidebar(); ?>
                    </div><!--.col-xs-12-->
                <?php } ?><!--end of if -->
            </div><!--.row -->
        </div><!-- #container -->
    </section><!-- #section14 -->
<?php get_footer();
