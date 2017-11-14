<?php

if ( ! function_exists( 'edgtf_news_register_layout7_widget' ) ) {
	/**
	 * Function that register layout7 widget
	 */
	function edgtf_news_register_layout7_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout7';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout7_widget' );
}