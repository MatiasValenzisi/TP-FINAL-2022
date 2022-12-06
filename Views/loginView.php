<style>
.login {

    width: 100%;
    height: 100%;
    background: white;
}

h1 {

    font-weight: bold;
    font-size: 40px;
    margin-bottom: 50px;
}

h2 {

    text-align: center;
}

p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
}

span {

    font-size: 12px;
}

a {

    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
    color: white;
}

.btn {

    border-radius: 20px;
    font-size: 15px;
    font-weight: bold;
    line-height: 30px;
    width: 100%;
    margin-top: 10px;
    text-transform: uppercase;
    transition: all .5s ease-in-out;
}

.btn:active {

    transform: scale(0.95);
}

.btn:focus {

    outline: none;
}

form {

    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
}

input {

    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 10px 0;
    width: 100%;
    color: #333;
}

img {

    width: 100%;
    height: 100%;
}

.container {

    margin-top: 32px;

    /*background: linear-gradient(90deg, rgba(31,99,158,1) 2%, rgba(34,60,79,1) 98%);*/

    background: linear-gradient(90deg, rgba(36, 91, 136, 1) 0%, rgba(32, 81, 122, 1), rgba(35, 87, 130, 1) 25%, rgba(46, 118, 179, 1) 50%, rgba(32, 81, 122, 1) 100%);
    background-color: #20517a;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.45),
        0 10px 10px rgba(0, 0, 0, 0.42);
    overflow: hidden;
    width: 60%;
    max-width: 100%;
    height: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.img-form {
    position: absolute;
    z-index: 100;
    height: 100%;
    background-image: url("https://cdn.pixabay.com/photo/2014/04/03/00/42/footprints-309158_960_720.png");
}

.form-container {

    height: 480px;
    transition: all 0.6s ease-in-out;
    color: white;
    width: 50%;
}

.overlay-container {

    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}

.social-container {

    margin: 20px 0;
}

.social-container a {

    background-color: wheat;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 48px;
    width: 48px;
    transition: all .5s ease-in-out;
}

.social-container a:hover {

    opacity: 0.5;
}

.password {

    color: white;
    font-size: 18px;
    transition: all .5s ease-in-out;
}

.password:hover {

    color: white;
    opacity: 0.5;
}

@media screen and (max-width: 600px) {

    .container {

        height: 600px;
    }
}

@media screen and (max-width: 900px) {

    .container {

        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .form-container {

        height: 100%;
        color: white;
        width: 100%;
    }

    .overlay-container {

        display: none;
    }

    a {

        color: #333;
        text-decoration: none;
        margin: 15px 0;
        color: white;
    }

    .social-container a {

        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 60px;
        width: 60px;
        transition: all .5s ease-in-out;
    }

}
</style>

<body>

    <div class="container" id="container">
        <span class="img-form">

        </span>
        <div class="form-container ">

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