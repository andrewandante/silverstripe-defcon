<?php

class Check extends DataObject {

	private static $singular_name = 'Check';
	private static $plural_name = 'Checks';

	private static $has_one = [
		'CheckSuite' => 'CheckSuite',
		'AWSAccount' => 'AWSAccount',
	];


	private static $db = [
		'Title' => 'Varchar(50)',
	];


	public function isGood() {

	}

	public function isBad() {

	}


}
