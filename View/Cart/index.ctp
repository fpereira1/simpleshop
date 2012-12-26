<h2><?php echo __('Shopping cart'); ?></h2>

<p><?php echo __("You have $count items in your cart"); ?>

<?php foreach($list as $item): ?>
	<?php extract($item['product']['Product']); ?>
	<div class="row">
		<div class="span7">
			<?php echo $this->Html->link($title, array(
				'controller' => 'products',
				'action' => 'view',
				$id
			)); ?>
		</div>
		<div class="span2">
			<?php echo $item['quantity']; ?> &times; <?php echo number_format($display_price, 2); ?>
		</div>
	</div>
<?php endforeach; ?>

<div class="clearfix">
	<div class="clearfix">
		<br />
		<span class="total">The total is: <?php echo $total; ?></span>
	</div>

	<?php echo $this->Html->link('Go to checkout', array(
			'controller' => 'checkout'
		), array(
			'class' => 'btn'
	)); ?>
</div>