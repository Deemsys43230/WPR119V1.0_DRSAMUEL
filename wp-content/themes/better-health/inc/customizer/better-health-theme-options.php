<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'better_health_theme_options',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Theme Option', 'better-health'),
    )
);


/*----------------------------------------------------------------------------------------------*/
/**
 * Color Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'better_health_primary_color_option',
    array(
        'title' => esc_html__('Color Options', 'better-health'),
        'panel' => 'better_health_theme_options',
        'priority' => 6,
    )
);

$wp_customize->add_setting(
    'better_health_primary_color',
    array(
        'default' => $default['better_health_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'better_health_primary_color', array(
    'label' => esc_html__('Primary Color', 'better-health'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'better-health'),
    'section' => 'better_health_primary_color_option',
    'priority' => 14,

)));

/*-----------------------------------------------------------------------------*/
/**
 * Top Header Background Color
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'better_health_top_header_background_color',
    array(
        'default' => $default['better_health_top_header_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'better_health_top_header_background_color', array(
    'label' => esc_html__('Top Header Background Color', 'better-health'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'better-health'),
    'section' => 'better_health_primary_color_option',
    'priority' => 14,

)));

/*-----------------------------------------------------------------------------*/
/**
 * Top Footer Background Color
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'better_health_top_footer_background_color',
    array(
        'default' => $default['better_health_top_footer_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'better_health_top_footer_background_color', array(
    'label' => esc_html__('Top Footer Background Color', 'better-health'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'better-health'),
    'section' => 'better_health_primary_color_option',
    'priority' => 14,

)));

/*-----------------------------------------------------------------------------*/
/**
 * Bottom Footer Background Color
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'better_health_bottom_footer_background_color',
    array(
        'default' => $default['better_health_bottom_footer_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'better_health_bottom_footer_background_color', array(
    'label' => esc_html__('Bottom Footer Background Color', 'better-health'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'better-health'),
    'section' => 'better_health_primary_color_option',
    'priority' => 14,

)));


/*-----------------------------------------------------------------------------*/
/**
 * Odd Feature Section Color Options
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'better_health_feature_odd_part_color_option',
    array(
        'default' => $default['better_health_feature_odd_part_color_option'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'better_health_feature_odd_part_color_option', array(
    'label' => esc_html__('Feature Odd Section Color Option', 'better-health'),
    'description' => esc_html__('We recommend choose Color for odd section part', 'better-health'),
    'section' => 'better_health_primary_color_option',
    'priority' => 14,

)));


/*-----------------------------------------------------------------------------*/
/**
 * Even Feature Section Color Options
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'better_health_feature_even_part_color_option',
    array(
        'default' => $default['better_health_feature_even_part_color_option'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'better_health_feature_even_part_color_option', array(
    'label' => esc_html__('Feature Even Section Color Option', 'better-health'),
    'description' => esc_html__('We recommend choose Color for even section part', 'better-health'),
    'section' => 'better_health_primary_color_option',
    'priority' => 14,

)));


/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Static page in Home page
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'better_health_front_page_option',
    array(
        'title' => esc_html__('Front Page Options', 'better-health'),
        'panel' => 'better_health_theme_options',
        'priority' => 6,
    )
);

/**
 *   Show/Hide Static page/Posts in Home page
 */
