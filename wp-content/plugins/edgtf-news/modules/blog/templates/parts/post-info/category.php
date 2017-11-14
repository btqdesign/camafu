<?php
$display_categories = isset( $display_categories ) && $display_categories !== '' ? $display_categories : 'yes';

if ( $display_categories == 'yes' ) { ?>
	<div class="edgtf-post-info-category">
		<?php the_category( ', ' ); ?>
	</div>
<?php } ?>