
	<div class="row content-signup">
    <form class="col s12 l4 offset-l4" method="post" action="/authentication/signUpNewAccount">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="username" id="username" type="text" class="validate" required="true" value="<?php echo $info2;  ?>" >
          <label for="username"><?php \Service\Translation::echo('authentication.username'); ?></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="email" id="email" type="text" class="validate" required="true" value="<?php echo $info;  ?>" >
          <label for="email"><?php \Service\Translation::echo('authentication.email'); ?></label>
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
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn"><?php \Service\Translation::echo('authentication.signup'); ?></button>
     	 	<p align="center" class="col s8 offset-s2 linktext"><?php \Service\Translation::echo('authentication.ifYouHaveAnAccount'); ?>: <a href="/authentication/login"><?php \Service\Translation::echo('authentication.login'); ?></a></p>
  	  </div>
    </form>
  </div>