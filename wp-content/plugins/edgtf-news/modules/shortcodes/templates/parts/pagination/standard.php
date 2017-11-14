<?php
$number_of_pages           = $query_result->max_num_pages;
$pagination_numbers_amount = ! empty( $pagination_numbers_amount ) ? $pagination_numbers_amount : 3;

if ( $number_of_pages > 1 ) { ?>
	<div class="edgtf-news-pag-loading">
		<div class="edgtf-news-pag-bounce1"></div>
		<div class="edgtf-news-pag-bounce2"></div>
		<div class="edgtf-news-pag-bounce3"></div>
	</div>
	<?php
	$current_page = $query_result->query['paged'];
	
	if ( $number_of_pages > 1 ) { ?>
		<div class="edgtf-news-standard-pagination">
			<ul>
				<?php if($current_page > 2 && $current_page > $pagination_numbers_amount && $pagination_numbers_amount < $number_of_pages) { ?>
					<li class="edgtf-news-pag-first-page">
						<a href="#" data-paged="1"><span class="arrow_carrot-2left"></span></a>
					</li>
				<?php } ?>
				<li class="edgtf-news-pag-prev">
					<a href="#" data-paged="1"><span class="ion-android-arrow-back"></span></a>
				</li>
				<?php for ( $i = 1; $i <= $number_of_pages; $i ++ ) {
					$active_class = $current_page == $i ? 'edgtf-news-pag-active' : '';
					
					if ( $i <= $pagination_numbers_amount ) { ?>
						<li class="edgtf-news-pag-number <?php echo esc_attr( $active_class ); ?>">
							<a href="#" data-paged="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></a>
						</li>
					<?php } else {
						break;
					} ?>
				<?php } ?>
				<li class="edgtf-news-pag-next">
					<a href="#" data-paged="2"><span class="ion-android-arrow-forward"></span></a>
				</li>
				<?php if ($current_page + 1 < $number_of_pages && $current_page + $pagination_numbers_amount-1 < $number_of_pages && $pagination_numbers_amount < $number_of_pages) { ?>
					<li class="edgtf-news-pag-last-page">
						<a href="#" data-paged="<?php echo esc_attr($number_of_pages); ?>"><span class="arrow_carrot-2right"></span></a>
					</li>
				<?php } ?>
			</ul>
		</div>
	<?php }
}