$wp_customize->add_setting(
    'better_health_front_page_hide_option',
    array(
        'default' => $default['better_health_front_page_hide_option'],
        'sanitize_callback' => 'better_health_sanitize_checkbox',
    )
);
$wp_customize->add_control('better_health_front_page_hide_option',
    array(
        'label' => esc_html__('Hide Blog Posts or Static Page on Front Page', 'better-health'),
        'section' => 'better_health_front_page_option',
        'type' => 'checkbox',
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Breadcrumb Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'better_health_breadcrumb_option',
    array(
        'title' => esc_html__('Breadcrumb Options', 'better-health'),
        'panel' => 'better_health_theme_options',
        'priority' => 6,
    )
);

/**
 * Breadcrumb Option
 */
$wp_customize->add_setting(
    'better_health_breadcrumb_setting_option',
    array(
        'default' => $default['better_health_breadcrumb_setting_option'],
        'sanitize_callback' => 'better_health_sanitize_select',

    )
);
$hide_show_breadcrumb_option = better_health_show_breadcrumb_option();
$wp_customize->add_control('better_health_breadcrumb_setting_option',
    array(
        'label' => esc_html__('Breadcrumb Options', 'better-health'),
        'section' => 'better_health_breadcrumb_option',
        'choices' => $hide_show_breadcrumb_option,
        'type' => 'select',
        'priority' => 10
    )
);


  /**
     *   Show/Hide Breadcrumb in Home page
     */
    $wp_customize->add_setting(
        'better_health_hide_breadcrumb_front_page_option',
        array(
                'default' => $default['better_health_hide_breadcrumb_front_page_option'],
                'sanitize_callback' => 'better_health_sanitize_checkbox',
             )
    );
    $wp_customize->add_control('better_health_hide_breadcrumb_front_page_option',
        array(
                'label' => esc_html__('Show/Hide Breadcrumb in Home page', 'better-health'),
                'section' => 'better_health_breadcrumb_option',
                'type' => 'checkbox',
                'priority' => 10
             )
    );

/*-------------------------------------------------------------------------------------------*/
/**
 * Search Placeholder
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'better_health_search_option',
    array(
        'title' => esc_html__('Search', 'better-health'),
        'panel' => 'better_health_theme_options',
        'priority' => 12,
    )
);

/**
 *Search Placeholder
 */
$wp_customize->add_setting(
    'better_health_post_search_placeholder_option',
    array(
        'default' => $default['better_health_post_search_placeholder_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('better_health_post_search_placeholder_option',
    array(
        'label' => esc_html__('Search Placeholder', 'better-health'),
        'section' => 'better_health_search_option',
        'type' => 'text',
        'priority' => 10
    )
);



/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Appointment 
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'better_health_appointment_option',
    array(
        'title' => esc_html__('Appointment Options', 'better-health'),
        'panel' => 'better_health_theme_options',
        'priority' => 6,
    )
);


/**
 *Appointment Shortcode Field
 */
$wp_customize->add_setting(
    'better_health_appointment_shortcode_field',
    array(
        'default' => $default['better_health_appointment_shortcode_field'],
        'sanitize_callback' => 'wp_kses_post',

    )
);

$wp_customize->add_control('better_health_appointment_shortcode_field',
    array(
        'label' => esc_html__('Appointment Shortcode From Contact Form', 'better-health'),
        'description' => sprintf( esc_html__('Note: Please Create Appointment Form Using Contact Form 7 And Paste Shortcode Here', 'better-health')),
        'section' => 'better_health_reset_option',
        'section' => 'better_health_appointment_option',
        'type' => 'text',
        'priority' => 10
    )
);







/*-------------------------------------------------------------------------------------------*/
/**
 * Reset Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'better_health_reset_option',
    array(
        'title' => esc_html__('Color Reset Options', 'better-health'),
        'panel' => 'better_health_theme_options',
        'priority' => 14,
    )
);

/**
 * Reset Option
 */
$wp_customize->add_setting(
    'better_health_color_reset_option',
    array(
        'default' => $default['better_health_color_reset_option'],
        'sanitize_callback' => 'better_health_sanitize_select',
        'transport' => 'postMessage'
    )
);
$reset_option = better_health_reset_option();
$wp_customize->add_control('better_health_color_reset_option',
    array(
        'label' => esc_html__('Reset Options', 'better-health'),
        'description' => sprintf( esc_html__('Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects', 'better-health')),
        'section' => 'better_health_reset_option',
        'type' => 'select',
        'choices' => $reset_option,
        'priority' => 20
    )
);