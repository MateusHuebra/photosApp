<?php

namespace Controller;

class Home extends LoggedController {

	function index() {
		$this->view('Home/index');
	}

	function getPosts() {
		$daoPost = new \Dao\Post();
		$posts = $daoPost->get();
		$results = [];
		foreach ($posts as $post) {
			$results[] = [
				'id' => $post->getId(),
				'text' => $post->getText(),
				'picture' => $post->getPicture(),
				'createdAt' => $post->getCreatedAt(),
				'user' => [
					'username' => $post->getUser()->getUsername(),
					'photo' => $post->getUser()->getProfilePicture()
				]
			];
		}
		$this->json($results);
	}

}