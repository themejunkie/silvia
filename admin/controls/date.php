<?php
/**
 * The date customize control extends the WP_Customize_Control class.  This class allows 
 * developers to create date settings within the WordPress theme customizer.
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
 * Date customize control class.
 *
 * @since  1.0.0
 */
class Customizer_Library_Date extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'date';

	/**
	 * Enqueue needed script
	 */
	public function enqueue() {
		wp_enqueue_style( 'jquery-ui-datepicker' );
	}

	/**
	 * Displays the date on the customize screen.
	 */
	public function render_content() { ?>

		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<input type="date" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $this->value(); ?>" class="datepicker" <?php $this->link(); ?> />

		</label>

		<?php
	}

}