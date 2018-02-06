<?php
$display_review                 = isset( $display_review ) && $display_review !== '' ? $display_review : 'yes';
$review_average                 = floatval(get_post_meta( get_the_ID(), 'edgtf_news_review_average', true ));
$review_average_params['style'] = 'width: ' . ( $review_average * 20 ) . '%'; //20 is 100/5, calculating percent

if ( $display_review == 'yes' && $review_average !== '' ) { ?>
	<div class="edgtf-post-review">
		<?php echo edgtf_news_get_template_part( 'template/stars', 'review', '', $review_average_params ); ?>
	</div>
<?php } ?>
