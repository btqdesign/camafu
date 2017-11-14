<?php

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_menu_area_options' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_menu_area_options() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_menu_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_header_menu_area_options_map' ) ) {
	function mediadesk_edge_header_menu_area_options_map( $panel_header ) {
		$hide_dep_options = mediadesk_edge_get_hide_dep_for_header_menu_area_options();
		
		$menu_area_container = mediadesk_edge_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'menu_area_container',
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area In Grid', 'mediadesk' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_container'
				)
			)
		);
		
		$menu_area_in_grid_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_in_grid_container',
				'hidden_property' => 'menu_area_in_grid',
				'hidden_value'    => 'no'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'mediadesk' ),
				'description'   => esc_html__( 'Set grid background color for menu area', 'mediadesk' ),
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'mediadesk' ),
				'description'   => esc_html__( 'Set grid background transparency for menu area', 'mediadesk' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Shadow', 'mediadesk' ),
				'description'   => esc_html__( 'Set shadow on grid area', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'mediadesk' ),
				'description'   => esc_html__( 'Set border on grid area', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_border_container'
				)
			)
		);
		
		$menu_area_in_grid_border_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $menu_area_in_grid_container,
				'name'            => 'menu_area_in_grid_border_container',
				'hidden_property' => 'menu_area_in_grid_border',
				'hidden_value'    => 'no'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'mediadesk' ),
				'description'   => esc_html__( 'Set border color for menu area', 'mediadesk' ),
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'color',
				'name'          => 'menu_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'mediadesk' ),
				'description'   => esc_html__( 'Set background color for menu area', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'mediadesk' ),
				'description'   => esc_html__( 'Set background transparency for menu area', 'mediadesk' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Area Shadow', 'mediadesk' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'mediadesk' ),
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Menu Area Border', 'mediadesk' ),
				'description'   => esc_html__( 'Set border on menu area', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_border_container'
				)
			)
		);
		
		$menu_area_border_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'menu_area_border_container',
				'hidden_property' => 'menu_area_border',
				'hidden_value'    => 'no'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_border_container,
				'type'          => 'color',
				'name'          => 'menu_area_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'mediadesk' ),
				'description'   => esc_html__( 'Set border color for menu area', 'mediadesk' ),
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'menu_area_height',
				'default_value' => '',
				'label'         => esc_html__( 'Height', 'mediadesk' ),
				'description'   => esc_html__( 'Enter header height', 'mediadesk' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'mediadesk_edge_header_menu_area_additional_options', $panel_header );
	}
	
	add_action( 'mediadesk_edge_action_header_menu_area_options_map', 'mediadesk_edge_header_menu_area_options_map', 10, 1 );
}