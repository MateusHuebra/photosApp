
	<a href="/<?php echo $_SESSION['user']->getUsername(); ?>" class="waves-effect waves blue darken-4 btn-floating" style="left: 5px; top: 5px; margin-bottom: 3px;"><i class="material-icons">keyboard_backspace</i></a>
    <div class="row content-login">
    <form class="col s12 l4 offset-l4" method="post" action="/authentication/updateInfo">
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="username" id="username" type="text" class="validate" required="true" value="<?php echo $_SESSION['user']->getUsername();  ?>" >
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="email" id="email" type="text" class="validate" required="true" value="<?php echo $_SESSION['user']->getEmail();  ?>" >
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn">UPDATE INFO</button>
  	  </div>

        <div class="row">
     	 	<a class="col s8 offset-s2 waves-effect waves-light red darken-4 btn" disabled>CHANGE PASSWORD</a>
  	    </div>
    </form>
  </div>

  <script type="text/javascript">
    <?php
    if (!is_null($error)) {
        echo 'M.toast({html: "' . $error . '", classes: "rounded"});';
    }
    ?>
</script>