<?php
$profile = new \Service\Profile();
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
	<link rel="manifset" href="/photosApp/manifest.json">
	<script>
		if('serviceWorker' in navigator) {
			navigator.serviceWorker.register('/service-worker.js');
		}
	</script>
	<script type="text/javascript" src="/photosApp/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>

	<nav>
		<div class="nav-wrapper indigo darken-4">
			<a href="/photosApp/home" class="brand-logo center">photosApp</a>
			<!--
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			-->
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><img src=<?php echo '"'.$profile->getProfilePicture($_SESSION['user']).'"'; ?> alt="" class="circle-mobile"></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">Profile</a></li>
				<li><img src=<?php echo '"'.$profile->getProfilePicture($_SESSION['user']).'"'; ?> alt="" class="circle"></li>
	   		 	<li><a href="/photosApp/authentication/login">Logout</a></li>
			</ul>
		</div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<div>
			<img src="/photosApp/images/cover.png" alt="" class="sidenav-photo">
			<img src=<?php echo '"'.$profile->getProfilePicture($_SESSION['user']).'"'; ?> alt="" class="sidenav-circle">
		</div>
	    <li><a href="#">Profile</a></li>
	    <li><a href="/photosApp/authentication/login">Logout</a></li>
 	</ul>