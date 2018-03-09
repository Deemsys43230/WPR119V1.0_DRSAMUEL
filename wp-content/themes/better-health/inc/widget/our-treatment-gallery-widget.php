<?php
if (!class_exists('Better_Health_Treatment_Gallery_Widget'))
{
    class Better_Health_Treatment_Gallery_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'title' => esc_html__('Our Treatment Gallery', 'better-health'),
                'better_health_portfolio_filter_all' => esc_html__('All', 'better-health'),
                'cat_id' => array(),
                'featured_image_size' => 'full',
                'post_column' => 3,
                'post_number' => 6,
            );
            return $defaults;
        }


        public function __construct()
        {
            parent::__construct(
                    'better-health-our-treatment-gallery-widget',
                    esc_html__('Better Health Our Treatment Gallery Widget', 'better-health'),
                    array('description' => esc_html__('Better Health Our Treatment Gallery Section', 'better-health'))
               );
        }

        public function widget($args, $instance)
        {

            $instance = wp_parse_args((array)$instance, $this->defaults());
            if (!empty($instance))
             {
                $post_number = absint($instance['post_number']);
                $column_number = absint($instance['post_column']);
                $featured_image = esc_html($instance['featured_image_size']);
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $better_health_ad_title = esc_html($instance['better_health_portfolio_filter_all']);
                $better_health_selected_cat = '';
                if (!empty($instance['cat_id']))
                {
                    $better_health_selected_cat = better_health_sanitize_multiple_category($instance['cat_id']);
                    if (is_array($better_health_selected_cat[0]))
                    {
                        $better_health_selected_cat = $better_health_selected_cat[0];
                    }
                }

                echo $args['before_widget'];
                ?>
                <section id="section-12">
                    <div class="container-fluid">
                        <?php
                        $sticky = get_option('sticky_posts');
                        $better_health_cat_post_args = array(
                            'posts_per_page' => $post_number,
                            'no_found_rows' => true,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true,
                            'post__not_in' => $sticky,
                        );
                        if (-1 != $better_health_cat_post_args)
                        {
                            $better_health_cat_post_args['category__in'] = $better_health_selected_cat;
                        }
                        $portfolio_filter_query = new WP_Query($better_health_cat_post_args);

                        ?>
                        <div class="row">
                            <div class="title-content-our">
                                <h2 class="text-center"><?php echo $title; ?></h2>
                                <div class="portfolioFilter text-center">
                                    <?php
                                    if (!empty($better_health_ad_title))
                                    {
                                        echo '<a href="#" data-filter="*" class="current">' . $better_health_ad_title . '</a>';
                                    }

                                    if (!empty($better_health_selected_cat) && is_array($better_health_selected_cat))
                                    {
                                        foreach ($better_health_selected_cat as $better_health_selected_single_cat)
                                        {

                                            echo ' <a href="#" data-filter=".' . esc_attr($better_health_selected_single_cat) . '">' . esc_html(get_cat_name($better_health_selected_single_cat)) . '</a>';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                                <div class="portfolioContainer">
                                    <?php
                                    if ($portfolio_filter_query->have_posts()):
                                        while ($portfolio_filter_query->have_posts()):$portfolio_filter_query->the_post();

                                            if (2 == $column_number)
                                            {
                                                $better_health_column = "col-md-6";
                                            } elseif (3 == $column_number)
                                            {
                                                $better_health_column = "col-md-4";
                                            } elseif (4 == $column_number)
                                            {
                                                $better_health_column = 'col-md-3';
                                            }
                                            else
                                            {
                                                $better_health_column = 'col-md-12';
                                            }

                                            $categories = get_the_category(get_the_ID());
                                            if (!empty($categories))
                                            {
                                                foreach ($categories as $category)
                                                {
                                                    $better_health_column .= ' ' . $category->term_id;
                                                }
                                            }
                                            if ( has_post_thumbnail() )
                                            {
                                                $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, $featured_image, true);
                                                $image_path = $image_url[0];
                                                ?>
                                                <div class="<?php echo esc_attr($better_health_column); ?> col-sm-4 col-xs-12  isotope-image-work text-center">
                                                <div class="test-work">
                                                    <a class="magnific-popup" href="<?php echo esc_url($image_path); ?>">
                                                        <img src="<?php echo esc_url($image_path); ?>" class="img-responsive wow zoomIn" alt="image">
                                                        <div class="overlay-hidden">
                                                            <div class="overlay">
                                                                <div class="text">
                                                                <h4><?php the_title(); ?></h4>
                                                                <i class="fa fa-search-plus" aria-hidden="true"></i></div>
                                                           
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                </div>
                                                <?php
                                            }
                                        endwhile;
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div><!--portfolioContainer-->
                            </div><!--col-md-12-->
                        </div><!--.row-->
                    </div><!--.container-->
                </section><!--section-->
                <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? better_health_sanitize_multiple_category( $new_instance['cat_id'] ) : array();
            $instance['better_health_portfolio_filter_all'] = sanitize_text_field($new_instance['better_health_portfolio_filter_all']);
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['post_number'] = absint( $new_instance['post_number'] );
            $instance['post_column'] = absint( $new_instance['post_column']);
            $instance['featured_image_size'] = sanitize_text_field($new_instance['featured_image_size']);

            return $instance;
        }

        public function form($instance)
        {

            $instance = wp_parse_args( (array )$instance, $this->defaults() );
            $post_number = absint($instance['post_number']);
            $column_number = absint($instance['post_column']);
            $featured_image_size = esc_attr($instance['featured_image_size']);
            $title = esc_attr($instance['title']);
            $better_health_ad_title = esc_attr($instance['better_health_portfolio_filter_all']);
            $better_health_selected_cat = '';
            if (!empty($instance['cat_id']))
            {
                $better_health_selected_cat = $instance['cat_id'];
                if (is_array($better_health_selected_cat[0]))
                {
                    $better_health_selected_cat = $better_health_selected_cat[0];
                }
            }
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'better-health'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('better_health_portfolio_filter_all')); ?>"><strong><?php esc_html_e('Our Work Filter All Text', 'better-health'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('better_health_portfolio_filter_all')); ?>" name="<?php echo esc_attr($this->get_field_name('better_health_portfolio_filter_all')); ?>" type="text" value="<?php echo $better_health_ad_title; ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>"><strong><?php esc_html_e('Select Category', 'better-health'); ?></strong></label>
                <select class="widefat" name="<?php echo $this->get_field_name('cat_id'); ?>[]" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" multiple="multiple">
                    <?php
                    $option = '';
                    $categories = get_categories();
                    if ($categories)
                    {
                        foreach ($categories as $category)
                        {
                            $result = in_array($category->term_id, $better_health_selected_cat) ? 'selected=selected' : '';
                            $option .= '<option value="' . esc_attr($category->term_id) . '"' . esc_attr($result) . '>';
                            $option .= esc_html($category->cat_name);
                            $option .= esc_html(' (' . $category->category_count . ')');
                            $option .= '</option>';
                        }
                    }
                    echo $option;
                    ?>
                </select>
            </p>
            <hr>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'better-health'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_column')); ?>"><strong><?php esc_html_e('Number of Columns:', 'better-health'); ?></strong></label>
                <?php
                $this->dropdown_post_columns(
                    array(
                        'id' => esc_attr($this->get_field_id('post_column')),
                        'name' => esc_attr($this->get_field_name('post_column')),
                        'selected' => $column_number
                    )
                );
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('featured_image_size')); ?>"><strong><?php esc_html_e('Select Image Size:', 'better-health'); ?></strong></label>
                <?php
                $this->dropdown_image_sizes(array(
                        'id' => esc_attr($this->get_field_id('featured_image_size')),
                        'name' => esc_attr($this->get_field_name('featured_image_size')),
                        'selected' => $featured_image_size,
                    )
                );
                ?>
            </p>
            <?php

        }

        function dropdown_post_columns($args)
        {
            $defaults = array(
                'id' => '',
                'name' => '',
                'selected' => 0,
            );

            $result = wp_parse_args($args, $defaults);
            $output = '';

            $choices = array(
                2 => esc_html__('2', 'better-health'),
                3 => esc_html__('3', 'better-health'),
                4 => esc_html__('4', 'better-health'),
            );

            if (!empty($choices))
            {

                $output = "<select name='" . esc_attr($result['name']) . "' id='" . esc_attr($result['id']) . "'>\n";
                foreach ($choices as $key => $choice) {
                    $output .= '<option value="' . esc_attr($key) . '" ';
                    $output .= selected($result['selected'], $key, false);
                    $output .= '>' . esc_html($choice) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }

        function dropdown_image_sizes($args)
        {
            $defaults = array(
                'id' => '',
                'class' => 'widefat',
                'name' => '',
                'selected' => 0,
            );

            $result = wp_parse_args($args, $defaults);
            $output = '';

            $choices = array(
                'thumbnail' => esc_html__('Thumbnail', 'better-health'),
                'medium' => esc_html__('Medium', 'better-health'),
                'large' => esc_html__('Large', 'better-health'),
                'full' => esc_html__('Full', 'better-health'),
            );

            if (!empty($choices))
            {

                $output = "<select name='" . esc_attr($result['name']) . "' id='" . esc_attr($result['id']) . "' class='" . esc_attr($result['class']) . "'>\n";
                foreach ($choices as $key => $choice)
                {
                    $output .= '<option value="' . esc_attr($key) . '" ';
                    $output .= selected($result['selected'], $key, false);
                    $output .= '>' . esc_html($choice) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }

    }
}

add_action('widgets_init', 'better_health_treatment_gallery_widget');
function better_health_treatment_gallery_widget()
{
    register_widget('Better_Health_Treatment_Gallery_Widget');

}















