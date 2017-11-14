<?php

if ( ! function_exists( 'mediadesk_edge_map_post_quote_meta' ) ) {
	function mediadesk_edge_map_post_quote_meta() {
		$quote_post_format_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'mediadesk' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'mediadesk' ),
				'description' => esc_html__( 'Enter Quote text', 'mediadesk' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'mediadesk' ),
				'description' => esc_html__( 'Enter Quote author', 'mediadesk' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_post_quote_meta', 25 );
}