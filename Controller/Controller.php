<?php

namespace Controller;

abstract class Controller {

	protected function view(string $viewName, array $data = []) {
		extract($data);
		require('View/'.$viewName.'.php');
	}

	protected function redirect(string $url, string $errorMessage = null, string $info = null) {
		$location = 'Location: /photosapp/'.$url;
		if($errorMessage) {
			$location.= '/?error='.base64_encode($errorMessage);
			if($info) {
				$location.= '&info='.base64_encode($info);
			}
		}
		header($location);
		die();
	}

	protected function showInfo() {
		if(isset($_GET['info'])) {
			return base64_decode($_GET['info']);
		}
	}

	protected function showErrorMessage() {
		if(isset($_GET['error'])) {
   	 		return base64_decode($_GET['error']);
		}
	}
}