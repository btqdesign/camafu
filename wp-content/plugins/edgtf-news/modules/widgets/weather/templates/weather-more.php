<div class="edgtf-news-weather-single edgtf-ws-more">
	<div class="edgtf-news-ws-left">
		<span class="edgtf-news-weather-icon edgtf-news-ws-<?php echo esc_attr( $today_description_class ); ?>"></span>
		<div class="edgtf-weather-temperature">
			<?php echo esc_html( $today_temp ); ?><sup>°</sup>
			<?php echo esc_html( $temp_unit ); ?>
		</div>
	</div>
	<div class="edgtf-news-ws-right">
		<div class="edgtf-weather-top-part">
			<?php if ( isset( $city ) ) { ?>
				<h3 class="edgtf-weather-city"><?php echo esc_html( $city ); ?></h3>
			<?php } ?>
			<div class="edgtf-weather-description">
				<?php echo esc_html( $today_description ) ?>
			</div>
		</div>
		<div class="edgtf-weather-humidity">
			<?php esc_html_e( 'Humidity:', 'edgtf-news' ); echo esc_html( $today_humidity ); echo esc_html__( '%', 'edgtf-news' ); ?>
		</div>
		<div class="edgtf-weather-wind">
			<?php esc_html_e( 'Wind:', 'edgtf-news' ); echo esc_html( $today_wind_speed ); echo esc_html( $wind_unit ); ?>
		</div>
		<div class="edgtf-weather-temperature edgtf-wt-high-low">
			<span class="edgtf-wt-low">
				<?php esc_html_e( 'L ', 'edgtf-news' ); echo esc_html( $today_low ); ?><sup>°</sup><?php echo esc_html( $temp_unit ); ?>
			</span>
			-
			<span class="edgtf-wt-high">
				<?php esc_html_e( 'H ', 'edgtf-news' ); echo esc_html( $today_high ); ?><sup>°</sup><?php echo esc_html( $temp_unit ); ?>
			</span>
		</div>
	</div>
</div>