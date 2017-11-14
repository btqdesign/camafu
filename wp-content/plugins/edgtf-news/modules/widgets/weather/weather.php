<?php

class EdgefNewsClassWeather extends EdgefNewsPhpClassWidget {
	
	public function __construct() {
		parent::__construct(
			'edgtf_weather_widget', // Base ID
			esc_html__( 'Edge Weather Widget', 'edgtf-news' ), // Name
			array( 'description' => esc_html__( 'Displays Weather Forecast', 'edgtf-news' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$app_link     = 'http://openweathermap.org/appid#get';
		$app_location = 'http://openweathermap.org/find';
		
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'edgtf-news' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'layout',
				'title'   => esc_html__( 'Layout', 'edgtf-news' ),
				'options' => array(
					'simple' => esc_html__( 'Simple', 'edgtf-news' ),
					'more'   => esc_html__( 'More Info', 'edgtf-news' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'skin',
				'title'   => esc_html__( 'Skin', 'edgtf-news' ),
				'options' => array(
					''      => esc_html__( 'Default', 'edgtf-news' ),
					'dark'  => esc_html__( 'Dark', 'edgtf-news' ),
					'light' => esc_html__( 'Light', 'edgtf-news' )
				)
			
			),
			array(
				'type'        => 'textfield_html',
				'name'        => 'api_key',
				'title'       => esc_html__( 'API Key', 'edgtf-news' ),
				'description' => '<a href="' . esc_url( $app_link ) . '" target="_blank">' . esc_html__( 'How to get API key', 'edgtf-news' ) . '</a>'
			),
			array(
				'type'        => 'textfield_html',
				'name'        => 'location',
				'title'       => esc_html__( 'Location', 'edgtf-news' ),
				'description' => '<a href="' . esc_url( $app_location ) . '" target="_blank">' . esc_html__( 'Find Your Location (i.e: London,UK or New York City,NY)', 'edgtf-news' ) . '</a>'
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'units',
				'title'   => esc_html__( 'Temperature Unit', 'edgtf-news' ),
				'options' => array(
					'metric'   => esc_html__( 'Metric', 'edgtf-news' ),
					'imperial' => esc_html__( 'Imperial', 'edgtf-news' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'time_zone',
				'title'   => esc_html__( 'Time Zone', 'edgtf-news' ),
				'options' => array(
					'0' => esc_html__( 'UTC', 'edgtf-news' ),
					'1' => esc_html__( 'GMT', 'edgtf-news' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'days_to_show',
				'title'   => esc_html__( 'Days to Show', 'edgtf-news' ),
				'options' => array(
					'1' => esc_html__( 'Current Day', 'edgtf-news' ),
					'5' => esc_html__( '5 Days', 'edgtf-news' ),
				)
			)
		);
	}
	
	public function widget( $args, $instance ) {
		extract( $args );
		
		$classes_array   = array();
		$classes_array[] = 'widget';
		$classes_array[] = 'edgtf-news-weather-widget';
		
		$api_key = '';
		if ( ! empty( $instance['api_key'] ) && $instance['api_key'] !== '' ) {
			$api_key = $instance['api_key'];
		}
		
		$layout = '';
		if ( ! empty( $instance['layout'] ) && $instance['layout'] !== '' ) {
			$layout          = $instance['layout'];
			$classes_array[] = 'edgtf-news-weather-' . $layout;
		}
		
		if ( ! empty( $instance['skin'] ) && $instance['skin'] !== '' ) {
			$skin            = $instance['skin'];
			$classes_array[] = 'edgtf-news-weather-skin-' . $skin;
		}
		
		$location = '';
		if ( ! empty( $instance['location'] ) && $instance['location'] !== '' ) {
			$location = $instance['location'];
		}
		
		$units = '';
		if ( ! empty( $instance['units'] ) && $instance['units'] !== '' ) {
			$units = $instance['units'];
		}
		
		$time_zone = '';
		if ( ! empty( $instance['time_zone'] ) && $instance['time_zone'] !== '' ) {
			$time_zone = $instance['time_zone'];
		}
		
		$days_to_show = '';
		if ( ! empty( $instance['days_to_show'] ) && $instance['days_to_show'] !== '' ) {
			$days_to_show    = $instance['days_to_show'];
			$classes_array[] = 'edgtf-news-weather-days-' . $days_to_show;
		}
		
		if ( ! empty( $instance['widget_title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
		}
		
		echo '<div ' . mediadesk_edge_get_class_attribute( $classes_array ) . '>';
		
		echo edgtf_news_weather_widget_logic(
			array(
				'api_key'      => $api_key,
				'layout'       => $layout,
				'location'     => $location,
				'units'        => $units,
				'time_zone'    => $time_zone,
				'days_to_show' => $days_to_show,
			)
		);
		
		echo '</div>';
	}
}

// the logic
function edgtf_news_weather_widget_logic( $atts ) {
	$html         = '';
	$weather_data = array();
	$api_key      = $atts['api_key'] !== '' ? $atts['api_key'] : false;
	$layout       = $atts['layout'] !== '' ? $atts['layout'] : 'simple';
	$location     = $atts['location'] !== '' ? $atts['location'] : false;
	$units        = $atts['units'] !== '' ? $atts['units'] : false;
	$time_zone    = $atts['time_zone'] !== '' ? $atts['time_zone'] : false;
	$days_to_show = $atts['days_to_show'] !== '' ? $atts['days_to_show'] : 1;
	$locale       = 'en';
	
	$sytem_locale      = get_locale();
	$available_locales = array(
		'en',
		'es',
		'sp',
		'fr',
		'it',
		'de',
		'pt',
		'ro',
		'pl',
		'ru',
		'uk',
		'ua',
		'fi',
		'nl',
		'bg',
		'sv',
		'se',
		'ca',
		'tr',
		'hr',
		'zh',
		'zh_tw',
		'zh_cn',
		'hu'
	);
	
	// check for locale
	if ( in_array( $sytem_locale, $available_locales ) ) {
		$locale = $sytem_locale;
	}
	
	// check for locale by first two digits, used as language in returned data
	if ( in_array( substr( $sytem_locale, 0, 2 ), $available_locales ) ) {
		$locale = substr( $sytem_locale, 0, 2 );
	}
	
	// if location is empty abort
	if ( ! $location ) {
		return edgtf_news_weather_widget_error();
	}
	
	// find and cache city id
	if ( is_numeric( $location ) ) {
		$city_name_slug = sanitize_title( $location );;
		$api_query = "id=" . $location;
	} else {
		$city_name_slug = sanitize_title( $location );
		$api_query      = "q=" . $location;
	}
	
	// set transient name
	$weather_transient_name = 'edgtf_news_' . $city_name_slug . "_" . $days_to_show . "_" . $units . '_' . $locale;
	
	// get weather data
	if ( get_transient( $weather_transient_name ) ) {
		$weather_data = get_transient( $weather_transient_name );
	} else {
		$weather_data['now']      = array();
		$weather_data['forecast'] = array();
		
		// ping weather now api
		$now_ping     = "http://api.openweathermap.org/data/2.5/weather?" . $api_query . "&lang=" . $locale . "&units=" . $units . "&APPID=" . $api_key;
		$now_ping     = str_replace( " ", "", $now_ping );
		$now_ping_get = wp_remote_get( $now_ping );
		
		// ping url error
		if ( is_wp_error( $now_ping_get ) ) {
			return edgtf_news_weather_widget_error( $now_ping_get->get_error_message() );
		}
		
		// get body of request
		$city_data = json_decode( $now_ping_get['body'] );
		
		if ( isset( $city_data->cod ) AND $city_data->cod == 404 ) {
			return edgtf_news_weather_widget_error( $city_data->message );
		} else {
			$weather_data['now'] = $city_data;
		}
		
		if ( $days_to_show == 5 ) {
			
			// ping weather forecast api
			$forecast_ping = "http://api.openweathermap.org/data/2.5/forecast/daily?" . $api_query . "&lang=" . $locale . "&units=" . $units . "&cnt=7&APPID=" . $api_key;
			
			$forecast_ping     = str_replace( " ", "", $forecast_ping );
			$forecast_ping_get = wp_remote_get( $forecast_ping );
			
			if ( is_wp_error( $forecast_ping_get ) ) {
				return edgtf_news_weather_widget_error( $forecast_ping_get->get_error_message() );
			}
			
			$forecast_data = json_decode( $forecast_ping_get['body'] );
			
			if ( isset( $forecast_data->cod ) AND $forecast_data->cod == 404 ) {
				return edgtf_news_weather_widget_error( $forecast_data->message );
			} else {
				$weather_data['forecast'] = $forecast_data;
			}
		}
		
		if ( $weather_data['now'] || $weather_data['forecast'] ) {
			// set the transient, cache for three hours
			set_transient( $weather_transient_name, $weather_data, apply_filters( 'mediadesk_edge_weather_cache', 1800 ) );
		}
	}
	
	// no weather
	if ( ! $weather_data || ! isset( $weather_data['now'] ) ) {
		return edgtf_news_weather_widget_error();
	}
	
	$today_params = array();
	
	if ( $units == 'metric' ) {
		$today_params['temp_unit'] = esc_html__( 'C', 'edgtf-news' );
		$today_params['wind_unit'] = esc_html__( 'm/s', 'edgtf-news' );
	} else {
		$today_params['temp_unit'] = esc_html__( 'F', 'edgtf-news' );
		$today_params['wind_unit'] = esc_html__( 'fps', 'edgtf-news' );
	}
	
	$today_params['dt_today'] = date( 'd M, l', current_time( 'timestamp', $time_zone ) );
	
	// todays temps
	$today = $weather_data['now'];
	
	$today_params['today_temp']              = round( $today->main->temp );
	$today_params['today_high']              = round( $today->main->temp_max );
	$today_params['today_low']               = round( $today->main->temp_min );
	$today_params['today_description']       = $today->weather[0]->description;
	$today_params['today_description_class'] = sanitize_title( $today->weather[0]->description );
	$today_params['today_humidity']          = $today->main->humidity;
	$today_params['today_wind_speed']        = $today->wind->speed;
	$today_params['city']                    = $today->name;
	$today_params['day_number']              = 1;
	
	
	if ( $layout == 'simple' ) {
		$html .= '<div class="edgtf-weather-city">' . $today_params['city'] . '</div>';
	}
	
	$html .= edgtf_news_get_template_part( 'weather/templates/weather-' . $layout, 'widgets', '', $today_params );
	
	if ( $days_to_show == 5 ) {
		$c        = 1;
		$forecast = $weather_data['forecast'];
		
		foreach ( (array) $forecast->list as $forecast ) {
			if ( $c == 1 ) {
				$c ++;
				continue;
			}
			
			$days_of_week = array(
				esc_html__( 'Sun', 'edgtf-news' ),
				esc_html__( 'Mon', 'edgtf-news' ),
				esc_html__( 'Tue', 'edgtf-news' ),
				esc_html__( 'Wed', 'edgtf-news' ),
				esc_html__( 'Thu', 'edgtf-news' ),
				esc_html__( 'Fri', 'edgtf-news' ),
				esc_html__( 'Sat', 'edgtf-news' )
			);
			
			$today_params['today_temp']  = round( $forecast->temp->day );
			$today_params['day_of_week'] = $days_of_week[ date( 'w', $forecast->dt ) ];
			
			//add surrounding div for days after today
			if ( $c == 2 ) {
				$html .= '<div class="edgtf-news-weather-other-days">';
			}
			
			$html .= edgtf_news_get_template_part( 'weather/templates/weather-simple', 'widgets', '', $today_params );
			
			if ( $c == $days_to_show ) {
				$html .= '</div>';
				break;
			}
			
			$c ++;
		}
	}

    return $html;
}

// handle error
function edgtf_news_weather_widget_error( $msg = false ) {
	
	if ( ! $msg ) {
		$msg = esc_html__( 'No weather information available', 'edgtf-news' );
	}
	
	return $msg;
}