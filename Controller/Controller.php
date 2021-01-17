<?php

namespace Controller;

abstract class Controller {

	protected function view(string $viewName) {
		require('View/'.$viewName.'.php');
	}

	protected function redirect(string $url, string $errorMessage = null) {
		$location = 'Location: /photosapp/'.$url;
		if($errorMessage) {
			$location.= '/?error='.base64_encode($errorMessager);
		}
		header($location);
		die();
	}
}