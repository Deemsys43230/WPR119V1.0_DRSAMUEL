<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */
$address_icon = better_health_get_option('better_health_top_header_section_address_icon');
$address_value = better_health_get_option('better_health_top_header_address');
$mobile_icon = better_health_get_option('better_health_top_header_section_phone_number_icon');
$mobile_value = better_health_get_option('better_health_top_header_phone_no');
$email_icon = better_health_get_option('better_health_email_icon');
$email_value = better_health_get_option('better_health_top_header_email');
$appointment_short_code = better_health_get_option('better_health_appointment_shortcode_field');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'better-health'); ?></a>
        <?php get_template_part('section-parts/section', 'top-header'); ?>
        <?php 
        // Header image display code
        global $header_imagem,$header_style;
        $header_image = get_header_image();
     
        if( $header_image ){
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;background-attachment: fixed;"';                 

        } else{

            $header_style = '';
        }

        ?>
   <header id="header" class="head" role="banner">
        <nav id="site-navigation" class="main-navigation navbar navbar-default navbar-menu" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation', 'better-health'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="site-branding">
                        <?php
                        if (has_custom_logo()) { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        <?php } else {
                            if (is_front_page() && is_home()) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                </p>
                                <?php
                            endif;
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php
                            endif;
                        } ?>
                    </div><!-- .site-branding -->

                </div>

                <div class="better-health-info">
                    <ul class="contact-detail2">
                    <?php if (!empty($address_value)) {
                        ?>
                        <li>
                            <span class="icon-box--description"><a href="#"><i class="fa <?php echo esc_attr($address_icon); ?> fa-2x"></i> <?php echo esc_html($address_value); ?></a></span>
                        </li>
                        <?php
                      }
                    if (!empty($mobile_value)) {
                        ?>
 
                        <li>
                            <span class="icon-box--description"><a href="<?php echo esc_url('tel:'.$mobile_value) ?>"><i class="fa <?php echo esc_attr($mobile_icon); ?> fa-2x"></i> <?php echo esc_html($mobile_value); ?></a></span>
                        </li>
                       <?php } 
                        if (!empty($email_value)) {
                       ?> 
                        <li>
                            <span class="icon-box--description"><a href="<?php echo esc_url('mailto:'.$email_value); ?>"><i class="fa <?php echo esc_attr($email_icon); ?> fa-2x"></i> <?php echo esc_html($email_value); ?></a></span>
                        </li>
                      <?php } ?>  
                    </ul>
                </div>
            </div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
    <div id="menu-bar" class="main-menu">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeIn">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'depth' => 4,
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'bs-example-navbar-collapse-1',
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                            'walker' => new WP_Bootstrap_Navwalker()
                        )
                    );
                }
                ?>
            </div>
           <?php
             if(!empty($appointment_short_code))
             {
            ?>  
                    <div class="make-booking">
                     <a href="<?php echo home_url() ?>/book-appointment" class="btn btn-default makebooking"><?php esc_html_e('Book Appoinment','better-health')?></a>
                    </div>
                 
                    <!-- Make appointment model -->
<!--                     <section id="section23" class="appointment">
                      <div class="modal fade" id="appointment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog style-one" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> --><!-- <?php esc_html_e('&times;','better-health')?></span></button>
                              <h4 class="modal-title" id="myModalLabel"><?php esc_html_e('Make an Appoinment','better-health')?></a></h4>
                            </div>
                            <div class="modal-body">
                              <div class="appoinment-form-outer">
                                <?php echo do_shortcode($appointment_short_code); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section> -->
        <?php } ?>          

        </div>
    </div>
<!-- 
	
 
  <script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
      document.location.href = '<?php echo $home_url; ?>';
    });
  </script> -->