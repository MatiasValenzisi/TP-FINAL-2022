<body class="login">
    <?php 
   require_once("alert.php");
    echo "<script>sweet('TESDT','TWWET','error')</script>"
    ?>
    <div class="login_wrapper " id="login" style="padding:12px;">

        <div class="card card-container ">
            <div class="login_content">
                <h1 class="text-center"><i class="fa fa-paw"></i> <?php echo PROJECT_NAME ?> </h1>
            </div>
            <br>
            <div class="text-center" style="margin-bottom: 25px">
                <img class="profile-img-card img-circle" src="<?php echo VIEWS_PATH ?>/images/user.png" alt="user"
                    style="height: 150px; width: 150px">
            </div>

            <form class="form-signin" action="<?php echo FRONT_ROOT ?>/sign/login" method="GET">
                <span id="reauth-email" class="reauth-email"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type=" text" class="form-control" name="usernamePH" value="" placeholder="Usuario">
                </div>
                <div class="input-group" style="margin-bottom: 25px">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="passwordPH" placeholder="Contraseña">
                </div>
                <button class="btn btn-lg btn-success btn-block btn-signin" type="submit" style="margin-bottom: 10px"><i
                    class="fa fa-user"></i> Iniciar sesión</button>

                <button class="btn btn-lg btn-danger btn-block btn-sig" style="margin-bottom: 10px" type="button"
                    onclick="sweet('TESDT','TWWET','error')"><i class="fa fa-google"></i> Google</button>

                <button class="btn btn-lg btn-primary btn-block" style="margin-bottom: 10px"><i
                        class="fa fa-facebook"></i> Facebook</button>
            </form>

            <div class="d-flex justify-center items-center">
                <span>
                    <a href="<?php echo FRONT_ROOT ?>/sign/register" class="forgot-password text-right">Registrarse en
                        <?php echo PROJECT_NAME ?>.</a>
                </span>
                <span>
                    <a href="password.html" class="forgot-password">¿Olvidaste la contraseña?</a>
                </span>
            </div>

            <div>
                <div class="clearfix"></div>
                <br>
                <div class="login_content ">
                    <p><i class="fa fa-paw"></i> ©2022 todos los derechos reservados. <i class="fa fa-paw"></i></p>
                </div>
            </div>

        </div>
    </div>


    </script>
</body>

</html>