<?php
/**
 * Better Health functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Canyon Themes
 * @subpackage Better Health
 */

if (!function_exists('better_health_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function better_health_setup()
    {
        /*
         * Make theme available for translation.
        */

         load_theme_textdomain( 'better-health' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */

        add_theme_support('post-thumbnails');
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'better-health'),
            'social-link' => esc_html__('Social Link', 'better-health'),
        ));

        /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('better-health_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'better_health_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function better_health_content_width()
{
    $GLOBALS['content_width'] = apply_filters('better_health_content_width', 640);
}

add_action('after_setup_theme', 'better_health_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function better_health_widgets_init()
{


    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'better-health'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'better-health'),
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Home Page Widget Area', 'better-health'),
        'id' => 'better-health-home-page',
        'description' => esc_html__('Add widgets here to appear in Home Page', 'better-health'),
        'before_widget' => '',
        'after_widget' => '',

    ));

    register_sidebar(array(
        'name' => esc_html__('Our Treatment Gallery Page Widget Area', 'better-health'),
        'id' => 'better-health-treatment-gallery',
        'description' => esc_html__('Add widgets here to appear in Treatment Gallery Page', 'better-health'),
        'before_widget' => '',
        'after_widget' => '',

    ));

       register_sidebar(array(
        'name' => esc_html__('Footer 1', 'better-health'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'better-health'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'better-health'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'better-health'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'better-health'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'better-health'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'better-health'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'better-health'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'better_health_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function better_health_scripts()
{

    /*Bootstrap*/
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.5.1');

    wp_enqueue_style('bootstrap-dropdownhover', get_template_directory_uri() . '/assets/css/bootstrap-dropdownhover.min.css', array(), '4.5.0');

    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.5.0');

   /*google font  */
     wp_enqueue_style('better-health-googleapis', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800|Roboto:300,400', array(), null);

    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.5.0');

    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '4.5.0');

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '4.5.0');

    wp_enqueue_style('better-health-style', get_stylesheet_uri());

    wp_enqueue_style('better-health-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.0');

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('bootstrap-dropdownhover', get_template_directory_uri() . '/assets/js/bootstrap-dropdownhover.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), '20151215', true);

    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '20151215', true);

    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '20151215', true);
       
    wp_enqueue_script('better-health-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'better_health_scripts');

/**
 * Implement the default Function.
 */
require get_template_directory() . '/inc/customizer/default.php';

/**
 * Implement the default file.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Bootstrap Navwalder class.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Customizer Home layout.
 */
require get_template_directory() . '/layouts/homepage-layout/better-health-home-layout.php';

/**
 * Load Reset css file
 */
require get_template_directory() . '/inc/hooks/reset-css.php';

/**
 * Load Theme function.
 */
require get_template_directory() . '/inc/theme-function.php';

/**
 * Load breadcrumb_trail File
 */
if (!function_exists('breadcrumb_trail')) {
   require get_template_directory() . '/library/breadcrumbs/breadcrumbs.php';
}

/**
 * Load Dynamic css File
 */

include get_template_directory() . '/inc/hooks/dynamic-css.php';


/**
 * define size of logo.
 */

if (!function_exists('better_health_custom_logo_setup')) :
    function better_health_custom_logo_setup()
    {
        add_theme_support('custom-logo', array(
            'height' => 290,
            'width' => 70,
            'flex-height' => true,
            'flex-width' => true
        ));
    }

    add_action('after_setup_theme', 'better_health_custom_logo_setup');
endif;



/**
 * Exclude category in blog/archive page
 *
 * @since Better Health 1.0.0
 *
 * @param null
 * @return int
 */
if (!function_exists('better_health_exclude_category_in_blog_page')) :
    function better_health_exclude_category_in_blog_page($query)
    {

        if ($query->is_home && $query->is_main_query()) {
            $catid = better_health_get_option('better_health_exclude_cat_blog_archive_option');
            $exclude_categories = $catid;
            if (!empty($exclude_categories)) {
                $cats = explode(',', $exclude_categories);
                $cats = array_filter($cats, 'is_numeric');
                $string_exclude = '';
                echo $string_exclude;
                if (!empty($cats)) {
                    $string_exclude = '-' . implode(',-', $cats);
                    $query->set('cat', $string_exclude);
                }
            }
        }
        return $query;
    }
endif;
add_filter('pre_get_posts', 'better_health_exclude_category_in_blog_page');    


/**
 * Load Dynamic css file.
 */
$dynamic_css_options = better_health_get_option('better_health_color_reset_option');

if ($dynamic_css_options == "do-not-reset" || $dynamic_css_options == "") {

    include get_template_directory() . '/inc/hooks/dynamic-css.php';

} elseif ($dynamic_css_options == "reset-all") {
    do_action('better_health_colors_reset');
}


