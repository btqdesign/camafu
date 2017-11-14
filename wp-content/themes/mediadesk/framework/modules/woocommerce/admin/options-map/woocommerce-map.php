<?php

if ( ! function_exists( 'mediadesk_edge_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function mediadesk_edge_woocommerce_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'mediadesk' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'edgtf_woo_product_list_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Product List Columns', 'mediadesk' ),
				'default_value' => 'edgtf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for product listing', 'mediadesk' ),
				'options'       => array(
					'edgtf-woocommerce-columns-3' => esc_html__( '3 Columns', 'mediadesk' ),
					'edgtf-woocommerce-columns-4' => esc_html__( '4 Columns', 'mediadesk' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'edgtf_woo_product_list_columns_space',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'mediadesk' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'mediadesk' ),
				'default_value' => 'medium',
				'options'       => mediadesk_edge_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'edgtf_woo_product_list_info_position',
				'type'          => 'select',
				'label'         => esc_html__( 'Product Info Position', 'mediadesk' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'mediadesk' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'mediadesk' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'mediadesk' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'edgtf_woo_products_per_page',
				'type'          => 'text',
				'label'         => esc_html__( 'Number of products per page', 'mediadesk' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'mediadesk' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'edgtf_products_list_title_tag',
				'type'          => 'select',
				'label'         => esc_html__( 'Products Title Tag', 'mediadesk' ),
				'default_value' => 'h5',
				'options'       => mediadesk_edge_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'mediadesk' ),
				'parent'        => $panel_single_product,
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'edgtf_single_product_title_tag',
				'type'          => 'select',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'mediadesk' ),
				'options'       => mediadesk_edge_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'mediadesk' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'mediadesk' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'mediadesk' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'mediadesk' ),
				'parent'        => $panel_single_product,
				'options'       => mediadesk_edge_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'woo_set_single_images_behavior',
				'type'          => 'select',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'mediadesk' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'mediadesk' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'mediadesk' )
				),
				'parent'        => $panel_single_product
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_woocommerce_options_map', 21 );
}