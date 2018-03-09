<?php
/**
 * The template for displaying all pages.
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
// retrieving Customizer Value
$section_option = better_health_get_option('better_health_top_header_section');
if ($section_option =='show') {
    $social_menu = better_health_get_option('better_health_social_link_hide_option');
    ?>
    <div class="top-header">
        <div class="container">
            <div class="row ">
               <?php
                if ($social_menu == 1) {
                    ?>
                    <div class="social-links better-health-pro-social-icons col-md-6 pull-left">
                        <?php
                        if (has_nav_menu('social-link')) {
                            wp_nav_menu(array('theme_location' => 'social-link', 'menu_class' => 'social-icons'));
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                      <div class="search">
                        <p class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></p>
                        <?php get_search_form(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>