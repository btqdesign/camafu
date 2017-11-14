<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * mediadesk_edge_action_header_meta hook
	 *
	 * @see mediadesk_edge_header_meta() - hooked with 10
	 * @see mediadesk_edge_user_scalable_meta - hooked with 10
	 * @see edgtf_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'mediadesk_edge_action_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * mediadesk_edge_action_after_body_tag hook
	 *
	 * @see mediadesk_edge_get_side_area() - hooked with 10
	 * @see mediadesk_edge_load_fullscreen_template() - hooked with 10
	 * @see mediadesk_edge_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'mediadesk_edge_action_after_body_tag' ); ?>
	
	<div class="edgtf-wrapper edgtf-404-page">
		<div class="edgtf-wrapper-inner">
			<?php mediadesk_edge_get_header(); ?>
			
			<div class="edgtf-content" <?php mediadesk_edge_content_elem_style_attr(); ?>>
				<div class="edgtf-content-inner">
					<div class="edgtf-page-not-found">
						<?php
						$edgtf_title_404       = mediadesk_edge_options()->getOptionValue( '404_title' );
						$edgtf_text_404        = mediadesk_edge_options()->getOptionValue( '404_text' );
						$edgtf_button_label    = mediadesk_edge_options()->getOptionValue( '404_back_to_home' );
						$edgtf_button_style    = mediadesk_edge_options()->getOptionValue( '404_button_style' );
						?>
						
						<h1 class="edgtf-404-title">
							<?php if ( ! empty( $edgtf_title_404 ) ) {
								echo esc_html( $edgtf_title_404 );
							} else {
								esc_html_e( 'The page you are looking is not found', 'mediadesk' );
							} ?>
						</h1>
						
						<p class="edgtf-404-text">
							<?php if ( ! empty( $edgtf_text_404 ) ) {
								echo esc_html( $edgtf_text_404 );
							} else {
								esc_html_e( 'The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'mediadesk' );
							} ?>
						</p>
						
						<?php
						$edgtf_params           = array();
						$edgtf_params['text']   = ! empty( $edgtf_button_label ) ? $edgtf_button_label : esc_html__( 'Back to home', 'mediadesk' );
						$edgtf_params['link']   = esc_url( home_url( '/' ) );
						$edgtf_params['target'] = '_self';
						$edgtf_params['size']   = 'large';
						
						if ( $edgtf_button_style == 'light-style' ) {
							$edgtf_params['custom_class'] = 'edgtf-btn-light-style';
						}
						
						echo mediadesk_edge_execute_shortcode( 'edgtf_button', $edgtf_params ); ?>
					</div>
					<div class="edgtf-grid">
						<?php
						$layout_params = array();
						$layout_params['posts_per_page'] = '9';
						$layout_params['column_number'] = '3';
						$layout_params['space_between_items'] = 'medium';
						$layout_params['title_tag'] = 'h3';
						echo mediadesk_edge_execute_shortcode( 'edgtf_layout2', $layout_params ); ?>
					</div>
					
		<?php get_footer(); ?>