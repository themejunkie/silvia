<?php
/**
 * The multiple select2 customize control extends the WP_Customize_Control class.  This class allows 
 * developers to create select2 settings within the WordPress theme customizer.
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
 * Select2 customize control class.
 *
 * @since  1.0.0
 */
class Customizer_Library_Select_Multiple extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'select2-multiple';

	/**
	 * Enqueue needed style and script
	 */
	public function enqueue() {
		// Path
		$path = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname( dirname( __FILE__ ) ) );
		
		wp_enqueue_style( 'jquery-select2-css', trailingslashit( $path ) . 'css/select2.min.css', array(), '4.0.0' );
		wp_enqueue_script( 'jquery-select2', trailingslashit( $path ) . 'js/select2.full.min.js', array( 'jquery' ), '4.0.0', true );
	}

	/**
	 * Displays the multiple select2 on the customize screen.
	 */
	public function render_content() { 

		if ( empty( $this->choices ) ) {
			return;
		}
		?>
		
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
			
			<select class="select2" <?php $this->link(); ?> multiple="multiple" style="width: 100%">
				<?php
					foreach ( $this->choices as $value => $label ) {
						echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
					}
				?>
			</select>
			
		</label>

		<script>
			jQuery(document).ready(function($) {
				$('.select2').select2();
			});
		</script>

	<?php }

}