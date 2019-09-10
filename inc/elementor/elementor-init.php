<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('HappyAddon_Elementor_Widget_Init')) {

	class HappyAddon_Elementor_Widget_Init {

		public function __construct() {
//			add_action('elementor/elements/categories_registered', array($this, 'pws_add_elementor_widget_categories'));
			add_action('elementor/widgets/widgets_registered', array($this, 'elementor_file_include'));
//			add_action('wp_enqueue_scripts', array($this, 'register_frontend_styles'));
			add_action('elementor/frontend/after_enqueue_styles', array($this, 'enqueue_frontend_styles'));
//			add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'));
			add_action('elementor/frontend/after_enqueue_scripts', array($this, 'enqueue_frontend_scripts'));

		}

//		public function register_controls() {
//
//			$controls_manager = \Elementor\Plugin::$instance->controls_manager;
//			$controls_manager->register_control( 'Emoji', new EmojiOneArea_Control() );
////			$controls_manager->register_control( 'control-type-2', new Test_Control2() );
//
//		}

		/**
		 *Elementor Category Register
		 */
		public function pws_add_elementor_widget_categories($elements_manager) {
			$elements_manager->add_category(
				'happyaddon',
				[
					'title' => __('HappyAddon', 'happyaddon-toolkit'),
					'icon' => 'fa fa-plug',
				]
			);
		}


		/**
		 * Enqueue Frontend Styles
		 *
		 */
		public function enqueue_frontend_styles() {
			$url = happyaddon_plugin_url('/inc/elementor/assets/css/');
			wp_enqueue_style('info-box', $url . 'info-box.css', array(), null);
		}

		/**
		 * Enqueue Frontend Script
		 *
		 */
		public function enqueue_frontend_scripts() {
			$url = happyaddon_plugin_url('/inc/elementor/assets/js/');
			wp_enqueue_script('jquery');
			wp_enqueue_script('happy_main_js', $url . 'main.js', array('jquery'), '', true);

			//localize scripts
			wp_localize_script('happy_main_js', 'happy_localize', array(
				'theme_url' => home_url(),
				'plugin_url' => HAPPYADDON_TOOLKIR_PATH,
				'theme_directory' => get_template_directory_uri(),
				'ajax_url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce("validation_nonce")
			));
		}


		/**
		 *Elementor File Include
		 */
		public function elementor_file_include() {
			$widgets_manager = \Elementor\Plugin::instance()->widgets_manager;

			require_once(happyaddon_get_plugin_path('inc/elementor/info-box.php'));
			$widgets_manager->register_widget_type(new \HappyAddon\Elementor\HappyAddon_Info_Box_Widget());

			require_once(happyaddon_get_plugin_path('inc/elementor/instagram-feed.php'));
			$widgets_manager->register_widget_type(new \HappyAddon\Elementor\HappyAddon_Instagram_Feed_Widget());
		}

	}

	new HappyAddon_Elementor_Widget_Init();
}