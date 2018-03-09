<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Canyon Themes
 * @subpackage Better Health
 */

$section_option = better_health_get_option( 'better_health_homepage_feature_option');

if( $section_option != 'hide' ) {
 
?>
<section id="section1" class="section-margine">
    <div class="container">
        <div class="row">
            <?php
                $better_health_default_feature_icon = array( 'fa-hospital-o', 'fa-ambulance', 'fa-user-md', 'fa-stethoscope');
                 $better_health_separator_label = array( 'First', 'Second', 'Third', 'Forth');
                 $i=1;
                 $j=0;
                 $count=0;
                 $colsm=3;
                  foreach ( $better_health_separator_label as $icon_key => $icon_value)
                   { 
                         $feature_page_id_value = better_health_get_option('better_health_feature_page_id_'.$icon_key);

                         if(empty($feature_page_id_value))
                         {
                            $count=$count+1;
                         }
                    }
                     if($count==1)
                     {
                        $colsm=4;

                     }
                     elseif ($count==2) 
                     {
                          $colsm=6;
                     }
                     elseif ($count==3) 
                     {
                          $colsm=12;
                     }
                 foreach ( $better_health_separator_label as $icon_key => $icon_value) 
                 { 

                    $feature_icons=better_health_get_option('better_health_feature_icon_'.$icon_key,$better_health_default_feature_icon[$icon_key]);
                     $feature_page_id_value = better_health_get_option('better_health_feature_page_id_'.$icon_key);
                    if( !empty( $feature_page_id_value ) )
                     {
                         $feature_page_query = new WP_Query( array( 'page_id' => $feature_page_id_value ) );
                                if( $feature_page_query->have_posts() ) 
                                {
                                    while ( $feature_page_query->have_posts() ) 
                                    {
                                        $feature_page_query->the_post();
                  ?>
                                        <div class="col-md-<?php echo esc_attr($colsm); ?>  col-sm-6">
                                            <div class="row">
                                                <a href="<?php the_permalink(); ?>" class="feature-link">
                                                    <div class="section-1-box wow bounceIn"
                                                         data-wow-delay=".<?php echo esc_attr($i); ?>">
                                                        
                                                        <div class="section-1-box-icon-background">
                                                            <?php
                                                            if(!empty($feature_icons))
                                                             {
                                                           ?> 
                                                             <i class="fa <?php echo esc_attr($feature_icons); ?>"></i>
                                                           <?php } ?>  
                                                             <h4><?php the_title() ?></h4>
                                                        </div>
                                                        
                                                        
                                                        <p><?php echo esc_html( wp_trim_words( get_the_content(), 15) ); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                            <?php
                              $i++;
                              $j++;
                                    }

                                }  
                          wp_reset_postdata();     
                     }
                 } 
            ?>
        </div>
    </div>
</section>

 <?php } ?>