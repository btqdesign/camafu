<?php

if ( ! function_exists( 'mediadesk_edge_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function mediadesk_edge_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'mediadesk' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_additional_title_area_meta_boxes', 'mediadesk_edge_breadcrumbs_title_type_options_meta_boxes' );
}