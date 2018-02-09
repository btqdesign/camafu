<?php
include_once get_template_directory() . '/theme-includes.php';

if ( ! function_exists( 'mediadesk_edge_styles' ) ) {
	/**
	 * Function that includes theme's core styles
	 */
	function mediadesk_edge_styles() {
		
		//include theme's core styles
		wp_enqueue_style( 'mediadesk_edge_default_style', EDGE_ROOT . '/style.css' );
		wp_enqueue_style( 'mediadesk_edge_modules', EDGE_ASSETS_ROOT . '/css/modules.min.css' );
		
		mediadesk_edge_icon_collections()->enqueueStyles();
		
		wp_enqueue_style( 'wp-mediaelement' );
		
		do_action( 'mediadesk_edge_action_enqueue_third_party_styles' );
		
		//is woocommerce installed?
		if ( mediadesk_edge_is_woocommerce_installed() && mediadesk_edge_load_woo_assets() ) {
			//include theme's woocommerce styles
			wp_enqueue_style( 'mediadesk_edge_woo', EDGE_ASSETS_ROOT . '/css/woocommerce.min.css' );
		}
		
		//define files after which style dynamic needs to be included. It should be included last so it can override other files
		$style_dynamic_deps_array = array();
		if ( mediadesk_edge_load_woo_assets() ) {
			$style_dynamic_deps_array = array( 'mediadesk_edge_woo', 'mediadesk_edge_woo_responsive' );
		}
		
		if ( file_exists( EDGE_ROOT_DIR . '/assets/css/style_dynamic.css' ) && mediadesk_edge_is_css_folder_writable() && ! is_multisite() ) {
			wp_enqueue_style( 'mediadesk_edge_style_dynamic', EDGE_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime( EDGE_ROOT_DIR . '/assets/css/style_dynamic.css' ) ); //it must be included after woocommerce styles so it can override it
		} else if ( file_exists( EDGE_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . mediadesk_edge_get_multisite_blog_id() . '.css' ) && mediadesk_edge_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style( 'mediadesk_edge_style_dynamic', EDGE_ASSETS_ROOT . '/css/style_dynamic_ms_id_' . mediadesk_edge_get_multisite_blog_id() . '.css', $style_dynamic_deps_array, filemtime( EDGE_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . mediadesk_edge_get_multisite_blog_id() . '.css' ) ); //it must be included after woocommerce styles so it can override it
		}
		
		//is responsive option turned on?
		if ( mediadesk_edge_is_responsive_on() ) {
			wp_enqueue_style( 'mediadesk_edge_modules_responsive', EDGE_ASSETS_ROOT . '/css/modules-responsive.min.css' );
			
			//is woocommerce installed?
			if ( mediadesk_edge_is_woocommerce_installed() && mediadesk_edge_load_woo_assets() ) {
				//include theme's woocommerce responsive styles
				wp_enqueue_style( 'mediadesk_edge_woo_responsive', EDGE_ASSETS_ROOT . '/css/woocommerce-responsive.min.css' );
			}
			
			//include proper styles
			if ( file_exists( EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) && mediadesk_edge_is_css_folder_writable() && ! is_multisite() ) {
				wp_enqueue_style( 'mediadesk_edge_style_dynamic_responsive', EDGE_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime( EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) );
			} else if ( file_exists( EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . mediadesk_edge_get_multisite_blog_id() . '.css' ) && mediadesk_edge_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style( 'mediadesk_edge_style_dynamic_responsive', EDGE_ASSETS_ROOT . '/css/style_dynamic_responsive_ms_id_' . mediadesk_edge_get_multisite_blog_id() . '.css', array(), filemtime( EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . mediadesk_edge_get_multisite_blog_id() . '.css' ) );
			}
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_styles' );
}

if ( ! function_exists( 'mediadesk_edge_google_fonts_styles' ) ) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function mediadesk_edge_google_fonts_styles() {
		$font_simple_field_array = mediadesk_edge_options()->getOptionsByType( 'fontsimple' );
		if ( ! ( is_array( $font_simple_field_array ) && count( $font_simple_field_array ) > 0 ) ) {
			$font_simple_field_array = array();
		}
		
		$font_field_array = mediadesk_edge_options()->getOptionsByType( 'font' );
		if ( ! ( is_array( $font_field_array ) && count( $font_field_array ) > 0 ) ) {
			$font_field_array = array();
		}
		
		$available_font_options = array_merge( $font_simple_field_array, $font_field_array );
		
		$google_font_weight_array = mediadesk_edge_options()->getOptionValue( 'google_font_weight' );
		if ( ! empty( $google_font_weight_array ) ) {
			$google_font_weight_array = array_slice( mediadesk_edge_options()->getOptionValue( 'google_font_weight' ), 1 );
		}
		
		$font_weight_str = '300,400,600,700,900';
		if ( ! empty( $google_font_weight_array ) && $google_font_weight_array !== '' ) {
			$font_weight_str = implode( ',', $google_font_weight_array );
		}
		
		$google_font_subset_array = mediadesk_edge_options()->getOptionValue( 'google_font_subset' );
		if ( ! empty( $google_font_subset_array ) ) {
			$google_font_subset_array = array_slice( mediadesk_edge_options()->getOptionValue( 'google_font_subset' ), 1 );
		}
		
		$font_subset_str = 'latin-ext';
		if ( ! empty( $google_font_subset_array ) && $google_font_subset_array !== '' ) {
			$font_subset_str = implode( ',', $google_font_subset_array );
		}
		
		//default fonts
		$default_font_family = array(
			//'Open Sans',
			//'Playfair Display'
			'Lato',
			'Libre Baskerville'	
		);
		
		$modified_default_font_family = array();
		foreach ( $default_font_family as $default_font ) {
			$modified_default_font_family[] = $default_font . ':' . $font_weight_str;
		}
		
		$default_font_string = implode( '|', $modified_default_font_family );
		
		//define available font options array
		$fonts_array = array();
		foreach ( $available_font_options as $font_option ) {
			//is font set and not set to default and not empty?
			$font_option_value = mediadesk_edge_options()->getOptionValue( $font_option );
			
			if ( mediadesk_edge_is_font_option_valid( $font_option_value ) && ! mediadesk_edge_is_native_font( $font_option_value ) ) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				
				if ( ! in_array( str_replace( '+', ' ', $font_option_value ), $default_font_family ) && ! in_array( $font_option_string, $fonts_array ) ) {
					$fonts_array[] = $font_option_string;
				}
			}
		}
		
		$fonts_array         = array_diff( $fonts_array, array( '-1:' . $font_weight_str ) );
		$google_fonts_string = implode( '|', $fonts_array );
		
		$protocol = is_ssl() ? 'https:' : 'http:';
		
		//is google font option checked anywhere in theme?
		if ( count( $fonts_array ) > 0 ) {
			
			//include all checked fonts
			$fonts_full_list      = $default_font_string . '|' . str_replace( '+', ' ', $google_fonts_string );
			$fonts_full_list_args = array(
				'family' => urlencode( $fonts_full_list ),
				'subset' => urlencode( $font_subset_str ),
			);
			
			$mediadesk_edge_global_fonts = add_query_arg( $fonts_full_list_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'mediadesk_edge_google_fonts', esc_url_raw( $mediadesk_edge_global_fonts ), array(), '1.0.0' );
			
		} else {
			//include default google font that theme is using
			$default_fonts_args          = array(
				'family' => urlencode( $default_font_string ),
				'subset' => urlencode( $font_subset_str ),
			);
			$mediadesk_edge_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'mediadesk_edge_google_fonts', esc_url_raw( $mediadesk_edge_global_fonts ), array(), '1.0.0' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_google_fonts_styles' );
}

if ( ! function_exists( 'mediadesk_edge_scripts' ) ) {
	/**
	 * Function that includes all necessary scripts
	 */
	function mediadesk_edge_scripts() {
		global $wp_scripts;
		
		//init theme core scripts
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'wp-mediaelement' );
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'appear', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', EDGE_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-plugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', EDGE_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'slick', EDGE_ASSETS_ROOT . '/js/modules/plugins/slick.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'chart', EDGE_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fluidvids', EDGE_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'nicescroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ScrollToPlugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'parallax', EDGE_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing-1.3', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', EDGE_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'packery', EDGE_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
		
		do_action( 'mediadesk_edge_action_enqueue_third_party_scripts' );
		
		if ( mediadesk_edge_is_woocommerce_installed() ) {
			wp_enqueue_script( 'select2' );
		}
		
		if ( mediadesk_edge_is_page_smooth_scroll_enabled() ) {
			wp_enqueue_script( 'tweenLite', EDGE_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'smoothPageScroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/smoothPageScroll.js', array( 'jquery' ), false, true );
		}
		
		//include google map api script
		$google_maps_api_key = mediadesk_edge_options()->getOptionValue( 'google_maps_api_key' );
		$google_maps_extensions = '';
		$google_maps_extensions_array = apply_filters('mediadesk_edge_filter_google_maps_extensions_array', array());
		if(!empty($google_maps_extensions_array)) {
            $google_maps_extensions .= '&libraries=';
            $google_maps_extensions .= implode(',', $google_maps_extensions_array);
        }
		if ( ! empty( $google_maps_api_key ) ) {
			wp_enqueue_script( 'mediadesk_edge_google_map_api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ).$google_maps_extensions, array(), false, true );
		} else {
			wp_enqueue_script( 'mediadesk_edge_google_map_api', '//maps.googleapis.com/maps/api/js', array(), false, true );
		}
		
		wp_enqueue_script( 'mediadesk_edge_modules', EDGE_ASSETS_ROOT . '/js/modules.min.js', array( 'jquery' ), false, true );
		
		//include comment reply script
		$wp_scripts->add_data( 'comment-reply', 'group', 1 );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_scripts' );
}

if ( ! function_exists( 'mediadesk_edge_theme_setup' ) ) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function mediadesk_edge_theme_setup() {
		//add support for feed links
		add_theme_support( 'automatic-feed-links' );
		
		//add support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );
		
		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		//add theme support for title tag
		add_theme_support( 'title-tag' );
		
		//add theme support for editor style
		add_editor_style( 'framework/admin/assets/css/edgtf-editor-style.css' );
		
		//defined content width variable
		$GLOBALS['content_width'] = apply_filters( 'mediadesk_edge_filter_set_content_width', 1100 );
		
		//define thumbnail sizes
		add_image_size( 'mediadesk_edge_image_square', 550, 550, true );
		add_image_size( 'mediadesk_edge_image_landscape', 1100, 550, true );
		add_image_size( 'mediadesk_edge_image_portrait', 550, 1100, true );
		add_image_size( 'mediadesk_edge_image_huge', 1100, 1100, true );
		
		load_theme_textdomain( 'mediadesk', get_template_directory() . '/languages' );
	}
	
	add_action( 'after_setup_theme', 'mediadesk_edge_theme_setup' );
}

if ( ! function_exists( 'mediadesk_edge_is_responsive_on' ) ) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function mediadesk_edge_is_responsive_on() {
		return mediadesk_edge_options()->getOptionValue( 'responsiveness' ) !== 'no';
	}
}

if ( ! function_exists( 'mediadesk_edge_rgba_color' ) ) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function mediadesk_edge_rgba_color( $color, $transparency ) {
		if ( $color !== '' && $transparency !== '' ) {
			$rgba_color = '';
			
			$rgb_color_array = mediadesk_edge_hex2rgb( $color );
			$rgba_color      .= 'rgba(' . implode( ', ', $rgb_color_array ) . ', ' . $transparency . ')';
			
			return $rgba_color;
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_header_meta' ) ) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function mediadesk_edge_header_meta() { ?>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
	
	<?php }
	
	add_action( 'mediadesk_edge_action_header_meta', 'mediadesk_edge_header_meta' );
}

if ( ! function_exists( 'mediadesk_edge_user_scalable_meta' ) ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to mediadesk_edge_action_header_meta action
	 */
	function mediadesk_edge_user_scalable_meta() {
		//is responsiveness option is chosen?
		if ( mediadesk_edge_is_responsive_on() ) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}
	
	add_action( 'mediadesk_edge_action_header_meta', 'mediadesk_edge_user_scalable_meta' );
}

if ( ! function_exists( 'mediadesk_edge_smooth_page_transitions' ) ) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to mediadesk_edge_action_after_body_tag action
	 */
	function mediadesk_edge_smooth_page_transitions() {
		$id = mediadesk_edge_get_page_id();
		
		if ( mediadesk_edge_get_meta_field_intersect( 'smooth_page_transitions', $id ) === 'yes' &&
		     mediadesk_edge_get_meta_field_intersect( 'page_transition_preloader', $id ) === 'yes'
		) { ?>
			<div class="edgtf-smooth-transition-loader edgtf-mimic-ajax">
				<div class="edgtf-st-loader">
					<div class="edgtf-st-loader1">
						<?php mediadesk_edge_loading_spinners(); ?>
					</div>
				</div>
			</div>
		<?php }
	}
	
	add_action( 'mediadesk_edge_action_after_body_tag', 'mediadesk_edge_smooth_page_transitions', 10 );
}

