<!DOCTYPE html>
<html>

<head>
	<title>photosApp</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

	<script type="text/javascript" src="/photosApp/node_modules/materialize-css/dist/js/materialize.min.js"></script>
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="/photosApp/node_modules/materialize-css/dist/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="/photosApp/css/index.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="manifset" href="/photosApp/manifest.json">
	<script>
		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.register('/service-worker.js');
		}
	</script>
	<script type="text/javascript" src="/photosApp/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper indigo darken-4">
				<a href="/photosApp/home" class="brand-logo center">photosApp</a>
				<!--
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			-->
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="circle-mobile"></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="/photosApp/home">Home</a></li>
					<li><a href="/photosApp/<?php echo $_SESSION['user']->getUsername(); ?>">Profile</a></li>
					<li><img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="circle"></li>
					<li><a class="modal-trigger" href="#modalLogout">Logout</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<ul class="sidenav" id="mobile-demo">
		<div>
			<img src="/photosApp/images/cover.png" alt="" class="sidenav-photo">
			<img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="sidenav-circle">
		</div>
		<li><a href="/photosApp/home">Home</a></li>
		<li><a href="/photosApp/<?php echo $_SESSION['user']->getUsername(); ?>">Profile</a></li>
		<li><a class="modal-trigger" href="#modalLogout">Logout</a></li>
	</ul>

	<div id="modalLogout" class="modal">
		<div class="modal-content">
			<h4>Logout</h4>
			<p>Are you sure you want to logout?</p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat">Cancel</a>
			<a href="/photosApp/authentication/login" class="waves-effect waves-red btn-flat">Yes</a>
		</div>
	</div>

	<div id="modalDeletePost" class="modal">
		<div class="modal-content">
			<h4>Delete post</h4>
			<p>Are you sure you want to delete this post?</p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat">Cancel</a>
			<a id="modalDeletePostConfirm" class="modal-close waves-effect waves-red btn-flat">Yes</a>
		</div>
	</div>

	<i style="visibility: hidden; position: absolute;" class="material-icons">thumb_up</i>
	<i style="visibility: hidden; position: absolute;" class="material-icons-outlined">thumb_up</i>
	<textarea id="selection" style="opacity: 0; position: absolute;"></textarea>
	
	<ul id='dropdown-post-your' class='dropdown-content'>
		<li id="more-copy"><span style="color: black;">copy link</span></li>
		<li id="more-delete" class="modal-trigger" href="#modalDeletePost"><span style="color: black;">delete</span></li>
	</ul>
	<ul id='dropdown-post-their' class='dropdown-content'>
		<li id="more-copy"><span style="color: black;">copy link</span></li>
	</ul>

	<script type="text/javascript">
		<?php
		echo 'var user = {id:' . $_SESSION['user']->getId() . ', username:"' . $_SESSION['user']->getUsername() . '", photo:"' . $_SESSION['user']->getProfilePicture() . '"};';
		?>
	</script>
	<script type="text/javascript" src="/photosApp/js/Layout/Header.js"></script>