<?php
/**
 * The template for displaying all pages
 * Template Name: Our Treatment Gallery
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
get_header();
$better_health_breadcrump_option = better_health_get_option('better_health_breadcrumb_setting_option')?>
<section id="inner-title" class="inner-title"  <?php echo $header_style; ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-8"><h2><?php the_title(); ?></h2>
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

<?php

if (is_active_sidebar('better-health-treatment-gallery')) {
    dynamic_sidebar('better-health-treatment-gallery');
}

get_footer();
