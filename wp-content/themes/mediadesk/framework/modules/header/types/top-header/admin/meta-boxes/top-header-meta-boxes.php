<?php

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function mediadesk_edge_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_header_top_area_meta_options_map' ) ) {
	function mediadesk_edge_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = mediadesk_edge_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = mediadesk_edge_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'edgtf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'mediadesk' ),
				'parent'        => $top_header_container,
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_top_bar_container_no_style',
						'no'  => '#edgtf_top_bar_container_no_style',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_top_bar_container_no_style'
					)
				)
			)
		);
		
		$top_bar_container = mediadesk_edge_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'hidden_property' => 'edgtf_top_bar_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'mediadesk' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'mediadesk' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array()
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'   => 'edgtf_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'mediadesk' ),
				'parent' => $top_bar_container
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'mediadesk' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'mediadesk' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'mediadesk' ),
				'description'   => esc_html__( 'Set border on top bar', 'mediadesk' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_top_bar_border_container',
						'no'  => '#edgtf_top_bar_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_top_bar_border_container'
					)
				)
			)
		);
		
		$top_bar_border_container = mediadesk_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'edgtf_top_bar_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose color for top bar border', 'mediadesk' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_additional_header_area_meta_boxes_map', 'mediadesk_edge_header_top_area_meta_options_map', 10, 1 );
}