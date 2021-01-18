<!DOCTYPE html>
<html>
<head>
	<title>photosApp - log in</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="/photosApp/node_modules/materialize-css/dist/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" type="text/css" href="/photosApp/css/login.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
	<nav>
		<div class="nav-wrapper indigo darken-4">
			<a href="#!" class="brand-logo center">photosApp</a>

		</div>
	</nav>

	<div class="row content">
    <form class="col s12 l4 offset-l4" method="post" action="/photosApp/authentication/loginCheck">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="usernameOrEmail" id="usernameOrEmail" type="text" class="validate" required="true">
          <label for="usernameOrEmail">Username or Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="password" id="password" type="password" class="validate" required="true">
          <label for="password">Password</label>
          <span class="helper-text"></span>
        </div>
      </div>
      
      <div class="row">
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn">LOG IN</button>
     	 	<p align="center" class="col s8 offset-s2">if you haven't an account: <a href="/photosApp/authentication/signUp">sign up</a></p>
  	  </div>
    </form>
  </div>

	<script type="text/javascript" src="/photosApp/node_modules/jquery/dist/jquery.min.js"></script>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="/photosApp/node_modules/materialize-css/dist/js/materialize.min.js"></script>
	<script type="text/javascript" src="/photosApp/js/Authentication/login.js"></script>
</body>
</html>