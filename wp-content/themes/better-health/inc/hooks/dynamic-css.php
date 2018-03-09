<?php
/**
 * Dynamic css
 *
 * @package Canyon Themes
 * @subpackage Better Health
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('better_health_dynamic_css') ):
    function better_health_dynamic_css(){

    $better_health_top_header_color = esc_attr( better_health_get_option('better_health_top_header_background_color') );

    $better_health_top_footer_color = esc_attr( better_health_get_option('better_health_top_footer_background_color') );

    $better_health_bottom_footer_color = esc_attr( better_health_get_option('better_health_bottom_footer_background_color') );

    $better_health_primary_color = esc_attr( better_health_get_option('better_health_primary_color') );


    $bh_feature_odd_section_part_color = esc_attr( better_health_get_option('better_health_feature_odd_part_color_option') );

    $bh_feature_even_section_part = esc_attr( better_health_get_option('better_health_feature_even_part_color_option') );


    $custom_css = '';


    /*====================Dynamic Css =====================*/


   $custom_css .= "#section1 .col-md-3.col-sm-6:nth-child(odd),#section1 .col-md-4.col-sm-6:nth-child(odd),#section1 .col-md-6.col-sm-6:nth-child(odd),#section1 .col-md-12.col-sm-6:nth-child(odd)
    {
         background-color: " . $bh_feature_odd_section_part_color . ";
    }
    ";

    $custom_css .= "#section1 .col-md-3.col-sm-6:nth-child(even),#section1  col-md-4.col-sm-6:nth-child(even),#section1 .col-md-6.col-sm-6:nth-child(even),#section1 .col-md-12.col-sm-6:nth-child(even)
      {
         background-color: " . $bh_feature_even_section_part . ";
      }
    ";

    $custom_css .= ".top-header{
         background-color: " . $better_health_top_header_color . ";}
    ";

    $custom_css .= ".footer-top{
         background-color: " . $better_health_top_footer_color . ";}
    ";

    $custom_css .= ".footer-bottom{
         background-color: " . $better_health_bottom_footer_color . ";}
    ";


    $custom_css .= ".section-0-background,
     .btn-primary,
     .section-14-box .date,
     #quote-carousel a.carousel-control,
     .section-10-background,
     .footer-top .submit-bgcolor,
     .nav-links .nav-previous a, 
     .nav-links .nav-next a,
     .comments-area .submit,
     .inner-title,
     header .navbar-menu .navbar-nav>li>a:hover, 
      header .navbar-menu .navbar-nav>li.active >a:active,
      header .dropdown-menu > li > a:hover,
      header .dropdown-menu > .active > a, 
      header .dropdown-menu > .active > a:focus, 
      header .dropdown-menu > .active > a:hover,
      .section16 form input[type='submit'],
      .woocommerce a.button, 
      .woocommerce #respond input#submit.alt, 
      .woocommerce a.button.alt, 
      .woocommerce button.button.alt, 
      .woocommerce input.button.alt,
      .woocommerce nav.woocommerce-pagination ul li a:focus, 
      .woocommerce nav.woocommerce-pagination ul li a:hover, 
      .woocommerce nav.woocommerce-pagination ul li span.current,
      header .navbar-toggle,
      .front-blog-date .publish-month,
      .section-contact-full, 
      .scrollup,
      .section-2-box-right .readmore, 
      a.readmore
     {
         background-color: " . $better_health_primary_color . ";
     }
    ";

 $custom_css .= " header .navbar-menu .navbar-nav>li> a:hover, 
                  header .navbar-menu .navbar-nav>li.active > a,
                  .navbar-default .navbar-nav > .active > a,
                  .navbar-default .navbar-nav > .active > a:focus,
                  .navbar-default .navbar-nav > .active > a:hover,
                  .widget ul li a:hover,a:hover, a:focus, a:active,
                  .section-14-box h3 a:hover,
                  .nav-links .nav-previous a:hover, 
                  .nav-links .nav-next a:hover,
                  header .navbar-menu .navbar-nav > .open > a, 
                  header .navbar-menu .navbar-nav > .open > a:focus, 
                  header .navbar-menu .navbar-nav > .open > a:hover,
                  .icon-box--description .fa,
                  .front-blog-date .publish-date,
                  a.contact-us:hover,
                  .better-health-info .contact-detail2 li a:hover
                  {
                      color: " . $better_health_primary_color . ";
                   }
                  ";

    $custom_css .= ".widget .tagcloud a:hover,
    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover, 
    .woocommerce nav.woocommerce-pagination ul li span.current
                 
                {

                   border: 1px solid " . $better_health_primary_color . ";
                }
                ";


    $custom_css .= ".section-14-box .underline,
   .item blockquote img,
   .widget .widget-title,
   .btn-primary,
   #quote-carousel .carousel-control.left, 
   #quote-carousel .carousel-control.right{
        border-color: " . $better_health_primary_color . ";}
    ";
    /*------------------------------------------------------------------------------------------------- */

    /*custom css*/

    wp_add_inline_style('better-health-style', $custom_css);

}
endif;
add_action('wp_enqueue_scripts', 'better_health_dynamic_css', 99);