<p><?php echo __("You have $CartCount items in your cart"); ?>

<table class="table table-striped">
	<tr>
		<th>Product</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Total</th>
	</tr>
<?php foreach($list as $item): ?>
	<?php extract($item['product']['Product']); ?>
		<tr>
			<td>
				<?php echo $this->Html->link($title, array(
					'controller' => 'products',
					'action' => 'view',
					$id
				)); ?> - 
				<?php echo $this->Html->link('remove', array(
					'controller' => 'cart',
					'action' => 'remove',
					$id
				), array(
					'class' => 'small'
				)); ?>
			</td>
			<td><?php echo $item['quantity']; ?></td>
			<td><?php echo $formatted_display_price; ?></td>
			<td><?php echo $display_price * $item['quantity']; ?></td>
		</tr>
<?php endforeach; ?>
</table>

<div class="actions">
	<div class="clearfix">
		<br />
		<span class="total">The total is: <?php echo $total; ?></span>
	</div>

	<?php echo $this->Html->link('Proceed to checkout', array(
			'controller' => 'payments',
			'action' => 'process'
		), array(
			'class' => 'btn btn-primary'
	)); ?>
</div>