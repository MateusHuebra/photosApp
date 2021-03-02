
	<div class="row content-login">
    <form class="col s12 l4 offset-l4" method="post" action="/authentication/loginCheck">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="usernameOrEmail" id="usernameOrEmail" type="text" class="validate" required="true" value="<?php echo $info;  ?>" >
          <label for="usernameOrEmail"><?php \Service\Translation::echo('authentication.usernameOrEmail'); ?></label>
        </div>
      </div>

      <div class="row row-fixed">
        <div class="input-field col s10 offset-s1">
          <input name="password" id="password" type="password" class="validate" required="true">
          <label for="password"><?php \Service\Translation::echo('authentication.password'); ?></label>
        </div>
      </div>
      
      <div class="row">
      <div class="col s10 offset-s1 errorMessage">
          <span class="helper-text">
            <?php
              echo $error;
            ?>
          </span>
        </div>
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn"><?php \Service\Translation::echo('authentication.login'); ?></button>
     	 	<p align="center" class="col s8 offset-s2 linktext"><?php \Service\Translation::echo('authentication.ifYouHaventAnAccount'); ?>: <a href="/authentication/signUp"><?php \Service\Translation::echo('authentication.signup'); ?></a></p>
  	  </div>
    </form>
  </div>