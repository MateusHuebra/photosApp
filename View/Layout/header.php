<!DOCTYPE html>
<html>

<head>
	<title><?php \Service\Translation::echo('interface.appName'); ?></title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

	<script type="text/javascript" src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="/node_modules/materialize-css/dist/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="/css/index.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="manifset" href="/manifest.json">
	<script>
		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.register('/service-worker.js');
		}
	</script>
	<script type="text/javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper indigo darken-4">
				<a href="/home" class="brand-logo center" style="font-family: custom; font-weight: 600;"><?php \Service\Translation::echo('interface.appName'); ?></a>
				<!--
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			-->
				<span style="position: absolute; left: 0px;" class="dropdownNavBarMobile-trigger" data-target='dropdown-navbar'>
					<a data-target="dropdown-navbar" class="sidenav-trigger"><img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="circle-mobile">
					<i class="material-icons" style="position: absolute; left: -21.5px; top: 0px;">arrow_drop_down</i></a>
				</span>
				<a id="nav-search-mobile" class="sidenav-trigger" href="/search" style="position: absolute; right: 2px;"><i class="material-icons">search</i></a>
				<ul class="right hide-on-med-and-down">
					<li style="position: absolute; right: 90px;" ><a id="nav-search" href="/search"><i class="material-icons">search</i></a></li>
					<span style="position: absolute; right: 15px;" class="dropdownNavBar-trigger" data-target='dropdown-navbar'>
					<li><i class="material-icons">arrow_drop_down</i></li>
					<li><img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="circle"></li>
					</span>
				</ul>
			</div>
		</nav>
	</div>

	<ul class="sidenav" id="mobile-demo">
		<div>
			<img src="/images/cover.png" alt="" class="sidenav-photo">
			<img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="sidenav-circle">
		</div>
		<li><a href="/home"><?php \Service\Translation::echo('interface.home'); ?></a></li>
		<li><a href="/<?php echo $_SESSION['user']->getUsername(); ?>"><?php \Service\Translation::echo('interface.profile'); ?></a></li>
		<li><a class="modal-trigger" href="#modalLogout"><?php \Service\Translation::echo('interface.logout'); ?></a></li>
		<li class="divider" tabindex="-1"></li>
		<li><a href="/about"><?php \Service\Translation::echo('interface.about'); ?></a></li>
	</ul>

	<div id="modalLogout" class="modal">
		<div class="modal-content">
			<h4><?php \Service\Translation::echo('interface.logout'); ?></h4>
			<p><?php \Service\Translation::echo('interface.areYouSureYouWantToLogout'); ?></p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat"><?php \Service\Translation::echo('interface.cancel'); ?></a>
			<a href="/authentication/login" class="waves-effect waves-red btn-flat"><?php \Service\Translation::echo('interface.yes'); ?></a>
		</div>
	</div>

	<div id="modalDeletePost" class="modal">
		<div class="modal-content">
			<h4><?php \Service\Translation::echo('interface.deletePost'); ?></h4>
			<p><?php \Service\Translation::echo('interface.areYouSureYouWantToDeleteThisPost'); ?></p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat"><?php \Service\Translation::echo('interface.cancel'); ?></a>
			<a id="modalDeletePostConfirm" class="modal-close waves-effect waves-red btn-flat"><?php \Service\Translation::echo('interface.yes'); ?></a>
		</div>
	</div>

	<i style="visibility: hidden; position: absolute;" class="material-icons">thumb_up</i>
	<i style="visibility: hidden; position: absolute;" class="material-icons-outlined">thumb_up</i>
	<textarea id="selection" style="opacity: 0; position: absolute; top: -150px;"></textarea>
	
	<ul id='dropdown-post-your' class='dropdown-content'>
		<li id="more-copy"><span style="color: black;"><?php \Service\Translation::echo('interface.copyLink'); ?></span></li>
		<li id="more-delete" class="modal-trigger" href="#modalDeletePost"><span style="color: black;"><?php \Service\Translation::echo('interface.delete'); ?></span></li>
	</ul>
	<ul id='dropdown-post-their' class='dropdown-content'>
		<li id="more-copy"><span style="color: black;"><?php \Service\Translation::echo('interface.copyLink'); ?></span></li>
	</ul>
	<ul id='dropdown-navbar' class='dropdown-content'>
		<li><a style="color: black;" href="/home"><?php \Service\Translation::echo('interface.home'); ?></a></li>
		<li><a style="color: black;" href="/<?php echo $_SESSION['user']->getUsername(); ?>"><?php \Service\Translation::echo('interface.profile'); ?></a></li>
		<li><a style="color: black;" class="modal-trigger" href="#modalLogout"><?php \Service\Translation::echo('interface.logout'); ?></a></li>
		<li class="divider" tabindex="-1"></li>
		<li><a style="color: black;" href="/about"><?php \Service\Translation::echo('interface.about'); ?></a></li>
  	</ul>

	<script type="text/javascript">
		<?php
		echo 'var user = {id:' . $_SESSION['user']->getId() . ', username:"' . $_SESSION['user']->getUsername() . '", photo:"' . $_SESSION['user']->getProfilePicture() . '"}; ';
		echo 'var language = ' . json_encode(\Service\Translation::getAll());
		?>
	</script>
	<script type="text/javascript" src="/js/Layout/Header.js"></script>