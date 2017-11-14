<?php if ( comments_open() ) { ?>
	<div class="edgtf-post-info-comments-holder">
		<a itemprop="url" class="edgtf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<i class="fa fa-comment"></i>
			<span class="edgtf-comments"><?php comments_number( '0', '1', '%' ); ?></span>
		</a>
	</div>
<?php } ?>