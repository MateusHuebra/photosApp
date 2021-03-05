
	
    <div class="row content-login">
    <form class="col s12 l4 offset-l4" method="post" action="/authentication/updateInfo" style="position: relative;">
    <a href="/<?php echo $_SESSION['user']->getUsername(); ?>" class="waves-effect waves blue darken-4 btn-floating" style="position: absolute; left: 5px; top: 5px;"><i class="material-icons">keyboard_backspace</i></a>
      <div class="row" style="padding-top: 43px;">
        <div class="input-field col s10 offset-s1">
          <input name="username" id="username" type="text" class="validate" required="true" value="<?php echo $_SESSION['user']->getUsername();  ?>" >
          <label for="username"><?php \Service\Translation::echo('authentication.username'); ?></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <input name="email" id="email" type="text" class="validate" required="true" value="<?php echo $_SESSION['user']->getEmail();  ?>" >
          <label for="email"><?php \Service\Translation::echo('authentication.email'); ?></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s10 offset-s1">
          <select name="lang">
            <?php
                foreach (glob("Service/Language/*.php") as $file) {
                  $file = explode('/', $file);
                  $file = explode('.', $file[2]);
                  if($file[0]!='Methods') {
                    echo '<option value="'.$file[0].'"';
                    if($_SESSION['lang']==$file[0]) {
                      echo ' selected';
                    }
                    echo'>'.$file[0].'</option>';
                  }
                }
            ?>
          </select>
          <label><?php \Service\Translation::echo('interface.language'); ?></label>
        </div>
      </div>

      <div class="row">
     	 	<button class="col s8 offset-s2 waves-effect waves-light blue darken-4 btn"><?php \Service\Translation::echo('authentication.updateInfo'); ?></button>
  	  </div>

        <div class="row">
     	 	<a class="col s8 offset-s2 waves-effect waves-light red darken-4 btn" disabled><?php \Service\Translation::echo('authentication.changePassword'); ?></a>
  	    </div>
    </form>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('select').formSelect();
    });
    <?php
    if (!is_null($error)) {
        echo 'M.toast({html: "' . $error . '", classes: "rounded"});';
    }
    ?>
</script>