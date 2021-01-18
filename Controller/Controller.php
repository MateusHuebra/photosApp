<?php

namespace Controller;

abstract class Controller {

	protected function view(string $viewName) {
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
}