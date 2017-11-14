<?php
$share_type    = isset( $share_type ) ? $share_type : 'dropdown';
$display_share = isset( $display_share ) && $display_share !== '' ? $display_share : 'yes';
?>
<?php if ( $display_share == 'yes' && mediadesk_edge_options()->getOptionValue( 'enable_social_share' ) === 'yes' && mediadesk_edge_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="edgtf-blog-share">
		<?php echo mediadesk_edge_get_social_share_html( array( 'type' => $share_type ) ); ?>
	</div>
<?php } ?>