<?php
// Hook for Slider section

if( ! function_exists( 'better_health_home_page_section_hook' ) ):
      function better_health_home_page_section_hook() { 
           get_template_part( 'section-parts/section', 'slider'); 
           
     }
   endif;
    add_action( 'better_health_home_page_section', 'better_health_home_page_section_hook', 10 );


// Hook for feature section
if( ! function_exists( 'better_health_home_page_feature_section_hook' ) ):
      function better_health_home_page_feature_section_hook() { 
           get_template_part( 'section-parts/section', 'feature'); 
           
     }
   endif;
    add_action( 'better_health_home_page_feature_section', 'better_health_home_page_feature_section_hook', 10 );