if (!function_exists('mediadesk_edge_back_to_top_button')) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to mediadesk_edge_action_after_header_area action
	 */
	function mediadesk_edge_back_to_top_button() {
		if (mediadesk_edge_options()->getOptionValue('show_back_button') == 'yes') { ?>
			<a id='edgtf-back-to-top' href='#'>
                <span class="edgtf-icon-stack">
                     <span class="edgtf-back-to-top-caret"></span>
                     <span class="edgtf-back-to-top-line"></span>
                </span>
			</a>
		<?php }
	}
	
	add_action('mediadesk_edge_action_after_header_area', 'mediadesk_edge_back_to_top_button', 10);
}

if ( ! function_exists( 'mediadesk_edge_get_page_id' ) ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see mediadesk_edge_is_woocommerce_installed()
	 * @see mediadesk_edge_is_woocommerce_shop()
	 */
	function mediadesk_edge_get_page_id() {
		if ( mediadesk_edge_is_woocommerce_installed() && mediadesk_edge_is_woocommerce_shop() ) {
			return mediadesk_edge_get_woo_shop_page_id();
		}
		
		if ( mediadesk_edge_is_default_wp_template() ) {
			return - 1;
		}
		
		return get_queried_object_id();
	}
}

if ( ! function_exists( 'mediadesk_edge_get_multisite_blog_id' ) ) {
	/**
	 * Check is multisite and return blog id
	 *
	 * @return int
	 */
	function mediadesk_edge_get_multisite_blog_id() {
		if ( is_multisite() ) {
			return get_blog_details()->blog_id;
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_is_default_wp_template' ) ) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function mediadesk_edge_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'mediadesk_edge_has_shortcode' ) ) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function mediadesk_edge_has_shortcode( $shortcode, $content = '' ) {
		$has_shortcode = false;
		
		if ( $shortcode ) {
			//if content variable isn't past
			if ( $content == '' ) {
				//take content from current post
				$page_id = mediadesk_edge_get_page_id();
				if ( ! empty( $page_id ) ) {
					$current_post = get_post( $page_id );
					
					if ( is_object( $current_post ) && property_exists( $current_post, 'post_content' ) ) {
						$content = $current_post->post_content;
					}
				}
			}
			
			//does content has shortcode added?
			if ( stripos( $content, '[' . $shortcode ) !== false ) {
				$has_shortcode = true;
			}
		}
		
		return $has_shortcode;
	}
}

if ( ! function_exists( 'mediadesk_edge_get_unique_page_class' ) ) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * $params int $id is page id
	 * $params bool $allowSingleProductOption
	 * @return string
	 */
	function mediadesk_edge_get_unique_page_class( $id, $allowSingleProductOption = false ) {
		$page_class = '';
		
		if ( mediadesk_edge_is_woocommerce_installed() && $allowSingleProductOption ) {
			
			if ( is_product() ) {
				$id = get_the_ID();
			}
		}
		
		if ( is_single() ) {
			$page_class = '.postid-' . $id;
		} elseif ( is_home() ) {
			$page_class .= '.home';
		} elseif ( is_archive() || $id === mediadesk_edge_get_woo_shop_page_id() ) {
			$page_class .= '.archive';
		} elseif ( is_search() ) {
			$page_class .= '.search';
		} elseif ( is_404() ) {
			$page_class .= '.error404';
		} else {
			$page_class .= '.page-id-' . $id;
		}
		
		return $page_class;
	}
}

