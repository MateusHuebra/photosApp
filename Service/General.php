<?php

namespace Service;

class General {
	
	function getProfilePicture($photo) {
		if($photo){
			return '/photosApp/images/profile/'.$photo;
		} else {
			return '/photosApp/images/profile.png';
		}
	}

	function getCoverPicture($cover) {
		if($cover){
			return '/photosApp/images/cover/'.$cover;
		} else {
			return '/photosApp/images/cover.png';
		}
	}
}