<?php

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_centered_meta_boxes' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_centered_meta_boxes() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_centered_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_header_centered_meta_map' ) ) {
	function mediadesk_edge_header_centered_meta_map( $parent ) {
		$hide_dep_options = mediadesk_edge_get_hide_dep_for_header_centered_meta_boxes();
		
		mediadesk_edge_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'edgtf_logo_wrapper_padding_header_centered_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'mediadesk' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'mediadesk' ),
				'args'            => array(
					'col_width' => 3
				),
				'hidden_property' => 'edgtf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_header_logo_area_additional_meta_boxes_map', 'mediadesk_edge_header_centered_meta_map', 10, 1 );
}