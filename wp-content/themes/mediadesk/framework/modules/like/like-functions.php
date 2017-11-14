<?php

if ( ! function_exists( 'mediadesk_edge_like' ) ) {
	/**
	 * Returns MediaDeskClassLike instance
	 *
	 * @return MediaDeskClassLike
	 */
	function mediadesk_edge_like() {
		return MediaDeskClassLike::get_instance();
	}
}

function mediadesk_edge_get_like() {
	
	echo wp_kses( mediadesk_edge_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}