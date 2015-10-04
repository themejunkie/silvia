<?php
/**
 * The switch customize control extends the WP_Customize_Control class.  This class allows 
 * developers to create switch settings within the WordPress theme customizer.
 *
 * @package    Silvia
 * @author     Theme Junkie, Kirki
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

/**
 * Create a switch control.
 * props https://github.com/reduxframework/kirki/blob/master/includes/controls/class-kirki-controls-switch-control.php
 */
class Customizer_Library_Switch extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'switch';

	/**
	 * Enqueue needed style and script
	 */
	public function enqueue() {
		// Path
		$path = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname( dirname( __FILE__ ) ) );

		wp_enqueue_script( 'customizer-library-switch-script', trailingslashit( $path ) . 'js/switch.js', array( 'jquery' ), '1.0.0', true  );
		wp_enqueue_style( 'customizer-library-switch-style', trailingslashit( $path ) . 'css/switch.css' );
	}

	public function render_content() { ?>

		<label>

			<div class="switch-info">
				<input style="display: none;" type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
			</div>

			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<?php $classes = ( esc_attr( $this->value() ) ) ? ' on' : ' off'; ?>
			<div class="switch<?php echo $classes; ?>">
				<div class="toggle"></div>
				<span class="on"><?php _e( 'On', 'silvia' ); ?></span>
				<span class="off"><?php _e( 'Off', 'silvia' ); ?></span>
			</div>

		</label>

		<?php
	}

}