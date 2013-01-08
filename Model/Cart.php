<?php

App::uses('CakeSession', 'Model/Datasource');
App::uses('CakeNumber', 'Utility');

class Cart extends AppModel {

	public $useTable = false;

	public function get() {
		$session = CakeSession::read(get_class($this));
		return is_array($session) ? $session : array();
	}

	public function destroy() {
		CakeSession::write(get_class($this), NULL);
	}

	public function setItems($data = array()) {

		$session = $this->get();

		// Check if product is already in cart
		if(is_array($session) && count($session) > 0 && !empty($data['ProductID'])) {
			foreach ($session as $key => $value) {
				if($value['ProductID'] == $data['ProductID']) {
					return false;
				}
			}
		}
		
		// Add whats the user input into the session array
		array_push($session, $data);

		// Saves the data into the cakephp session
		CakeSession::write(get_class($this), $session);

		return true;
	}

	public function getItems() {

		$list = array();

		// We need the product model to load it in the list
		$this->Product = ClassRegistry::init('Product');

		if(is_array($this->get())) {
			foreach($this->get() as $item) {
				extract($item);
				$product = $this->Product->read(null, $ProductID);
				$list[] = array(
					'quantity' => $quantity,
					'price' => $product['Product']['display_price'],
					'product' => $product,
				);
			}
		}

		return $list;
	}

	public function count() {
		return count($this->get());
	}

	public function totalAsNumeric() {
		$total = 0;
		foreach ($this->getItems() as $i) {
			$total += $i['quantity'] * $i['price'];
		}

		return $total;
	}

	public function total() {
		return CakeNumber::currency($this->totalAsNumeric(), Configure::read('Shop.currency'));
	}
	
}