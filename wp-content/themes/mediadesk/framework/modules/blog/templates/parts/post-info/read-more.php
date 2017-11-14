<?php if ( ! post_password_required() ) { ?>
	<a itemprop="url" class="edgtf-post-read-more-button" href="<?php echo esc_attr( get_the_permalink() ); ?>" target="_self">
		<span class="edgtf-rm-arrow"></span>
		<span class="edgtf-rm-line"></span>
	</a>
<?php } ?>