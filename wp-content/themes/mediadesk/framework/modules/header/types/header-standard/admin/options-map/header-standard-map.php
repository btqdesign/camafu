<?php

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_standard_options' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_header_standard_map' ) ) {
	function mediadesk_edge_header_standard_map( $parent ) {
		$hide_dep_options = mediadesk_edge_get_hide_dep_for_header_standard_options();
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'mediadesk' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'mediadesk' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'mediadesk' ),
					'left'   => esc_html__( 'Left', 'mediadesk' ),
					'center' => esc_html__( 'Center', 'mediadesk' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_additional_header_menu_area_options_map', 'mediadesk_edge_header_standard_map' );
}