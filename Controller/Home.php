<?php

namespace Controller;

class Home extends LoggedController {

	function index() {
		$this->view('Home/index');
	}
}