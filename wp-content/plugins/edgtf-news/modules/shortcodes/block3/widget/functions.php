<?php

if ( ! function_exists( 'edgtf_news_register_block3_widget' ) ) {
	/**
	 * Function that register block3 widget
	 */
	function edgtf_news_register_block3_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetBlock3';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_block3_widget' );
}