<?php

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'mediadesk_edge_map_blog_meta' ) ) {
	function mediadesk_edge_map_blog_meta() {
		$edgt_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$edgt_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'mediadesk' ),
				'name'  => 'blog_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'mediadesk' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'mediadesk' ),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'mediadesk' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'mediadesk' ),
				'parent'      => $blog_meta_box,
				'options'     => $edgt_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'mediadesk' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'mediadesk' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'mediadesk' ),
					'in-grid'    => esc_html__( 'In Grid', 'mediadesk' ),
					'full-width' => esc_html__( 'Full Width', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'mediadesk' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'mediadesk' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'mediadesk' ),
					'two'   => esc_html__( '2 Columns', 'mediadesk' ),
					'three' => esc_html__( '3 Columns', 'mediadesk' ),
					'four'  => esc_html__( '4 Columns', 'mediadesk' ),
					'five'  => esc_html__( '5 Columns', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'mediadesk' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'mediadesk' ),
				'options'     => mediadesk_edge_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'mediadesk' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'mediadesk' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'mediadesk' ),
					'fixed'    => esc_html__( 'Fixed', 'mediadesk' ),
					'original' => esc_html__( 'Original', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'mediadesk' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'mediadesk' ),
					'standard'        => esc_html__( 'Standard', 'mediadesk' ),
					'load-more'       => esc_html__( 'Load More', 'mediadesk' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'mediadesk' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'edgtf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'mediadesk' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'mediadesk' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_blog_meta', 30 );
}