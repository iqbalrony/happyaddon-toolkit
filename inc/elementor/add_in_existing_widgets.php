<?php
/**
 * Enqueue js to show the change of text 2 field on editor's console log
 */
function on_change_console_log_value_js() {
	$url = happyaddon_plugin_url('/inc/elementor/assets/js/');
	wp_enqueue_script('button-extention', $url . 'button-extention.js', array('jquery'), '', true);
}
add_action('elementor/editor/after_enqueue_scripts', 'on_change_console_log_value_js');


/**
 * Add extra text field to exiting button widget
 *
 */
add_action('elementor/element/before_section_end', 'add_control_in_existing_button_widget', 10, 3);
function add_control_in_existing_button_widget($section, $section_id, $args) {

	if ($section->get_name() == 'button' && $section_id == 'section_button') {
		// we are at the end of the "section_button" area of the "button"
		$section->add_control(
			'text2',
			[
				'label' => __('Text 2', 'elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('Click here 2', 'elementor'),
				'placeholder' => __('Click here 2', 'elementor'),
			]
		);
	}
}

/**
 * Concrete extra text field value with existing value before render
 *
 */
add_action('elementor/widget/before_render_content', 'concrete_extra_value_before_render', 5);
add_action('elementor/frontend/widget/before_render', 'concrete_extra_value_before_render', 10);
function concrete_extra_value_before_render($widget) {
	//Check if we are on a button
	if ('button' === $widget->get_name()) {
		// Get the settings
		$settings = $widget->get_active_settings();
		$widget->set_settings('text', $settings['text'] . ' ' . $settings['text2']);
	}
}

/**
 * Modify button content template for new text value
 *
 */
add_filter('elementor/widget/print_template', 'btn_content_template', 10, 2);
function btn_content_template($template, $instance) {
	if ($instance->get_name() !== 'button') {
		return $template;
	}
	$old_template = '<span {{{ view.getRenderAttributeString( \'text\' ) }}}>{{{ settings.text }}}</span>';
	$new_template = '<span {{{ view.getRenderAttributeString( \'text\' ) }}}>{{{ settings.text+\' \'+settings.text2 }}}</span>';
	$template = str_replace($old_template, $new_template, $template);
	return $template;
}