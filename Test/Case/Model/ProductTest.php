<?php
App::uses('Product', 'Model');

/**
 * Product Test Case
 *
 */
class ProductTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.product'
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Product = ClassRegistry::init('Product');
	}


    /**
     * Tests some manipulation that happens in the data with the 
     * afterFind function in the model 
     *
     * @access public
     *
     * @return mixed Value.
     */
	public function testAfterFind() {

		$Product = current($this->Product->read(null, 2));

		$this->assertTrue(array_key_exists('discount', $Product));
		$this->assertTrue(array_key_exists('formatted_discount', $Product));
		$this->assertTrue(array_key_exists('formatted_price', $Product));
		$this->assertTrue(array_key_exists('formatted_sale_price', $Product));
		$this->assertTrue(array_key_exists('formatted_display_price', $Product));

		// Checking for the addition of discounts
		$this->assertEqual($Product['discount'], (float) 80);
		$this->assertEqual($Product['formatted_discount'], '80%');

		// Checking that the currency returned OK
		$_50 = CakeNumber::currency(50, Configure::read('Shop.currency'));
		$_10 = CakeNumber::currency(10, Configure::read('Shop.currency'));
		$this->assertEqual($Product['formatted_price'], $_50);
		$this->assertEqual($Product['formatted_sale_price'], $_10);
		$this->assertEqual($Product['formatted_display_price'], $_10);

	}

    /**
     * Checks if the monetary fields worked
     * 
     * @access public
     *
     * @return mixed Value.
     */
	public function test_formatMonetaryFields() {
		$Product = $this->Product->read(null, 2);
		$result = $this->Product->_formatMonetaryFields(current($Product));

		$expected = array(
			'formatted_price' => CakeNumber::currency(50, Configure::read('Shop.currency')),
			'formatted_sale_price' => CakeNumber::currency(10, Configure::read('Shop.currency')),
			'formatted_display_price' => CakeNumber::currency(10, Configure::read('Shop.currency'))
		);

		$this->assertEqual($result, $expected);
	}

    /**
     * Test the discount calculation
     * 
     * @access public
     *
     * @return mixed Value.
     */
	public function test_calculateDiscount() {

		$expected = array(
			'discount' => (float) 40,
			'formatted_discount' => '40%'
		);

		$result = $this->Product->_calculateDiscount(20,12);

		$this->assertEqual($result, $expected);
		
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Product);

		parent::tearDown();
	}

}
