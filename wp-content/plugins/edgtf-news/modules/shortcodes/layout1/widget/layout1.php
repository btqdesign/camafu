<?php

class EdgefNewsClassWidgetLayout1 extends EdgefNewsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_layout1_widget',
			esc_html__( 'Edge Layout 1 Widget', 'edgtf-news' ),
			array( 'description' => esc_html__( 'Display a layout 1', 'edgtf-news' ) )
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
			'display_categories',
			'display_author',
			'display_views'
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
		
		echo '<div class="widget edgtf-news-widget edgtf-news-layout1-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo mediadesk_edge_execute_shortcode( 'edgtf_layout1', $instance ); // XSS OK
		echo '</div>';
	}
}