<div class="product span3">

	<div class="image">
		<?php
			echo $this->Html->image($image, array(
				'url' => array(
					'controller' => 'products',
					'action' => 'view',
					$id
				)
			));
		?>
	</div>

	<?php
		echo $this->Html->link($title, array(
			'controller' => 'products',
			'action' => 'view',
			$id
		));
	?>

	<br />

	<?php if($sale_price > 0): ?>
		<?php echo __('Was'); ?>: <strike><?php echo $price; ?></strike><br />
		<span class="price"><?php echo __('Now'); ?>: <?php echo h($sale_price); ?></span>
	<?php else: ?>
		<span class="price"><?php echo $price; ?></span>
	<?php endif; ?>
</div>