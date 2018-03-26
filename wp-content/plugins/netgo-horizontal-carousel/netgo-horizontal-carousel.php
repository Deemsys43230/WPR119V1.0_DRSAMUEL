<?php
/*
Plugin Name: Netgo Horizontal Carousel
Plugin URI: http://www.netattingo.com/
Description: Using the plugin we can put horizontal image slider with the help of shortcodes.
Author: NetAttingo Technologies
Version: 1.0.0
Author URI: http://www.netattingo.com/
*/

global $wpdb, $wp_version;
define("NetoCarouselTable", $wpdb->prefix . "netgocarousel");

if ( ! defined( 'NetoCarousel_BASENAME' ) )
	define( 'NetoCarousel_BASENAME', plugin_basename( __FILE__ ) );
	
if ( ! defined( 'NetoCarousel_PLUGIN_NAME' ) )
	define( 'NetoCarousel_PLUGIN_NAME', trim( dirname( NetoCarousel_BASENAME ), '/' ) );
	
if ( ! defined( 'NetoCarousel_PLUGIN_URL' ) )
	define( 'NetoCarousel_PLUGIN_URL', WP_PLUGIN_URL . '/' . NetoCarousel_PLUGIN_NAME );
	
if ( ! defined( 'NetoCarousel_ADMIN_URL' ) )
	define( 'NetoCarousel_ADMIN_URL', get_option('siteurl') . '/wp-admin/options-general.php?page=netgo-horizontal-carousel' );
	
	
//carousel post type to add images	
add_action('init', 'carousel_image_register');
function carousel_image_register() {

	$labels = array(
		'name' => _x('NetGo Carousel', 'post type general name'),
		'singular_name' => _x('Carousel Image', 'post type singular name'),
		'add_new' => _x('Add New Image', 'Carousel Image'),
		'add_new_item' => __('Add New Carousel Image'),
		'edit_item' => __('Edit Carousel Image'),
		'new_item' => __('New Carousel Image'),
		'view_item' => __('View Carousel Image'),
		'search_items' => __('Search Carousel Image'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-format-image',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail' )
	  ); 

	register_post_type( 'carousel-image' , $args );
}

// Carousel Custom Taxonomy
function add_carousel_taxonomies() {

	register_taxonomy('carousel-category', 'carousel-image', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Carousel Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Carousel-Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Carousel-Categories' ),
			'all_items' => __( 'All Review-Categories' ),
			'parent_item' => __( 'Parent Carousel-Category' ),
			'parent_item_colon' => __( 'Parent Carousel-Category:' ),
			'edit_item' => __( 'Edit Carousel-Category' ),
			'update_item' => __( 'Update Carousel-Category' ),
			'add_new_item' => __( 'Add New Carousel-Category' ),
			'new_item_name' => __( 'New Carousel-Category Name' ),
			'menu_name' => __( 'Carousel Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'carousel-category',
			'with_front' => false, 
			'hierarchical' => true 
		),
	));
}
add_action( 'init', 'add_carousel_taxonomies', 0 );


//set featured image in normal  position	
add_action('do_meta_boxes', 'featured_image_move_meta_box');
function featured_image_move_meta_box(){
    remove_meta_box( 'postimagediv', 'carousel-image', 'side' );
    add_meta_box('postimagediv', __('Carousel Image'), 'post_thumbnail_meta_box', 'carousel-image', 'normal', 'high');
}
	
	
//create shortcode to front end carousel	
add_shortcode( 'netgo-carousel-slider', 'NetoCarousel_shortcode' );

function NetoCarousel( $atts ) 
{
	$arr = array();
	$arr["id"]=$atts;
	echo NetoCarousel_shortcode($arr);
}

