<?php

if ( ! function_exists( 'mediadesk_edge_map_post_gallery_meta' ) ) {
	
	function mediadesk_edge_map_post_gallery_meta() {
		$gallery_post_format_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'mediadesk' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		mediadesk_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'mediadesk' ),
				'description' => esc_html__( 'Choose your gallery images', 'mediadesk' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_post_gallery_meta', 21 );
}
