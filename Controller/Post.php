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
		$posts = $daoPost->get($_POST['lastPostId']);
		$results = [];
		foreach ($posts as $post) {
			$liked = (new \Dao\Like())->get($post->getId(), $_SESSION['user']->getId());
			$likes = (new \Dao\Like())->getCount($post->getId());
			$comments = (new \Dao\Comment())->getCount($post->getId());
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
				'likes' => $likes,
				'comments' => $comments
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
		$posts = $daoPost->getById($id, $_POST['lastPostId']);
		$results = [];
		foreach ($posts as $post) {
			$liked = (new \Dao\Like())->get($post->getId(), $_SESSION['user']->getId());
			$likes = (new \Dao\Like())->getCount($post->getId());
			$comments = (new \Dao\Comment())->getCount($post->getId());
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
				'likes' => $likes,
				'comments' => $comments
			];
		}
		$this->json($results);
	}
	
	function getPostComments() {
		$daoComment = new \Dao\Comment();
		if(isset($_POST['lastCommentId']) && !is_null($_POST['lastCommentId'])) {
			$comments = $daoComment->get($_POST['postId'], $_POST['lastCommentId']);
		} else {
			$comments = $daoComment->get($_POST['postId']);
		}
		if($comments) {
			foreach ($comments as $comment) {
				$results[] = [
					'id' => $comment->getId(),
					'text' => $comment->getText(),
					'createdAt' => $comment->getCreatedAt(),
					'user' => [
						'id' => $comment->getUserId(),
						'username' => $comment->getUser()->getUsername(),
						'photo' => $comment->getUser()->getProfilePicture()
					]
				];
			}
			$this->json($results);
		} else {
			$this->json(false);
		}
	}

	function getCountComments() {
		$daoComment = new \Dao\Comment();
		$result = $daoComment->getCount($_POST['postId']);

		$this->json($result);
	}

	function sendComment() {
		try {
			(new \Service\Comment())->validateComment($_POST['text']);
		} catch (\Exception\InvalidComment $exception) {
			echo $exception->getMessage();
			die();
		} catch (\Exception $exception) {
			echo 'Something gone wrong';
			die();
		}

		$daoComment = new \Dao\Comment();
		$daoComment->set($_POST['postId'], $_SESSION['user']->getId(), $_POST['text']);
		
	}
    
}