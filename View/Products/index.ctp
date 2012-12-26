<?php foreach($products as $obj): ?>
<?php extract($obj['Product']); ?>
	<?php echo $this->element('product', $obj['Product']); ?>
<?php endforeach; ?>