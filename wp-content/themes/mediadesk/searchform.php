<form role="search" method="get" class="searchform" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'mediadesk' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_html_e( 'Search...', 'mediadesk' ); ?>" value="" name="s" title="<?php esc_html_e( 'Search for:', 'mediadesk' ); ?>"/>
		<button type="submit" class="edgtf-search-submit"><?php echo mediadesk_edge_icon_collections()->renderIcon( 'ion-android-search', 'ion_icons' ); ?></button>
	</div>
</form>