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
		if(isset($results[0]['Product'])) {
			foreach ($results as &$item) {
				$p = $item['Product'];
				foreach ($item['Product'] as $key => $value) {
					if(strpos($key, 'price') !== FALSE) {
						$item['Product']['formatted_' . $key] = CakeNumber::currency($value, Configure::read('Shop.currency'));
					}
				}
				$discount = 0;
				if($p['sale_price'] > 0) {
					$discount = (($p['price'] - $p['sale_price']) / $p['price']) * 100;
				}
				$item['Product']['discount'] = $discount;
				$item['Product']['formatted_discount'] = CakeNumber::toPercentage($discount, 0);
			}
		}
		return $results;
	}

}