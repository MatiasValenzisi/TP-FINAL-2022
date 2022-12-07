
<body>

    <div class="login-container" id="login-container">
        <span class="img-form">

        </span>
        <div class="form-container">

            <form action="<?php echo FRONT_ROOT ?>/sign/login" method="POST">

                <h1><?php echo PROJECT_NAME ?></h1>

                <input type="text" style="height:50px;" class="form-control" placeholder="Usuario" name="username"
                    required />

                <input type="password" style="height:50px;" class="form-control" placeholder="Contraseña"
                    name="password" required />

                <button type="submit" class="btn btn-success">Iniciar Sesión</button>

                <button type="button" onclick="location.href='<?php echo FRONT_ROOT ?>/sign/register'"
                    class="btn btn-primary ">Registrarse</button>

                <!--<a href="" class="password"><b>¿Olvidaste la contraseña?</b></a> -->
                
            </form>

        </div>

        <div class=" overlay-container">
            <img src="<?php echo VIEWS_PATH ?>/images/fondo.png" alt="dog & cat">
        </div>
    </div>