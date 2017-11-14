<?php

if ( ! function_exists( 'edgtf_news_register_block4_widget' ) ) {
	/**
	 * Function that register block4 widget
	 */
	function edgtf_news_register_block4_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetBlock4';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_block4_widget' );
}