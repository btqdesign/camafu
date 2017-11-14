<?php

class MediaDeskClassContactForm7Widget extends MediaDeskClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_contact_form_7_widget',
			esc_html__( 'Edge Contact Form 7 Widget', 'mediadesk' ),
			array( 'description' => esc_html__( 'Add contact form 7 to widget areas', 'mediadesk' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		
		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->ID ] = $cform->post_title;
			}
		} else {
			$contact_forms[0] = esc_html__( 'No contact forms found', 'mediadesk' );
		}
		
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Extra Class Name', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'image',
				'title' => esc_html__( 'Image URL', 'mediadesk' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'heading',
				'title' => esc_html__( 'Form Heading', 'mediadesk' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'contact_form',
				'title'   => esc_html__( 'Select Contact Form 7', 'mediadesk' ),
				'options' => $contact_forms
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'contact_form_style',
				'title'   => esc_html__( 'Contact Form 7 Style', 'mediadesk' ),
				'options' => array(
					''                   => esc_html__( 'Default', 'mediadesk' ),
					'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'mediadesk' ),
					'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'mediadesk' ),
					'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'mediadesk' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'contact_layout',
				'title'   => esc_html__( 'Contact Form 7 Layout', 'mediadesk' ),
				'options' => array(
					''       => esc_html__( 'Default', 'mediadesk' ),
					'boxed'  => esc_html__( 'Boxed', 'mediadesk' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'text',
				'title' => esc_html__( 'Text', 'mediadesk' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$extra_class = ! empty( $instance['extra_class'] ) ? esc_attr( $instance['extra_class'] ) : '';

		if ( ! empty( $instance['contact_layout'] ) && 'boxed' === $instance['contact_layout'] ) {
			$extra_class .= ' edgtf-widget-boxed-layout';
		}

		?>
		<div class="widget edgtf-contact-form-7-widget <?php echo esc_attr( $extra_class ); ?>">
			<?php if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			} ?>
			<div class="edgtf-cf7-widget-inner">
				<?php if ( ! empty( $instance['image'] ) ) { ?>
					<img src="<?php echo esc_url( $instance['image'] ); ?>" class="edgtf-contact-form-image" alt="<?php esc_html_e('Contact form image', 'mediadesk'); ?>" width="200" height="60" />
				<?php } ?>
				<?php if ( ! empty( $instance['heading'] ) ) { ?>
					<h3 class="edgtf-cf7-heading"><?php echo esc_html( $instance['heading'] ); ?></h3>
				<?php } ?>
				<?php if ( ! empty( $instance['contact_form'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $instance['contact_form'] ) . '" html_class="' . esc_attr( $instance['contact_form_style'] ) . '"]' );
				} ?>
				<?php if ( ! empty( $instance['text'] ) ) { ?>
					<span class="edgtf-cf7-text"><?php echo esc_html( $instance['text'] ); ?></span>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}