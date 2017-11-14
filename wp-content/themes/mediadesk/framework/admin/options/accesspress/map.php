<?php

if ( ! function_exists( 'mediadesk_edge_accespress_options_map' ) ) {
	/**
	 * General options page
	 */
	function mediadesk_edge_accespress_options_map() {

		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_accesspress',
				'title' => esc_html__( 'AccessPress', 'mediadesk' ),
				'icon'  => 'fa fa-institution'
			)
		);

		$panel_ap_style = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_accesspress',
				'name'  => 'panel_ap_style',
				'title' => esc_html__( 'AccesPress Options', 'mediadesk' )
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'accesspress_style',
				'default_value' => 'no',
				'label'         => esc_html__( 'Use our predefined style for icons', 'mediadesk' ),
				'parent'        => $panel_ap_style,
				'options'       => mediadesk_edge_get_yes_no_select_array(false)
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_accespress_options_map', 19 );
}