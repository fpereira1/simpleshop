<?php extract($product['Product']); ?>

<h2><?php echo h($title); ?></h2>

<p><?php echo Markdown($description); ?></p>

<div class="clearfix">
	<?php echo $this->Html->image($image, array(
		'class' => 'img-rounded'
	)); ?>
</div>

<br />

<span class="price"><?php echo $formatted_display_price; ?></span>

<?php echo $this->Html->link(__('add to my wishlist'), array(
	'controller' => 'cart', 'action'=> 'add', $id), array(
		'class' => 'btn'
	));
?>
