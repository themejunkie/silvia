<?php
/**
 * The button set customize control extends the WP_Customize_Control class.  This class allows 
 * developers to create button set settings within the WordPress theme customizer.
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
 * Create a Radio-Buttonset control.
 * props https://github.com/reduxframework/kirki/blob/master/includes/controls/class-kirki-controls-radio-buttonset-control.php
 */
class Customizer_Library_Buttonset extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'radio-buttonset';

	/**
	 * Enqueue needed style and script
	 */
	public function enqueue() {
		// Path
		$path = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname( dirname( __FILE__ ) ) );

		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_style( 'customizer-library-buttonset-style', trailingslashit( $path ) . 'css/radio-buttonset.css' );
	}

	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}

		$name = '_customize-radio-' . $this->id;

		?>
		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif;
		if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<div id="input_<?php echo $this->id; ?>" class="buttonset">
			<?php foreach ( $this->choices as $value => $label ) : ?>
				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
					<label for="<?php echo $this->id . esc_attr( $value ); ?>">
						<?php echo esc_html( $label ); ?>
					</label>
				</input>
			<?php endforeach; ?>
		</div>

		<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
		<?php
	}

}