<?php

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_header_standard_meta_map' ) ) {
	function mediadesk_edge_header_standard_meta_map( $parent ) {
		$hide_dep_options = mediadesk_edge_get_hide_dep_for_header_standard_meta_boxes();
		
		mediadesk_edge_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'edgtf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'mediadesk' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'mediadesk' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'mediadesk' ),
					'left'   => esc_html__( 'Left', 'mediadesk' ),
					'right'  => esc_html__( 'Right', 'mediadesk' ),
					'center' => esc_html__( 'Center', 'mediadesk' )
				),
				'hidden_property' => 'edgtf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_additional_header_area_meta_boxes_map', 'mediadesk_edge_header_standard_meta_map' );
}