<?php

namespace Controller;

abstract class LoggedController extends Controller {

	function __construct() {
		if(!(new \Service\Authentication())->isLogged()) {
			$this->redirect('authentication/login', call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.youShouldBeLoggedInToSeeThatPage'));
		}
	}
	
	protected function view(string $viewName, array $data = []) {
		parent::view('Layout/header');
		parent::view($viewName, $data);
		parent::view('Layout/footer');
	}

	protected function uploadPicture(string $targetFolder, string $targetName, bool $square = false, string $old = null) {
		$targetFolder = "images/".$targetFolder."/";
		if(!isset($_FILES['picture']) || empty($_FILES['picture']['name'])) {
			throw new \Exception\UploadPictureError(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.noFileWasSent'));
		}
		$fileExtension = strtolower(pathinfo(basename($_FILES["picture"]["name"]),PATHINFO_EXTENSION));
		$targetName = $targetName .'.'. $fileExtension;
		$target = $targetFolder . $targetName;
		
		if($fileExtension != 'png' && $fileExtension != 'jpg' && $fileExtension != 'jpeg') {
			throw new \Exception\UploadPictureError(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourFileIsNotAPNGJPGorJPEG'));
		}
		if($_FILES["picture"]["size"] > 10000000) {
			throw new \Exception\UploadPictureError(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourFIleIsTooLarge'));
		}
		if($square && (getimagesize($_FILES["picture"]["tmp_name"])[0] != getimagesize($_FILES["picture"]["tmp_name"])[1])) {
			throw new \Exception\UploadPictureError(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourImageIsNotASquare'));
		}

		if (!file_exists($targetFolder)) {
			mkdir($targetFolder, 0777, true);
		}

		if(!is_null($old)) {
			unlink($targetFolder.$old);
		}
		if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target)){
			//unlink($targetFolder.$currentUser['picture']);
			//echo $target;
			return $targetName;
		} else {
			throw new \Exception\UploadPictureError(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.somethingGoneWrong'));
		}

	}
	
}