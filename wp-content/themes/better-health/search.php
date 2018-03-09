<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
$better_health_breadcrump_option = better_health_get_option('better_health_breadcrumb_setting_option');
$better_health_designlayout = better_health_get_option('better_health_sidebar_layout_option');
get_header(); ?>
    <section id="inner-title" class="inner-title"  <?php echo $header_style; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2><?php printf(esc_html__('Search Results for: %s', 'better-health'), '<span>' . get_search_query() . '</span>'); ?></h2>
                </div>
                <?php if ($better_health_breadcrump_option == "enable") {
                    ?>
                    <div class="col-md-4">
                        <div class="breadcrumbs">
                            <?php breadcrumb_trail(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section id="section16" class="section16">
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
                    if (have_posts()) : ?>

                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('template-parts/content', 'search');

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div><!-- div -->
                <?php if ($better_health_designlayout != 'no-sidebar') { ?>
                    <div class="col-md-3">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div><!-- div -->
        </div>
    </section>

<?php get_footer();
