<?php
namespace XTS\Modules\Header_Builder\Elements;

use XTS\Modules\Header_Builder\Element;

/**
 * ------------------------------------------------------------------------------------------------
 *  Basic structure element - row
 * ------------------------------------------------------------------------------------------------
 */
class Row extends Element {

	public function __construct() {
		parent::__construct();

		$this->template_name = 'row';
	}

	public function map() {
		$this->args = array(
			'type'            => 'row',
			'title'           => esc_html__( 'Row', 'woodmart' ),
			'text'            => esc_html__( 'Row', 'woodmart' ),
			'editable'        => true,
			'container'       => false,
			'edit_on_create'  => false,
			'drag_target_for' => array(),
			'drag_source'     => '',
			'removable'       => false,
			'addable'         => false,
			'it_works'        => 'row',
			'class'           => '',
			'content'         => array(),
			'params'          => array(
				'row_columns'   => array(
					'id'      => 'row_columns',
					'title'   => esc_html__( 'Row columns', 'woodmart' ),
					'type'    => 'selector',
					'tab'     => esc_html__( 'General', 'woodmart' ),
					'group'   => esc_html__( 'Layout', 'woodmart' ),
					'value'   => '3',
					'options' => array(
						'1' => array(
							'label' => 1,
							'value' => '1',
						),
						'3' => array(
							'label' => 3,
							'value' => '3',
						),
					),
				),
				'flex_layout'   => array(
					'id'          => 'flex_layout',
					'title'       => esc_html__( 'Row flex layout', 'woodmart' ),
					'type'        => 'selector',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Layout', 'woodmart' ),
					'value'       => 'flex-middle',
					'options'     => array(
						'flex-middle' => array(
							'label' => esc_html__( 'Flexible middle column', 'woodmart' ),
							'value' => 'flex-middle',
							'image' => WOODMART_ASSETS . '/images/header-builder/header-layout-2.jpg',
						),
						'equal-sides' => array(
							'label' => esc_html__( 'Equal right and left columns', 'woodmart' ),
							'value' => 'equal-sides',
							'image' => WOODMART_ASSETS . '/images/header-builder/header-layout-1.jpg',
						),
					),
					'description' => wp_kses( __( 'Determine the "flex layout" for this row. More information about both options read in our <a href="https://xtemos.com/docs/woodmart/header-builder/header-rows-flex-layouts/" target="_blank">documentation here</a>.', 'woodmart' ), 'default' ),
					'requires'    => array(
						'row_columns' => array(
							'comparison' => 'equal',
							'value'      => '3',
						),
					),
				),
				'height'        => array(
					'id'          => 'height',
					'title'       => esc_html__( 'Row height', 'woodmart' ),
					'type'        => 'slider',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Height', 'woodmart' ),
					'from'        => 0,
					'to'          => 200,
					'value'       => 50,
					'units'       => 'px',
					'description' => esc_html__( 'Determine the header height value in pixels.', 'woodmart' ),
				),
				'mobile_height' => array(
					'id'          => 'mobile_height',
					'title'       => esc_html__( 'Row height on mobile devices', 'woodmart' ),
					'type'        => 'slider',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Height', 'woodmart' ),
					'from'        => 0,
					'to'          => 200,
					'value'       => 40,
					'units'       => 'px',
					'description' => esc_html__( 'Determine the header height for mobile devices value in pixels.', 'woodmart' ),
				),
				'hide_desktop'  => array(
					'id'          => 'hide_desktop',
					'title'       => esc_html__( 'Hide on desktop', 'woodmart' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Responsive', 'woodmart' ),
					'value'       => false,
					'description' => esc_html__( 'Disable this row for desktop devices.', 'woodmart' ),
					'extra_class' => 'xts-col-6',
				),
				'hide_mobile'   => array(
					'id'          => 'hide_mobile',
					'title'       => esc_html__( 'Hide on mobile', 'woodmart' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Responsive', 'woodmart' ),
					'value'       => false,
					'description' => esc_html__( 'Disable this row for mobile devices.', 'woodmart' ),
					'extra_class' => 'xts-col-6',
				),
				'sticky'        => array(
					'id'          => 'sticky',
					'title'       => esc_html__( 'Make it sticky', 'woodmart' ),
					'hint'        => '<video src="' . WOODMART_TOOLTIP_URL . 'hb_row_sticky.mp4" autoplay loop muted></video>',
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Sticky', 'woodmart' ),
					'value'       => false,
					'description' => esc_html__( 'The following option will not work if "Sticky header clone" is enabled in header settings.', 'woodmart' ),
				),
				'sticky_height' => array(
					'id'          => 'sticky_height',
					'title'       => esc_html__( 'Row height on sticky header', 'woodmart' ),
					'type'        => 'slider',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'group'       => esc_html__( 'Sticky', 'woodmart' ),
					'from'        => 0,
					'to'          => 200,
					'value'       => 60,
					'units'       => 'px',
					'description' => esc_html__( 'Determine the header height for sticky header value in pixels.', 'woodmart' ),
					'requires'    => array(
						'sticky' => array(
							'comparison' => 'equal',
							'value'      => true,
						),
					),
				),
				'color_scheme'  => array(
					'id'          => 'color_scheme',
					'title'       => esc_html__( 'Text color scheme', 'woodmart' ),
					'type'        => 'selector',
					'tab'         => esc_html__( 'Style', 'woodmart' ),
					'group'       => esc_html__( 'Colors', 'woodmart' ),
					'value'       => 'dark',
					'options'     => array(
						'dark'  => array(
							'value' => 'dark',
							'label' => esc_html__( 'Dark', 'woodmart' ),
						),
						'light' => array(
							'value' => 'light',
							'label' => esc_html__( 'Light', 'woodmart' ),
						),
					),
					'description' => esc_html__( 'Select different text color scheme depending on your background.', 'woodmart' ),
				),
				'background'    => array(
					'id'          => 'background',
					'group'       => esc_html__( 'Colors', 'woodmart' ),
					'type'        => 'bg',
					'tab'         => esc_html__( 'Style', 'woodmart' ),
					'backdrop'    => true,
					'value'       => '',
					'description' => '',
				),
				'border'        => array(
					'id'              => 'border',
					'group'           => esc_html__( 'Border bottom', 'woodmart' ),
					'type'            => 'border',
					'sides'           => array( 'bottom' ),
					'tab'             => esc_html__( 'Style', 'woodmart' ),
					'colorpicker_top' => true,
					'container'       => true,
					'value'           => '',
					'description'     => esc_html__( 'Set border bottom for this header row.', 'woodmart' ),
				),
				'shadow'        => array(
					'id'          => 'shadow',
					'title'       => esc_html__( 'Shadow', 'woodmart' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'Style', 'woodmart' ),
					'group'       => esc_html__( 'Shadow', 'woodmart' ),
					'value'       => false,
					'description' => esc_html__( 'Add shadow to the header section.', 'woodmart' ),
				),
			),
		);
	}
}
