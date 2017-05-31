<?php
/**
 * The 'custom-text' customize control extends the WP_Customize_Control class.
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

/**
 * Group Title customize control class.
 */
class Silvia_Custom_Text extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'custom-text';

	/**
	 * Displays the group-title on the customize screen.
	 */
	public function render_content() { ?>
		<?php if ( $this->label ) { ?>
			<h3 class="customize-control-title"><?php echo esc_html( $this->label ); ?></h3>
		<?php }
		if ( $this->description ) { ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php } ?>
	<?php }

}
