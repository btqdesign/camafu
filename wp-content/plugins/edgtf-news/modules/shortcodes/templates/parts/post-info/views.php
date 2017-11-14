<?php
$views         = edgtf_news_get_post_count_views( get_the_ID() );
$display_views = isset( $display_views ) && $display_views !== '' ? $display_views : 'yes';

if ( intval( $views ) > 1000 ) {
	$views = round( $views / 1000, 2 ) . esc_html__( 'k', 'edgtf-news' );
}

if ( $display_views == 'yes' ) { ?>
	<div class="edgtf-views-holder">
		<i class="fa fa-eye"></i>
		<span class="edgtf-views"><?php echo esc_html( $views ) ?></span>
	</div>
<?php } ?>