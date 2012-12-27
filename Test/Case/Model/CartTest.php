<?php

App::uses('Cart', 'Model');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Cart Test Case
 *
 */
class CartTest extends CakeTestCase {

	public $example_1 = array( 
		array('ProductID' => 1, 'quantity' => 1),
		array('ProductID' => 2, 'quantity' => 1)
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cart = ClassRegistry::init('Cart');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
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
	public function testSet() {


		$this->Cart->set($this->example_1);
		$this->assertEqual(count($this->Cart->get()), 2, "There are 2 products in the shopping cart");

//		$this->Cart->destroy();


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

		$this->Cart->set($this->example_1);
		$this->assertEqual(count($this->Cart->get()), 2, "There are 2 products in the shopping cart");
		$this->Cart->destroy();
		$this->assertEqual(count($this->Cart->get()), 0, "Cart was destroyed so there should be 0 products in the shopping cart");

	}

}
