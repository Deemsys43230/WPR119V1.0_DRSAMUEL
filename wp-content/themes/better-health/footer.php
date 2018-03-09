<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */


//Retrieving copyright value from customizer field 
$copyright = better_health_get_option('better_health_copyright');

//Retrieving Button Text value from customizer field 
$button_text = better_health_get_option('better_health_contact_link_button_text');

//Retrieving Button Link value from customizer field 
$button_link = better_health_get_option('better_health_contact_link_button_link');

//Retrieving Label value from customizer field 
$address_label = better_health_get_option('better_health_contact_link_address_label');

//Retrieving Addressm Icon value from customizer field 
$address_icon = better_health_get_option('better_health_contact_link_address_icon');

//Retrieving Address value from customizer field 
$address = better_health_get_option('better_health_contact_link_address');

//Retrieving Phone Number label value from customizer field 
$phone_number_label = better_health_get_option('better_health_contact_link_phone_label');

//Retrieving Phone Number  Icon value from customizer field 
$phone_number_icon = better_health_get_option('better_health_contact_link_phone_icon');

//Retrieving Address value from customizer field 
$phone_number = better_health_get_option('better_health_contact_link_phone_number');

//Retrieving Email Label from customizer field 
$email_label = better_health_get_option('better_health_contact_link_email_label');

//Retrieving Email Icon from customizer field 
$email_icon = better_health_get_option('better_health_contact_link_email_icon');

//Retrieving Email from customizer field 
$email = better_health_get_option('better_health_contact_link_email');

//Retrieving image url from customizer field 
$image = better_health_get_option('better_health_contact_image');

//Retrieving Contact Information from customizer field 
$show_top_footer_contact_info=  better_health_get_option('better_health_hide_top_footer_contact_link_section');

//Retrieving Top Contact Title from customizer field 
$contact_title = better_health_get_option('better_health_contact_title_text');

//Retrieving Top Contact Subtitle  from customizer field 
$contact_subtitle = better_health_get_option('better_health_contact_subtitle_text');

//Condition to Show/Hide top footer Contact Information
 if($show_top_footer_contact_info=="show")
 { ?>
    <section id="section-contact-link" class="contact-link">
      <div class="container">
        <div class="row">
          <div class="section-contact-full clearfix">
              <div class="col-xs-12 col-sm-3 col-md-2 hidden-xs">
                  <div class="contact-link-img">
                     <img src="<?php echo esc_url($image) ?>" alt="">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-9 col-md-6">
                  <div class="contact-link-desc">
                     <h5><?php echo esc_html($contact_title); ?></h5>
                     <span><?php echo esc_html($contact_subtitle); ?></span>
                  </div>
              </div>
            <div class="col-xs-12 col-sm-9 col-md-4">
                <div class="contact-link-btn">
                     <a href="contact-us" class="contact-us"><?php echo esc_html($button_text); ?></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 <?php 
   }

  ?>
  <section id="footer-top" class="footer-top">
      <div class="container footer-widget-top">
          <div class="row">
            <div class="col-md-12">
              <div class="top-widget-contacts">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 widget">
                       
                       <div class="widget-contact-icon pull-left">
                          <i class="fa  <?php echo esc_attr($address_icon); ?>" aria-hidden="true"></i>
                        </div>
                       
                        <div class="widget-contact-info">
                          <p class="top-widget-contacts-title"><?php echo esc_html($address_label); ?></p>
                          <p class="top-widget-contacts-content"><?php echo esc_html($address); ?></p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 widget">
                        <div class="widget-contact-icon pull-left">
                          <i class="fa <?php echo esc_attr($email_icon); ?>" aria-hidden="true"></i>
                        </div>
                        
                        <div class="widget-contact-info">
                          <p class="top-widget-contacts-title"><?php echo esc_html($email_label); ?></p>
                          <p class="top-widget-contacts-content"><?php echo esc_html($email); ?></p>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 widget">
                       
                        <div class="widget-contact-icon pull-left">
                           <i class="fa <?php echo esc_attr($phone_number_icon); ?>" aria-hidden="true"></i>
                        </div>

                        <div class="widget-contact-info">
                           <p class="top-widget-contacts-title"><?php echo esc_html($phone_number_label); ?></p>
                           <p class="top-widget-contacts-content"><?php echo esc_html($phone_number); ?></p>
                        </div>

                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <?php
  
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
        {
            
            $count = 0;
            for ( $i = 1; $i <= 4; $i++ )
                {
                if ( is_active_sidebar( 'footer-'. $i ) )
                      {
                          $count++;
                      }
              }
            $column = 3;
            if( $count == 4 ) 
            {
                $column = 3;  
             
            }
            elseif( $count == 3)
            {
                  $column=4;
            }
            elseif( $count == 2) 
            {
                  $column = 6;
            }
           elseif( $count == 1) 
            {
                  $column = 12;
            }
?>
            <div class="container">
                <div class="row">
                        <?php
                            $column_class = 'widget-column footer-active-' . absint( $column_count );
                              for ( $i = 1; $i <= 4 ; $i++ )
                              {
                                  if ( is_active_sidebar( 'footer-' . $i ) )
                                  {
                          ?> 
                                      <div class="col-md-<?php echo  absint( $column ); ?>">
                                          <div class="footer-top-box wow fadeInUp">
                                              <?php dynamic_sidebar( 'footer-' . $i ); ?>
                                          </div>
                      
                                      </div>
                      <?php       } 
                      
                              }     ?>  
                </div>
            </div>
    <?php } ?>     
  </section>

  <section id="footer-bottom" class="footer-bottom">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="copyright">
                    <?php
                       // Displaying Footer copyright Text
                       echo wp_kses_post($copyright);
                    ?>
                  </div>
                  <div class="powered_by">
                      <span><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'better-health' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'Doctor Site' ), 'WordPress' ); ?></a>
                      </span>
                      <span class="sep"> | </span>
                     <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'better-health' ), 'Deemsys Inc', '<a href="http://www.deemsysinc.com" rel="designer">DeemsysThemes</a>' ); ?>
                  </div>
              </div>
          </div>
      </div>
</section>

<a href="#" class="scrollup"><i class="fa fa-angle-double-up"></i></a>
 <?php wp_footer(); ?>

</body>
</html>
