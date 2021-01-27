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
			$liked = (new \Dao\Like())->get($post->getId(), $_SESSION['user']->getId());
			$likes = (new \Dao\Like())->getCount($post->getId());
			$results[] = [
				'id' => $post->getId(),
				'text' => $post->getText(),
				'picture' => $post->getPicture(),
				'createdAt' => $post->getCreatedAt(),
				'user' => [
					'id' => $post->getUserId(),
					'username' => $post->getUser()->getUsername(),
					'photo' => $post->getUser()->getProfilePicture()
				],
				'liked' => $liked,
				'likes' => $likes
			];
		}
		$this->json($results);
	}

	function like() {
		$daoLike = new \Dao\Like();
		$daoLike->set($_POST['postId'], $_POST['userId']);
		$result = $daoLike->getCount($_POST['postId']);

		$this->json($result);
	}

	function dislike() {
		$daoLike = new \Dao\Like();
		$daoLike->unset($_POST['postId'], $_POST['userId']);
		$result = $daoLike->getCount($_POST['postId']);

		$this->json($result);
	}
	
}