<?php

class MediaDeskClassSideAreaOpener extends MediaDeskClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_side_area_opener',
			esc_html__( 'Edge Side Area Opener', 'mediadesk' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'mediadesk' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Side Area Opener Margin', 'mediadesk' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mediadesk' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$holder_styles = array();
		
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}
		?>
		
		<a class="edgtf-side-menu-button-opener" href="javascript:void(0)" <?php mediadesk_edge_inline_style( $holder_styles ); ?>>
			<span class="edgtf-side-menu-lines">
        		<span class="edgtf-side-menu-line edgtf-line-1"></span>
        		<span class="edgtf-side-menu-line edgtf-line-2"></span>
                <span class="edgtf-side-menu-line edgtf-line-3"></span>
        	</span>
		</a>
	<?php }
}