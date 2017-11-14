<?php
get_header();
mediadesk_edge_get_title(); ?>
<div class="edgtf-container edgtf-default-page-template">
	<?php do_action( 'mediadesk_edge_action_after_container_open' ); ?>
	<div class="edgtf-container-inner clearfix">
		<?php
		$edgtf_archive_reaction_params = array();
		
		$edgtf_taxonomy_id   = get_queried_object_id();
		$edgtf_taxonomy      = ! empty( $edgtf_taxonomy_id ) ? get_term_by( 'id', $edgtf_taxonomy_id, 'news-reaction' ) : '';
		$edgtf_taxonomy_slug = ! empty( $edgtf_taxonomy ) ? $edgtf_taxonomy->slug : '';
		
		$edgtf_archive_reaction_params['sort']                = 'reactions';
		$edgtf_archive_reaction_params['reaction']            = $edgtf_taxonomy_slug;
		$edgtf_archive_reaction_params['column_number']       = 2;
		$edgtf_archive_reaction_params['posts_per_page']      = '6';
		$edgtf_archive_reaction_params['display_pagination']  = 'yes';
		$edgtf_archive_reaction_params['pagination_type']     = 'standard';
		$edgtf_archive_reaction_params['space_between_items'] = 'normal';
		$edgtf_archive_reaction_params['excerpt_length']      = '20';
		$edgtf_archive_reaction_params['image_size']          = 'medium';
		
		echo mediadesk_edge_execute_shortcode( 'edgtf_layout1', $edgtf_archive_reaction_params );
		?>
	</div>
	<?php do_action( 'mediadesk_edge_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
