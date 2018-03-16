<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<?php


//sanitize post and get values
$frm_cros_display = sanitize_text_field( $_POST['frm_cros_display'] );

// Form submitted, check the data
if (isset($frm_cros_display) && $frm_cros_display == 'yes')
{   
    $sanitize_did= sanitize_text_field( $_GET['did']);
	$did = isset($sanitize_did) ? $sanitize_did : '0';
	
	$cros_success = '';
	$cros_success_msg = FALSE;
	
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
		?><div class="error fade"><p><strong><?php _e('Oops, selected details doesnt exist', 'NetoCarousel'); ?></strong></p></div><?php
	}
	else
	{
		// Form submitted, check the action
		$sanitize_ac= sanitize_text_field($_GET['ac']);
		if (isset($sanitize_ac) && $sanitize_ac == 'del' && isset($did) && $did != '')
		{
			//	Just security thingy that wordpress offers us
			check_admin_referer('cros_form_show');
			
			//	Delete selected record from the table
			$sSql = $wpdb->prepare("DELETE FROM `".NetoCarouselTable."`
					WHERE `cros_id` = %d
					LIMIT 1", $did);
			$wpdb->query($sSql);
			
			//	Set success message
			$cros_success_msg = TRUE;
			$cros_success = __('Selected record was successfully deleted.', 'NetoCarousel');
		}
	}
	
	if ($cros_success_msg == TRUE)
	{
		?><div class="updated fade"><p><strong><?php echo $cros_success; ?></strong></p></div><?php
	}
}
?>
<div class="wrap">
  <div id="icon-edit" class="icon32 icon32-posts-post"></div>
    <h2><?php _e('Netgo Horizontal Carousel slider', 'NetoCarousel'); ?>
	<a class="add-new-h2" href="<?php echo NetoCarousel_ADMIN_URL; ?>&amp;ac=add"><?php _e('Add New', 'NetoCarousel'); ?></a></h2>
    <div class="tool-box">
	<?php
		$sSql = $wpdb->prepare( "SELECT * FROM `".NetoCarouselTable."` order by cros_id desc", NetoCarouselTable );
		$myData = array();
		$myData = $wpdb->get_results($sSql, ARRAY_A);
		?>
		<script language="JavaScript" src="<?php echo NetoCarousel_PLUGIN_URL; ?>/pages/setting.js"></script>
		<form name="frm_cros_display" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
            <th class="check-column" scope="col"><input type="checkbox" name="cros_group_item[]" /></th>
			<th scope="col"><?php _e('Short code', 'NetoCarousel'); ?></th>
            <th scope="col"><?php _e('Carousel Category', 'NetoCarousel'); ?></th>
			<th scope="col"><?php _e('Image width', 'NetoCarousel'); ?></th>
			<th scope="col"><?php _e('Image height', 'NetoCarousel'); ?></th>
			
          </tr>
        </thead>
		<tfoot>
          <tr>
            <th class="check-column" scope="col"><input type="checkbox" name="cros_group_item[]" /></th>
			<th scope="col"><?php _e('Short code', 'NetoCarousel'); ?></th>
			
            <th scope="col"><?php _e('Carousel Category', 'NetoCarousel'); ?></th>
			<th scope="col"><?php _e('Image width', 'NetoCarousel'); ?></th>
			<th scope="col"><?php _e('Image height', 'NetoCarousel'); ?></th>
		
			
          </tr>
        </tfoot>
		<tbody>
			<?php 
			$i = 0;
			if(count($myData) > 0 )
			{
				foreach ($myData as $data)
				{
					?>
					<tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
						<td align="left"><input type="checkbox" value="<?php echo $data['cros_id']; ?>" name="cros_group_item[]"></th>
						<td>[netgo-carousel-slider id="<?php echo $data['cros_id']; ?>"]
						<div class="row-actions">
							<span class="edit"><a title="Edit" href="<?php echo NetoCarousel_ADMIN_URL; ?>&amp;ac=edit&amp;did=<?php echo $data['cros_id']; ?>"><?php _e('Edit', 'NetoCarousel'); ?></a> | </span>
							<span class="trash"><a onClick="javascript:cros_delete('<?php echo $data['cros_id']; ?>')" href="javascript:void(0);"><?php _e('Delete', 'NetoCarousel'); ?></a></span> 
						</div>
						</td>
						<td><?php echo get_term_by('id', $data['cros_category'], 'carousel-category')->name; ?></td>
						<td><?php echo $data['cros_width']; ?></td>
						<td><?php echo $data['cros_height']; ?></td>
						
					</tr>
					<?php 
					$i = $i+1; 
				} 	
			}
			else
			{
				?><tr><td colspan="6" align="center"><?php _e('No records available.', 'NetoCarousel'); ?></td></tr><?php 
			}
			?>
		</tbody>
        </table>
		<?php wp_nonce_field('cros_form_show'); ?>
		<input type="hidden" name="frm_cros_display" value="yes"/>
      </form>	
	  <div class="tablenav">
	  <h2>
	  <a class="button add-new-h2" href="<?php echo NetoCarousel_ADMIN_URL; ?>&amp;ac=add"><?php _e('Add New', 'NetoCarousel'); ?></a>
	  </h2>
	  </div>
	  <div style="height:5px"></div>
	
	</div>
</div>