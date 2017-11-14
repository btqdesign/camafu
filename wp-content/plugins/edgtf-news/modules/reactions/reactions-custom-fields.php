<?php
if ( ! function_exists( 'mediadesk_edge_news_reaction_fields' ) ) {
	function mediadesk_edge_news_reaction_fields() {
		
		$news_fields = mediadesk_edge_add_taxonomy_fields(
			array(
				'scope' => 'news-reaction',
				'name'  => 'news_reaction'
			)
		);
		
		mediadesk_edge_add_taxonomy_field(
			array(
				'name'        => 'reaction_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Reaction Image', 'edgt-news' ),
				'description' => '',
				'parent'      => $news_fields
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_custom_taxonomy_fields', 'mediadesk_edge_news_reaction_fields' );
}