<?php
namespace EdgeCore\CPT\Shortcodes\SectionTitle;

use EdgeCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base; 
	
	function __construct() {
		$this->base = 'edgtf_section_title';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
	* Returns base for shortcode
	* @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Edge Section Title', 'edgtf-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by EDGE', 'edgtf-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'edgtf-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'custom_style',
							'heading'     => esc_html__( 'Use Our pre-defined style for title', 'edgtf-core' ),
							'value'       => array_flip(mediadesk_edge_get_yes_no_select_array(false, true)),
							'save_always' => true,
							'admin_label' => true
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'subtitle',
                            'heading'     => esc_html__( 'Subtitle', 'edgtf-core' ),
                            'admin_label' => true
                        ),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_txt',
							'heading'     => esc_html__( 'Button Text', 'edgtf-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_link',
							'heading'     => esc_html__( 'Button Link', 'edgtf-core' ),
							'dependency'  => array( 'element' => 'button_txt', 'not_empty' => true ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'target',
							'heading'     => esc_html__( 'Link Target', 'edgtf-core' ),
							'value'       => array_flip(mediadesk_edge_get_link_target_array()),
							'dependency'  => array( 'element' => 'button_link', 'not_empty' => true ),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'margin',
							'heading'     => esc_html__( 'Bottom Margin (px)', 'edgtf-core' )
						),
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'title'                 => '',
			'custom_style'          => '',
            'subtitle'              => '',
			'button_txt'            => '',
			'button_link'           => '',
			'target'                => '_self',
			'margin'                => ''
        );
		$params = shortcode_atts($args, $atts);

		$params['holder_class'] = $this->getHolderClasses($params);
		$params['holder_style'] = $this->getHolderStyles($params);
		$params['target']         = ! empty($params['target']) ? $params['target'] : $args['target'];

		$html = edgtf_core_get_shortcode_module_template_part('templates/section-title', 'section-title', '', $params);
		
		return $html;
	}

	private function getHolderClasses($params) {
		$classes = array();

		$classes[] = $params['custom_style'] !== 'no' ? 'edgtf-title-custom' : '';

		return implode(' ', $classes);
	}

	private function getHolderStyles($params) {
		$styles = array();

		if (!empty($params['margin'])) {
			$styles[] = 'margin-bottom: '.mediadesk_edge_filter_px($params['margin']) . 'px';
		}

		return implode(';', $styles);
	}
}