<?php
if (!class_exists('Better_Health_Recent_Post_Widget')) {
    class Better_Health_Recent_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => -1,
                'title' => esc_html__('Recent Posts','better-health'),
                'sub-title' => '',

            );
            return $defaults;
        }

     public function __construct()
        {
            parent::__construct(
                'better-health-recent-post-widget',
                esc_html__('Better Health Recent Post Widget', 'better-health'),
                array('description' => esc_html__('Better Health Recent Post Section', 'better-health'))
            );
        }

        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );
                echo $args['before_widget'];
                $catid = absint( $instance['cat_id'] );
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
                $subtitle =  esc_html( $instance['sub-title'] );

                ?>
                <section id="section14" class="section-margine">
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
                        </div>
                        <div class="row">
                            <?php
                        $readme_text = better_health_get_option( 'better_health_read_more_text_blog_archive_option');

                            $i = 0;
                            $sticky = get_option( 'sticky_posts' );
                            if ($catid != -1) {
                                $home_recent_post_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post__not_in' => $sticky,
                                    'cat' => $catid,
                                    'posts_per_page' => 3,
                                    'order' => 'DESC'
                                );
                            } else {
                                $home_recent_post_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post__not_in' => $sticky,
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'order' => 'DESC'
                                );
                            }

                            $home_recent_post_section_query = new WP_Query($home_recent_post_section);

                            if ($home_recent_post_section_query->have_posts()) {
                                while ($home_recent_post_section_query->have_posts()) {
                                    $home_recent_post_section_query->the_post();
                                    ?>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="section-14-box wow fadeInUp <?php if ( !has_post_thumbnail() ) {
                                            echo "no-image";
                                        } ?> " data-wow-delay="<?php echo esc_attr($i); ?>s">
                                            
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                                                ?>
                                                <img src="<?php echo esc_url($image_url[0]); ?>" class="img-responsive">
                                            <?php }
                                            ?>
                                            <div class="heading-date-cat">
                                                <div class="front-blog-date">
                                                    <a class="btn btn-primary btn-sm">
                                                        <span class="publish-date"> <?php echo esc_html( get_the_date('d') ); ?> </span>
                                                        <span class="publish-month"><?php echo esc_html( get_the_date('M') ); ?></span>
                                                    </a>
                                                </div>
                                                <div class="fornt-blog-title-cat">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-user-o"></i><?php the_author(); ?></a>
                                                </div>
                                            
                                            </div>
                                            <p><?php echo esc_html( wp_trim_words( get_the_content(), 20 ) ); ?></p>
                                            <a href="<?php the_permalink(); ?>" class="readmore"> <?php echo esc_html($readme_text); ?><i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                     <?php
                                    $i++;
                                }
                            }
                            wp_reset_postdata();
                            ?>
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
            $instance['cat_id'] = (isset( $new_instance['cat_id'] ) ) ? absint($new_instance['cat_id']) : '';
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['sub-title'] = sanitize_text_field( $new_instance['sub-title'] );

            return $instance;

        }

        public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $catid = absint( $instance['cat_id'] );
            $title = esc_attr( $instance['title'] );
            $subtitle =  esc_attr( $instance['sub-title'] );

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
                    <?php esc_html_e('Select Category', 'better-health'); ?>
                </label><br/>
                <?php
                $quality_con_dropown_cat = array(
                    'show_option_none' => esc_html__('From Recent Posts', 'better-health'),
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
                wp_dropdown_categories( $quality_con_dropown_cat );
                ?>
            </p>
            <hr>
            <?php
        }
    }
}
add_action('widgets_init', 'better_health_recent_post_widget');
function better_health_recent_post_widget()
{
    register_widget('Better_Health_Recent_Post_Widget');

}















