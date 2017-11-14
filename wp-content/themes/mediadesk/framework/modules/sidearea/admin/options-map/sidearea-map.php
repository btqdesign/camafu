<?php

if ( ! function_exists( 'mediadesk_edge_sidearea_options_map' ) ) {
	function mediadesk_edge_sidearea_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'mediadesk' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'mediadesk' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = mediadesk_edge_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'mediadesk' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'mediadesk' )
			)
		);
		
		$side_area_icon_style_row1 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_color',
				'label'  => esc_html__( 'Color', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'mediadesk' )
			)
		);
		
		$side_area_icon_style_row2 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'mediadesk' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'mediadesk' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'mediadesk' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'mediadesk' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'mediadesk' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'mediadesk' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'mediadesk' ),
					'left'   => esc_html__( 'Left', 'mediadesk' ),
					'center' => esc_html__( 'Center', 'mediadesk' ),
					'right'  => esc_html__( 'Right', 'mediadesk' )
				)
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_sidearea_options_map', 15 );
}