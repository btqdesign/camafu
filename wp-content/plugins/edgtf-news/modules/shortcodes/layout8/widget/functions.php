<?php

if ( ! function_exists( 'edgtf_news_register_layout8_widget' ) ) {
	/**
	 * Function that register layout8 widget
	 */
	function edgtf_news_register_layout8_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout8';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout8_widget' );
}