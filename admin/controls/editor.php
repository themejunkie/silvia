<?php
/**
 * The editor customize control extends the WP_Customize_Control class.  This class allows 
 * developers to create editor settings within the WordPress theme customizer.
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
 * Editor (TinyMCE) customize control class.
 *
 * @since  1.0.0
 */
class Customizer_Library_Editor extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'editor';

	/**
	 * Enqueue needed script
	 */
	public function enqueue() {
		// Path
		$path = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname( dirname( __FILE__ ) ) );
		
		wp_enqueue_script( 'customizer-library-editor-script', trailingslashit( $path ) . 'js/editor.js', array( 'jquery' ), '1.0.0', true );
	}

	/**
	 * Displays the editor on the customize screen.
	 */
	public function render_content() { ?>

		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
			
			<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
			<?php
				$settings = array(
					'textarea_name' => $this->id,
					'teeny'         => true
				);
				wp_editor( esc_textarea( $this->value() ), $this->id, $settings );

				do_action('admin_footer');
				do_action('admin_print_footer_scripts');
			?>

		</label>
		<?php
	}

}