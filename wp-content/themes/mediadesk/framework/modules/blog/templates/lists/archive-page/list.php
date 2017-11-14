<div class="<?php echo esc_attr( $blog_classes ) ?>" <?php echo esc_attr( $blog_data_params ) ?>>
	<div class="edgtf-blog-holder-inner">
		<div class="edgtf-unique-archive-layout clearfix">
			<?php
			$layout_params = array();
			
			/***** Get current category page ID and meta boxes options from author admin panel *****/
			$layout_params['category_name'] = is_category() ? esc_attr( get_the_category_by_ID( mediadesk_edge_get_current_object_id() ) ) : '';
			$layout_params['posts_per_page'] = intval( get_option( 'posts_per_page' ) );
			$layout_params['column_number'] = '2';
			$layout_params['space_between_items'] = 'medium';
			$layout_params['title_tag'] = 'h3';
			$layout_params['display_pagination'] = 'yes';
			$layout_params['pagination_type'] = 'standard';
			echo mediadesk_edge_execute_shortcode( 'edgtf_layout2', $layout_params ); ?>
		</div>
	</div>
</div>