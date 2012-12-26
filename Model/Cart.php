<?php

class Cart extends Object {

	public $useTable = false;

	public function get() {
		return CakeSession::read(get_class($this));
	}

	public function set($data = array()) {
		CakeSession::write(get_class($this), $data);
	}

	public function count() {
		return count($this->get());
	}
	
}