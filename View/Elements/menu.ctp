<ul class="nav">
	<?php
		$menu = array(
			'/', 'products', 'cart', 'about'
		);

		foreach($menu as $item) {
			$link = $this->Html->link(ucfirst($item), array(
				'controller' => $item
			));

			echo $this->Html->tag('li', $link, array(
				'class' => ($this->request->controller == $item) ? 'active' : ''
			));
		}
	?>
</ul>