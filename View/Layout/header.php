<?php
$general = new \Service\General();
?>
<!DOCTYPE html>
<html>
<head>
	<title>photosApp - log in</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="/photosApp/node_modules/materialize-css/dist/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" type="text/css" href="/photosApp/css/index.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

	<nav>
		<div class="nav-wrapper indigo darken-4">
			<a href="#!" class="brand-logo center">photosApp</a>
			<!--
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			-->
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><img src=<?php echo '"'.$general->getProfilePicture($_SESSION['user']->getPhoto()).'"'; ?> alt="" class="circle-mobile"></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">Profile</a></li>
				<li><img src=<?php echo '"'.$general->getProfilePicture($_SESSION['user']->getPhoto()).'"'; ?> alt="" class="circle"></li>
	   		 	<li><a href="/photosApp/authentication/login">Logout</a></li>
			</ul>
		</div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<div>
			<img src="/photosApp/images/cover.png" alt="" class="sidenav-photo">
			<img src=<?php echo '"'.$general->getProfilePicture($_SESSION['user']->getPhoto()).'"'; ?> alt="" class="sidenav-circle">
		</div>
	    <li><a href="#">Profile</a></li>
	    <li><a href="/photosApp/authentication/login">Logout</a></li>
 	</ul>