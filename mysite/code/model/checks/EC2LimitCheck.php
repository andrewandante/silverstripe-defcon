<?php

class EC2LimitCheck extends TrafficLightCheck {

	private static $singular_name = 'EC2 Limit Check';
	private static $plural_name = 'EC2 Limit Checks';

	private static $db = [
		'Region' => 'Varchar(25)',
	];

	public function doCheck() {
		$instances = json_decode(shell_exec('aws --region=' . $this->Region . ' ec2 describe-instances'), true);
		$ninstances = count($instances['Reservations']);
		if ($ninstances == 0) {
			return true;
		}
		$limits = json_decode(shell_exec('aws --region=' . $this->Region . ' ec2 describe-account-attributes'), true);
		if (!is_array($limits)) {
			return false;
		}
		foreach ($limits['AccountAttributes'] as $limit) {
			if ($limit['AttributeName'] == 'max-instances') {
				$ec2limit = $limit['AttributeValues'][0]['AttributeValue'];
			}
		}
		if (!$ec2limit) {
			return false;
		}

		return $this->getPercentage($ninstances, $ec2limit);
	}
}
