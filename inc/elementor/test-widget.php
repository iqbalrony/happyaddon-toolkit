<?php
namespace Test\Widget;

use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Control_Media;

defined('ABSPATH') || die();

class Elementor_Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test-widget';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __('test-widget', 'test-plugin');
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'hm hm-refresh-time';
	}

	public function get_keywords() {
		return ['general'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'due_date',
			[
				'label' => __('Time', 'happy-addons-pro'),
				'type' => Controls_Manager::DATE_TIME,
				'default' => date("Y-m-d", strtotime("+ 1 day")),
				'description' => esc_html__('Set the due date and time', 'happy-addons-pro'),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$date = date("M d Y", strtotime($settings['due_date']));
		$time = date("g:i A", strtotime($settings['due_date']));
		var_export( $date );
		echo "<br>";
		var_dump( $time );
		?>

		<?php

	}
}
