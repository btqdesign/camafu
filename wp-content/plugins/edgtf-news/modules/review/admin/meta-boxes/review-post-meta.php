<?php

if ( ! function_exists( 'edgtf_news_map_review_meta' ) ) {
	function edgtf_news_map_review_meta() {
		
		$review_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'name'  => 'review_meta',
				'title' => esc_html__( 'Reviews', 'edgtf-news' )
			)
		);
		
		mediadesk_edge_add_repeater_field(
			array(
				'name'        => 'edgtf_review_fields',
				'parent'      => $review_meta_box,
				'button_text' => esc_html__( 'Add Review', 'edgtf-news' ),
				'fields'      => array(
					array(
						'type'  => 'text',
						'name'  => 'edgtf_review_title',
						'label' => esc_html__( 'Review Title', 'edgtf-news' )
					),
					array(
						'type'        => 'text',
						'name'        => 'edgtf_review_value',
						'label'       => esc_html__( 'Review Value', 'edgtf-news' ),
						'description' => esc_html__( 'Value from 1 to 5', 'edgtf-news' )
					)
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_review_summary',
				'type'        => 'text',
				'label'       => esc_html__( 'Review Summary', 'edgtf-news' ),
				'description' => esc_html__( 'Enter summary text for reviews', 'edgtf-news' ),
				'parent'      => $review_meta_box
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'edgtf_news_map_review_meta', 35 );
}