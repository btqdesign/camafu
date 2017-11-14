<div class="edgtf-news-reaction-term">
	<a href="#" class="edgtf-reaction <?php echo esc_attr( $reacted ); ?>" data-reaction="<?php echo esc_attr( $slug ); ?>">
		<div class="edgtf-rt-image-holder">
			<?php echo wp_get_attachment_image( $image ); ?>
		</div>
		<div class="edgtf-rt-content">
			<div class="edgtf-rt-name">
				<?php echo esc_html( $name ); ?>
			</div>
			<div class="edgtf-rt-value">
				<?php echo esc_html( $reaction_value ); ?>
			</div>
		</div>
	</a>
</div>