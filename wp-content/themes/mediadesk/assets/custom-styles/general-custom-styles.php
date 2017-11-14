<?php

if(!function_exists('mediadesk_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function mediadesk_edge_design_styles() {
	    $font_family = mediadesk_edge_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && mediadesk_edge_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo mediadesk_edge_dynamic_css( $font_family_selector, array( 'font-family' => mediadesk_edge_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = mediadesk_edge_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
	            'a:hover',
	            'h1 a:hover',
	            'h2 a:hover',
	            'h3 a:hover',
	            'h4 a:hover',
	            'h5 a:hover',
	            'h6 a:hover',
	            'p a:hover',
	            '.edgtf-comment-holder .edgtf-comment-text #cancel-comment-reply-link',
	            '.widget.widget_rss .edgtf-widget-title .rsswidget:hover',
	            '.widget.widget_tag_cloud a:hover',
	            '.edgtf-page-footer a:hover',
	            '.edgtf-page-footer .widget a:hover',
	            '.edgtf-page-footer .widget.widget_rss .edgtf-footer-widget-title .rsswidget:hover',
	            '.edgtf-page-footer .widget.widget_tag_cloud a:hover',
	            '.edgtf-top-bar a:hover',
	            '.edgtf-side-menu .widget a:hover',
	            '.edgtf-side-menu .widget.widget_rss .edgtf-footer-widget-title .rsswidget:hover',
	            '.edgtf-side-menu .widget.widget_search button:hover',
	            '.edgtf-side-menu .widget.widget_tag_cloud a:hover',
	            '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-standard li .edgtf-twitter-icon',
	            '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text a',
	            '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text span',
	            '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-standard li .edgtf-tweet-text a:hover',
	            '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-twitter-icon i',
	            '.edgtf-blog-holder article .edgtf-post-info-below-title>div a:hover',
	            '.edgtf-bl-standard-pagination ul li.edgtf-bl-pag-active a',
	            '.edgtf-fullscreen-button-opener.opened',
	            '.edgtf-fullscreen-button-opener:hover',
	            '.edgtf-fullscreen-area .edgtf-fullscreen-nav-1 ul li.menu-item-has-children:not(:first-child)>a:hover',
	            '.edgtf-fullscreen-area .edgtf-fullscreen-nav-2 ul li.menu-item-has-children:not(:first-child)>a:hover',
	            '.edgtf-fullscreen-area .edgtf-fullscreen-nav-1 ul li a:hover',
	            '.edgtf-fullscreen-area .edgtf-fullscreen-nav-2 ul li a:hover',
	            '.edgtf-fullscreen-area .edgtf-fullscreen-nav-1>ul>li>a:hover',
	            '.edgtf-fullscreen-area .edgtf-fullscreen-nav-2>ul>li>a:hover',
	            '.edgtf-main-menu ul li a:hover',
	            '.edgtf-main-menu ul li a .edgtf-menu-featured-icon',
	            '.edgtf-drop-down .second .inner ul li.current-menu-ancestor>a',
	            '.edgtf-drop-down .second .inner ul li.current-menu-item>a',
	            '.edgtf-drop-down .wide .second .inner ul li a:hover',
	            '.edgtf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
	            '.edgtf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
	            '.edgtf-fullscreen-menu-opener.edgtf-fm-opened',
	            'nav.edgtf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
	            'nav.edgtf-fullscreen-menu ul li ul li.current-menu-item>a',
	            'nav.edgtf-fullscreen-menu>ul>li.edgtf-active-item>a',
	            '.edgtf-mobile-header .edgtf-mobile-menu-opener.edgtf-mobile-menu-opened a',
	            '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>a',
	            '.edgtf-mobile-header .edgtf-mobile-nav ul li a:hover',
	            '.edgtf-mobile-header .edgtf-mobile-nav ul li h6:hover',
	            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>a',
	            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>a',
	            '.edgtf-search-page-holder article.sticky .edgtf-post-title a',
	            '.edgtf-pl-filter-holder ul li.edgtf-pl-current span',
	            '.edgtf-pl-filter-holder ul li:hover span',
	            '.edgtf-pl-standard-pagination ul li.edgtf-pl-pag-active a',
	            '.edgtf-banner-holder .edgtf-banner-link-text .edgtf-banner-link-hover span',
	            '.edgtf-dropcaps',
	            '.edgtf-section-title-holder .edgtf-link-holder .edgtf-btn:hover'
            );

            $woo_color_selector = array();
            if(mediadesk_edge_is_woocommerce_installed()) {
                $woo_color_selector = array(
	                '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
	                '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
	                'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
	                'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
	                '.edgtf-woo-single-page .edgtf-single-product-summary .product_meta>span a:hover',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.edgtf-cf7-content-style input.wpcf7-form-control.wpcf7-submit:hover'
	        );

            $background_color_selector = array(
	            '.edgtf-st-loader .pulse',
	            '.edgtf-st-loader .double_pulse .double-bounce1',
	            '.edgtf-st-loader .double_pulse .double-bounce2',
	            '.edgtf-st-loader .cube',
	            '.edgtf-st-loader .rotating_cubes .cube1',
	            '.edgtf-st-loader .rotating_cubes .cube2',
	            '.edgtf-st-loader .stripes>div',
	            '.edgtf-st-loader .wave>div',
	            '.edgtf-st-loader .two_rotating_circles .dot1',
	            '.edgtf-st-loader .two_rotating_circles .dot2',
	            '.edgtf-st-loader .five_rotating_circles .container1>div',
	            '.edgtf-st-loader .five_rotating_circles .container2>div',
	            '.edgtf-st-loader .five_rotating_circles .container3>div',
	            '.edgtf-st-loader .atom .ball-1:before',
	            '.edgtf-st-loader .atom .ball-2:before',
	            '.edgtf-st-loader .atom .ball-3:before',
	            '.edgtf-st-loader .atom .ball-4:before',
	            '.edgtf-st-loader .clock .ball:before',
	            '.edgtf-st-loader .mitosis .ball',
	            '.edgtf-st-loader .lines .line1',
	            '.edgtf-st-loader .lines .line2',
	            '.edgtf-st-loader .lines .line3',
	            '.edgtf-st-loader .lines .line4',
	            '.edgtf-st-loader .fussion .ball',
	            '.edgtf-st-loader .fussion .ball-1',
	            '.edgtf-st-loader .fussion .ball-2',
	            '.edgtf-st-loader .fussion .ball-3',
	            '.edgtf-st-loader .fussion .ball-4',
	            '.edgtf-st-loader .wave_circles .ball',
	            '.edgtf-st-loader .pulse_circles .ball',
	            '#edgtf-back-to-top>span',
	            '.widget #wp-calendar td#today',
	            '.widget.widget_search button:hover',
	            '.edgtf-page-header .widget.widget_nav_menu ul li a:after',
	            '.edgtf-side-menu .widget.widget_nav_menu ul li a:after',
	            '.edgtf-blog-holder article.format-link .edgtf-post-link-holder',
	            '.edgtf-blog-holder article.format-quote .edgtf-post-quote-holder',
	            '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.edgtf-main-menu>ul>li>a>span.item_outer:after',
	            '.edgtf-search-page-holder .edgtf-search-page-form .edgtf-form-holder .edgtf-search-submit:hover',
	            '.edgtf-side-menu-button-opener.opened',
	            '.edgtf-side-menu-button-opener:hover',
	            '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-accordion-title.ui-state-active',
	            '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-accordion-title.ui-state-hover',
	            '.edgtf-icon-shortcode.edgtf-circle',
	            '.edgtf-icon-shortcode.edgtf-dropcaps.edgtf-circle',
	            '.edgtf-icon-shortcode.edgtf-square',
	            '.edgtf-progress-bar .edgtf-pb-content-holder .edgtf-pb-content',
	            '.edgtf-tabs.edgtf-tabs-standard .edgtf-tabs-nav li.ui-state-active a',
	            '.edgtf-tabs.edgtf-tabs-standard .edgtf-tabs-nav li.ui-state-hover a',
	            '.edgtf-tabs.edgtf-tabs-boxed .edgtf-tabs-nav li.ui-state-active a',
	            '.edgtf-tabs.edgtf-tabs-boxed .edgtf-tabs-nav li.ui-state-hover a'
            );

            $woo_background_color_selector = array();
            if(mediadesk_edge_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search button:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-light-skin .added_to_cart:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-light-skin .button:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-dark-skin .added_to_cart:hover',
	                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-dark-skin .button:hover',
	                '.woocommerce .edgtf-content .widget_search button[type=submit].edgtf-search-submit:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $border_color_selector = array(
	            '.edgtf-st-loader .pulse_circles .ball',
	            '#edgtf-back-to-top>span'
            );

            echo mediadesk_edge_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo mediadesk_edge_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo mediadesk_edge_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo mediadesk_edge_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = mediadesk_edge_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.edgtf-content',
			    '.edgtf-container'
		    );
		    echo mediadesk_edge_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = mediadesk_edge_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo mediadesk_edge_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo mediadesk_edge_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( mediadesk_edge_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . mediadesk_edge_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo mediadesk_edge_dynamic_css( '.edgtf-preload-background', $preload_background_styles );
    }

    add_action('mediadesk_edge_action_style_dynamic', 'mediadesk_edge_design_styles');
}

if ( ! function_exists( 'mediadesk_edge_content_styles' ) ) {
	function mediadesk_edge_content_styles() {
		$content_style = array();
		
		$padding_top = mediadesk_edge_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = mediadesk_edge_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
		);
		
		echo mediadesk_edge_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = mediadesk_edge_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = mediadesk_edge_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
		);
		
		echo mediadesk_edge_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_content_styles' );
}

if ( ! function_exists( 'mediadesk_edge_h1_styles' ) ) {
	function mediadesk_edge_h1_styles() {
		$margin_top    = mediadesk_edge_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = mediadesk_edge_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = mediadesk_edge_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediadesk_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediadesk_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_h1_styles' );
}

if ( ! function_exists( 'mediadesk_edge_h2_styles' ) ) {
	function mediadesk_edge_h2_styles() {
		$margin_top    = mediadesk_edge_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = mediadesk_edge_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = mediadesk_edge_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediadesk_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediadesk_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_h2_styles' );
}

if ( ! function_exists( 'mediadesk_edge_h3_styles' ) ) {
	function mediadesk_edge_h3_styles() {
		$margin_top    = mediadesk_edge_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = mediadesk_edge_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = mediadesk_edge_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediadesk_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediadesk_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_h3_styles' );
}

if ( ! function_exists( 'mediadesk_edge_h4_styles' ) ) {
	function mediadesk_edge_h4_styles() {
		$margin_top    = mediadesk_edge_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = mediadesk_edge_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = mediadesk_edge_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediadesk_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediadesk_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_h4_styles' );
}

if ( ! function_exists( 'mediadesk_edge_h5_styles' ) ) {
	function mediadesk_edge_h5_styles() {
		$margin_top    = mediadesk_edge_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = mediadesk_edge_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = mediadesk_edge_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediadesk_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediadesk_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_h5_styles' );
}

if ( ! function_exists( 'mediadesk_edge_h6_styles' ) ) {
	function mediadesk_edge_h6_styles() {
		$margin_top    = mediadesk_edge_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = mediadesk_edge_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = mediadesk_edge_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediadesk_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediadesk_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_h6_styles' );
}

if ( ! function_exists( 'mediadesk_edge_text_styles' ) ) {
	function mediadesk_edge_text_styles() {
		$item_styles = mediadesk_edge_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo mediadesk_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_text_styles' );
}

if ( ! function_exists( 'mediadesk_edge_link_styles' ) ) {
	function mediadesk_edge_link_styles() {
		$link_styles      = array();
		$link_color       = mediadesk_edge_options()->getOptionValue( 'link_color' );
		$link_font_style  = mediadesk_edge_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = mediadesk_edge_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = mediadesk_edge_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo mediadesk_edge_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_link_styles' );
}

if ( ! function_exists( 'mediadesk_edge_link_hover_styles' ) ) {
	function mediadesk_edge_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = mediadesk_edge_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = mediadesk_edge_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo mediadesk_edge_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo mediadesk_edge_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_link_hover_styles' );
}

if ( ! function_exists( 'mediadesk_edge_smooth_page_transition_styles' ) ) {
	function mediadesk_edge_smooth_page_transition_styles( $style ) {
		$id            = mediadesk_edge_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = mediadesk_edge_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.edgtf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= mediadesk_edge_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = mediadesk_edge_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.edgtf-st-loader .edgtf-rotate-circles > div',
			'.edgtf-st-loader .pulse',
			'.edgtf-st-loader .double_pulse .double-bounce1',
			'.edgtf-st-loader .double_pulse .double-bounce2',
			'.edgtf-st-loader .cube',
			'.edgtf-st-loader .rotating_cubes .cube1',
			'.edgtf-st-loader .rotating_cubes .cube2',
			'.edgtf-st-loader .stripes > div',
			'.edgtf-st-loader .wave > div',
			'.edgtf-st-loader .two_rotating_circles .dot1',
			'.edgtf-st-loader .two_rotating_circles .dot2',
			'.edgtf-st-loader .five_rotating_circles .container1 > div',
			'.edgtf-st-loader .five_rotating_circles .container2 > div',
			'.edgtf-st-loader .five_rotating_circles .container3 > div',
			'.edgtf-st-loader .atom .ball-1:before',
			'.edgtf-st-loader .atom .ball-2:before',
			'.edgtf-st-loader .atom .ball-3:before',
			'.edgtf-st-loader .atom .ball-4:before',
			'.edgtf-st-loader .clock .ball:before',
			'.edgtf-st-loader .mitosis .ball',
			'.edgtf-st-loader .lines .line1',
			'.edgtf-st-loader .lines .line2',
			'.edgtf-st-loader .lines .line3',
			'.edgtf-st-loader .lines .line4',
			'.edgtf-st-loader .fussion .ball',
			'.edgtf-st-loader .fussion .ball-1',
			'.edgtf-st-loader .fussion .ball-2',
			'.edgtf-st-loader .fussion .ball-3',
			'.edgtf-st-loader .fussion .ball-4',
			'.edgtf-st-loader .wave_circles .ball',
			'.edgtf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= mediadesk_edge_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediadesk_edge_filter_add_page_custom_style', 'mediadesk_edge_smooth_page_transition_styles' );
}