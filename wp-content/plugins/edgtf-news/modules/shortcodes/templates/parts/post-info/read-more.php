<?php
$display_read_more = isset( $display_read_more ) && $display_read_more !== '' ? $display_read_more : 'yes';

if ( $display_read_more === 'yes' && ! post_password_required() ) { ?>
	<a itemprop="url" class="edgtf-read-more-link" href="<?php echo esc_attr( get_the_permalink() ); ?>" target="_self">
		<span class="edgtf-rm-arrow"></span>
		<span class="edgtf-rm-line"></span>
	</a>
<?php } ?>