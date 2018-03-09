<?php
/**
 * enqueue Script for admin dashboard.
 */

if (!function_exists('better_health_widgets_backend_enqueue')) :
    function better_health_widgets_backend_enqueue($hook)
    {
        if ('widgets.php' != $hook) {
            return;
        }

        wp_register_script('better-health-custom-widgets', get_template_directory_uri() . '/assets/js/widgets.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('better-health-custom-widgets');
    }

    add_action('admin_enqueue_scripts', 'better_health_widgets_backend_enqueue');
endif;

/**
 * enqueue Admins style for admin dashboard.
 */

if (!function_exists('better_health_admin_css_enqueue')) :
    function better_health_admin_css_enqueue($hook)
    {
        if ('post.php' != $hook) {
            return;
        }
        wp_enqueue_style('better-health-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
         }
    add_action('admin_enqueue_scripts', 'better_health_admin_css_enqueue');
endif;


if (!function_exists('better_health_admin_css_enqueue_new_post')) :
    function better_health_admin_css_enqueue_new_post($hook)
    {
        if ('post-new.php' != $hook) {
            return;
        }
        wp_enqueue_style('better-health-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
    }
    add_action('admin_enqueue_scripts', 'better_health_admin_css_enqueue_new_post');
endif;

/**
 * Functions for get_theme_mod()
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */

if (!function_exists('better_health_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function better_health_get_option($key = '')
    {
        if (empty($key)) {
            return;
        }
        $better_health_default_options = better_health_get_default_theme_options();

        $default = (isset($better_health_default_options[$key])) ? $better_health_default_options[$key] : '';

        $theme_option = get_theme_mod($key, $default);

        return $theme_option;

    }

endif;


/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('better_health_sanitize_multiple_category') ) :

function better_health_sanitize_multiple_category( $values ) {

    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

endif;


/**
 * Load Metabox file
 * =====================================
 *
 * /**
 * Metabox for Page Layout Option
 */

require get_template_directory() . '/inc/metabox/metabox-defaults.php';

/**
 * Metabox for Fontawesome Class
 */

require get_template_directory() . '/inc/metabox/metabox-icon.php';


/*
* Including Custom Widget Files
=====================================
/**
 * Custom quote Widget
 */
require get_template_directory() . '/inc/widget/quote-widget.php';

/**
 * Custom Welcome Message Widget
 */
require get_template_directory() . '/inc/widget/welcome-msg-widget.php';


/**
 * Custom Services Widget
 */
require get_template_directory() . '/inc/widget/services-widget.php';

/**
 * Custom Mission Widget
 */
require get_template_directory() . '/inc/widget/mission-widget.php';

/**
 * Custom Recent Post Widget
 */
require get_template_directory() . '/inc/widget/recent-post-widget.php';

/**
 * Custom Testimonial  Widget
 */
require get_template_directory() . '/inc/widget/testimonial-widget.php';

/**
 * Custom Our Work Widget
 */
require get_template_directory() . '/inc/widget/our-treatment-gallery-widget.php';




