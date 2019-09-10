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


class HappyAddon_Info_Box_Widget extends Widget_Base {

	public function get_name() {
		return 'hpadn_icon_box';
	}

	public function get_title() {
		return __('Test Info Box', 'happyaddon-toolkit');
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

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
		
		//Icon
		$this->add_control(
			'icon',
			[
				'label' => __('Icon', 'happyaddon-toolkit'),

				'label_block' => true,
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-mobile',
			]
		);
		//Title
		$this->add_control(
			'title',
			[
				'label' => __('Title', 'happyaddon-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Call us now', 'happyaddon-toolkit'),
			]
		);

		//Image selector
		$this->add_control(
			'page_layout',
			[
				'label' => esc_html__('Page Layout', 'happyaddon-toolkit'),
				'type' => \Elementor\CustomControl\ImageSelector_Control::ImageSelector,
				'options' => [
					'left-sidebar' => [
						'title' => esc_html__('Left', 'happyaddon-toolkit'),
						'url' => 'http://localhost/pawshop/wp-content/themes/pawshop/assets/images/left-sidebar.png',
					],
					'right-sidebar' => [
						'title' => esc_html__('Right', 'happyaddon-toolkit'),
						'url' => 'http://localhost/pawshop/wp-content/themes/pawshop/assets/images/right-sidebar.png',
					],
					'no-sidebar' => [
						'title' => esc_html__('No Sidebar', 'happyaddon-toolkit'),
						'url' => 'http://localhost/pawshop/wp-content/themes/pawshop/assets/images/no-sidebar.png',
					],
				],
				'default' => 'right-sidebar',
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area' => 'color: {{VALUE}};',
				],
			]
		);
		//Content
//		$this->add_control(
//			'content',
//			[
//				'label' => __('Content', 'happyaddon-toolkit'),
//				'type' => Controls_Manager::TEXTAREA,
//				'default' => __('(+880) 1717171445', 'happyaddon-toolkit'),
//			]
//		);
		//Content33333333333333333
		$this->add_control(
			'content2',
			[
				'label' => __('Content2', 'happyaddon-toolkit'),
				'description' => 'description description',
				'type' => \Elementor\CustomControl\EmojiOneArea_Control::get_type(),
				'emojionearea_options' => [
						'key1' => 'value1',
						'key2' => 'value2',
						'key3' => 'value3',
						'key4' => 'value4',
				],
//				'type' => 'CUSTOM',:smile:
//				'default' => __('(+880) 1717171445', 'happyaddon-toolkit'),
			]
		);
		//Alignment
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'happyaddon-toolkit'),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
//				'devices' => ['desktop', 'tablet', 'mobile'],
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'happyaddon-toolkit'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'happyaddon-toolkit'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'happyaddon-toolkit'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area' => '{{VALUE}};',
				],
				'selectors_dictionary' => [
					'left' => 'align-items:flex-start;justify-content: left',
					'center' => 'align-items:center;justify-content: center',
					'right' => 'align-items:flex-end;justify-content: flex-end'
				],
			]
		);
		$this->end_controls_section();

		//Style Tab-> Icon
		$this->start_controls_section(
			'icon_style',
			[
				'label' => __('Icon', 'happyaddon-toolkit'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//Color
		$this->add_control(
			'icon_clr',
			[
				'label' => __('Color', 'happyaddon-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .icon_box' => 'color: {{VALUE}};',
				]
			]
		);
		//Font Size
		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => __('Font Size', 'happyaddon-toolkit'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .icon_box' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);
		//Margin Right
		$this->add_responsive_control(
			'icon_margin_right',
			[
				'label' => __('Margin Right', 'happyaddon-toolkit'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .icon_box' => 'margin-right: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

		//Style Tab-> Title
		$this->start_controls_section(
			'title_style',
			[
				'label' => __('Title', 'happyaddon-toolkit'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//Color
		$this->add_control(
			'title_clr',
			[
				'label' => __('Color', 'happyaddon-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .contact_info_title h5' => 'color: {{VALUE}};',
				]
			]
		);
		//Font Size
		$this->add_responsive_control(
			'title_font_size',
			[
				'label' => __('Font Size', 'happyaddon-toolkit'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .contact_info_title h5' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);
		//Margin Bottom
		$this->add_responsive_control(
			'title_margin_bottom',
			[
				'label' => __('Margin Bottom', 'happyaddon-toolkit'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .contact_info_title h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

		//Style Tab-> Content
		$this->start_controls_section(
			'content_style',
			[
				'label' => __('Content', 'happyaddon-toolkit'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//Color
		$this->add_control(
			'content_clr',
			[
				'label' => __('Color', 'happyaddon-toolkit'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .contact_info_content p' => 'color: {{VALUE}};',
				]
			]
		);
		//Font Size
		$this->add_responsive_control(
			'content_font_size',
			[
				'label' => __('Font Size', 'happyaddon-toolkit'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hpadn_info_box_area .contact_info_content p' => 'font-size: {{SIZE}}{{UNIT}};',
				]
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

		$this->add_render_attribute('wrapper', 'class', 'hpadn_info_box_area');
		$this->add_render_attribute('icon', 'class', $settings['icon']);
		var_dump($settings['page_layout']);
		?>

		<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
			<?php if (!empty($settings['icon'])): ?>
				<div class="icon_box">
					<i <?php echo $this->get_render_attribute_string('icon'); ?> aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<?php if (!empty($settings['title']) || !empty($settings['content'])): ?>
				<div class="contact_info">
					<?php if (!empty($settings['title'])): ?>
						<div class="contact_info_title"><h5><?php esc_html_e($settings['title']); ?></h5></div>
					<?php endif; ?>
					<?php if (!empty($settings['content2'])): ?>
						<div class="contact_info_content"><p><?php esc_html_e($settings['align']); ?></p></div>
						<div class="contact_info_content"><p><?php esc_html_e($settings['page_layout']); ?></p></div>
						<div class="contact_info_content"><p><?php echo $settings['content2']; ?></p></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php

	}

	protected function content_template() {
	}

}