<?php

if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

if ( ! function_exists( 'woodmart_get_vc_map_html_block' ) ) {
	function woodmart_get_vc_map_html_block() {
		$value = woodmart_get_html_blocks_array_with_empty();

		return array(
			'name'        => esc_html__( 'HTML Block', 'woodmart' ),
			'base'        => 'html_block',
			'category'    => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Theme elements', 'woodmart' ) ),
			'description' => esc_html__( 'Display pre-built HTML block', 'woodmart' ),
			'icon'        => WOODMART_ASSETS . '/images/vc-icon/html-block.svg',
			'params'      => array(
				array(
					'type'        => 'woodmart_dropdown',
					'heading'     => esc_html__( 'Select block', 'woodmart' ),
					'param_name'  => 'id',
					'admin_label' => true,
					'value'       => $value,
				),
			),
		);
	}
}
