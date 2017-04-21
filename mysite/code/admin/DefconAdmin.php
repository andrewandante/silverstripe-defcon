<?php

class DefconAdmin extends ModelAdmin {

	private static $managed_models = [
		'Check',
		'CheckSuite',
		'AWSAccount',
	];

	private static $url_segment = 'defcon';

	private static $menu_title = 'Defcon';

	public function getEditForm($id = null, $fields = null) {
		$form = parent::getEditForm($id, $fields);
		$formfields = $form->Fields();
		$checks = $formfields->dataFieldByName('Check');
		if (!$checks) {
			return $form;
		}
		$multiClassComponent = new GridFieldAddNewMultiClass();
		$multiClassComponent->setClasses([
			'EC2LimitCheck',
		]);
		$checks->getConfig()
			->removeComponentsByType('GridFieldAddNewButton')
			->addComponent($multiClassComponent);
		$checks->setForm($form);

		return $form;
	}
}
