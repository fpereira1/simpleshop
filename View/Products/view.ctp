<?php extract($product['Product']); ?>

<div class="row">
	<div class="span6">
		<h2><?php echo h($title); ?></h2>

		<?php echo $this->Html->image($image, array(
			'class' => 'img-rounded'
		)); ?>

		<br /><br />

		<?php echo Markdown($description); ?>
	</div>
	<div class="span4">

		<br /><br /><br />

		<p>
			<span class="lead price"><?php echo $formatted_display_price; ?></span>
			<small><?php echo $stock_count; ?> available.</small>
		</p>
		
		<?php echo $this->Html->link(__('add to my wishlist'), array(
			'controller' => 'cart', 'action'=> 'add', $id), array(
				'class' => 'btn btn-primary'
			));
		?>

	</div>
</div>