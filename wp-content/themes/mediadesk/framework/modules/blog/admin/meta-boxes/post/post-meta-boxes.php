<?php

/*** Post Settings ***/

if ( ! function_exists( 'mediadesk_edge_map_post_meta' ) ) {
	function mediadesk_edge_map_post_meta() {
		
		$post_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'mediadesk' ),
				'name'  => 'post-meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'mediadesk' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mediadesk' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
				)
			)
		);
		
		$mediadesk_custom_sidebars = mediadesk_edge_get_custom_sidebars();
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_meta_box_field( array(
				'name'        => 'edgtf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'mediadesk' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'mediadesk' ),
				'parent'      => $post_meta_box,
				'options'     => mediadesk_edge_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'mediadesk' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'mediadesk' ),
				'parent'      => $post_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'mediadesk' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'mediadesk' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'mediadesk' ),
					'large-width'        => esc_html__( 'Large Width', 'mediadesk' ),
					'large-height'       => esc_html__( 'Large Height', 'mediadesk' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'mediadesk' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'mediadesk' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'mediadesk' ),
					'large-width' => esc_html__( 'Large Width', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'mediadesk' ),
				'parent'        => $post_meta_box,
				'options'       => mediadesk_edge_get_yes_no_select_array()
			)
		);

		do_action('mediadesk_edge_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_post_meta', 20 );
}
