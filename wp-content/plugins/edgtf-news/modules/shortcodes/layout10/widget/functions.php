<?php

if ( ! function_exists( 'edgtf_news_register_layout10_widget' ) ) {
	/**
	 * Function that register layout10 widget
	 */
	function edgtf_news_register_layout10_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout10';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout10_widget' );
}