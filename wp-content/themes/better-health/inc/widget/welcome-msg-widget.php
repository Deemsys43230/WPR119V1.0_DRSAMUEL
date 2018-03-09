<?php

if (!class_exists('Better_health_Welcome_Msg_Widget')) {

    class Better_health_Welcome_Msg_Widget extends WP_Widget

    {

        private function defaults()

        {

            $defaults = array(

                'page_id' => 0,

                'character_limit' => 25,
                
                'button-text' => esc_html__('Read More','better-health'),

                'bg_image' => ''

            );

            return $defaults;

        }



        public function __construct()

        {

            parent::__construct(

                'better-health-welcome-msg-widget',

                esc_html__('Better Health Welcome Message', 'better-health'),

                array('description' => esc_html__('Better Health Welcome Message', 'better-health'))

            );

        }



        public function widget($args, $instance)

        {



            if (!empty($instance)) {

                $instance = wp_parse_args( (array )$instance, $this->defaults() );

                $page_id = absint($instance['page_id']);

                $limit_character = absint( $instance['character_limit'] );
                
                $button_text = esc_html($instance['button-text']);

                $bgimage = esc_url($instance['bg_image']);

                echo $args['before_widget'];

                if (!empty($page_id)) {

                    $better_health_page_args = array(

                        'page_id' => $page_id,

                        'posts_per_page' => 1,

                        'post_type' => 'page',

                        'no_found_rows' => true,

                        'post_status' => 'publish'

                    );



                  $welcome_query = new WP_Query( $better_health_page_args );

                    if ($welcome_query->have_posts()):

                        while ($welcome_query->have_posts()):$welcome_query->the_post(); ?>



                            <section id="section2" class="section-margine">

                                
                                <div class="container">

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6">

                                            <div class="section-2-box-right row wow fadeInRight">

                                                <h2><?php the_title(); ?></h2>

                                                <p><?php echo esc_html( wp_trim_words(get_the_content(), $limit_character)); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="readmore"><?php echo $button_text; ?> <i class="fa fa-long-arrow-right"></i>
                                            </a>            

                                            </div>
                                        
                                        </div>
                                <?php if(!empty($bgimage)) { ?>        
                                        <div class="col-xs-12 col-sm-6 wel-img">
                                            <div class="half-bg-right accent-bg">      <img src="<?php echo $bgimage; ?>" class="img-responsive">
                                            </div>

                                        </div>
                                 <?php } ?>
                                 
                                    </div>

                                </div>

                            </section>

                            <?php

                        endwhile;

                    endif;

                    wp_reset_postdata();

                    echo $args['after_widget'];

                }

            }

        }



        public function update($new_instance, $old_instance)

        {

            $instance = $old_instance;

            $instance['page_id'] = absint($new_instance['page_id']);

            $instance['character_limit'] = absint( $new_instance['character_limit'] );
            
            $instance['button-text'] = sanitize_text_field($new_instance['button-text']);

            $instance['bg_image'] = esc_url_raw($new_instance['bg_image']);



            return $instance;

        }



        public function form($instance)

        {

            $instance = wp_parse_args((array )$instance, $this->defaults() );

            $page_id = absint($instance['page_id']);

            $limit_character = absint( $instance['character_limit'] );

            $bgimage = esc_url($instance['bg_image']);
            
            $button_text = esc_html($instance['button-text']);

            ?>



            <p>

                <label for="<?php echo esc_attr($this->get_field_id('page_id')); ?>"><?php esc_html_e('Select Page', 'better-health'); ?></label><br/>



                <?php

                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/

                $args = array(

                    'selected' => $page_id,

                    'name' => esc_attr( $this->get_field_name('page_id') ),

                    'id' => esc_attr( $this->get_field_id('page_id') ),

                    'class' => 'widefat',

                    'show_option_none' => esc_html__('Select Page', 'better-health'),

                );

                wp_dropdown_pages($args);

                ?>

            </p>

            <hr>

            <p>

                <label for="<?php echo esc_attr( $this->get_field_id('character_limit')); ?>"><?php esc_html_e('Character Limit', 'better-health'); ?></label><br/>

                <input type="number" name="<?php echo esc_attr( $this->get_field_name('character_limit')); ?>" class="quality-cons" id="<?php echo esc_attr($this->get_field_id('character_limit')); ?>" value="<?php echo $limit_character ?>">

            </p>

            <hr>
            
            <p>

                <label for="<?php echo esc_attr($this->get_field_id('button-text')); ?>">

                    <?php esc_html_e('Button Text', 'better-health'); ?>

                </label><br/>

                <input id="<?php echo esc_attr( $this->get_field_id( 'button-text' )); ?>" type="text" name="<?php echo esc_attr( $this->get_field_name( 'button-text' ) ); ?>" class="widefat" value="<?php echo $button_text; ?>">

            </p>

            <hr>

            <p>

                <label for="<?php echo esc_attr($this->get_field_id('bg_image')); ?>">

                    <?php esc_html_e('Background Image', 'better-health'); ?>

                </label>

                <br/>

                <?php

                if (!empty($bgimage)) :

                    echo '<img class="custom_media_image widefat" src="' . $bgimage . '"/><br />';

                endif;

                ?>

                <input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('bg_image')); ?>" id="<?php echo esc_attr($this->get_field_id('bg_image')); ?>" value="<?php echo $bgimage; ?>"/>

                <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo esc_attr($this->get_field_name('bg_image')); ?>" value="<?php esc_attr_e('Upload Image', 'better-health') ?>"/>

            </p>

            <?php

        }

    }



}



add_action('widgets_init', 'better_health_welcome_msg_widget');

function better_health_welcome_msg_widget()

{

    register_widget('Better_health_Welcome_Msg_Widget');



}































