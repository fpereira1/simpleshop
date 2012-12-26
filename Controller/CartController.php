<?php

class CartController extends AppController {

	public function index() {
		
		$list = array();

		// We need the product model to load it in the list
		$this->loadModel('Product');

		foreach($this->Cart->get() as $item) {
			extract($item);
			$list[] = array(
				'quantity' => $quantity,
				'product' => $this->Product->read(null, $ProductID)
			);
		}

		$this->set('list', $list);
		$this->set('count', $this->Cart->count());
	}

	public function add($id = null) {
		
		$data = $this->Cart->get();
		$data[] = array(
			'ProductID' => $id,
			'quantity' => 7
		);

		// Merge stored and new arrays and saves them to the session
		$this->Cart->set($data);

		// Redirects users to the products page (where they came from) after adding product to cart
		$this->Session->setFlash("Product has been added to your cart", 'default', array(
			'class' => 'alert alert-success'
		));

		$this->redirect(array(
			'controller' => 'products',
			'action' => 'view',
			$id
		));

	}
}