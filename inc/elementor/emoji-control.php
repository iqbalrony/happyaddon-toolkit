<?php

namespace Elementor\CustomControl;
/**
 * Elementor emoji one area control.
 *
 * A control for displaying a textarea with the ability to add emojis.
 *
 * @since 1.0.0
 */
class EmojiOneArea_Control extends \Elementor\Base_Data_Control {

	/**
	 * Get emoji one area control type.
	 *
	 * Retrieve the control type, in this case `emojionearea`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	const EMOJI = 'emoji';

	public function get_type() {
//		return self::EMOJI;
		return 'emoji';
	}

	/**
	 * Enqueue emoji one area control scripts and styles.
	 *
	 * Used to register and enqueue custom scripts and styles used by the emoji one
	 * area control.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue() {
		$url = happyaddon_plugin_url('/inc/elementor/assets/js/');
		// Styles
		wp_register_style('emojionearea', 'https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css', [], '3.4.1');
		wp_enqueue_style('emojionearea');

		// Scripts
		wp_register_script('emojionearea', 'https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.js', ['jquery'], '3.4.1');
		wp_register_script('emojionearea-control', $url . 'emojionearea-control.js', ['emojionearea', 'jquery'], '1.0.0');
		wp_enqueue_script('emojionearea');
		wp_enqueue_script('emojionearea-control');
	}

	/**
	 * Get emoji one area control default settings.
	 *
	 * Retrieve the default settings of the emoji one area control. Used to return
	 * the default settings while initializing the emoji one area control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'rows' => 3,
			'emojionearea_options' => [],
//			'emojionearea_options' => [
//				':smile:' => 'smile',
//				'smile' => ':smile:',
//			],
		];
	}


	/**
	 * Render emoji one area control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		$settings = $this->get_default_settings();
		?>
		<div class="elementor-control-field">
			<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<textarea id="<?php echo esc_attr( $control_uid ); ?>" class="emojionearea1 elementor-control-tag-area" rows="{{ data.rows }}" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}">Default :smile:</textarea>
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}

}
//new EmojiOneArea_Control();