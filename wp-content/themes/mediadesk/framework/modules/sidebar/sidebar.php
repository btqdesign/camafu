<?php

if ( ! function_exists( 'mediadesk_edge_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function mediadesk_edge_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'mediadesk' ),
				'description'   => esc_html__( 'Default Sidebar', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="edgtf-widget-title-holder"><h5 class="edgtf-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'mediadesk_edge_register_sidebars', 1 );
}

if ( ! function_exists( 'mediadesk_edge_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates MediaDeskClassSidebar object
	 */
	function mediadesk_edge_add_support_custom_sidebar() {
		add_theme_support( 'MediaDeskClassSidebar' );
		
		if ( get_theme_support( 'MediaDeskClassSidebar' ) ) {
			new MediaDeskClassSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'mediadesk_edge_add_support_custom_sidebar' );
}