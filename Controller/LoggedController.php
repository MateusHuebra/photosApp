<?php

namespace Controller;

abstract class LoggedController extends Controller {

	function __construct() {
		if(!(new \Service\Authentication())->isLogged()) {
			$this->redirect('authentication/login', 'You should be logged in to see that page');
		}
	}
	
	protected function view(string $viewName) {
		parent::view('Layout/header');
		parent::view($viewName);
		parent::view('Layout/footer');
	}
}