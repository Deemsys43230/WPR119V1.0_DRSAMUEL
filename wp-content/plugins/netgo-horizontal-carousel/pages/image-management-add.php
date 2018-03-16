<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
<?php
$cros_errors = array();
$cros_success = '';
$cros_error_found = FALSE;

// Preset the form fields
$form = array(
	'cros_viewport' => '',
	'cros_width' => '',
	'cros_height' => '',
	'cros_display' => '',
	'cros_controls' => '',
	'cros_interval' => '',
	'cros_intervaltime' => '',
	'cros_duration' => '',
	'cros_category' => '',
	'cros_random' => '',
	'cros_id' => ''
);


//sanitize post values
$cros_form_submit = sanitize_text_field( $_POST['cros_form_submit'] );
$cros_viewport = sanitize_text_field( $_POST['cros_viewport'] );
$cros_width = sanitize_text_field( $_POST['cros_width'] );
$cros_height = sanitize_text_field( $_POST['cros_height'] );
$cros_display = sanitize_text_field( $_POST['cros_display'] );
$cros_controls = sanitize_text_field( $_POST['cros_controls'] );
$cros_interval = sanitize_text_field( $_POST['cros_interval'] );
$cros_intervaltime = sanitize_text_field( $_POST['cros_intervaltime'] );
$cros_duration = sanitize_text_field( $_POST['cros_duration'] );
$cros_category = sanitize_text_field( $_POST['cros_category'] );
$cros_random = sanitize_text_field( $_POST['cros_random'] );

// Form submitted, check the data
if (isset($cros_form_submit) && $cros_form_submit == 'yes')
{
	//	Just security thingy that wordpress offers us
	check_admin_referer('cros_form_add');
	
	$form['cros_viewport'] = isset($cros_viewport) ? $cros_viewport : '';
	if ($form['cros_viewport'] == '')
	{
		$cros_errors[] = __('Please enter slider width. only number.', 'NetoCarousel');
		$cros_error_found = TRUE;
	}

	$form['cros_width'] = isset($cros_width) ? $cros_width : '';
	if ($form['cros_width'] == '')
	{
		$cros_errors[] = __('Please enter the image width. only number.', 'NetoCarousel');
		$cros_error_found = TRUE;
	}
	
	$form['cros_height'] = isset($cros_height) ? $cros_height : '';
	if ($form['cros_height'] == '')
	{
		$cros_errors[] = __('Please enter the image height. only number.', 'NetoCarousel');
		$cros_error_found = TRUE;
	}
	
	$form['cros_display'] = isset($cros_display) ? $cros_display : '';
	if ($form['cros_display'] == '')
	{
		$cros_errors[] = __('Please enter the display. only number.', 'NetoCarousel');
		$cros_error_found = TRUE;
	}
	
	$form['cros_controls'] = isset($cros_controls) ? $cros_controls : '';
	$form['cros_interval'] = isset($cros_interval) ? $cros_interval : '';
	$form['cros_intervaltime'] = isset($cros_intervaltime) ? $cros_intervaltime : '';
	$form['cros_duration'] = isset($cros_duration) ? $cros_duration : '';
	$form['cros_category'] = isset($cros_category) ? $cros_category : '';
	if ($form['cros_category'] == '')
	{
		$cros_errors[] = __('Please Carousel Category.', 'NetoCarousel');
		$cros_error_found = TRUE;
	}
	
	$form['cros_random'] = isset($cros_random) ? $cros_random : '';

	//	No errors found, we can add this Group to the table
	if ($cros_error_found == FALSE)
	{
		$sql = $wpdb->prepare(
			"INSERT INTO `".NetoCarouselTable."`
			(`cros_viewport`, `cros_width`, `cros_height`, `cros_display`, `cros_controls`, `cros_interval`, `cros_intervaltime`, `cros_duration`, `cros_category`, `cros_random`)
			VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			array($form['cros_viewport'], $form['cros_width'], $form['cros_height'], $form['cros_display'], $form['cros_controls'], $form['cros_interval'], $form['cros_intervaltime'], $form['cros_duration'], $form['cros_category'], $form['cros_random'])
		);
		
		$wpdb->query($sql);
		
		$cros_success = __('New details was successfully added.', 'NetoCarousel');
		
		// Reset the form fields
		$form = array(
			'cros_viewport' => '',
			'cros_width' => '',
			'cros_height' => '',
			'cros_display' => '',
			'cros_controls' => '',
			'cros_interval' => '',
			'cros_intervaltime' => '',
			'cros_duration' => '',
			'cros_category' => '',
			'cros_random' => '',
			'cros_id' => ''
		);
	}
}

