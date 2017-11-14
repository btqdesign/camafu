<?php

if ( ! function_exists( 'edgtf_news_register_layout3_widget' ) ) {
	/**
	 * Function that register layout3 widget
	 */
	function edgtf_news_register_layout3_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout3';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout3_widget' );
}