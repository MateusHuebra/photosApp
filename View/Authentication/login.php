
	<div class="row content">
    <form class="col s12 l4 offset-l4" method="post" action="/photosApp/authentication/loginCheck">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="usernameOrEmail" id="usernameOrEmail" type="text" class="validate" required="true" value="<?php echo $info;  ?>" >
          <label for="usernameOrEmail">Username or Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="password" id="password" type="password" class="validate" required="true">
          <label for="password">Password</label>
          <span class="helper-text">
            <?php
              echo $error;
            ?>
          </span>
        </div>
      </div>
      
      <div class="row">
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn">LOG IN</button>
     	 	<p align="center" class="col s8 offset-s2">if you haven't an account: <a href="/photosApp/authentication/signUp">sign up</a></p>
  	  </div>
    </form>
  </div>