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
		}
	?>
</ul>