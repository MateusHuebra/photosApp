<?php

namespace Controller;

abstract class LoggedController extends Controller {

	function __construct() {
		if(!(new \Service\Authentication())->isLogged()) {
			$this->redirect('authentication/login', 'You should be logged in to see that page');
		}
	}
	
	protected function view(string $viewName, array $data = []) {
		parent::view('Layout/header');
		parent::view($viewName, $data);
		parent::view('Layout/footer');
	}

	protected function uploadPicture(string $targetFolder, string $targetName) {
		$targetFolder = "images/".$targetFolder."/";
		if(!isset($_FILES['picture']) || empty($_FILES['picture']['name'])) {
			throw new \Exception\UploadPictureError("No file was sent");
		}
		$fileExtension = strtolower(pathinfo(basename($_FILES["picture"]["name"]),PATHINFO_EXTENSION));
		$targetName = $targetName .'.'. $fileExtension;
		$target = $targetFolder . $targetName;
		
		if($fileExtension != 'png' && $fileExtension != 'jpg' && $fileExtension != 'jpeg') {
			throw new \Exception\UploadPictureError("Your file is not a PNG, JPG or JPEG");
		}
		if($_FILES["picture"]["size"] > 10000000) {
			throw new \Exception\UploadPictureError("Your file is too large");
		}
		if(getimagesize($_FILES["picture"]["tmp_name"])[0] != getimagesize($_FILES["picture"]["tmp_name"])[1]) {
			//throw new \Exception\UploadPictureError("Your image is not a square");
		}

		if (!file_exists($targetFolder)) {
			mkdir($targetFolder, 0777, true);
		}

		if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target)){
			//unlink($targetFolder.$currentUser['picture']);
			//echo $target;
			return $targetName;
		} else {
			throw new \Exception\UploadPictureError("Something gone wrong");
		}

	}

}