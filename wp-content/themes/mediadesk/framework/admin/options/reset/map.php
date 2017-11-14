<?php

if ( ! function_exists( 'mediadesk_edge_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function mediadesk_edge_reset_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'mediadesk' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'mediadesk' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'mediadesk' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_reset_options_map', 100 );
}