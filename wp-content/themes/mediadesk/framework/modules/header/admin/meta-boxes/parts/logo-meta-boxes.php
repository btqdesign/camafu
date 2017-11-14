<?php

if ( ! function_exists( 'mediadesk_edge_logo_meta_box_map' ) ) {
	function mediadesk_edge_logo_meta_box_map() {
		
		$logo_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'mediadesk_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'mediadesk' ),
				'name'  => 'logo_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'mediadesk' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediadesk' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'mediadesk' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediadesk' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'mediadesk' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediadesk' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'mediadesk' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediadesk' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'mediadesk' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediadesk' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_logo_meta_box_map', 47 );
}