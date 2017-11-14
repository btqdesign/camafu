<div class="edgtf-testimonial-content" id="edgtf-testimonials-<?php echo esc_attr( $current_id ) ?>" <?php mediadesk_edge_inline_style( $box_styles ); ?>>
	<div class="edgtf-testimonial-text-holder">
		<?php if ( ! empty( $text ) ) { ?>
			<p class="edgtf-testimonial-text"><?php echo esc_html( $text ); ?></p>
		<?php } ?>
		<?php if ( has_post_thumbnail() || ! empty( $author ) ) { ?>
			<div class="edgtf-testimonials-author-holder clearfix">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="edgtf-testimonial-image">
						<?php echo get_the_post_thumbnail( get_the_ID(), array( 85, 85 ) ); ?>
					</div>
				<?php } ?>
				<?php if ( ! empty( $author ) ) { ?>
					<h4 class="edgtf-testimonial-author">
						<span class="edgtf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
						<?php if ( ! empty( $position ) ) { ?>
							<span class="edgtf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
						<?php } ?>
					</h4>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>