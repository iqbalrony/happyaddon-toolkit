<?php

/**
 * Post URL list
 */
if (!function_exists('prefix_get_all_posts_url')) {
	function prefix_get_all_posts_url($posttype = 'post') {
		$args = array(
			'post_type' => $posttype,
			'post_status' => 'publish',
			'posts_per_page' => -1
		);

		$post_list = array();
		if ($data = get_posts($args)) {
			foreach ($data as $key) {
				$post_list[$key->post_name] = $key->post_title;
			}
		}
		return $post_list;
	}
}

/**
 * Include Dynamic Tag Class files
 */
require_once(happyaddon_get_plugin_path('inc/prefix-post-url.php'));
if (class_exists('WooCommerce')) {
	require_once(happyaddon_get_plugin_path('inc/prefix-product-url.php'));
}

/**
 * Register the Dynamic Tag
 */
add_action('elementor/dynamic_tags/register_tags', 'prefix_register_tags');
function prefix_register_tags($dynamic_tags) {

	// To register that group as well before the tag
	\Elementor\Plugin::$instance->dynamic_tags->register_group('post', [
		'title' => 'Post'
	]);
	if (class_exists('WooCommerce')) {
		\Elementor\Plugin::$instance->dynamic_tags->register_group('woocommerce', [
			'title' => 'WooCommerce'
		]);
	}

	// Finally register the single post url tag
	$dynamic_tags->register_tag(new Prefix\Elementor\Tag\Prefix_Post_Url());

	// Finally register the single product url tag
	if (class_exists('WooCommerce')) {
		$dynamic_tags->register_tag(new Prefix\Elementor\Tag\Prefix_Product_Url());
	}
}

/**
 * Widget register
 */
add_action( 'elementor/widgets/widgets_registered', 'test_widget_register', 20 );
function test_widget_register(){
	$widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
	require_once(happyaddon_get_plugin_path('inc/elementor/test-widget.php'));
	$widgets_manager->register_widget_type(new \Test\Widget\Elementor_Test_Widget());
}














