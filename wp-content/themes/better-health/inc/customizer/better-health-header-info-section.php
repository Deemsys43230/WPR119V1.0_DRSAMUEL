<?php
/**
 * Better Health Header Info Section
 *
 */
$wp_customize->add_section(
    'better_health_top_header_info_section',
    array(
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Top Header Info', 'better-health'),
    )
);

$wp_customize->add_setting(
    'better_health_top_header_section',
    array(
        'default' => $default['better_health_top_header_section'],
        'sanitize_callback' => 'better_health_sanitize_select',
    )
);

$hide_show_top_header_option = better_health_slider_option();
$wp_customize->add_control(
    'better_health_top_header_section',
    array(
        'type' => 'radio',
        'label' => esc_html__('Top Header Info Option', 'better-health'),
        'description' => esc_html__('Show/hide Option for Top Header Info Section.', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'choices' => $hide_show_top_header_option,
        'priority' => 4
    )
);


/**
 * Field for Font Awesome Icon
 *
 */
$wp_customize->add_setting(
    'better_health_top_header_section_address_icon',
    array(
        'default' => $default['better_health_top_header_section_address_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_top_header_section_address_icon',
    array(
        'type' => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'priority' => 4
    )
);

/**
 * Field for Top Header Address
 *
 */
$wp_customize->add_setting(
    'better_health_top_header_address',
    array(
        'default' => $default['better_health_top_header_address'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_top_header_address',
    array(
        'type' => 'text',
        'label' => esc_html__('Address', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'priority' => 4 
    )
);


/**
 * Field for Font Awesome Icon
 *
 */
$wp_customize->add_setting(
    'better_health_top_header_section_phone_number_icon',
    array(
        'default' => $default['better_health_top_header_section_phone_number_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_top_header_section_phone_number_icon',
    array(
        'type' => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'priority' => 6
    )
);

/**
 * Field for Top Header Phone Number
 *
 */
$wp_customize->add_setting(
    'better_health_top_header_phone_no',
    array(
        'default' => $default['better_health_top_header_phone_no'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_top_header_phone_no',
    array(
        'type' => 'text',
        'label' => esc_html__('Phone Number', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'priority' => 8
    )
);

/**
 * Field for Fonsome Icon
 *
 */
$wp_customize->add_setting(
    'better_health_email_icon',
    array(
        'default' => $default['better_health_email_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_email_icon',
    array(
        'type' => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'priority' => 8
    )
);

/**
 * Field for Top Header Email Address
 *
 */
$wp_customize->add_setting(
    'better_health_top_header_email',
    array(
        'default' => $default['better_health_top_header_email'],
        'sanitize_callback' => 'sanitize_email',
    )
);
$wp_customize->add_control(
    'better_health_top_header_email',
    array(
        'type' => 'email',
        'label' => esc_html__('Email Address', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'priority' => 8
    )
);


/**
 *   Show/Hide Social Link
 */
$wp_customize->add_setting(
    'better_health_social_link_hide_option',
    array(
        'default' => $default['better_health_social_link_hide_option'],
        'sanitize_callback' => 'better_health_sanitize_checkbox',
    )
);
$wp_customize->add_control('better_health_social_link_hide_option',
    array(
        'label' => esc_html__('Hide/Show Social Menu', 'better-health'),
        'section' => 'better_health_top_header_info_section',
        'type' => 'checkbox',
        'priority' => 10
    )
);