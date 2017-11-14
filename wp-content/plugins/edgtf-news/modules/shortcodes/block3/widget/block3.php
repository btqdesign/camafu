<?php

class EdgefNewsClassWidgetBlock3 extends EdgefNewsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_block3_widget',
			esc_html__( 'Edge Block 3 Widget', 'edgtf-news' ),
			array( 'description' => esc_html__( 'Display a block 3', 'edgtf-news' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		// General Options - start
		$params_general_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_general_shortcode_params( array(
			'column_number',
			'show_filter',
			'filter_by',
			'layout_title',
			'layout_title_tag'
		) ) );
		// General Options - end
		
		// Featured Post Item Options - start
		$params_featured_post_item_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_featured_post_item_shortcode_params( array(
			'featured_display_excerpt',
			'featured_excerpt_length',
			'featured_display_author',
			'featured_display_views',
			'featured_display_share'
		) ) );
		// Featured Post Item Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_post_item_shortcode_params( array(
			'display_excerpt',
			'excerpt_length',
			'display_categories',
			'display_author',
			'display_views',
			'display_like',
			'display_comments',
			'display_share',
			'display_hot_trending_icons'
		) ) );
		// Post Item Options - end
		
		$params_featured_post_item_new_array = array();
		
		foreach ( $params_featured_post_item_array as $featured_params_item ) {
			$featured_params_item['title']         = esc_html__( 'Featured ', 'edgtf-news' ) . $featured_params_item['title'];
			$params_featured_post_item_new_array[] = $featured_params_item;
		}
		
		$this->params = array_merge(
			array(
				array(
					'type' => 'textfield',
					'name' => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'edgtf-news' )
				)
			),
			$params_general_array,
			$params_featured_post_item_new_array,
			$params_post_item_array
		);
	}
	
	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		echo '<div class="widget edgtf-news-widget edgtf-news-block3-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo mediadesk_edge_execute_shortcode( 'edgtf_block3', $instance ); // XSS OK
		echo '</div>';
	}
}