<?php
class MediaDeskClassWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'edgtf_woocommerce_dropdown_cart',
			esc_html__('Edge Woocommerce Dropdown Cart', 'mediadesk'),
			array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'mediadesk' ), )
		);

		$this->setParams();
	}

	protected function setParams() {

		$this->params = array(
			array(
				'type'		  => 'textfield',
				'name'		  => 'woocommerce_dropdown_cart_margin',
				'title'       => esc_html__('Icon Margin', 'mediadesk'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mediadesk')
			)
		);
    }

    /**
     * Generate widget form based on $params attribute
     *
     * @param array $instance
     *
     * @return null
     */
    public function form($instance) {
        if(is_array($this->params) && count($this->params)) {
            foreach($this->params as $param_array) {
                $param_name    = $param_array['name'];
                ${$param_name} = isset($instance[$param_name]) ? esc_attr($instance[$param_name]) : '';
            }

            foreach($this->params as $param) {
                switch($param['type']) {
                    case 'textfield':
                        ?>
                        <p>
                            <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo
                                esc_html($param['title']); ?>:</label>
                            <input class="widefat" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" type="text" value="<?php echo esc_attr(${$param['name']}); ?>"/>
                            <?php if(!empty($param['description'])) : ?>
                                <span class="edgtf-field-description"><?php echo esc_html($param['description']); ?></span>
                            <?php endif; ?>
                        </p>
                        <?php
                        break;
                    case 'dropdown':
                        ?>
                        <p>
                            <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo
                                esc_html($param['title']); ?>:</label>
                            <?php if(isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
                                <select class="widefat" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>">
                                    <?php foreach($param['options'] as $param_option_key => $param_option_val) {
                                        $option_selected = '';
                                        if(${$param['name']} == $param_option_key) {
                                            $option_selected = 'selected';
                                        }
                                        ?>
                                        <option <?php echo esc_attr($option_selected); ?> value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_attr($param_option_val); ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                            <?php if(!empty($param['description'])) : ?>
                                <span class="edgtf-field-description"><?php echo esc_html($param['description']); ?></span>
                            <?php endif; ?>
                        </p>

                        <?php
                        break;    
                }
            }
        } else { ?>
            <p><?php esc_html_e('There are no options for this widget.', 'mediadesk'); ?></p>
        <?php }
    }

    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        foreach($this->params as $param) {
            $param_name = $param['name'];

            $instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
        }

        return $instance;
    }

	public function widget( $args, $instance ) {
		extract( $args );
		
		global $woocommerce;
		
		$icon_styles = array();

		if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
			$icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
		}
		
		$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
		?>
		<div class="edgtf-shopping-cart-holder" <?php mediadesk_edge_inline_style($icon_styles) ?>>
			<div class="edgtf-shopping-cart-inner">
				<a itemprop="url" class="edgtf-header-cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
					<span class="edgtf-cart-icon fa fa-shopping-cart"></span>
				</a>
				<div class="edgtf-shopping-cart-dropdown">
					<ul>
						<?php if ( !$cart_is_empty ) : ?>
							<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
									continue;
								}
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
								?>
								<li>
									<div class="edgtf-item-image-holder">
										<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
											<?php echo wp_kses($_product->get_image(), array(
												'img' => array(
												'src' => true,
												'width' => true,
												'height' => true,
												'class' => true,
												'alt' => true,
												'title' => true,
												'id' => true
												)
											)); ?>
										</a>
									</div>
									<div class="edgtf-item-info-holder">
										<h6 itemprop="name" class="edgtf-product-title"><a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo apply_filters('mediadesk_edge_woo_widget_cart_product_title', $_product->get_name(), $_product ); ?></a></h6>
										<span class="edgtf-quantity"><?php esc_html_e('Quantity: ','mediadesk'); echo esc_html($cart_item['quantity']); ?></span>
										<?php echo apply_filters( 'mediadesk_edge_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
										<?php echo apply_filters( 'mediadesk_edge_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="ion-ios-close-empty"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'mediadesk') ), $cart_item_key ); ?>
									</div>
								</li>
							<?php endforeach; ?>
							<li class="edgtf-cart-bottom">
								<div class="edgtf-subtotal-holder clearfix">
									<span class="edgtf-total"><?php esc_html_e( 'Order Total:', 'mediadesk' ); ?></span>
									<span class="edgtf-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
											'class' => true,
											'id' => true
											)
										)); ?>
									</span>
								</div>
								<div class="edgtf-btn-holder clearfix">
									<a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="edgtf-view-cart" data-title="<?php esc_html_e('VIEW BAG & CHECKOUT','mediadesk'); ?>"><span><?php esc_html_e('VIEW BAG & CHECKOUT','mediadesk'); ?></span></a>
								</div>
							</li>
						<?php else : ?>
							<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'mediadesk' ); ?></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>	
		</div>
		<?php
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "MediaDeskClassWoocommerceDropdownCart" );' ) );

add_filter( 'woocommerce_add_to_cart_fragments', 'mediadesk_edge_woocommerce_header_add_to_cart_fragment' );

function mediadesk_edge_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	
	$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
	?>
	<div class="edgtf-shopping-cart-inner">
		<a itemprop="url" class="edgtf-header-cart" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
			<span class="edgtf-cart-icon fa fa-shopping-cart"></span>
		</a>
		<div class="edgtf-shopping-cart-dropdown">
			<ul>
				<?php if ( !$cart_is_empty ) : ?>
					<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
						$_product = $cart_item['data'];
						// Only display if allowed
						if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
							continue;
						}
						// Get price
						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
						?>
						<li>
							<div class="edgtf-item-image-holder">
								<a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
									<?php echo wp_kses($_product->get_image(), array(
										'img' => array(
										'src' => true,
										'width' => true,
										'height' => true,
										'class' => true,
										'alt' => true,
										'title' => true,
										'id' => true
										)
									)); ?>
								</a>
							</div>
							<div class="edgtf-item-info-holder">
								<h6 itemprop="name" class="edgtf-product-title"><a itemprop="url" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo apply_filters('mediadesk_edge_woo_widget_cart_product_title', $_product->get_name(), $_product ); ?></a></h6>
								<span class="edgtf-quantity"><?php esc_html_e('Quantity: ','mediadesk'); echo esc_html($cart_item['quantity']); ?></span>
								<?php echo apply_filters( 'mediadesk_edge_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
								<?php echo apply_filters( 'mediadesk_edge_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="ion-ios-close-empty"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'mediadesk') ), $cart_item_key ); ?>
							</div>
						</li>
					<?php endforeach; ?>
					<li class="edgtf-cart-bottom">
						<div class="edgtf-subtotal-holder clearfix">
							<span class="edgtf-total"><?php esc_html_e( 'Order Total:', 'mediadesk' ); ?></span>
							<span class="edgtf-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
									'class' => true,
									'id' => true
									)
								)); ?>
							</span>
						</div>
						<div class="edgtf-btn-holder clearfix">
							<a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="edgtf-view-cart" data-title="<?php esc_html_e('VIEW BAG & CHECKOUT','mediadesk'); ?>"><span><?php esc_html_e('VIEW BAG & CHECKOUT','mediadesk'); ?></span></a>
						</div>
					</li>
				<?php else : ?>
					<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'mediadesk' ); ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<?php
	$fragments['div.edgtf-shopping-cart-inner'] = ob_get_clean();

	return $fragments;
}
?>