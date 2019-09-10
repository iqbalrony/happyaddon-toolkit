<?php
namespace ElementorControls;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elementor_Custom_Controls {

	public function custom_cls() {
		return new \Elementor\CustomControl\EmojiOneArea_Control();
	}
	public function includes() {
		require_once(happyaddon_get_plugin_path('inc/elementor/emoji-control.php'));
		require_once(happyaddon_get_plugin_path('inc/elementor/image-selector-control.php'));
	}

	public function register_controls() {
		$this->includes();

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control($this->custom_cls()->get_type(), $this->custom_cls());
		$controls_manager->register_control(\Elementor\CustomControl\ImageSelector_Control::ImageSelector, new \Elementor\CustomControl\ImageSelector_Control());
	}

	public function __construct() {
		add_action('elementor/controls/controls_registered', [$this, 'register_controls']);
	}

}
new Elementor_Custom_Controls();
//Elementor_Custom_Controls::register_controls();