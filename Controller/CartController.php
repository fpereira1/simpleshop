<?php

class CartController extends AppController {

	public function index() {

		$this->set('list', $this->Cart->getItems());
		$this->set('total', $this->Cart->total());
		$this->set('count', $this->Cart->count());

		if($this->Cart->count() === 0) {
			$this->render('empty_index');
		}
	}

	public function add($id = null) {
	
		$data = array(
			'ProductID' => $id,
			'quantity' => 1
		);

		// Merge stored and new arrays and saves them to the session
		$added = $this->Cart->setItems($data);

		// Redirects users to the products page (where they came from) after adding product to cart
		if($added === true) {
			$this->Session->setFlash("Product has been added to your cart", 'default', array(
				'class' => 'alert alert-success'
			));
		}
		else {
			$this->Session->setFlash("Product is already in your cart", 'default', array(
				'class' => 'alert alert-error'
			));
		}

		$this->redirect(array(
			'controller' => 'products',
			'action' => 'view',
			$id
		));

	}
}