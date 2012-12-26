<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'hidden' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null),
		'sale_price' => array('type' => 'float', 'null' => false, 'default' => null),
		'stock_count' => array('type' => 'integer', 'null' => false, 'default' => null),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'hidden' => 0,
			'title' => 'Apple bag',
			'description' => 'thti is a nice bag that has this',
			'price' => '199.99',
			'sale_price' => '0',
			'stock_count' => '7',
			'image' => 'http://media-cache-ec3.pinterest.com/upload/50735933271659493_xPXnXrDe_c.jpg'
		),
		array(
			'id' => '2',
			'hidden' => 0,
			'title' => 'Polkadot bag',
			'description' => 'A polkadot bag',
			'price' => '49.99',
			'sale_price' => '10',
			'stock_count' => '1',
			'image' => 'http://media-cache-ec5.pinterest.com/upload/94857135870980217_ig4HVSA8_c.jpg'
		),
		array(
			'id' => '3',
			'hidden' => 0,
			'title' => 'Colorful eco bag',
			'description' => 'this is the bag',
			'price' => '35',
			'sale_price' => '23',
			'stock_count' => '1',
			'image' => 'http://media-cache-ec2.pinterest.com/upload/206884176601852292_tT01ojU2_c.jpg'
		),
	);

}
