<?php

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_header_menu_area_meta_options_map' ) ) {
	function mediadesk_edge_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = mediadesk_edge_get_hide_dep_for_header_menu_area_meta_boxes();
		
		$menu_area_container = mediadesk_edge_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'edgtf_header_type_meta',
				'hidden_values'   => $hide_dep_options,
				'args'            => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'mediadesk' ),
				'parent'        => $menu_area_container
			)
		);
		
		$mediadesk_custom_sidebars = mediadesk_edge_get_custom_sidebars();
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'mediadesk' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'mediadesk' ),
					'parent'      => $menu_area_container,
					'options'     => $mediadesk_custom_sidebars
				)
			);
		}
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'mediadesk' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'mediadesk' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_menu_area_in_grid_container',
						'no'  => '#edgtf_menu_area_in_grid_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_menu_area_in_grid_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_container = mediadesk_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'edgtf_menu_area_in_grid_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'mediadesk' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'mediadesk' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'mediadesk' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'mediadesk' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'mediadesk' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array()
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'mediadesk' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'mediadesk' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_menu_area_in_grid_border_container',
						'no'  => '#edgtf_menu_area_in_grid_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_menu_area_in_grid_border_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_border_container = mediadesk_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'hidden_property' => 'edgtf_menu_area_in_grid_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mediadesk' ),
				'description' => esc_html__( 'Set border color for grid area', 'mediadesk' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'mediadesk' ),
				'parent'      => $menu_area_container
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'mediadesk' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'mediadesk' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'mediadesk' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'mediadesk' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array()
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'mediadesk' ),
				'description'   => esc_html__( 'Set border on menu area', 'mediadesk' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_menu_area_border_bottom_color_container',
						'no'  => '#edgtf_menu_area_border_bottom_color_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_menu_area_border_bottom_color_container'
					)
				)
			)
		);
		
		$menu_area_border_bottom_color_container = mediadesk_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'edgtf_menu_area_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'mediadesk' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'edgtf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'mediadesk' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'mediadesk' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'mediadesk_edge_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'mediadesk_edge_action_header_menu_area_meta_boxes_map', 'mediadesk_edge_header_menu_area_meta_options_map', 10, 1 );
}