<?php do_action('mediadesk_edge_action_before_mobile_header'); ?>

<header class="edgtf-mobile-header">
	<?php do_action('mediadesk_edge_action_after_mobile_header_html_open'); ?>
	
	<div class="edgtf-mobile-header-inner">
		<div class="edgtf-mobile-header-holder">
			<div class="edgtf-grid">
				<div class="edgtf-vertical-align-containers">
					<div class="edgtf-position-left">
						<div class="edgtf-position-left-inner">
							<?php mediadesk_edge_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="edgtf-position-right">
						<div class="edgtf-position-right-inner">
							<a href="javascript:void(0)" class="edgtf-fullscreen-menu-opener">
							<span class="edgtf-fm-lines">
								<span class="edgtf-fm-line edgtf-line-1"></span>
								<span class="edgtf-fm-line edgtf-line-2"></span>
								<span class="edgtf-fm-line edgtf-line-3"></span>
							</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('mediadesk_edge_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('mediadesk_edge_action_after_mobile_header'); ?>