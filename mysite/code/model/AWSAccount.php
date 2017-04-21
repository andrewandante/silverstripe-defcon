<?php

class AWSAccount extends DataObject {

	private static $singular_name = 'AWS Account';
	private static $plural_name = 'AWS Accounts';

	private static $belongs_many = [
		'CheckSuites' => 'CheckSuite',
	];

	private static $has_many = [
		'Checks' => 'Check',
	];

	private static $db = [
		'Title' => 'Varchar(50)',
		'AccountID' => 'Varchar(50)',
		'AdminRoleArn' => 'Varchar(100)',
	];
}
