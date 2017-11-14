<?php do_action('mediadesk_edge_action_before_page_header'); ?>

<header class="edgtf-page-header">
	<?php do_action('mediadesk_edge_action_after_page_header_html_open'); ?>
	
    <div class="edgtf-logo-area">
	    <?php do_action( 'mediadesk_edge_action_after_header_logo_area_html_open' ); ?>
	    
        <?php if($logo_area_in_grid) : ?>
            <div class="edgtf-grid">
        <?php endif; ?>
			
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            mediadesk_edge_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
						<?php mediadesk_edge_get_header_widget_logo_area(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="edgtf-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="edgtf-menu-area">
	    <?php do_action('mediadesk_edge_action_after_header_menu_area_html_open'); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="edgtf-grid">
        <?php endif; ?>
	            
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php mediadesk_edge_get_main_menu(); ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
						<?php mediadesk_edge_get_header_widget_menu_area(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	        
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		mediadesk_edge_get_sticky_header();
	} ?>
	
	<?php do_action('mediadesk_edge_action_before_page_header_html_close'); ?>
</header>

<?php do_action('mediadesk_edge_action_after_page_header'); ?>