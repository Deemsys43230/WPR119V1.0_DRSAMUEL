<?php
if (!class_exists('Better_Health_Our_mission_Widget')) {
    class Better_Health_Our_mission_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'page_id' => '',
                'button-text' => esc_html__('Learn More','better-health'),
                'button-text-link' => '#',
                'background-image' => '',
                'character_limit' => 100,
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'better-health-our-mission-widget',
                esc_html__('Better Health Our Misson Page', 'better-health'),
                array('description' => esc_html__(' Better Health Our Mission Page', 'better-health'))
            );
        }

        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args((array)$instance, $this->defaults());
                $page_id = absint($instance['page_id']);
                $button_text = esc_html($instance['button-text']);
                $button_url = esc_url($instance['button-text-link']);
                $bgimage = esc_url($instance['background-image']);
                $limit_character = absint( $instance['character_limit'] );

                echo $args['before_widget'];
                $better_health_page_args = array(
                    'page_id' => $page_id,
                    'posts_per_page' => 1,
                    'post_type' => 'page',
                    'no_found_rows' => true,
                    'post_status' => 'publish'
                );
                $mission_query = new WP_Query($better_health_page_args);
                if ($mission_query->have_posts()):
                    while ($mission_query->have_posts()):$mission_query->the_post();
                        if (has_post_thumbnail()) {
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                            $image_path = $image_url[0];
                        }
                        ?>

                        <section id="section5" class="section-margine section-5-background clearfix"
                                 style="background: url(<?php echo $bgimage; ?>) no-repeat;">
                                    <div class="col-md-<?php if (empty($image_path)) {
                                        echo "12";
                                    } else {
                                        echo "6";
                                    } ?>">
                                        <div class="section-5-box-text-cont wow fadeInRight">
                                            <h2><?php the_title(); ?></h2>
                                            <p><?php echo esc_html( wp_trim_words(get_the_content(), $limit_character) ); ?></p>
                                            <?php
                                            if (!empty( $button_text ) && !empty($button_url) ) {
                                                ?>
                                                <a href="<?php echo $button_url; ?>
                                                " class="btn btn-primary">
                                                  <?php echo $button_text; ?> </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($image_path)) { ?>
                                        <div class="col-md-6">
                                            <div class="section-5-box-img-cont row wow fadeInLeft">
                                                <img src="<?php echo esc_url( $image_path ); ?>" class="img-responsive">
                                            </div>
                                        </div>
                                    <?php } ?>
                        </section>

                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['page_id'] = absint($new_instance['page_id']);
            $instance['button-text'] = sanitize_text_field($new_instance['button-text']);
            $instance['button-text-link'] = esc_url_raw($new_instance['button-text-link']);
            $instance['background-image'] = esc_url_raw($new_instance['background-image']);
            $instance['character_limit'] = absint( $new_instance['character_limit'] );
            return $instance;
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults());
            $page_id = absint($instance['page_id']);
            $button_text = esc_html($instance['button-text']);
            $button_url = esc_url($instance['button-text-link']);
            $bgimage = esc_url($instance['background-image']);
            $limit_character = absint( $instance['character_limit'] );
            
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('page_id')); ?>">
                    <?php esc_html_e( 'Select Page', 'better-health' ); ?>
                </label><br/>
                <?php
                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                $args = array(
                    'selected' => $page_id,
                    'name' => $this->get_field_name( 'page_id' ),
                    'id' => $this->get_field_id( 'page_id' ),
                    'class' => 'widefat',
                    'show_option_none' => esc_attr__( 'Select Page', 'better-health' )
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
                <label for="<?php echo esc_attr($this->get_field_id('button-text-link')); ?>"><?php esc_html_e('Button Link', 'better-health'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('button-text-link') ); ?>" class="widefat"  id="<?php echo esc_attr( $this->get_field_id('button-text-link')); ?>"  value="<?php echo $button_url; ?>">
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('background-image') ); ?>">
                    <?php esc_html_e('Background Image', 'better-health'); ?>
                </label>
                <br/>
                <?php
                if ( !empty( $bgimage ) ) :
                    echo '<img class="custom_media_image widefat" src="' . esc_url( $instance['background-image'], 'better-health') . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                endif;
                ?>
                <input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('background-image')); ?>"  id="<?php echo esc_attr($this->get_field_id('background-image')); ?>" value="<?php echo $bgimage; ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                       name="<?php echo esc_attr( $this->get_field_name('background-image')); ?>"
                       value="<?php esc_attr_e('Upload Image', 'better-health') ?>"/>
            </p>
            <?php
        }
    }
}
add_action('widgets_init', 'better_health_our_mission_widget');
function better_health_our_mission_widget()
{
    register_widget('Better_Health_Our_mission_Widget');

}















