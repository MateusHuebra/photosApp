<?php

namespace Service;

class LoginAndSignup {
	
	function showInfo(bool $quote = false) {
		if(isset($_GET['info'])) {
			if($quote) {
				return '"'.base64_decode($_GET['info']).'"';
			} else {
				return base64_decode($_GET['info']);
			}
		}
	}

	function showErrorMessage() {
		if(isset($_GET['error'])) {
   	 		return base64_decode($_GET['error']);
		}
	}
}