<?php
namespace Prefix\Elementor\Tag;

use Elementor\Core\DynamicTags\Tag;

/**
 * Product Url
 */
Class Prefix_Product_Url extends Tag {

	public function get_name() {
		return 'prefix-single-product-url';
	}

	public function get_title() {
		return __( 'Single Product Url', 'elementor-pro' );
	}

	public function get_group() {
		return 'woocommerce';
	}

	public function get_categories() {
		return [
			\Elementor\Modules\DynamicTags\Module::URL_CATEGORY
		];
	}

	protected function _register_controls() {
		$this->add_control(
			'prefix_single_product_url',
			[
				'label' => __( 'Product Url', 'elementor-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => prefix_get_all_posts_url('product'),
			]
		);
	}

	public function render() {
		$param_name = $this->get_settings( 'prefix_single_product_url' );
		echo wp_kses_post( $param_name );
	}


}