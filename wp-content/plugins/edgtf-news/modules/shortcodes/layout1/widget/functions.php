<?php

if ( ! function_exists( 'edgtf_news_register_layout1_widget' ) ) {
	/**
	 * Function that register layout1 widget
	 */
	function edgtf_news_register_layout1_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout1';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout1_widget' );
}