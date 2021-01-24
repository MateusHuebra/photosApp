<?php

namespace Controller;

class Home extends LoggedController {

	function index() {
		$this->view('Home/index');
	}

	function getPosts() {
		$daoPost = new \Dao\Post();
		$this->json($daoPost->get());
	}

}