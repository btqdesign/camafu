<?php

if ( ! function_exists( 'mediadesk_edge_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function mediadesk_edge_register_social_icon_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_social_icon_widget' );
}