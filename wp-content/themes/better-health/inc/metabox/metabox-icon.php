<?php
if( !class_exists( 'Better_Health_Font_awesome_Class_Metabox') ){
    class Better_Health_Font_awesome_Class_Metabox {

        public function __construct()
        {

            add_action( 'add_meta_boxes', array( $this, 'better_health_icon_metabox') );

            add_action( 'save_post', array( $this, 'better_health_save_icon_value') );
        }


        public function better_health_icon_metabox()
        {

            add_meta_box(
                    'better_health_icon',
                    esc_html__('Font Awesome class', 'better-health'),
                    array(
                            $this, 'better_health_generate_icon'),
                    'post',
                    'side',
                    'high'
            );

            add_meta_box(
                    'better_health_icon',
                    esc_html__('Font Awesome class', 'better-health'),
                    array(
                            $this, 'better_health_generate_icon'),
                    'page',
                    'side',
                    'high'
            );
        }

        public function better_health_generate_icon($post)
        {
            $values = get_post_meta( $post->ID, 'better_health_icon', true );
            wp_nonce_field( basename(__FILE__), 'better_health_fontawesome_fields_nonce');
            ?>
            <input type="text" name="icon" value="<?php echo esc_html($values) ?>" />
            <br/>
            <small>
                <?php
                esc_html_e( 'Font Awesome Icon Used in Post', 'better-health' );
                printf( __( '%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'better-health' ), '<br /><a href="'.esc_url( 'http://fontawesome.io/cheatsheet/' ).'" target="_blank">','</a>',"<code>","</code>" );
                ?>
            </small>
            <?php
        }

        public function better_health_save_icon_value($post_id)
        {

            /*
                * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
                *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
                * */
            if (
                !isset($_POST['better_health_fontawesome_fields_nonce']) ||
                !wp_verify_nonce($_POST['better_health_fontawesome_fields_nonce'], basename(__FILE__)) || /*Protecting against unwanted requests*/
                (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || /*Dealing with autosaves*/
                !current_user_can('edit_post', $post_id)/*Verifying access rights*/
            ) {
                return;
            }

            //Execute this saving function
            if (isset($_POST['icon']) && !empty($_POST['icon'])) {
                $fontawesomeclass = sanitize_text_field( $_POST['icon'] );
                update_post_meta($post_id, 'better_health_icon', $fontawesomeclass);
            }
        }
    }
}
$productsMetabox = new Better_Health_Font_awesome_Class_Metabox;




