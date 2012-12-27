<?php

App::uses('Cart', 'Model');

/**
 * Cart Test Case
 *
 */
class CartTest extends CakeTestCase {

	public $example_1 = array('ProductID' => 1, 'quantity' => 1);
	public $example_2 = array('ProductID' => 2, 'quantity' => 1);
	public $example_3 = array('ProductID' => 1, 'quantity' => 1);
		
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cart = ClassRegistry::init('Cart');

		// Destroy the Cart when starting
		$this->Cart->destroy();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {

		// Destroy when finish the test
		$this->Cart->destroy();

		unset($this->Cart);

		parent::tearDown();
	}

/**
 * testGet method
 *
 * @return void
 */
	public function testGet() {

	}

/**
 * testSet method
 *
 * @return void
 */
	public function testSetItems() {

		// testing 2 different products
		$this->Cart->setItems($this->example_1);
		$this->Cart->setItems($this->example_2);
		$this->assertEqual(count($this->Cart->get()), 2, "There are 2 products in the shopping cart");
		$this->Cart->destroy();

		// Testing same product
		$this->Cart->setItems($this->example_1);
		$this->Cart->setItems($this->example_3);
		$this->assertEqual(count($this->Cart->get()), 1, "There should be only 1 product in the shopping cart");
		$this->Cart->destroy();

	}

/**
 * testCount method
 *
 * @return void
 */
	public function testCount() {
	}

/**
 * testGetItems method
 *
 * @return void
 */
	public function testGetItems() {
	}

/**
 * testTotal method
 *
 * @return void
 */
	public function testTotal() {
	}

	public function testDestroy() {

		$this->Cart->setItems($this->example_1);
		$this->assertEqual(count($this->Cart->get()), 1, "There are 2 products in the shopping cart");
		$this->Cart->destroy();
		$this->assertEqual(count($this->Cart->get()), 0, "Cart was destroyed so there should be 0 products in the shopping cart");

	}

}
