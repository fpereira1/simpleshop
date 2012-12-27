<p><?php echo __("Showing 1 to " . count($products) . " of " . count($products) . " items"); ?></p>

<div class="row">
	<?php foreach($products as $obj): ?>
	<?php extract($obj['Product']); ?>
		<?php echo $this->element('product', $obj['Product']); ?>
	<?php endforeach; ?>
</div>