if ( ! function_exists( 'mediadesk_edge_print_custom_css' ) ) {
	/**
	 * Prints out custom css from theme options
	 */
	function mediadesk_edge_print_custom_css() {
		$custom_css = mediadesk_edge_options()->getOptionValue( 'custom_css' );
		
		if ( ! empty( $custom_css ) ) {
			wp_add_inline_style( 'mediadesk_edge_modules', $custom_css );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_print_custom_css' );
}

if ( ! function_exists( 'mediadesk_edge_page_custom_style' ) ) {
	/**
	 * Function that print custom page style
	 */
	function mediadesk_edge_page_custom_style() {
		$style = apply_filters( 'mediadesk_edge_filter_add_page_custom_style', $style = '' );
		
		if ( $style !== '' ) {
			
			if ( mediadesk_edge_is_woocommerce_installed() && mediadesk_edge_load_woo_assets() ) {
				wp_add_inline_style( 'mediadesk_edge_woo', $style );
			} else {
				wp_add_inline_style( 'mediadesk_edge_modules', $style );
			}
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_page_custom_style' );
}

if ( ! function_exists( 'mediadesk_edge_container_style' ) ) {
	/**
	 * Function that return container style
	 */
	function mediadesk_edge_container_style( $style ) {
		$page_id      = mediadesk_edge_get_page_id();
		$class_prefix = mediadesk_edge_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-container',
			$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-full-width'
		);
		
		$container_class       = array();
		$page_backgorund_color = get_post_meta( $page_id, 'edgtf_page_background_color_meta', true );
		
		if ( $page_backgorund_color ) {
			$container_class['background-color'] = $page_backgorund_color;
		}
		
		$current_style = mediadesk_edge_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediadesk_edge_filter_add_page_custom_style', 'mediadesk_edge_container_style' );
}

if ( ! function_exists( 'mediadesk_edge_content_padding_top' ) ) {
	/**
	 * Function that return padding for content
	 */
	function mediadesk_edge_content_padding_top( $style ) {
		$page_id      = mediadesk_edge_get_page_id();
		$class_prefix = mediadesk_edge_get_unique_page_class( $page_id, true );
		
		$current_style = '';
		
		$content_selector = array(
			$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
			$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
		);
		
		$content_class = array();
		
		$page_padding_top = get_post_meta( $page_id, 'edgtf_page_content_top_padding', true );
		
		if ( $page_padding_top !== '' ) {
			if ( get_post_meta( $page_id, 'edgtf_page_content_top_padding_mobile', true ) == 'yes' ) {
				$content_class['padding-top'] = mediadesk_edge_filter_px( $page_padding_top ) . 'px !important';
			} else {
				$content_class['padding-top'] = mediadesk_edge_filter_px( $page_padding_top ) . 'px';
			}
			$current_style .= mediadesk_edge_dynamic_css( $content_selector, $content_class );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediadesk_edge_filter_add_page_custom_style', 'mediadesk_edge_content_padding_top' );
}

if ( ! function_exists( 'mediadesk_edge_print_custom_js' ) ) {
	/**
	 * Prints out custom css from theme options
	 */
	function mediadesk_edge_print_custom_js() {
		$custom_js = mediadesk_edge_options()->getOptionValue( 'custom_js' );
		
		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'mediadesk_edge_modules', $custom_js );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_print_custom_js' );
}

if ( ! function_exists( 'mediadesk_edge_get_global_variables' ) ) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function mediadesk_edge_get_global_variables() {
		$global_variables = array();
		
		$global_variables['id']                       = 1 
		$global_variables['edgtfAddForAdminBar']      = is_admin_bar_showing() ? 32 : 0;
		$global_variables['edgtfElementAppearAmount'] = - 100;
		$global_variables['edgtfAjaxUrl']             = admin_url( 'admin-ajax.php' );
		
		$global_variables = apply_filters( 'mediadesk_edge_filter_js_global_variables', $global_variables );
		
		wp_localize_script( 'mediadesk_edge_modules', 'edgtfGlobalVars', array(
			'vars' => $global_variables
		) );
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_get_global_variables' );
}

if ( ! function_exists( 'mediadesk_edge_per_page_js_variables' ) ) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function mediadesk_edge_per_page_js_variables() {
		$per_page_js_vars = apply_filters( 'mediadesk_edge_filter_per_page_js_vars', array() );
		
		wp_localize_script( 'mediadesk_edge_modules', 'edgtfPerPageVars', array(
			'vars' => $per_page_js_vars
		) );
	}
	
	add_action( 'wp_enqueue_scripts', 'mediadesk_edge_per_page_js_variables' );
}

if ( ! function_exists( 'mediadesk_edge_content_elem_style_attr' ) ) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function mediadesk_edge_content_elem_style_attr() {
		$styles = apply_filters( 'mediadesk_edge_filter_content_elem_style_attr', array() );
		
		mediadesk_edge_inline_style( $styles );
	}
}

if ( ! function_exists( 'mediadesk_edge_core_plugin_installed' ) ) {
	/**
	 * Function that checks if Edge Core plugin installed
	 * @return bool
	 */
	function mediadesk_edge_core_plugin_installed() {
		return defined( 'EDGE_CORE_VERSION' );
	}
}

if ( ! function_exists( 'mediadesk_edge_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if Woocommerce plugin installed
	 * @return bool
	 */
	function mediadesk_edge_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'mediadesk_edge_visual_composer_installed' ) ) {
	/**
	 * Function that checks if Visual Composer plugin installed
	 * @return bool
	 */
	function mediadesk_edge_visual_composer_installed() {
		return class_exists( 'WPBakeryVisualComposerAbstract' );
	}
}

if ( ! function_exists( 'mediadesk_edge_revolution_slider_installed' ) ) {
	/**
	 * Function that checks if Revolution Slider plugin installed
	 * @return bool
	 */
	function mediadesk_edge_revolution_slider_installed() {
		return class_exists( 'RevSliderFront' );
	}
}

if ( ! function_exists( 'mediadesk_edge_contact_form_7_installed' ) ) {
	/**
	 * Function that checks if Contact Form 7 plugin installed
	 * @return bool
	 */
	function mediadesk_edge_contact_form_7_installed() {
		return defined( 'WPCF7_VERSION' );
	}
}

if ( ! function_exists( 'mediadesk_edge_is_wpml_installed' ) ) {
	/**
	 * Function that checks if WPML plugin installed
	 * @return bool
	 */
	function mediadesk_edge_is_wpml_installed() {
		return defined( 'ICL_SITEPRESS_VERSION' );
	}
}

if ( ! function_exists( 'mediadesk_edge_max_image_width_srcset' ) ) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function mediadesk_edge_max_image_width_srcset() {
		return 1920;
	}
	
	add_filter( 'max_srcset_image_width', 'mediadesk_edge_max_image_width_srcset' );
}