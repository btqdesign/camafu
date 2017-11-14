<?php

class MediaDeskClassSeparatorWidget extends MediaDeskClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_separator_widget',
			esc_html__( 'Edge Separator Widget', 'mediadesk' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'mediadesk' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'mediadesk' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'mediadesk' ),
					'full-width' => esc_html__( 'Full Width', 'mediadesk' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'mediadesk' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'mediadesk' ),
					'left'   => esc_html__( 'Left', 'mediadesk' ),
					'right'  => esc_html__( 'Right', 'mediadesk' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'mediadesk' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'mediadesk' ),
					'dashed' => esc_html__( 'Dashed', 'mediadesk' ),
					'dotted' => esc_html__( 'Dotted', 'mediadesk' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'mediadesk' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget edgtf-separator-widget">';
			echo do_shortcode( "[edgtf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}