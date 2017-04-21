<?php

class CheckSuite extends DataObject {

	private static $singular_name = 'Check Suite';
	private static $plural_name = 'Check Suites';

	private static $db = [
		'Title' => 'Varchar(50)',
		'Description' => 'Varchar',
	];

	private static $has_many = [
		'Checks' => 'Check',
	];

	public function getTable() {
		$table = GroupedList::create($this->Checks());
		$table->groupBy('AWSAccountID');

	}
}
