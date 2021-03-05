<?php

namespace Controller;

class About extends LoggedController {

	function index() {
		$this->view('About/index');
	}
	
}