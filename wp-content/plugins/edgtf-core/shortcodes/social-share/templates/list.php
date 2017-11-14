<div class="edgtf-social-share-holder edgtf-list">
	<?php if(!empty($title)) { ?>
		<span class="edgtf-social-share-title"><?php echo esc_html($title); ?></span>
	<?php } ?>
	<ul>
		<?php foreach ($networks as $net) {
			echo wp_kses($net, array(
				'li'   => array(
					'class' => true
				),
				'a'    => array(
					'itemprop' => true,
					'class'    => true,
					'href'     => true,
					'target'   => true,
					'onclick'  => true
				),
				'img'  => array(
					'itemprop' => true,
					'class'    => true,
					'src'      => true,
					'alt'      => true
				),
				'span' => array(
					'class' => true
				)
			));
		} ?>
	</ul>
</div>