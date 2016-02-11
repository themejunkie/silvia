<?php
/**
 * The textarea customize control extends the WP_Customize_Control class.  This class allows
 * developers to create textarea settings within the WordPress theme customizer.
 *
 * @package    Silvia
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 * @link       http://otto42.com/bj
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

/**
 * Textarea customize control class.
 *
 * @since  1.0.0
 */
class Customizer_Library_Textarea extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'textarea';

	/**
	 * Displays the textarea on the customize screen.
	 */
	public function render_content() { ?>
		<label>
			<?php if ( $this->label ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php }
			if ( $this->description ) { ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php } ?>

			<textarea class="widefat" cols="45" rows="5" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>

		</label>
	<?php }

}
