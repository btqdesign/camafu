<?php

if ( ! function_exists( 'mediadesk_edge_map_post_video_meta' ) ) {
	function mediadesk_edge_map_post_video_meta() {
		$video_post_format_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'mediadesk' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'mediadesk' ),
				'description'   => esc_html__( 'Choose video type', 'mediadesk' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'mediadesk' ),
					'self'            => esc_html__( 'Self Hosted', 'mediadesk' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#edgtf_edgtf_video_self_hosted_container',
						'self'            => '#edgtf_edgtf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#edgtf_edgtf_video_embedded_container',
						'self'            => '#edgtf_edgtf_video_self_hosted_container'
					)
				)
			)
		);
		
		$edgtf_video_embedded_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'edgtf_video_embedded_container',
				'hidden_property' => 'edgtf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$edgtf_video_self_hosted_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'edgtf_video_self_hosted_container',
				'hidden_property' => 'edgtf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'mediadesk' ),
				'description' => esc_html__( 'Enter Video URL', 'mediadesk' ),
				'parent'      => $edgtf_video_embedded_container,
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'mediadesk' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'mediadesk' ),
				'parent'      => $edgtf_video_self_hosted_container,
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'mediadesk' ),
				'description' => esc_html__( 'Enter video image', 'mediadesk' ),
				'parent'      => $edgtf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_post_video_meta', 22 );
}