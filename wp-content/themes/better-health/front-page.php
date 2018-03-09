<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Canyon Themes
 * @subpackage Better Health
 */
get_header();

//Retrieving hide/show fornt page value from customizer field
$better_health_hide_front_page_content = better_health_get_option('better_health_front_page_hide_option');

/*show widget in front page, now user are not force to use front page*/
if (!is_home()) {
    do_action('better_health_home_page_section');
    do_action('better_health_home_page_feature_section');
    dynamic_sidebar('better-health-home-page');
}

if ('posts' == get_option('show_on_front')) {
   
     include(get_home_template());
} else {

	 
    if (1 != $better_health_hide_front_page_content) {
        include(get_page_template());
        
    }
}

get_footer();
