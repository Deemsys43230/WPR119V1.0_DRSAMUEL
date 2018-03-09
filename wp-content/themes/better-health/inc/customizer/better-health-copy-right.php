<?php

$wp_customize->add_panel(
    'better_health_footer_option',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Option', 'better-health'),
    )
);


/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'better_health_copyright_info_section',
    array(
        'panel' => 'better_health_footer_option',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Copyright Option', 'better-health'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'better_health_copyright',
    array(
        'default' => $default['better_health_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'better_health_copyright',
    array(
        'type' => 'text',
        'label' => esc_html__('Copyright', 'better-health'),
        'section' => 'better_health_copyright_info_section',
        'priority' => 8
    )
);


/**
 * Top Footer Contact Link Option
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'better_health_contact_link_info_section',
    array(
        'panel' => 'better_health_footer_option',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Top Footer Contact Link Option', 'better-health'),
    )
);



$wp_customize->add_setting(
    'better_health_hide_top_footer_contact_link_section',
    array(
        'default' => $default['better_health_hide_top_footer_contact_link_section'],
        'sanitize_callback' => 'better_health_sanitize_select',
    )
);

$better_health_show_top_footer_contact_link_section_option = better_health_show_top_footer_contact_link_section_option();
$wp_customize->add_control(
    'better_health_hide_top_footer_contact_link_section',
    array(
        'type' => 'radio',
        'label' => esc_html__('Top Footer Contact Link Info Option', 'better-health'),
        'description' => esc_html__('Show/hide Top Footer Contact Link Info Section.', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'choices' => $better_health_show_top_footer_contact_link_section_option,
        'priority' => 4
    )
);


     /**
         * Section separator
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_feature_icon_sec_separator_0',
                array(
                    'default' => '<hr>',
                    'sanitize_callback' => 'wp_kses',
                )
        );
        $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
            $wp_customize, 
                'better_health_feature_icon_sec_separator_0', 
                array(
                    'type'      => 'better_health_separator',
                    'section'   => 'better_health_contact_link_info_section',
                    'priority'  => 4,
                )                   
            )
        );


/**
         * Upload image control for section
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_contact_image',
                array(
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                )
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'better_health_contact_image',
                array(
                    'label'      => esc_html__( 'Contact Image', 'better-health' ),
                    'section'    => 'better_health_contact_link_info_section',
                    'priority' => 5
                )
            )
        );


// Top Footer Information Text

$wp_customize->add_setting(
    'better_health_contact_title_text',
    array(
        'default' => $default['better_health_contact_title_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_title_text',
    array(
        'type' => 'text',
        'label' => esc_html__('Top Footer Title Text', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 5
    )
);

$wp_customize->add_setting(
    'better_health_contact_subtitle_text',
    array(
        'default' => $default['better_health_contact_subtitle_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_subtitle_text',
    array(
        'type' => 'text',
        'label' => esc_html__('Top Footer Sub Title Text', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 5
    )
);


/**
         * Section separator
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_feature_icon_sec_separator_1',
                array(
                    'default' => '<hr>',
                    'sanitize_callback' => 'wp_kses',
                )
        );
        $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
            $wp_customize, 
                'better_health_feature_icon_sec_separator_1', 
                array(
                    'type'      => 'better_health_separator',
                    'section'   => 'better_health_contact_link_info_section',
                    'priority'  => 5,
                )                   
            )
        );


$wp_customize->add_setting(
    'better_health_contact_link_button_text',
    array(
        'default' => $default['better_health_contact_link_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_button_text',
    array(
        'type' => 'text',
        'label' => esc_html__('Button Text', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 6
    )
);

$wp_customize->add_setting(
    'better_health_contact_link_button_link',
    array(
        'default' => $default['better_health_contact_link_button_link'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_button_link',
    array(
        'type' => 'url',
        'label' => esc_html__('Button Link', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 6
    )
);



 /**
     * Section separator
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'better_health_feature_icon_sec_separator_2',
            array(
                'default' => '<hr>',
                'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
        $wp_customize, 
            'better_health_feature_icon_sec_separator_2', 
            array(
                'type'      => 'better_health_separator',
                'section'   => 'better_health_contact_link_info_section',
                'priority'  => 6,
            )                   
        )
    );


/**
 * Field for Fonsome Icon for Address
 *
 */
$wp_customize->add_setting(
    'better_health_contact_link_address_icon',
    array(
        'default' => $default['better_health_contact_link_address_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_address_icon',
    array(
        'type' => 'text',
        'description'   => sprintf( __( 'Font Awesome Icon Can Be Found Here: %1$sFont Awesome%2$s.', 'better-health' ), '<a href="http://fontawesome.io/cheatsheet/" target="_blank">','</a>' ),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 7
    )
);


// Address label

$wp_customize->add_setting(
    'better_health_contact_link_address_label',
    array(
        'default' => $default['better_health_contact_link_address_label'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_address_label',
    array(
        'type' => 'text',
        'label' => esc_html__('Address Label', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 7
    )
);



$wp_customize->add_setting(
    'better_health_contact_link_address',
    array(
        'default' => $default['better_health_contact_link_address'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_address',
    array(
        'type' => 'text',
        'label' => esc_html__('Address', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 7
    )
);


/**
     * Section separator
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'better_health_feature_icon_sec_separator_3',
            array(
                'default' => '<hr>',
                'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
        $wp_customize, 
            'better_health_feature_icon_sec_separator_3', 
            array(
                'type'      => 'better_health_separator',
                'section'   => 'better_health_contact_link_info_section',
                'priority'  => 7,
            )                   
        )
    );



/**
 * Field for Fonsome Icon for Email
 *
 */
$wp_customize->add_setting(
    'better_health_contact_link_email_icon',
    array(
        'default' => $default['better_health_contact_link_email_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_email_icon',
    array(
        'type' => 'text',
        'description'   => sprintf( __( 'Font Awesome Icon Can Be Found Here: %1$sFont Awesome%2$s.', 'better-health' ), '<a href="http://fontawesome.io/cheatsheet/" target="_blank">','</a>' ),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);


// Email label

$wp_customize->add_setting(
    'better_health_contact_link_email_label',
    array(
        'default' => $default['better_health_contact_link_email_label'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_email_label',
    array(
        'type' => 'text',
        'label' => esc_html__('Email Label', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);



$wp_customize->add_setting(
    'better_health_contact_link_email',
    array(
        'default' => $default['better_health_contact_link_email'],
        'sanitize_callback' => 'sanitize_email',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_email',
    array(
        'type' => 'email',
        'label' => esc_html__('Email', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);



/**
     * Section separator
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'better_health_feature_icon_sec_separator_4',
            array(
                'default' => '<hr>',
                'sanitize_callback' => 'wp_kses',
            )
    );
    $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
        $wp_customize, 
            'better_health_feature_icon_sec_separator_4', 
            array(
                'type'      => 'better_health_separator',
                'section'   => 'better_health_contact_link_info_section',
                'priority'  => 8,
            )                   
        )
    );

/**
 * Field for Fonsome Icon for Phone Number
 *
 */
$wp_customize->add_setting(
    'better_health_contact_link_phone_icon',
    array(
        'default' => $default['better_health_contact_link_phone_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_phone_icon',
    array(
        'type' => 'text',
        'description'   => sprintf( __( 'Font Awesome Icon Can Be Found Here: %1$sFont Awesome%2$s.', 'better-health' ), '<a href="http://fontawesome.io/cheatsheet/" target="_blank">','</a>' ),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);

// Phone Number label

$wp_customize->add_setting(
    'better_health_contact_link_phone_label',
    array(
        'default' => $default['better_health_contact_link_phone_label'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_contact_link_phone_label',
    array(
        'type' => 'text',
        'label' => esc_html__('Phone Number Label', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);



$wp_customize->add_setting(
    'better_health_contact_link_phone_number',
    array(
        'default' => $default['better_health_contact_link_phone_number'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'better_health_contact_link_phone_number',
    array(
        'type' => 'text',
        'label' => esc_html__('Phone Number', 'better-health'),
        'section' => 'better_health_contact_link_info_section',
        'priority' => 8
    )
);

/**
     * Section separator
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'better_health_service_icon_sec_separator_5',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_html',
            )
    );
    $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
        $wp_customize, 
            'better_health_service_icon_sec_separator_5', 
            array(
                'type'      => 'better_health_separator',
                'section'   => 'better_health_contact_link_info_section',
                'priority'  => 9,
            )                   
        )
    );