if ($cros_error_found == TRUE && isset($cros_errors[0]) == TRUE)
{
	?>
	<div class="error fade">
		<p><strong><?php echo $cros_errors[0]; ?></strong></p>
	</div>
	<?php
}
if ($cros_error_found == FALSE && strlen($cros_success) > 0)
{
  
	?>
	  <div class="updated fade">
		<p><strong><?php echo $cros_success; ?> 
		<a href="<?php echo NetoCarousel_ADMIN_URL; ?>">Click to go to list page</a>
	  </div>
	  <?php
	}
?>
<script language="JavaScript" src="<?php echo NetoCarousel_PLUGIN_URL; ?>/pages/setting.js"></script>
<div class="form-wrap netgo-carousel-add">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2><?php _e('Netgo Horizontal Carousel slider', 'NetoCarousel'); ?></h2>
	<form name="cros_form" method="post" action="#" onsubmit="return cros_submit()"  >
      <h3><?php _e('Add details', 'NetoCarousel'); ?></h3>
		<input name="cros_viewport" type="hidden" id="cros_viewport" value="500" maxlength="4" />
		<input name="cros_display" type="hidden" id="cros_display" value="1" maxlength="4" />
		
		<label for="tag-title"><?php _e('Image width', 'NetoCarousel'); ?></label>
		<input name="cros_width" type="text" id="cros_width" value="" maxlength="4" />
		<p><?php _e('Enter your image width. (Ex: 200)', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Image height', 'NetoCarousel'); ?></label>
		<input name="cros_height" type="text" id="cros_height" value="" maxlength="4" />
		<p><?php _e('Enter your image height. (Ex: 150)', 'NetoCarousel'); ?></p>
	  
	  
		<label for="tag-title"><?php _e('Controls', 'NetoCarousel'); ?></label>
		<select name="cros_controls" id="cros_controls">
			<option value='true'>True</option>
			<option value='false'>False</option>
		</select>
		<p><?php _e('Show Left, Right arrow button.', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Auto interval', 'NetoCarousel'); ?></label>
		<select name="cros_interval" id="cros_interval">
			<option value='true'>True</option>
			<option value='false'>False</option>
		</select>
		<p><?php _e('Want to add auto interval to move one image from another?', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Interval time', 'NetoCarousel'); ?></label>
		<input name="cros_intervaltime" type="text" id="cros_intervaltime" value="1500" maxlength="4" />
		<p><?php _e('Enable auto scroll.', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Animation Duration', 'NetoCarousel'); ?></label>
		<input name="cros_duration" type="text" id="cros_duration" value="1000" maxlength="4" />
		<p><?php _e('Animation duration in millisecond. (Ex: 1000)', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Random display', 'NetoCarousel'); ?></label>
		<select name="cros_random" id="cros_random">
			<option value='YES'>YES</option>
			<option value='NO'>NO</option>
		</select>
		<p><?php _e('Enable random image order', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Carousel Category', 'NetoCarousel'); ?></label>
		
		<?php 
		$terms = get_terms( 'carousel-category', array(
		'orderby'    => 'count',
		'hide_empty' => 0,
		) );
        ?>
		<select id="cros_category" name="cros_category">
			<option value="">Select Category</option>
			<?php 
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) { ?>
			<option  value="<?php echo $term->term_id ?>"><?php echo $term->name;?></option>
			<?php }
			}?>
			
		</select>
	  
      <input name="cros_id" id="cros_id" type="hidden" value="">
      <input type="hidden" name="cros_form_submit" value="yes"/>
      <p class="submit">
        <input name="publish" lang="publish" class="button add-new-h2" value="<?php _e('Insert Details', 'NetoCarousel'); ?>" type="submit" />&nbsp;
        </p>
	  <?php wp_nonce_field('cros_form_add'); ?>
    </form>
</div>

</div>