function NetoCarousel_shortcode( $atts ) 
{  
 
	global $wpdb;
	if ( ! is_array( $atts ) )
	{
		return '';
	}
	$id = $atts['id'];
	
	$sSql = "select * from ".NetoCarouselTable." where 1=1";
	if(is_numeric($id)) 
	{
		$sSql = $sSql . " and cros_id=$id";
	}

	$sSql = $sSql . " LIMIT 0,1";
	$cros = "";
	$imageli = "";
	$data = $wpdb->get_results($wpdb->prepare( $sSql, ''));
	
	
	
	if ( ! empty($data) ) 
	{
		$data = $data[0];
		$cros_id = stripslashes($data->cros_id);
		$cros_viewport = stripslashes($data->cros_viewport);
		$cros_width = stripslashes($data->cros_width);
		$cros_height = stripslashes($data->cros_height);
		$cros_display = stripslashes($data->cros_display);
		$cros_controls = stripslashes($data->cros_controls);
		$cros_interval = stripslashes($data->cros_interval);
		$cros_intervaltime = stripslashes($data->cros_intervaltime);
		$cros_duration = stripslashes($data->cros_duration);
		
		$cros_random = stripslashes($data->cros_random);
		$cros_category  = stripslashes($data->cros_category );
	}
	
	 $options = array(
        'post_type' => 'carousel-image',
        'posts_per_page' => -1,
		'tax_query' => array(
		array(
			'taxonomy' => 'carousel-category',
			'field'    => 'term_id',
			'terms'    => array( $cros_category ),
		),
	),
  		
    );
	
	
    $query = new WP_Query( $options );
	
	$count= $query->post_count;
	?>
    <?php if ( $query->have_posts() ) { ?>
	 
	
	 <?php while ( $query->have_posts() ) : $query->the_post(); ?>
	 <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large' );
	 $large_image_url =$large_image_url['0']
	 ?>
			<?php $imageli = $imageli . '<li><img src="'.$large_image_url.'" /></li>'; ?>
    <?php endwhile;
   
		
     }
	
	if($imageli <> "")
	{ 
	 if($count >= 4){ $count = 4;}
	$tcros_width= ($cros_width+44)*$count ;
$cros = $cros . "<style type='text/css' media='screen'>
#netgo-carousel-slider1 { width:".$tcros_width."px; height: 1%; margin: 6px 0 0; overflow:hidden; position: relative; padding: 10px 50px 10px; background:#f2f2f2; border-radius:4px;}
#netgo-carousel-heading{font-weight:bold; margin-top:17px;}
#netgo-carousel-slider1 .viewport { height: ".$cros_height."px; overflow: hidden; position: relative; }
#netgo-carousel-slider1 .buttons { background: #fff; border-radius: 35px; display: block; position: absolute;
top: 40%; left: 7px; width: 35px; height: 35px; color: #000; font-weight: bold; text-align: center; line-height: 35px; text-decoration: none;
font-size: 22px; }
#netgo-carousel-slider1 .next { right: 7px; left: auto;top: 40%; }
#netgo-carousel-slider1 .buttons:hover{ color: #fff;background: #d7d4d4; }
#netgo-carousel-slider1 .disable { visibility: hidden; }
#netgo-carousel-slider1 .overview { list-style: none; position: absolute; padding: 0; margin: 0; width: ".$cros_width."px; left: 0 top: 0; }
#netgo-carousel-slider1 .overview li{ float: left; margin: 0 20px 0 0; padding: 1px; height: ".$cros_height."px; border: 1px solid #dcdcdc; width: ".$cros_width."px;}
</style>";
	
	    $cros = $cros . '<div class="netgo-main-carousel">';
	    $cros = $cros . '<div id="netgo-carousel-heading">Certification Logo <div class="line-heading"> <span class="line-left"></span> <span class="line-middle">+</span> <span class="line-right"></span>  </div></div>';
		$cros = $cros . '<div id="netgo-carousel-slider1">';
		
		 if($cros_controls== 'true'){
		    $cros = $cros . '<a class="buttons prev" href="#">&#60;</a>';
		 }
			
			$cros = $cros . '<div class="viewport">';
				$cros = $cros . '<ul class="overview">';
					$cros = $cros . $imageli;
				$cros = $cros . '</ul>';
			$cros = $cros . '</div>';
			if($cros_controls== 'true'){
			$cros = $cros . '<a class="buttons next" href="#">&#62;</a>';
			}
		$cros = $cros . '</div>';
		$cros = $cros . '</div>';
		
		$cros = $cros . '<script type="text/javascript">';
		$cros = $cros . 'jQuery(document).ready(function(){';
			$cros = $cros . "jQuery('#netgo-carousel-slider1').tinycarousel({ buttons: ".$cros_controls.", interval: ".$cros_interval.", intervalTime: ".$cros_intervaltime.", animationTime: ".$cros_duration." });";
		$cros = $cros . '});';
		$cros = $cros . '</script>';
	}else{
	 $cros = '<strong>No images are added by you.</strong>';
	}
	return $cros;
}

