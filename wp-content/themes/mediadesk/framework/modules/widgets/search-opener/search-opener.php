<?php

class MediaDeskClassSearchOpener extends MediaDeskClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_search_opener',
			esc_html__( 'Edge Search Opener', 'mediadesk' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'mediadesk' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'mediadesk' ),
				'description' => esc_html__( 'Define size for search icon', 'mediadesk' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_color',
				'title'       => esc_html__( 'Icon Color', 'mediadesk' ),
				'description' => esc_html__( 'Define color for search icon', 'mediadesk' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_hover_color',
				'title'       => esc_html__( 'Icon Hover Color', 'mediadesk' ),
				'description' => esc_html__( 'Define hover color for search icon', 'mediadesk' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'mediadesk' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mediadesk' )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'show_label',
				'title'       => esc_html__( 'Enable Search Icon Text', 'mediadesk' ),
				'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'mediadesk' ),
				'options'     => mediadesk_edge_get_yes_no_select_array()
			)
		);
	}
	
	public function widget( $args, $instance ) {
		global $mediadesk_edge_global_options, $mediadesk_edge_global_IconCollections;
		
		$search_type_class = 'edgtf-search-opener edgtf-icon-has-hover';
		$styles            = array();
		$show_search_text  = $instance['show_label'] == 'yes' ? true : false;
		
		if ( ! empty( $instance['search_icon_size'] ) ) {
			$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
		}
		
		if ( ! empty( $instance['search_icon_color'] ) ) {
			$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
		}
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
		}
		?>
		
		<a <?php mediadesk_edge_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php mediadesk_edge_inline_style( $styles ); ?> <?php mediadesk_edge_class_attribute( $search_type_class ); ?> href="javascript:void(0)">
            <span class="edgtf-search-opener-wrapper">
                <?php if ( isset( $mediadesk_edge_global_options['search_icon_pack'] ) ) {
	                $mediadesk_edge_global_IconCollections->getSearchIcon( $mediadesk_edge_global_options['search_icon_pack'], false );
                } ?>
	            <?php if ( $show_search_text ) { ?>
		            <span class="edgtf-search-icon-text"><?php esc_html_e( 'Search', 'mediadesk' ); ?></span>
	            <?php } ?>
            </span>
		</a>
	<?php }
}