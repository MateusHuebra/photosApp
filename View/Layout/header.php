<!DOCTYPE html>
<html>

<head>
	<title>photosApp</title>
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
				<a href="/home" class="brand-logo center">photosApp</a>
				<!--
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			-->
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="circle-mobile"></a>
				<a id="nav-search-mobile" href="/search"><i class="material-icons" style="right: 20px; position: absolute;">search</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="/home"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.home'); ?></a></li>
					<li><a href="/<?php echo $_SESSION['user']->getUsername(); ?>"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.profile'); ?></a></li>
					<li><img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="circle"></li>
					<li><a class="modal-trigger" href="#modalLogout"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.logout'); ?></a></li>
					<li style="width: 47px;"></li>
				</ul>
			</div>
		</nav>
	</div>

	<ul class="sidenav" id="mobile-demo">
		<div>
			<img src="/images/cover.png" alt="" class="sidenav-photo">
			<img src="<?php echo $_SESSION['user']->getProfilePicture(); ?>" alt="" class="sidenav-circle">
		</div>
		<li><a href="/home"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.home'); ?></a></li>
		<li><a href="/<?php echo $_SESSION['user']->getUsername(); ?>"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.profile'); ?></a></li>
		<li><a class="modal-trigger" href="#modalLogout"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.logout'); ?></a></li>
	</ul>

	<div id="modalLogout" class="modal">
		<div class="modal-content">
			<h4><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.logout'); ?></h4>
			<p><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.areYouSureYouWantToLogout'); ?></p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.cancel'); ?></a>
			<a href="/authentication/login" class="waves-effect waves-red btn-flat"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.yes'); ?></a>
		</div>
	</div>

	<div id="modalDeletePost" class="modal">
		<div class="modal-content">
			<h4><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.deletePost'); ?></h4>
			<p><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.areYouSureYouWantToDeleteThisPost'); ?></p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.cancel'); ?></a>
			<a id="modalDeletePostConfirm" class="modal-close waves-effect waves-red btn-flat"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.yes'); ?></a>
		</div>
	</div>

	<i style="visibility: hidden; position: absolute;" class="material-icons">thumb_up</i>
	<i style="visibility: hidden; position: absolute;" class="material-icons-outlined">thumb_up</i>
	<textarea id="selection" style="opacity: 0; position: absolute; top: -150px;"></textarea>
	
	<ul id='dropdown-post-your' class='dropdown-content'>
		<li id="more-copy"><span style="color: black;"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.copyLink'); ?></span></li>
		<li id="more-delete" class="modal-trigger" href="#modalDeletePost"><span style="color: black;"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.delete'); ?></span></li>
	</ul>
	<ul id='dropdown-post-their' class='dropdown-content'>
		<li id="more-copy"><span style="color: black;"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.copyLink'); ?></span></li>
	</ul>

	<script type="text/javascript">
		<?php
		echo 'var user = {id:' . $_SESSION['user']->getId() . ', username:"' . $_SESSION['user']->getUsername() . '", photo:"' . $_SESSION['user']->getProfilePicture() . '"}; ';
		echo 'var language = ' . json_encode(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'getAll'), 'posts'));
		?>
	</script>
	<script type="text/javascript" src="/js/Layout/Header.js"></script>