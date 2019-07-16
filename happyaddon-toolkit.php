<?php
/*
Plugin Name: HappyAddon Toolkit
Plugin URI: https://happyaddon.toolkit.com
Description: HappyAddon Toolkit plugin is a support plugin for Elementor WordPress plugin.
Author: HappyAddon
Version: 1.0
Author URI: http://themeforest.net/user/happyaddon-toolkit/
Text Domain: happyaddon-toolkit
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	die;
}

if (!defined('HAPPYADDON_TOOLKIR_PATH')) {
	define('HAPPYADDON_TOOLKIR_PATH', plugin_dir_path(__FILE__));
}
if (!function_exists('happyaddon_get_plugin_path')) {
	function happyaddon_get_plugin_path($file) {
		return HAPPYADDON_TOOLKIR_PATH . $file;
	}
}
if (!function_exists('happyaddon_plugin_url')) {
	function happyaddon_plugin_url($url) {
		return plugins_url($url, __FILE__);
	}
}
if (!defined('HAPPYADDON_ELEMENTOR_ASSETS')) {
	define('HAPPYADDON_ELEMENTOR_ASSETS', plugins_url('/inc/elementor/assets/', __FILE__));
}

add_action('plugins_loaded', 'happyaddon_check_elementor');
function happyaddon_check_elementor() {

	load_plugin_textdomain('happyaddon-toolkit', false, plugin_basename(dirname(__FILE__)) . '/languages/');

	if (defined('ELEMENTOR_VERSION')) {
		require_once( happyaddon_get_plugin_path( 'inc/elementor/add_in_existing_widgets.php' ) );
	} else {
		add_action( 'admin_notices', 'happyaddon_elementor_not_active' );
	}

}

// admin panel notice
if (!function_exists('happyaddon_elementor_not_active')) {
	function happyaddon_elementor_not_active() {
		echo sprintf('<div class="notice notice-error"><p>
			' . __('<strong>HappyAddon Toolkit</strong>: Please install and activate Elementor to use this plugin', 'happyaddon-toolkit') . '
			</p></div>');
	}
}