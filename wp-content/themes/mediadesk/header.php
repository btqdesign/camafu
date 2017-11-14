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

    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            <?php mediadesk_edge_get_header(); ?>
	
	        <?php
	        /**
	         * mediadesk_edge_action_after_header_area hook
	         *
	         * @see mediadesk_edge_back_to_top_button() - hooked with 10
	         * @see mediadesk_edge_get_full_screen_menu() - hooked with 10
	         */
	        do_action( 'mediadesk_edge_action_after_header_area' ); ?>
	        
            <div class="edgtf-content" <?php mediadesk_edge_content_elem_style_attr(); ?>>
                <div class="edgtf-content-inner">