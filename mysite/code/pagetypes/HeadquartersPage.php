<?php

class HeadquartersPage extends Page {

	public function getCheckSuites() {
		return CheckSuite::get();
	}

}

class HeadquartersPage_Controller extends Page_Controller {

}
