<?php

namespace Controller;

class Profile extends LoggedController {

    function viewProfile(string $username) {
        $this->username = $username;
        $daoUser = new \Dao\User();
        $user = $daoUser->getByUsername($username);
        $this->view('Profile/index', [
            'profileUser' => $user
        ]);
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