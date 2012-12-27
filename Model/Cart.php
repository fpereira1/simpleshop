<?php

class Cart extends Object {

	public $useTable = false;

	public function get() {
		return CakeSession::read(get_class($this));
	}

	public function set($data = array()) {
		CakeSession::write(get_class($this), $data);
	}

	public function destroy() {
		$this->set(null);
	}

	public function count() {
		return count($this->get());
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
					'product' => $product,
				);
			}
		}

		return $list;
	}

	public function total() {
		$total = 0;
		foreach ($this->getItems() as $i) {
			$total += $i['quantity'] * $i['product']['Product']['display_price'];
		}
		return $total;
	}
	
}