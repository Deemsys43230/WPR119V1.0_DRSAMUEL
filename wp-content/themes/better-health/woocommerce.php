<?php
/**
 * The template for displaying all pages.
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
$better_health_designlayout = better_health_get_option('better_health_sidebar_layout_option');
get_header();
?>

    <section id="inner-title" class="inner-title"  <?php echo $header_style; ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-8"><h2><?php esc_html_e('Store', 'better-health') ?></h2>
                </div>
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
    </section>
    <section id="section16" class="section16">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php if ($better_health_designlayout == 'no-sidebar') {
                    echo "12";
                } else {
                    echo "9";
                } ?> left-block">
                    <?php if (have_posts()) :
                        woocommerce_content();
                    endif;
                    ?>
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