<?php

class MediaDeskClassRawHTMLWidget extends MediaDeskClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_raw_html_widget',
			esc_html__( 'Edge Raw HTML Widget', 'mediadesk' ),
			array( 'description' => esc_html__( 'Add raw HTML holder to widget areas', 'mediadesk' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Extra Class Name', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'mediadesk' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'widget_grid',
				'title'   => esc_html__( 'Widget Grid', 'mediadesk' ),
				'options' => array(
					''     => esc_html__( 'Full Width', 'mediadesk' ),
					'auto' => esc_html__( 'Auto', 'mediadesk' )
				)
			),
			array(
				'type'  => 'textarea',
				'name'  => 'content',
				'title' => esc_html__( 'Content', 'mediadesk' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$extra_class   = array();
		$extra_class[] = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$extra_class[] = ! empty( $instance['widget_grid'] ) && $instance['widget_grid'] === 'auto' ? 'edgtf-grid-auto-width' : '';
		?>
		
		<div class="widget edgtf-raw-html-widget <?php echo esc_attr( implode( ' ', $extra_class ) ); ?>">
			<?php
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			if ( ! empty( $instance['content'] ) ) {
				echo wp_kses_post( $instance['content'] );
			}
			?>
		</div>
		<?php
	}
}