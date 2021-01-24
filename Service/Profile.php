<?php

namespace Service;

class Profile {
	
	function getProfilePicture(\Model\User $user) {
		if($user->getPhoto()){
			return '/photosApp/images/database/'.$user->getId().'/'.$user->getPhoto();
		} else {
			return '/photosApp/images/profile.png';
		}
	}

	function getCoverPicture(\Model\User $user) {
		if($user->getCover()){
			return '/photosApp/images/database/'.$user->getId().'/'.$user->getCover();
		} else {
			return '/photosApp/images/cover.png';
		}
	}
}