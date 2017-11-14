<?php

if ( ! function_exists( 'mediadesk_edge_map_footer_meta' ) ) {
	function mediadesk_edge_map_footer_meta() {
		
		$footer_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'mediadesk_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'mediadesk' ),
				'name'  => 'footer_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'mediadesk' ),
				'parent'        => $footer_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'mediadesk' ),
				'parent'        => $footer_meta_box,
				'options'       => mediadesk_edge_get_yes_no_select_array()
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'mediadesk' ),
				'parent'        => $footer_meta_box,
				'options'       => mediadesk_edge_get_yes_no_select_array()
			)
		);

		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_uncovering_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Uncovering Footer', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'mediadesk' ),
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'parent'        => $footer_meta_box,
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_footer_meta', 70 );
}