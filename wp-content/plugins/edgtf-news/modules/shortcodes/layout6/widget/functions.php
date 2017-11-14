<?php

if ( ! function_exists( 'edgtf_news_register_layout6_widget' ) ) {
	/**
	 * Function that register layout6 widget
	 */
	function edgtf_news_register_layout6_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout6';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout6_widget' );
}