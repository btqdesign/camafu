<?php

if ( ! function_exists( 'mediadesk_edge_map_post_audio_meta' ) ) {
	function mediadesk_edge_map_post_audio_meta() {
		$audio_post_format_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'mediadesk' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'mediadesk' ),
				'description'   => esc_html__( 'Choose audio type', 'mediadesk' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'mediadesk' ),
					'self'            => esc_html__( 'Self Hosted', 'mediadesk' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#edgtf_edgtf_audio_self_hosted_container',
						'self'            => '#edgtf_edgtf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#edgtf_edgtf_audio_embedded_container',
						'self'            => '#edgtf_edgtf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$edgtf_audio_embedded_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'edgtf_audio_embedded_container',
				'hidden_property' => 'edgtf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$edgtf_audio_self_hosted_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'edgtf_audio_self_hosted_container',
				'hidden_property' => 'edgtf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'mediadesk' ),
				'description' => esc_html__( 'Enter audio URL', 'mediadesk' ),
				'parent'      => $edgtf_audio_embedded_container,
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'mediadesk' ),
				'description' => esc_html__( 'Enter audio link', 'mediadesk' ),
				'parent'      => $edgtf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_post_audio_meta', 23 );
}