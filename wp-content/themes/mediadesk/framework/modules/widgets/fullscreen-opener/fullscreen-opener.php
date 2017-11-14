<?php

class MediaDeskClassFullscreenOpener extends MediaDeskClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_fullscreen_opener',
			esc_html__( 'Edge Fullscreen Opener', 'mediadesk' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the fullscreen', 'mediadesk' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'icon_color',
				'title'       => esc_html__( 'Fullscreen Opener Color', 'mediadesk' ),
				'description' => esc_html__( 'Define color for Fullscreen opener', 'mediadesk' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'icon_hover_color',
				'title'       => esc_html__( 'Fullscreen Opener Hover Color', 'mediadesk' ),
				'description' => esc_html__( 'Define hover color for Fullscreen opener', 'mediadesk' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Fullscreen Opener Margin', 'mediadesk' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Fullscreen Opener Title', 'mediadesk' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$holder_styles = array();
		
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
		}
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}
		?>
		
		<a class="edgtf-fullscreen-button-opener edgtf-icon-has-hover" <?php echo mediadesk_edge_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php mediadesk_edge_inline_style( $holder_styles ); ?>>
			<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
				<h5 class="edgtf-fullscreen-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="edgtf-fullscreen-lines">
        		<span class="edgtf-fullscreen-line edgtf-line-1"></span>
        		<span class="edgtf-fullscreen-line edgtf-line-2"></span>
                <span class="edgtf-fullscreen-line edgtf-line-3"></span>
        	</span>
		</a>
	<?php }
}