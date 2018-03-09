<?php
if( !class_exists( 'Better_Health_Services_Widget') ){
    class Better_Health_Services_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'title' => esc_html__('Service Title','better-health'),
                'sub-title' => '',
                'image' => '',
            );
            return $defaults;
        }
        public function __construct()
        {
            parent::__construct(
                'better-health-service-widget',
                esc_html__('Better Health Service Widget', 'better-health'),
                array('description' => esc_html__('Better Health Service Section', 'better-health'))
            );
        }

        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults ());
                echo $args['before_widget'];
                $catid = absint( $instance['cat_id'] );
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
                $subtitle =  esc_html( $instance['sub-title'] );
                $image = esc_url( $instance['image'] );
                ?>
                <section id="section4" class="section-margine section-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <header class="title-head">
                                    <?php
                                    if (!empty( $title )) {
                                        ?>
                                        <h2><?php echo $args['before_title'] . $title . $args['after_title']; ?></h2>
                                    <?php }
                                    if (!empty( $subtitle )) {
                                        ?>
                                        <p><?php echo $subtitle; ?></p>
                                    <?php } ?>
                                  <div class="line-heading">
                                    <span class="line-left"></span>
                                    <span class="line-middle">+</span>
                                    <span class="line-right"></span>
                                  </div>
                                </header>
                              </div>
                            <div class="col-md-4 col-sm-6 right wow fadeInUp">
                                    <?php
                                    $idvalue = array();
                                    if ( !empty( $catid ) ) {
                                        $i = 0;
                                        $sticky = get_option( 'sticky_posts' );
                                        $home_services_section = array(
                                            'cat' => $catid,
                                            'posts_per_page' => 2,
                                            'ignore_sticky_posts' => true,
                                            'post__not_in' => $sticky,
                                            'order' => 'ASC'
                                        );
                                        $home_services_section_query = new WP_Query( $home_services_section );
                                        if ($home_services_section_query->have_posts()) {
                                            while ($home_services_section_query->have_posts()) {
                                                $home_services_section_query->the_post();
                                                $icon = get_post_meta( get_the_ID(), 'better_health_icon', true );
                                                $idvalue[] = get_the_ID();
                                                ?>

                                                <ul class="section">
                                                        <li class="left">
                                                            <i class="fa <?php echo esc_attr($icon); ?>"></i>
                                                        </li>
                                                        <li><strong><?php the_title(); ?></strong>
                                                            <p><?php echo esc_html( wp_trim_words( get_the_content(), 16) ); ?></p>
                                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                                                <?php esc_html_e('Know More', 'better-health'); ?>
                                                                <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                </ul>
                                                <?php
                                                $i++;
                                            }

                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                            </div>
                            <?php if ( !empty( $image ) ) { ?>
                                <div class="col-md-4  hidden-sm hidden-xs left wow fadeInUp">
                                    <figure class="service-img"><img src="<?php echo $image; ?>" class="img-responsive" /></figure>
                                </div>
                            <?php } ?>
                            <div class="col-md-4 col-sm-6 right wow fadeInUp">
                                    <?php
                                    if ( !empty( $catid ) ) {
                                        $i = 0;
                                        $sticky = get_option( 'sticky_posts' );
                                        $post_not=array_merge($sticky,$idvalue);
                                        $home_services_section = array(
                                            'cat' => $catid,
                                            'posts_per_page' => 2,
                                            'ignore_sticky_posts' => true,
                                            'post__not_in' => $post_not ,
                                            'order' => 'ASC'
                                        );
                                        $home_services_section_query = new WP_Query( $home_services_section );
                                        if ($home_services_section_query->have_posts()) {
                                            while ($home_services_section_query->have_posts()) {
                                                $home_services_section_query->the_post();
                                                $icon = get_post_meta( get_the_ID(), 'better_health_icon', true );
                                               
                                                ?>

                                                <ul class="section">
                                                        <li class="left">
                                                            <i class="fa <?php echo esc_attr($icon); ?>"></i>
                                                        </li>
                                                        <li><strong><?php the_title(); ?></strong>
                                                            <p><?php echo esc_html( wp_trim_words( get_the_content(), 16) ); ?></p>
                                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                                                                <?php esc_html_e('Know More', 'better-health'); ?>
                                                                <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                </ul>
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
                </section>
                <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['sub-title'] = sanitize_text_field( $new_instance['sub-title'] );
            $instance['image'] = esc_url_raw( $new_instance['image'] );
            return $instance;

        }

        public function form($instance)
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $catid = absint( $instance['cat_id'] );
            $title = esc_attr( $instance['title'] );
            $subtitle =  esc_attr( $instance['sub-title'] );
            $image = esc_url( $instance['image'] );
            ?>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'better-health'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo $title; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('sub-title') ); ?>">
                    <?php esc_html_e( 'Sub Title', 'better-health'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('sub-title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub-title')); ?>" value="<?php echo $subtitle; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('cat_id') ); ?>">
                    <?php esc_html_e( 'Select Category', 'better-health'); ?>
                </label><br />
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
                    'name' => esc_attr( $this->get_field_name('cat_id') ),
                    'id' => esc_attr( $this->get_field_name('cat_id') ),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories( $quality_dropown_cat );
                ?>
            </p>
            <hr>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('image') ); ?>">
                    <?php esc_html_e('Image Size[243 X 470]', 'better-health'); ?>
                </label>
                <br/>
                <?php
                if ( !empty( $image ) ) :
                    echo '<img class="custom_media_image widefat" src="' . $image . '"/><br />';
                endif;
                ?>
                <input type="text" class="widefat custom_media_url" name="<?php echo esc_attr( $this->get_field_name('image') ); ?>" id="<?php echo esc_attr( $this->get_field_id('image') ); ?>" value="<?php echo $image; ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo esc_attr( $this->get_field_name('image') ); ?>" value="<?php esc_attr_e('Upload Image', 'better-health') ?>" />
            </p>
            <?php
        }
    }
}


add_action('widgets_init', 'better_health_service_widget');
function better_health_service_widget() {
    register_widget('Better_Health_Services_Widget' );
}