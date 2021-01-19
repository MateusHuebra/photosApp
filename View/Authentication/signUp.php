
	<div class="row content">
    <form class="col s12 l4 offset-l4" method="post" action="/photosApp/authentication/signUpNewAccount">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="email" id="email" type="text" class="validate" required="true" value=<?php echo (new \Service\LoginAndSignup())->showInfo(true);  ?> >
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="password" id="password" type="password" class="validate" required="true">
          <label for="password">Password</label>
          <span class="helper-text">
            <?php
              echo (new \Service\LoginAndSignup())->showErrorMessage();
            ?>
          </span>
        </div>
      </div>
      
      <div class="row">
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn">SIGN UP</button>
     	 	<p align="center" class="col s8 offset-s2">if you have an account: <a href="/photosApp/authentication/login">log in</a></p>
  	  </div>
    </form>
  </div>