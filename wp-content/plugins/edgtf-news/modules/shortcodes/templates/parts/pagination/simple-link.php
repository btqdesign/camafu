<?php

$pagination_simple_link = ! empty( $pagination_simple_link ) ? $pagination_simple_link : '#';
$pagination_simple_link_label = ! empty( $pagination_simple_link_label ) ? $pagination_simple_link_label : esc_html__( 'ALL FEATURES', 'edgtf-news' );
$top_margin = $pagination_simple_link_top_margin !== '' ? mediadesk_edge_filter_px( $pagination_simple_link_top_margin ) : '';
$styles = array();
if ( $top_margin !== '' ) {
	$styles[] = 'margin-top: ' . esc_attr( $top_margin ) . 'px';
}
?>
<div class="edgtf-news-simple-pagination" <?php echo mediadesk_edge_get_inline_style( implode( ';', $styles ) ) ?>>
	<a href="<?php echo esc_url($pagination_simple_link); ?>" target="_self">
		<span class="edgtf-news-simple-pag-label"><?php echo esc_html( $pagination_simple_link_label ) ?></span>
		<span class="edgtf-news-simple-pag-arrow-holder">
			<span class="edgtf-news-simple-pag-arrow"></span>
			<span class="edgtf-news-simple-pag-line"></span>
		</span>
	</a>
</div>