function NetoCarousel_install() 
{
	global $wpdb, $wp_version;
	if($wpdb->get_var("show tables like '". NetoCarouselTable . "'") != NetoCarouselTable) 
	{
		$sSql = "CREATE TABLE IF NOT EXISTS `". NetoCarouselTable . "` (";
		$sSql =$sSql . "`cros_id` INT NOT NULL AUTO_INCREMENT ,";
		$sSql =$sSql . "`cros_viewport` int(11) NOT NULL default '473' ,";
		$sSql =$sSql . "`cros_width` int(11) NOT NULL default '200' ,";
		$sSql =$sSql . "`cros_height` int(11) NOT NULL default '150' ,";
		$sSql =$sSql . "`cros_display` int(11) NOT NULL default '1' ,";
		$sSql =$sSql . "`cros_controls` VARCHAR( 5 ) NOT NULL default 'true',";
		$sSql =$sSql . "`cros_interval` VARCHAR( 5 ) NOT NULL default 'true',";
		$sSql =$sSql . "`cros_intervaltime` int(11) NOT NULL default '3000' ,";
		$sSql =$sSql . "`cros_duration` int(11) NOT NULL default '2000' ,";
		$sSql =$sSql . "`cros_category` VARCHAR( 255 ) NOT NULL,";
		$sSql =$sSql . "`cros_random` VARCHAR( 3 ) NOT NULL default 'NO',";
		$sSql =$sSql . "PRIMARY KEY ( `cros_id` )";
		$sSql =$sSql . ") ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
		$wpdb->query($wpdb->prepare($sSql ,''));
	
	}
}

function NetoCarousel_deactivation() 
{
	// No action required.
}

function NetoCarousel_admin()
{
	global $wpdb;
	$current_page = isset($_GET['ac']) ? $_GET['ac'] : '';
	switch($current_page)
	{
		case 'edit':
			include('pages/image-management-edit.php');
			break;
		case 'add':
			include('pages/image-management-add.php');
			break;
		case 'set':
			include('pages/widget-setting.php');
			break;
		default:
			include('pages/image-management-show.php');
			break;
	}
}

function NetoCarousel_add_to_menu() 
{
	add_menu_page(" ", " ", "administrator", 'netgo-horizontal-carousel', 'NetoCarousel_admin', '' );
	add_submenu_page( 'edit.php?post_type=carousel-image', 'Shortcode Settings', 'Shortcode Settings', 'manage_options', 'netgo-horizontal-carousel', '' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'NetoCarousel_add_to_menu');
}

//function to add javascript
function NetoCarousel_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'jquery.netocarousel.min', get_option('siteurl').'/wp-content/plugins/netgo-horizontal-carousel/include/jquery.netocarousel.js');
	    
	}
	
}   

//register text domain
function NetoCarousel_textdomain() 
{
	  load_plugin_textdomain( 'NetoCarousel', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

//add admin css
function netgo_admin_css() {
  wp_register_style('admin_css', plugins_url('include/admin-styles.css',__FILE__ ));
  wp_enqueue_style('admin_css');
}

add_action( 'admin_init','netgo_admin_css');
add_action('plugins_loaded', 'NetoCarousel_textdomain');
add_action('wp_enqueue_scripts', 'NetoCarousel_add_javascript_files');
register_activation_hook(__FILE__, 'NetoCarousel_install');
register_deactivation_hook(__FILE__, 'NetoCarousel_deactivation');

?>