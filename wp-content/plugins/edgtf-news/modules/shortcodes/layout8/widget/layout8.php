<?php

class EdgefNewsClassWidgetLayout8 extends EdgefNewsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_layout8_widget',
			esc_html__( 'Edge Layout 8 Widget', 'edgtf-news' ),
			array( 'description' => esc_html__( 'Display a layout 8', 'edgtf-news' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		// General Options - start
		$params_general_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_general_shortcode_params( array(
			'block_proportion',
			'layout_title',
			'layout_title_tag'
		) ) );
		// General Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_post_item_shortcode_params( array(
			'display_excerpt',
			'excerpt_length',
			'display_categories',
			'display_date',
			'date_format',
			'display_author',
			'display_views',
			'display_like',
			'display_comments',
			'display_share',
			'display_hot_trending_icons'
		) ) );
		// Post Item Options - end
		
		$this->params = array_merge(
			array(
				array(
					'type' => 'textfield',
					'name' => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'edgtf-news' )
				)
			),
			$params_general_array,
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
		
		if ( $instance['column_number'] == '' ) {
			$instance['column_number'] = '1';
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		echo '<div class="widget edgtf-news-widget edgtf-news-layout8-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo mediadesk_edge_execute_shortcode( 'edgtf_layout8', $instance ); // XSS OK
		echo '</div>';
	}
}