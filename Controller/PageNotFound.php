<?php

namespace Controller;

class PageNotFound extends Controller {

	function index() {
		$this->view('404');
	}
}

