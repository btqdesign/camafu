<div class="edgtf-news-weather-single">
	<?php if ( ! isset( $day_of_week ) ) { ?>
		<div class="edgtf-weather-date">
			<?php echo esc_html( $dt_today ); ?>
		</div>
	<?php } ?>
	<div class="edgtf-weather-temperature">
		<?php echo esc_html( $today_temp ); ?><sup>°</sup>
		<?php echo esc_html( $temp_unit ); ?>
	</div>
	<?php if ( isset( $day_of_week ) ) { ?>
		<div class="edgtf-weather-day">
			<?php echo esc_html( $day_of_week ); ?>
		</div>
	<?php } ?>
</div>