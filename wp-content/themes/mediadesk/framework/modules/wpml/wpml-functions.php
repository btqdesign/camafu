<?php

if ( ! function_exists( 'mediadesk_edge_disable_wpml_css' ) ) {
	function mediadesk_edge_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'mediadesk_edge_disable_wpml_css' );
}