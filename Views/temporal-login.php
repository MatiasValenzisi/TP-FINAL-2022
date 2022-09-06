  <body class="login">
    <div class="login_wrapper" id="login" style="padding:12px;">
      <div class="card card-container">     
        <br>
        <div class="text-center" style="margin-bottom: 25px">
          <img class="profile-img-card img-circle" src="<?php echo VIEWS_PATH ?>/images/user.png" alt="..." style="height: 40%; width: 40%">
        </div>
        <form class="form-signin" action="<?php echo FRONT_ROOT ?>/index-temporal.php" method="POST">
          <span id="reauth-email" class="reauth-email"></span>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-username" type="text" class="form-control" name="login-username" value="" placeholder="Usuario">
          </div>
          <div class="input-group" style="margin-bottom: 25px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="login-password" placeholder="Contraseña">
          </div>
          <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" style="margin-bottom: 10px">Iniciar sesión</button>
        </form>
        <h5><a href="password.html" class="forgot-password">¿Olvidaste la contraseña?</a></h5>
      </div>
    </div>
  </body>
</html>