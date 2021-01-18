<?php

namespace Service;

class LoginAndSignup {
	
	function showInfo(bool $quote = false) {
		if(isset($_GET['info'])) {
			if($quote) {
				echo '"'.base64_decode($_GET['info']).'"';
			} else {
				echo base64_decode($_GET['info']);
			}
		}
	}

	function showErrorMessage() {
		if(isset($_GET['error'])) {
   	 		echo base64_decode($_GET['error']);
		}
	}
}