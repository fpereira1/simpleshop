<?php echo $this->Html->link(Configure::read('Shop.name'), '/', array(
		'class' => 'brand',
	));
?>

<ul class="nav">
<?php
	$menu = array(
		'products', 'cart'
	);

	foreach($menu as $item) {
		$link = $this->Html->link(ucfirst($item), array(
			'controller' => $item,
			'action' => 'index'
		));


		echo $this->Html->tag('li', $link, array(
			'class' => ($this->request->controller == $item) ? 'active' : ''
		));

		if($item === 'cart')
			echo '<span class="badge badge-important">' . $CartCount . '</span>';
	}
?>
</ul>