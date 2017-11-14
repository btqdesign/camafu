<?php

/*** Child Theme Function  ***/

function mediadesk_edge_child_theme_enqueue_scripts() {
	
	$parent_style = 'mediadesk_edge_default_style';
	
	wp_enqueue_style('mediadesk_edge_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action( 'wp_enqueue_scripts', 'mediadesk_edge_child_theme_enqueue_scripts' );