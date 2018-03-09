<?php
if (!class_exists('Better_Health_Testimonial_Widget')) {
    class Better_Health_Testimonial_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'bg_image' => '',
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'better-health-testimonial-widget',
                esc_html__('Better Health Testimonial Widget', 'better-health'),
                array('description' => esc_html__('Better Health Section', 'better-health'))
            );
        }

        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $catid = absint($instance['cat_id']);
                $bgimage = esc_url($instance['bg_image']);
                $category = get_category( $catid );
                $count = $category->category_count;
                echo $args['before_widget'];

                if ($count > 0) {
                    ?>
                  

                    <!-- NEW -->
                    <!--start testimonial Section-->
                    <section class="section-margine" style=" <?php if(!empty($bgimage)) { ?>background: url(<?php echo($bgimage); ?>) no-repeat center;<?php } else { ?> background: rgba(0, 65, 65, 1);   <?php } ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="bh-testimonial owl-carousel">
                                   
                                        <?php if (!empty($catid)) {
                                                $i = 0;
                                                $sticky = get_option('sticky_posts');
                                                $home_testimonial_section = array(
                                                    'cat' => $catid,
                                                    'posts_per_page' => -1,
                                                    'ignore_sticky_posts' => true,
                                                    'post__not_in' => $sticky,

                                                );
                                                $home_testimonial_section_query = new WP_Query($home_testimonial_section);
                                                if ($home_testimonial_section_query->have_posts()) {
                                                    while ($home_testimonial_section_query->have_posts()) {
                                                        $home_testimonial_section_query->the_post();
                                                        ?>
                                   
                                                <div class="item">
                                                  <div class="testimonial-wrapper text-center">
                                             <?php 
                                                if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true);
                                                 ?>       
                                                  
                                                    <div class="thumb"><img class="img-circle img-thumbnail" alt="" src="<?php echo esc_url($image_url[0]); ?>"></div>
                                        <?php } ?>            
                                                    <div class="test-content">
                                                      <p class="text-white"><?php echo get_the_content() ?></p>
                                                      <h4 class="author text-white"><?php the_title(); ?></h4>
                                                     
                                                    </div>
                                                  </div>
                                                </div>
                                    
                                    <?php
                                                $i++;
                                            }
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                                   
                                  </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <?php
                }
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['bg_image'] = esc_url_raw($new_instance['bg_image']);
            return $instance;
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);
            $bgimage = esc_url($instance['bg_image']);
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>"><?php esc_html_e('Select Category', 'better-health'); ?></label><br/>
                <?php
                $quality_dropown_cat = array(
                    'show_option_none' => esc_html__('Select Category', 'better-health'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr( $this->get_field_name('cat_id')),
                    'id' => esc_attr( $this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($quality_dropown_cat);
                ?>
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

add_action('widgets_init', 'better_health_testimonial_widget');
function better_health_testimonial_widget()
{
    register_widget('Better_Health_Testimonial_Widget');

}















