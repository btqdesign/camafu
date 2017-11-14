<?php

if ( ! function_exists( 'mediadesk_edge_register_footer_sidebar' ) ) {
	function mediadesk_edge_register_footer_sidebar() {
		
		register_sidebar(
			array(
				'id'            => 'footer_top_column_1',
				'name'          => esc_html__( 'Footer Top Column 1', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the first column of top footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-1 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'footer_top_column_2',
				'name'          => esc_html__( 'Footer Top Column 2', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the second column of top footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-2 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'footer_top_column_3',
				'name'          => esc_html__( 'Footer Top Column 3', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the third column of top footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-3 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'footer_top_column_4',
				'name'          => esc_html__( 'Footer Top Column 4', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-4 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'footer_bottom_column_1',
				'name'          => esc_html__( 'Footer Bottom Column 1', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the first column of bottom footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-bottom-column-1 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'footer_bottom_column_2',
				'name'          => esc_html__( 'Footer Bottom Column 2', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the second column of bottom footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-bottom-column-2 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'footer_bottom_column_3',
				'name'          => esc_html__( 'Footer Bottom Column 3', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear in the third column of bottom footer area', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget edgtf-footer-bottom-column-3 %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="edgtf-widget-title">',
				'after_title'   => '</h4>'
			)
		);
	}
	
	add_action( 'widgets_init', 'mediadesk_edge_register_footer_sidebar' );
}

if ( ! function_exists( 'mediadesk_edge_get_footer' ) ) {
	/**
	 * Loads footer HTML
	 */
	function mediadesk_edge_get_footer() {
		$parameters          = array();
		$page_id             = mediadesk_edge_get_page_id();
		$disable_footer_meta = get_post_meta( $page_id, 'edgtf_disable_footer_meta', true );
		$uncovering_footer_meta = mediadesk_edge_get_meta_field_intersect( 'uncovering_footer', $page_id );
		$uncovering_footer      = $uncovering_footer_meta === 'yes' ? 'edgtf-footer-uncover' : '';
		
		$parameters['display_footer']        = $disable_footer_meta === 'yes' ? false : true;
		$parameters['display_footer_top']    = mediadesk_edge_show_footer_top();
		$parameters['display_footer_bottom'] = mediadesk_edge_show_footer_bottom();
		$parameters['holder_classes']        = $uncovering_footer;
		
		mediadesk_edge_get_module_template_part( 'templates/footer', 'footer', '', $parameters );
	}
	
	add_action( 'mediadesk_edge_get_footer_template', 'mediadesk_edge_get_footer' );
}

if ( ! function_exists( 'mediadesk_edge_show_footer_top' ) ) {
	/**
	 * Check footer top showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function mediadesk_edge_show_footer_top() {
		$footer_top_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = ( mediadesk_edge_get_meta_field_intersect( 'show_footer_top' ) === 'yes' ) ? true : false;
		
		//check footer columns.If they are empty, disable footer top
		$columns_flag = false;
		for ( $i = 1; $i <= 4; $i ++ ) {
			$footer_columns_id = 'footer_top_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_top_flag = true;
		}
		
		return $footer_top_flag;
	}
}

if ( ! function_exists( 'mediadesk_edge_show_footer_bottom' ) ) {
	/**
	 * Check footer bottom showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function mediadesk_edge_show_footer_bottom() {
		$footer_bottom_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = ( mediadesk_edge_get_meta_field_intersect( 'show_footer_bottom' ) === 'yes' ) ? true : false;
		
		//check footer columns.If they are empty, disable footer bottom
		$columns_flag = false;
		for ( $i = 1; $i <= 3; $i ++ ) {
			$footer_columns_id = 'footer_bottom_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_bottom_flag = true;
		}
		
		return $footer_bottom_flag;
	}
}

if ( ! function_exists( 'mediadesk_edge_get_content_bottom_area' ) ) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function mediadesk_edge_get_content_bottom_area() {
		$parameters = array();
		
		//Current page id
		$id = mediadesk_edge_get_page_id();
		
		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = mediadesk_edge_get_meta_field_intersect( 'enable_content_bottom_area', $id );
		
		if ( $parameters['content_bottom_area'] === 'yes' ) {
			
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = mediadesk_edge_get_meta_field_intersect( 'content_bottom_sidebar_custom_display', $id );
			//Content bottom area in grid
			$parameters['grid_class'] = ( mediadesk_edge_get_meta_field_intersect( 'content_bottom_in_grid', $id ) ) === 'yes' ? 'edgtf-grid' : 'edgtf-full-width';
			
			$parameters['content_bottom_style'] = array();
			
			//Content bottom area background color
			$background_color = mediadesk_edge_get_meta_field_intersect( 'content_bottom_background_color', $id );
			if ( $background_color !== '' ) {
				$parameters['content_bottom_style'][] = 'background-color: ' . $background_color . ';';
			}
			
			if ( is_active_sidebar( $parameters['content_bottom_area_sidebar'] ) ) {
				mediadesk_edge_get_module_template_part( 'templates/parts/content-bottom-area', 'footer', '', $parameters );
			}
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_get_footer_top' ) ) {
	/**
	 * Return footer top HTML
	 */
	function mediadesk_edge_get_footer_top() {
		$parameters = array();
		
		//get number of top footer columns
		$parameters['footer_top_columns'] = mediadesk_edge_options()->getOptionValue( 'footer_top_columns' );
		
		//get footer top grid/full width class
		$parameters['footer_top_grid_class'] = mediadesk_edge_options()->getOptionValue( 'footer_in_grid' ) === 'yes' ? 'edgtf-grid' : 'edgtf-full-width';
		
		//get footer top other classes
		$footer_top_classes = array();
		
		//footer alignment
		$footer_top_alignment = mediadesk_edge_options()->getOptionValue( 'footer_top_columns_alignment' );
		$footer_top_classes[] = ! empty( $footer_top_alignment ) ? 'edgtf-footer-top-alignment-' . esc_attr( $footer_top_alignment ) : '';//footer column number
		$footer_top_classes[] = 'edgtf-has-' . esc_attr( $parameters['footer_top_columns'] ) . '-columns';
		$footer_top_classes[] = 'edgtf-grid-large-gutter';
		
		$footer_top_classes = apply_filters( 'mediadesk_edge_filter_footer_top_classes', $footer_top_classes );
		
		$parameters['footer_top_classes'] = implode( ' ', $footer_top_classes );
		
		mediadesk_edge_get_module_template_part( 'templates/parts/footer-top', 'footer', '', $parameters );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_footer_bottom' ) ) {
	/**
	 * Return footer bottom HTML
	 */
	function mediadesk_edge_get_footer_bottom() {
		$parameters = array();
		
		//get number of bottom footer columns
		$parameters['footer_bottom_columns'] = mediadesk_edge_options()->getOptionValue( 'footer_bottom_columns' );
		
		//get footer top grid/full width class
		$parameters['footer_bottom_grid_class'] = mediadesk_edge_options()->getOptionValue( 'footer_in_grid' ) === 'yes' ? 'edgtf-grid' : 'edgtf-full-width';
		
		//get footer top other classes
		$footer_bottom_classes = array( 'edgtf-has-' . esc_attr( $parameters['footer_bottom_columns'] ) . '-columns' );
		$footer_bottom_classes = apply_filters( 'mediadesk_edge_filter_footer_bottom_classes', $footer_bottom_classes );
		
		$parameters['footer_bottom_classes'] = implode( ' ', $footer_bottom_classes );
		
		mediadesk_edge_get_module_template_part( 'templates/parts/footer-bottom', 'footer', '', $parameters );
	}
}