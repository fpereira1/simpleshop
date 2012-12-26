<div class="hero-unit">
	<h2><?php echo h($product['Product']['title']); ?></h2>

	<p><?php echo h($product['Product']['description']); ?></p>

	<?php echo $this->Html->link(__('add to cart'), array(
		'controller' => 'cart',
		'action'	=> 'add',
		$product['Product']['id']
		), array(
			'class' => 'btn'
		));
	?>
</div>