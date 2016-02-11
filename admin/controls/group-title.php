<?php
/**
 * The 'group-title' customize control extends the WP_Customize_Control class.
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

/**
 * Group Title customize control class.
 *
 * @since  1.0.0
 */
class Customizer_Library_Group_Title extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'group-title';

	/**
	 * Displays the group-title on the customize screen.
	 */
	public function render_content() { ?>
		<?php if ( $this->label ) { ?>
			<h4 class="customize-control-group-title"><?php echo esc_html( $this->label ); ?></h4>
		<?php }
		if ( $this->description ) { ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php } ?>
	<?php }

}
