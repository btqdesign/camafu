<?php
$display_like = isset( $display_like ) && $display_like !== '' ? $display_like : 'yes';

if ( $display_like === 'yes' ) { ?>
	<div class="edgtf-blog-like">
		<?php if ( function_exists( 'mediadesk_edge_get_like' ) ) {
			mediadesk_edge_get_like();
		} ?>
	</div>
<?php } ?>