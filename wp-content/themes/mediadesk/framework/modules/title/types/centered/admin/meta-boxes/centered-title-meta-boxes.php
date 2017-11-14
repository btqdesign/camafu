<?php

if ( ! function_exists( 'mediadesk_edge_centered_title_type_options_meta_boxes' ) ) {
	function mediadesk_edge_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'mediadesk' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'mediadesk' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_additional_title_area_meta_boxes', 'mediadesk_edge_centered_title_type_options_meta_boxes', 5 );
}