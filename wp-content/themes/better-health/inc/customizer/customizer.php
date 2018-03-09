<?php
/**
 * HomePage Settings Panel on customizer
 */
$wp_customize->add_panel(
    'better_health_homepage_settings_panel',
    array(
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('HomePage Settings', 'better-health'),
    )
);

/*-------------------------------------------------------------------------------------------------*/
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'better_health_slider_section',
    array(
        'title' => esc_html__('Slider Section', 'better-health'),
        'panel' => 'better_health_homepage_settings_panel',
        'priority' => 6,
    )
);

/**
 * Show/Hide option for Homepage Slider Section
 *
 */

$wp_customize->add_setting(
    'better_health_homepage_slider_option',
    array(
        'default' => $default['better_health_homepage_slider_option'],
        'sanitize_callback' => 'better_health_sanitize_select',
    )
);
$hide_show_option = better_health_slider_option();
$wp_customize->add_control(
    'better_health_homepage_slider_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Slider Option', 'better-health'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'better-health'),
        'section' => 'better_health_slider_section',
        'choices' => $hide_show_option,
        'priority' => 7
    )
);

/**
 * Dropdown available category for homepage slider
 *
 */
$wp_customize->add_setting(
    'better_health_slider_cat_id',
    array(
        'default' => $default['better_health_slider_cat_id'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(new better_health_Customize_Category_Control(
        $wp_customize,
        'better_health_slider_cat_id',
        array(
            'label' => esc_html__('Slider Category', 'better-health'),
            'description' => esc_html__('Select Category for Homepage Slider Section', 'better-health'),
            'section' => 'better_health_slider_section',
            'priority' => 8,

        )
    )
);


/**
 * Field for no of posts to display..
 *
 */
$wp_customize->add_setting(
    'better_health_no_of_slider',
    array(
        'default' => $default['better_health_no_of_slider'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'better_health_no_of_slider',
    array(
        'type' => 'number',
        'label' => esc_html__('No of Slider', 'better-health'),
        'section' => 'better_health_slider_section',
        'priority' => 10
    )
);


/**
 * Field for Get Started button text
 *
 */
$wp_customize->add_setting(
    'better_health_slider_get_started_txt',
    array(
        'default' => $default['better_health_slider_get_started_txt'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'better_health_slider_get_started_txt',
    array(
        'type' => 'text',
        'label' => esc_html__('Get Started Button', 'better-health'),
        'section' => 'better_health_slider_section',
        'priority' => 11
    )
);

/**
 * Field for Get Started button Link
 *
 */
$wp_customize->add_setting(
    'better_health_slider_get_started_link',
    array(
        'default' => $default['better_health_slider_get_started_link'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'better_health_slider_get_started_link',
    array(
        'type' => 'url',
        'label' => esc_html__('Get Started Button Link', 'better-health'),
        'description' => esc_html__('Use full url link', 'better-health'),
        'section' => 'better_health_slider_section',
        'priority' => 20
    )
);

/*----------------------------------------------------------------------------------------------*/
	
  /**
 * Feature Section
 *
 */  
  $wp_customize->add_section(
            'better_health_feature_section',
                array(
                    'title'     => esc_html__( 'Our Feature Section', 'better-health' ),
                    'panel'     => 'better_health_homepage_settings_panel',
                    'priority'  => 20,
                )
        );

        /**
         * Switch option for Homepage Service Section
         *
         * @since 1.0.0
         */
 $wp_customize->add_setting(
            'better_health_homepage_feature_option',
                array(
                    'default' => $default['better_health_homepage_feature_option'],
                    'sanitize_callback' => 'better_health_sanitize_select',
                )
        );
       
  $choices= better_health_show_feature_section_option();       
  $wp_customize->add_control(
            'better_health_homepage_feature_option',
                array(
                    'type' => 'radio',
                    'label' => esc_html__( 'Feature Section Option', 'better-health' ),
                    'description'   => esc_html__( 'Show/hide option for Homepage Our Feature  Section.', 'better-health' ),
                    'section' => 'better_health_feature_section',
                    'choices'   =>$choices,
                    'priority' =>5
                )
        );
        


    $feature_priority = 30;
     $better_health_default_service_icon = array( 'fa-desktop', 'fa-print', 'fa-paint-brush', 'fa-mobile' );
    $better_health_separator_label = array( 'First', 'Second', 'Third', 'Forth');
    
    foreach ( $better_health_separator_label as $icon_key => $icon_value ) {        
        
        /**
         * Section separator
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_feature_icon_sec_separator_'.$icon_key,
                array(
                    'default' => '<hr>',
                    'sanitize_callback' => 'wp_kses',
                )
        );
        $wp_customize->add_control(new Better_Health_Customize_Section_Separator(
            $wp_customize, 
                'better_health_feature_icon_sec_separator_'.$icon_key, 
                array(
                    'type'      => 'better_health_separator',
                    'section'   => 'better_health_feature_section',
                    'priority'  => $feature_priority,
                )                   
            )
        );



        /**
         * Icon list for service tab
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_feature_icon_'.$icon_key,
                array(
                    'default' => $better_health_default_service_icon[$icon_key],
                    'sanitize_callback' => 'sanitize_text_field',
                )
        );
        
     $wp_customize->add_control(
      'better_health_feature_icon_'.$icon_key, 
    array(
        'type' => 'text',
        'label' =>sprintf(esc_html__( '%s Icon Class', 'better-health' ), $better_health_separator_label[$icon_key] ),
        'description'   => sprintf( __( 'Font Awesome Icon Can Be Found Here: %1$sFont Awesome%2$s.', 'better-health' ), '<a href="http://fontawesome.io/cheatsheet/" target="_blank">','</a>' ),
        'section' => 'better_health_feature_section',
        'priority'  => $feature_priority,
    )
);   

     $feature_priority = $feature_priority+5;
              
        /**
         * Dropdown available pages for homepage feature section
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'better_health_feature_page_id_'.$icon_key,
                array(
                    'default' => '0',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'absint'
                )
        );
        $wp_customize->add_control(
            'better_health_feature_page_id_'.$icon_key,
                array(
                    'type' => 'dropdown-pages',
                    'label' =>sprintf(esc_html__( '%s Feature Page', 'better-health' ), $better_health_separator_label[$icon_key] ),

                    'description' => esc_html__( 'Select page for Homepage Feature Section', 'better-health' ),
                    'section' => 'better_health_feature_section',
                    'priority' => $feature_priority
                )
        );
        $feature_priority = $feature_priority+5;
    }
