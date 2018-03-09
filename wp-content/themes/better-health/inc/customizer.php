<?php
/**
 * Better Health Theme Customizer
 *
 * @package Canyon Themes
 * @subpackage Better Health 
 */

require get_template_directory() . '/inc/customizer/customizer-pro/class-customize.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('better_health_customize_register')) :
    function better_health_customize_register($wp_customize)
    {
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

        /*default variable used in setting*/
        $default = better_health_get_default_theme_options();

        /**
         * Customizer setting
         */
        require get_template_directory() . '/inc/customizer-core.php';
        require get_template_directory() . '/inc/customizer/better-health-customizer-function.php';
        require get_template_directory() . '/inc/customizer/better-health-sanitize.php';
        require get_template_directory() . '/inc/customizer/customizer.php';
        require get_template_directory() . '/inc/customizer/better-health-copy-right.php';
        require get_template_directory() . '/inc/customizer/better-health-theme-options.php';
        require get_template_directory() . '/inc/customizer/better-health-header-info-section.php';
        require get_template_directory() . '/inc/customizer/better-health-layout-design-options.php';


    }
    add_action('customize_register', 'better_health_customize_register');
endif;
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

if (!function_exists('better_health_customize_preview_js')) :
    function better_health_customize_preview_js()
    {
        wp_enqueue_script('better-health-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '1.0.1', true);
    }

    add_action('customize_preview_init', 'better_health_customize_preview_js');

endif;



