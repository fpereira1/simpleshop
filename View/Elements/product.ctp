<div class="product span2">
	<div class="clearfix">
		<div class="image">
			<?php
				echo $this->Html->image($image, array(
					'class' => '',
					'url' => array(
						'controller' => 'products',
						'action' => 'view',
						$id,
						Inflector::slug(strtolower($title), '-'),

					)
				));
			?>
		</div>

		<!--
		<?php if($discount > 0): ?>
			<span class="label label-important"><?php echo $formatted_discount . ' OFF'; ?></span>
		<?php endif; ?>
		-->

		<div class="clear clearfix">
			<?php
				echo $this->Html->link(String::truncate($title, 22), array(
					'controller' => 'products',
					'action' => 'view',
					$id
				));
			?>
		</div>
		<div class="clear">
			<span class="price"><?php echo $formatted_display_price; ?></span>
		</div>

	</div>
</div>