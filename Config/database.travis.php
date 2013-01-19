<?php

class DATABASE_CONFIG {
	
	private $identities = array(
		'mysql' => array(
			'datasource' => 'Database/Mysql',
			'host' => '0.0.0.0',
			'login' => 'travis'
		)
	);

	public $default = array(
		'persistent' => false,
		'host' => '',
		'login' => '',
		'password' => '',
		'database' => 'cakephp_test',
		'prefix' => ''
	);

	public $test = array(
		'persistent' => false,
		'host' => '',
		'login' => '',
		'password' => '',
		'database' => 'cakephp_test',
		'prefix' => ''
	);
	
}