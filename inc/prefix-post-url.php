<?php
namespace Prefix\Elementor\Tag;

use Elementor\Core\DynamicTags\Tag;

/**
 * Post Url
 */
Class Prefix_Post_Url extends Tag {

	public function get_name() {
		return 'prefix-single-post-url';
	}

	public function get_title() {
		return __( 'Single Post Url', 'elementor-pro' );
	}

	public function get_group() {
		return 'post';
	}

	public function get_categories() {
		return [
			\Elementor\Modules\DynamicTags\Module::URL_CATEGORY
		];
	}

	protected function _register_controls() {
		$this->add_control(
			'prefix_single_post_url',
			[
				'label' => __( 'Post Url', 'elementor-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => prefix_get_all_posts_url(),
			]
		);
	}

	public function render() {
		$param_name = $this->get_settings( 'prefix_single_post_url' );
		echo wp_kses_post( $param_name );
	}


}