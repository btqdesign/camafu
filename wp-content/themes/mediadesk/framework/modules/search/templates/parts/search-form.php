<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edgtf-search-page-form" method="get">
	<h2 class="edgtf-search-title"><?php esc_html_e( 'New search:', 'mediadesk' ); ?></h2>
	<div class="edgtf-form-holder">
		<input type="text" name="s" class="edgtf-search-field" autocomplete="off" value="" />
		<button type="submit" class="edgtf-search-submit">
			<span class="edgtf-search-submit-label"><?php esc_html_e('Search', 'mediadesk'); ?></span>
			<span class="ion-android-arrow-forward"></span>
		</button>
	</div>
	<div class="edgtf-search-label">
		<?php esc_html_e( 'If you are not happy with the results below please do another search', 'mediadesk' ); ?>
	</div>
</form>