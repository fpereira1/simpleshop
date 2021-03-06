<?php

App::uses('AppModel', 'Model');
App::uses('CakeNumber', 'Utility');
/**
 * Product Model
 *
 */
class Product extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'stock_count' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $virtualFields = array(
		'display_price' => 'IF(sale_price<price && sale_price>0,sale_price,price)'
	);

	public $_monetaryFields = array(
		'price',
		'sale_price',
		'display_price'
	);

    /**
     * Adds data into the find function when searching for a product, only
     *  active and products in stock is returned 
     *
     * @param mixed $query Description.
     *
     * @access public
     *
     * @return mixed Value.
     */
	public function beforeFind($query) {
		$fakeRequest = new CakeRequest();
		// Hack to get it to show hidden products in the backend
		if(strpos($fakeRequest->url, 'admin') === FALSE) {
			$query['conditions'] = am($query['conditions'], array(
				'Product.hidden' => false
			));
		}
		return $query;
	}

	public function afterFind($results, $primary = false) {
		parent::afterFind($results, $primary);
		foreach ($results as &$item) {
			$p = array_pop($item);
			if(isset($p['id'])) { // ensures this is a Product
				// Merging new data into the current values
				$item['Product'] = am(
					$p,
					$this->_calculateDiscount($p['price'], $p['sale_price']),
					$this->_formatMonetaryFields($p)
				);
			}
		}
		return $results;
	}

    /**
     * Uses the monetaryFields variable and returns an array with formatted
     * 
     * @param mixed $Product Description.
     *
     * @access private
     *
     * @return mixed Value.
     */
	public function _formatMonetaryFields($Product) {
		$out = array();
		foreach ($this->_monetaryFields as $field) {
			if(isset($Product[$field])) {
				$out["formatted_{$field}"] = CakeNumber::currency($Product[$field], Configure::read('Shop.currency'));
			}
		}
		return $out;

	}

    /**
     * Calculates a discount rate based on difference between sale price and price
     * 
     * @param mixed $price      Description.
     * @param mixed $sale_price Description.
     *
     * @access public
     *
     * @return mixed Value.
     */
	public function _calculateDiscount($price, $sale_price) {
		$discount = 0;
		if($sale_price > 0) {
			$discount = (($price - $sale_price) / $price) * 100;
			return array(
				'discount' => $discount,
				'formatted_discount' => CakeNumber::toPercentage($discount, 0)
			);
		}
		return array();
	}

}