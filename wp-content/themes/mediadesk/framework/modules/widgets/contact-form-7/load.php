<?php

if ( mediadesk_edge_contact_form_7_installed() ) {
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_cf7_widget' );
}

if ( ! function_exists( 'mediadesk_edge_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function mediadesk_edge_register_cf7_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassContactForm7Widget';
		
		return $widgets;
	}
}