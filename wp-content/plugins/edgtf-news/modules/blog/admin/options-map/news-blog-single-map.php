<?php

if ( ! function_exists( 'edgtf_news_blog_single_options_map' ) ) {
	function edgtf_news_blog_single_options_map( $panel_blog_single ) {
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'news_post_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Post Template', 'edgtf-news' ),
				'description'   => esc_html__( 'Choose post template', 'edgtf-news' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
				'options'       => array(
					''                            => esc_html__( 'Default', 'edgtf-news' ),
					'info-on-image'               => esc_html__( 'Info on Featured Image', 'edgtf-news' ),
					'info-above-image'            => esc_html__( 'Info Above Featured Image', 'edgtf-news' ),
					'image-full'                  => esc_html__( 'Featured Image Full Width', 'edgtf-news' ),
					'info-cover-image'            => esc_html__( 'Info Cover Featured Image', 'edgtf-news' ),
					'info-cover-full-width-image' => esc_html__( 'Info Cover Full Width Featured Image', 'edgtf-news' )
				)
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_blog_single_options_map', 'edgtf_news_blog_single_options_map', 5 );
}