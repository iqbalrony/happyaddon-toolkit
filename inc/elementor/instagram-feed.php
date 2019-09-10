<?php

namespace HappyAddon\Elementor;

use  Elementor\Widget_Base;
use  Elementor\Controls_Manager;
use  Elementor\utils;
use  Elementor\Scheme_Color;
use  Elementor\Group_Control_Typography;
use  Elementor\Group_Control_Border;
use  Elementor\Group_Control_Image_Size;
use  Elementor\Scheme_Typography;
use  Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class HappyAddon_Instagram_Feed_Widget extends Widget_Base {

	public function get_name() {
		return 'hpadn_instagram_Feed';
	}

	public function get_title() {
		return __('Instagram Feed Test', 'happyaddon-toolkit');
	}

//	public function get_icon() {
//		return 'eicon-info-box';
//	}

	public function get_categories() {
		return ['general'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'info_box_section',
			[
				'label' => __('Info Box', 'happyaddon-toolkit'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Title
		$this->add_control(
			'user_name',
			[
				'label' => __('User Name', 'happyaddon-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => __('', 'happyaddon-toolkit'),
			]
		);
		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('insta', 'class', 'instagram');
		$this->add_render_attribute('insta', 'data-username', $settings['user_name']);
//		var_dump($settings['page_layout']);
		?>

		<div <?php $this->print_render_attribute_string('insta')?>>
			<h2>This is Instagram Feed</h2>
			<img src="" class="profile-pic" style="border-radius:50%;">
			<h2 class="username"></h2>
			<h4 class="name"></h4>
			<span class="number-of-posts"></span> posts
			<span class="followers"></span> followers
			<span class="following"></span> following
			<h4 class="biography"></h4>
			<h2>POSTS</h2>
			<div class="posts"></div>
		</div>
		<?php

	}

//	protected function content_template() {
//	}

}