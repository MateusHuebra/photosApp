<?php

namespace Controller;

abstract class Controller {

	protected function view(string $viewName, array $data = []) {
		extract($data);
		require('View/'.$viewName.'.php');
	}

	protected function redirect(string $url, string $errorMessage = null, string $info = null, string $info2 = null) {
		$location = 'Location: /'.$url;
		if($errorMessage) {
			$location.= '/?error='.base64_encode($errorMessage);
			if($info) {
				$location.= '&info='.base64_encode($info);
				if($info2) {
					$location.= '&info2='.base64_encode($info2);
				}
			}
		}
		header($location);
		die();
	}

	protected function json($data) {
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	protected function showInfo() {
		if(isset($_GET['info'])) {
			return base64_decode($_GET['info']);
		}
	}

	protected function showInfo2() {
		if(isset($_GET['info2'])) {
			return base64_decode($_GET['info2']);
		}
	}

	protected function showErrorMessage() {
		if(isset($_GET['error'])) {
   	 		return base64_decode($_GET['error']);
		}
	}
}