<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
<?php
$sanitiz_did = sanitize_text_field( $_GET['did'] );

$did = isset($sanitiz_did) ? $sanitiz_did : '0';

// First check if ID exist with requested ID
$sSql = $wpdb->prepare(
	"SELECT COUNT(*) AS `count` FROM ".NetoCarouselTable."
	WHERE `cros_id` = %d",
	array($did)
);
$result = '0';
$result = $wpdb->get_var($sSql);

if ($result != '1')
{
	?><div class="error fade"><p><strong><?php _e('Oops, selected details doesnt exist.', 'NetoCarousel'); ?></strong></p></div><?php
}
else
{
	$cros_errors = array();
	$cros_success = '';
	$cros_error_found = FALSE;
	
	$sSql = $wpdb->prepare("
		SELECT *
		FROM `".NetoCarouselTable."`
		WHERE `cros_id` = %d
		LIMIT 1
		",
		array($did)
	);
	$data = array();
	$data = $wpdb->get_row($sSql, ARRAY_A);
	
	// Preset the form fields
	$form = array(
		'cros_viewport' => $data['cros_viewport'],
		'cros_width' => $data['cros_width'],
		'cros_height' => $data['cros_height'],
		'cros_display' => $data['cros_display'],
		'cros_controls' => $data['cros_controls'],
		'cros_interval' => $data['cros_interval'],
		'cros_intervaltime' => $data['cros_intervaltime'],
		'cros_duration' => $data['cros_duration'],
		'cros_category' => $data['cros_category'],
		'cros_random' => $data['cros_random'],
		'cros_id' => $data['cros_id']
	);
}


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
	check_admin_referer('cros_form_edit');
	
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
		$sSql = $wpdb->prepare(
				"UPDATE `".NetoCarouselTable."`
				SET `cros_viewport` = %s,
				`cros_width` = %s,
				`cros_height` = %s,
				`cros_display` = %s,
				`cros_controls` = %s,
				`cros_interval` = %s,
				`cros_intervaltime` = %s,
				`cros_duration` = %s,
				`cros_category` = %s,
				`cros_random` = %s
				WHERE cros_id = %d
				LIMIT 1",
				array($form['cros_viewport'], $form['cros_width'], $form['cros_height'], $form['cros_display'], $form['cros_controls'], $form['cros_interval'], $form['cros_intervaltime'], $form['cros_duration'], $form['cros_category'], $form['cros_random'], $did)
			);
		$wpdb->query($sSql);
		
		$cros_success = __('Details was successfully updated.', 'NetoCarousel');
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
		<p><strong><?php echo $cros_success; ?> </strong></p>
	</div>
	<?php
}
?>
<script language="JavaScript" src="<?php echo NetoCarousel_PLUGIN_URL; ?>/pages/setting.js"></script>
<div class="form-wrap netgo-carousel-add">
	<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
	<h2><?php _e('Netgo Horizontal Carousel slider', 'NetoCarousel'); ?></h2>
	<form name="cros_form" method="post" action="#" onsubmit="return cros_submit()"  >
      <h3><?php _e('Update Details', 'NetoCarousel'); ?></h3>
	  
		<label for="tag-title"><?php _e('Image width', 'NetoCarousel'); ?></label>
		<input name="cros_width" type="text" id="cros_width" value="<?php echo $form['cros_width']; ?>" maxlength="4" />
		<p><?php _e('Enter your image width. (Ex: 200)', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Image height', 'NetoCarousel'); ?></label>
		<input name="cros_height" type="text" id="cros_height" value="<?php echo $form['cros_height']; ?>" maxlength="4" />
		<p><?php _e('Enter your image height. (Ex: 150)', 'NetoCarousel'); ?></p>
	  
        <input name="cros_viewport" type="hidden" id="cros_viewport" value="500" maxlength="4" />
		<input name="cros_display" type="hidden" id="cros_display" value="1" maxlength="4" />
		
		
		<label for="tag-title"><?php _e('Controls', 'NetoCarousel'); ?></label>
		<select name="cros_controls" id="cros_controls">
			<option value='true' <?php if($form['cros_controls'] == 'true') { echo "selected='selected'" ; } ?>>True</option>
			<option value='false' <?php if($form['cros_controls'] == 'false') { echo "selected='selected'" ; } ?>>False</option>
		</select>
		<p><?php _e('Show Left, Right arrow button.', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Auto interval', 'NetoCarousel'); ?></label>
		<select name="cros_interval" id="cros_interval">
			<option value='true' <?php if($form['cros_interval'] == 'true') { echo "selected='selected'" ; } ?>>True</option>
			<option value='false' <?php if($form['cros_interval'] == 'false') { echo "selected='selected'" ; } ?>>False</option>
		</select>
		<p><?php _e('Enable auto scroll.', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Interval time', 'NetoCarousel'); ?></label>
		<input name="cros_intervaltime" type="text" id="cros_intervaltime" value="<?php echo $form['cros_intervaltime']; ?>" maxlength="4" />
		<p><?php _e('Auto interval time in millisecond. (Ex: 1500)', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Animation Duration', 'NetoCarousel'); ?></label>
		<input name="cros_duration" type="text" id="cros_duration" value="<?php echo $form['cros_duration']; ?>" maxlength="4" />
		<p><?php _e('Animation duration in millisecond. (Ex: 1000)', 'NetoCarousel'); ?></p>
		
		<label for="tag-title"><?php _e('Random display', 'NetoCarousel'); ?></label>
		<select name="cros_random" id="cros_random">
			<option value='YES' <?php if($form['cros_random'] == 'YES') { echo "selected='selected'" ; } ?>>YES</option>
			<option value='NO' <?php if($form['cros_random'] == 'NO') { echo "selected='selected'" ; } ?>>NO</option>
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
			<option <?php if($form['cros_category'] == $term->term_id){ ?>selected="selected"<?php }?>  value="<?php echo $term->term_id ?>"><?php echo $term->name;?></option>
			<?php }
			}?>
			
		</select>
	  <p><?php _e('Choose Image Category for slider', 'NetoCarousel'); ?></p>
      <input name="cros_id" id="cros_id" type="hidden" value="<?php echo $form['cros_id']; ?>">
      <input type="hidden" name="cros_form_submit" value="yes"/>
      <p class="submit">
        <input name="publish" lang="publish" class="button add-new-h2" value="<?php _e('Update Details', 'NetoCarousel'); ?>" type="submit" />&nbsp;
      </p>
	  <?php wp_nonce_field('cros_form_edit'); ?>
    </form>
</div>
</div>