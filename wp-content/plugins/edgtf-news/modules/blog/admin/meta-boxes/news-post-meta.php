<?php

if ( ! function_exists( 'edgtf_news_map_post_meta' ) ) {
	function edgtf_news_map_post_meta( $post_meta_box ) {
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_news_post_template_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Post Template', 'edgtf-news' ),
				'description'   => esc_html__( 'Choose post template', 'edgtf-news' ),
				'parent'        => $post_meta_box,
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
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_news_post_featured_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Featured Post', 'edgtf-news' ),
				'description'   => esc_html__( 'Choose whether post is featured or not', 'edgtf-news' ),
				'parent'        => $post_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_news_post_trending_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Trending Post', 'edgtf-news' ),
				'description'   => esc_html__( 'Choose whether post is trending or not', 'edgtf-news' ),
				'parent'        => $post_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_news_post_hot_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hot Post', 'edgtf-news' ),
				'description'   => esc_html__( 'Choose whether post is hot or not', 'edgtf-news' ),
				'parent'        => $post_meta_box
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_blog_post_meta', 'edgtf_news_map_post_meta', 5, 1 );
}