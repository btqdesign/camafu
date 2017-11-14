<?php

if(!function_exists('mediadesk_edge_map_woocommerce_meta')) {
    function mediadesk_edge_map_woocommerce_meta() {
        $woocommerce_meta_box = mediadesk_edge_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'mediadesk'),
                'name' => 'woo_product_meta'
            )
        );

        mediadesk_edge_add_meta_box_field(array(
            'name'        => 'edgtf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'mediadesk'),
            'description' => esc_html__('Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'mediadesk'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'edgtf-woo-image-normal-width' => esc_html__('Default', 'mediadesk'),
                'edgtf-woo-image-large-width'  => esc_html__('Large Width', 'mediadesk')
            )
        ));

        mediadesk_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'mediadesk'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'mediadesk'),
                'parent'        => $woocommerce_meta_box,
                'options'       => mediadesk_edge_get_yes_no_select_array()
            )
        );
    }
	
    add_action('mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_woocommerce_meta', 99);
}