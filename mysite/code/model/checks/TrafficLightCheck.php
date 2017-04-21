<?php

class TrafficLightCheck extends Check {

	private static $singular_name = 'Traffic Light Check';
	private static $plural_name = 'Traffic Light Checks';

	public function isRed($value, $total) {
		if ($this->getPercentage($value, $total) >= 90) {
			return true;
		}
		return false;
	}

	public function isAmber($value, $total) {
		if ($this->getPercentage($value, $total) >= 60) {
			return true;
		}
		return false;
	}

	public function isGreen($value, $total) {
		if ($this->getPercentage($value, $total) < 60) {
			return true;
		}
		return false;
	}

	public function getPercentage($value, $total) {
		return ($value / $total) * 100;
	}

}
