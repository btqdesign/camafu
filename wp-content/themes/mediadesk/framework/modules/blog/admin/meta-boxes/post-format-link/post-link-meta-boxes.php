<?php

if ( ! function_exists( 'mediadesk_edge_map_post_link_meta' ) ) {
	function mediadesk_edge_map_post_link_meta() {
		$link_post_format_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'mediadesk' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'mediadesk' ),
				'description' => esc_html__( 'Enter link', 'mediadesk' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_post_link_meta', 24 );
}