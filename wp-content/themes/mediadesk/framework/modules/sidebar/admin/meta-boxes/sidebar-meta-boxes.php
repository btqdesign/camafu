<?php

if ( ! function_exists( 'mediadesk_edge_map_sidebar_meta' ) ) {
	function mediadesk_edge_map_sidebar_meta() {
		$edgtf_sidebar_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'mediadesk_edge_filter_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'mediadesk' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'mediadesk' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'mediadesk' ),
				'parent'      => $edgtf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'mediadesk' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
				)
			)
		);
		
		$edgtf_custom_sidebars = mediadesk_edge_get_custom_sidebars();
		if ( count( $edgtf_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'mediadesk' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'mediadesk' ),
					'parent'      => $edgtf_sidebar_meta_box,
					'options'     => $edgtf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_sidebar_meta', 31 );
}