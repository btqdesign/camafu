<?php
$display_excerpt = isset( $display_excerpt ) && $display_excerpt !== '' ? $display_excerpt : 'yes';
if ( $display_excerpt == 'yes' ) {
	if ( post_password_required() ) {
		echo get_the_password_form();
	} else {
		$excerpt_length = isset( $excerpt_length ) ? $excerpt_length : '';
		$excerpt        = mediadesk_edge_excerpt( $excerpt_length );
		
		if ( ! empty( $excerpt ) ) { ?>
			<div class="edgtf-post-excerpt-holder">
				<p itemprop="description" class="edgtf-post-excerpt">
					<?php echo wp_kses_post( $excerpt ); ?>
				</p>
			</div>
		<?php }
	}
} ?>