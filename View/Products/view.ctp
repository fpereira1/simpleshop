<?php extract($product['Product']); ?>

<h2><?php echo h($title); ?></h2>

<p><?php echo h($description); ?></p>

<div class="clearfix">
	<?php echo $this->Html->image($image); ?>
</div>

<br />

<?php echo $this->Html->link(__('add to my wishlist'), array(
	'controller' => 'cart', 'action'=> 'add', $id), array(
		'class' => 'btn'
	));
?>