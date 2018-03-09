<?php
/**
 * Define some custom classes for better-health
 * 
 * https://codex.wordpress.org/Class_Reference/WP_Customize_Control
 *
 * @package Canyon Themes
 * @subpackage Better Health
 * @since 1.0.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	   	
	/**
	 * A class to create a dropdown for all categories in your wordpress site
	 *
	 * @since 1.0.0
	 * @better-health public
	 */
	class Better_Health_Customize_Category_Control extends WP_Customize_Control {
		
		/**
		 * Render the control's content.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function render_content() {
			$better_health_dropdown = wp_dropdown_categories(
					array(
						'name'              => 'customize-dropdown-categories' . $this->id,
						'echo'              => 0,
						'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;','better-health'),
						'option_none_value' => '0',
						'selected'          => $this->value(),
					)
			);

			// Hackily add in the data link parameter.
			$better_health_dropdown = str_replace( '<select', '<select ' . $this->get_link(), $better_health_dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
				$this->label,
				$this->description,
				$better_health_dropdown
			);
		}
	}

	
}


/**
	 * A class to create a option separator in customizer section 
	 *
	 *@since 1.0.0
	 */
	class Better_Health_Customize_Section_Separator extends WP_Customize_Control {
		/**
	     * The type of customize control being rendered.
	     *
	     * @since  1.0.0
	     * @access public
	     * @var    string
	     */
		public $type = 'better_health_separator';

		/**
	     * Displays the control content.
	     *
	     * @since  1.0.0
	     * @access public
	     * @return void
	     */
		public function render_content() {
	?>
		<div class="better-health-customize-section-wrap">
			<hr>
		</div>
	<?php
		}
	}