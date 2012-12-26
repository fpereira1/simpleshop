<h2><?php echo __('Shopping cart'); ?></h2>

<p><?php echo __("You have $count products in your cart"); ?>

<?php foreach($list as $item): ?>
	<div class="row">
		<div class="span8">
			<?php echo $this->element('product', $item['product']['Product']); ?>
		</div>
		<div class="span4">
			<?php echo $item['quantity']; ?>
		</div>
	</div>
<?php endforeach; ?>