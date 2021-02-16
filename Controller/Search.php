<?php

namespace Controller;

class Search extends LoggedController {

    function index() {
        $this->view('Search/index');
    }

    function query() {
        $daoUser = new \Dao\User();
        $users = $daoUser->search($_POST['query']);
        
        foreach ($users as $user) {
			$results[] = [
                'id' => $user->getId(),
				'username' => $user->getUsername(),
				'photo' => $user->getPhoto()
			];
		}

        $this->json($results);
    }
}