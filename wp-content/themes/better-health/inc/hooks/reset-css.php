<?php 

//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'better_health_reset_colors' ) ) :

    function better_health_reset_colors($data) {

         set_theme_mod('better_health_top_header_background_color','#ffffff');

         set_theme_mod('better_health_top_footer_background_color','#1A1E21');

         set_theme_mod('better_health_bottom_footer_background_color','#111315');

         set_theme_mod('better_health_primary_color','#00aef0');

         set_theme_mod('better_health_feature_odd_part_color_option','#00aef0');

         set_theme_mod('better_health_feature_even_part_color_option','#05a1dc');

         set_theme_mod('better_health_color_reset_option','do-not-reset');
         
    }

endif;
add_action( 'better_health_colors_reset','better_health_reset_colors', 10 );


