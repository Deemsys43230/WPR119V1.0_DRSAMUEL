<?php
/**
 * Reset Option
 *
 * @since Better Health 1.0.0
 *
 * @param null
 * @return array $better_health_reset_option
 *
 */
if (!function_exists('better_health_reset_option')) :
    function better_health_reset_option()
    {
        $better_health_reset_option = array(
            'do-not-reset' 	=> esc_html__( 'Do Not Reset','better-health'),
            'reset-all' 	=> esc_html__( 'Reset All','better-health'),
        );
        return apply_filters('better_health_reset_option', $better_health_reset_option);
    }
endif;


/**
 * Breadcrumb  display option options
 *
 * @since Better Health 1.0.0
 *
 * @param null
 * @return array $better_health_show_breadcrumb_option
 *
 */
if (!function_exists('better_health_show_breadcrumb_option')) :
    function better_health_show_breadcrumb_option()
    {
        $better_health_show_breadcrumb_option = array(
            'enable' => esc_html__('Enable', 'better-health'),
            'disable' => esc_html__('Disable', 'better-health')
        );
        return apply_filters('better_health_show_breadcrumb_option', $better_health_show_breadcrumb_option);
    }
endif;


/**
 * Top Header Section Hide/Show  options
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_show_top_header_section_option
 *
 */
if (!function_exists('better_health_show_top_header_section_option')) :
    function better_health_show_top_header_section_option()
    {
        $better_health_show_top_header_section_option = array(
            'show' => esc_html__('Show', 'better-health'),
            'hide' => esc_html__('Hide', 'better-health')
        );
        return apply_filters('better_health_show_top_header_section_option', $better_health_show_top_header_section_option);
    }
endif;


/**
 * Top Footer Contact Link Section Hide/Show  options
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_show_top_footer_contact_link_section_option
 *
 */
if (!function_exists('better_health_show_top_footer_contact_link_section_option')) :
    function better_health_show_top_footer_contact_link_section_option()
    {
        $better_health_show_top_footer_contact_link_section_option = array(
            'show' => esc_html__('Show', 'better-health'),
            'hide' => esc_html__('Hide', 'better-health')
        );
        return apply_filters('better_health_show_top_footer_contact_link_section_option', $better_health_show_top_footer_contact_link_section_option);
    }
endif;


/**
 * Feature Section Hide/Show  options
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_show_feature_section_option
 *
 */
if (!function_exists('better_health_show_feature_section_option')) :
    function better_health_show_feature_section_option()
    {
        $better_health_show_feature_section_option = array(
            'show' => esc_html__('Show', 'better-health'),
            'hide' => esc_html__('Hide', 'better-health')
        );
        return apply_filters('better_health_show_feature_section_option', $better_health_show_feature_section_option);
    }
endif;





/**
 * Show/Hide Feature Image  options
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_show_feature_image_option
 *
 */
if (!function_exists('better_health_show_feature_image_option')) :
    function better_health_show_feature_image_option()
    {
        $better_health_show_feature_image_option = array(
            'show' => esc_html__('Show', 'better-health'),
            'hide' => esc_html__('Hide', 'better-health')
        );
        return apply_filters('better_health_show_feature_image_option', $better_health_show_feature_image_option);
    }
endif;


/**
 * Slider  options
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_slider_option
 *
 */
if (!function_exists('better_health_slider_option')) :
    function better_health_slider_option()
    {
        $better_health_slider_option = array(
            'show' => esc_html__('Show', 'better-health'),
            'hide' => esc_html__('Hide', 'better-health')
        );
        return apply_filters('better_health_slider_option', $better_health_slider_option);
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_sidebar_layout
 *
 */
if (!function_exists('better_health_sidebar_layout')) :
    function better_health_sidebar_layout()
    {
        $better_health_sidebar_layout = array(
            'right-sidebar' => esc_html__('Right Sidebar', 'better-health'),
            'left-sidebar' => esc_html__('Left Sidebar', 'better-health'),
            'no-sidebar' => esc_html__('No Sidebar', 'better-health'),
        );
        return apply_filters('better_health_sidebar_layout', $better_health_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Better Health  1.0.0
 *
 * @param null
 * @return array $better_health_blog_excerpt
 *
 */
if (!function_exists('better_health_blog_excerpt')) :
    function better_health_blog_excerpt()
    {
        $better_health_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'better-health'),
            'content' => esc_html__('Content', 'better-health'),

        );
        return apply_filters('better_health_blog_excerpt', $better_health_blog_excerpt);
    }
endif;



