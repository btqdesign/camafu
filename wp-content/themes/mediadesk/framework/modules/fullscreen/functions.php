<?php

if ( ! function_exists( 'mediadesk_edge_load_fullscreen_template' ) ) {
	function mediadesk_edge_load_fullscreen_template() {
		$title_tag = mediadesk_edge_options()->getOptionValue('fullscreen_title_tag');

		$parameters = array(
			'post_id' => mediadesk_edge_options()->getOptionValue('fullscreen_post'),
			'title'   => mediadesk_edge_options()->getOptionValue('fullscreen_title'),
			'nav_1'   => mediadesk_edge_options()->getOptionValue('fullscreen_nav_1'),
			'nav_2'   => mediadesk_edge_options()->getOptionValue('fullscreen_nav_2'),
			'title_tag' => $title_tag !== '' ? $title_tag : 'h3'
		);

		if ( has_post_thumbnail( $parameters['post_id'] ) ) {
			$image_id = get_post_thumbnail_id($parameters['post_id']);
			$url = wp_get_attachment_image_url($image_id, 'full');

			$parameters['left_style'] = 'background-image: url(' . esc_url( $url ) . ')';
		}

		$parameters = apply_filters( 'mediadesk_edge_filter_fullscreen_params', $parameters );

		if ( mediadesk_edge_active_widget( false, false, 'edgtf_fullscreen_opener' ) && ! is_admin() ) {
			mediadesk_edge_get_module_template_part( 'templates/fullscreen', 'fullscreen', '', $parameters );
		}
	}

	add_action( 'mediadesk_edge_action_after_body_tag', 'mediadesk_edge_load_fullscreen_template', 10 );
}

if ( ! function_exists( 'mediadesk_edge_fullscreen_body_class' ) ) {
	/**
	 * Function that adds body classes for fullscreen
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function mediadesk_edge_fullscreen_body_class( $classes ) {

		if ( is_active_widget( false, false, 'edgtf_fullscreen_opener' ) ) {

			$classes[] = 'edgtf-has-fullscreen-area';
		}

		return $classes;
	}

	add_filter( 'body_class', 'mediadesk_edge_fullscreen_body_class' );
}