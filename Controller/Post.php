<?php

namespace Controller;

class Post extends LoggedController {

    function index() {
		$daoPost = new \Dao\Post();
		$post = $daoPost->getOne($_GET['pid'], $_GET['pic']);
		if($post==false) {
			$this->redirect('PageNotFound');
		}
		$liked = (new \Dao\Like())->get($post->getId(), $_SESSION['user']->getId());
		$likes = (new \Dao\Like())->getCount($post->getId());
		$result = [
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
		$this->view('Post/index', [
			'post' => $result
		]);
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

	function likesCount() {
		$daoLike = new \Dao\Like();
		$result = $daoLike->getCount($_POST['postId']);

		$this->json($result);
	}
	
	function seeLikes() {
		$daoLike = new \Dao\Like();
		$result = $daoLike->getLikes($_POST['postId']);

		$this->json($result);
	}
    
    function getPostsById() {
        $daoPost = new \Dao\Post();
        $daoUser = new \Dao\User();
        $username = $_POST['username'];
        $user = $daoUser->getByUsername($username);
        $id = $user->getId();
		$posts = $daoPost->getById($id);
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
    
}