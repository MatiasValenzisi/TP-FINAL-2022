<style>
.login {
    width: 100%;
    height: 100%;
    background-color: #3e5367;



}

h1 {
    font-weight: bold;
    margin: 0;
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
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 10px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    transition: all .5s ease-in-out;
    width: 100%;
}

.btn:active {
    transform: scale(0.95);
}

.btn:focus {
    outline: none;
}



form {
    background: url("https://cdn.pixabay.com/photo/2014/04/03/00/42/footprints-309158_960_720.png");
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
    margin: 8px 0;
    width: 100%;
    color: #333;
}

.container {
    margin-top: 100px;

    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);

    overflow: hidden;
    width: 768px;
    max-width: 100%;
    height: 480px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container {

    height: 480px;
    transition: all 0.6s ease-in-out;
    color: white;
    background: url("https://cdn.pixabay.com/photo/2014/04/03/00/42/footprints-309158_960_720.png");
    width: 50%;
}




.overlay-container {

    width: 50%;
    height: 480px;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}





.social-container {
    margin: 20px 0;

}

.social-container a {
    color: #3e5367;
    background-color: wheat;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
    transition: all .5s ease-in-out;
}

.social-container a:hover {
    opacity: 0.5;
}

.password {
    color: white;
    transition: all .5s ease-in-out;
}

.password:hover {
    color: white;
    opacity: 0.5;
}

.btn:hover {
    opacity: 0.5;
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
        font-size: 17px;
        text-decoration: none;
        margin: 15px 0;
        color: white;
    }

    .social-container a {
        color: #3e5367;
        background-color: wheat;
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

<body class="login">

    <div class="container" id="container">

        <div class="form-container ">
            <form action="<?php echo FRONT_ROOT ?>/sign/login" method="POST">

                <h1>Inicio de sesion</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>

                </div>
                <span>O usa tu cuenta</span>
                <input type="text" placeholder="Usuario" name="username" />
                <input type="password" placeholder="Contraseña" name="password" />
                <a href="#" class="password">¿Olvidaste la contraseña?</a>

                <button type="submit" class="btn">Iniciar Sesion</button>

                <a href="<?php echo FRONT_ROOT ?>/sign/register" class="password btn ">Registrarse en
                    <?php echo PROJECT_NAME ?>.</a>

            </form>
        </div>
        <div class=" overlay-container">



            <img src="https://images.unsplash.com/photo-1563460716037-460a3ad24ba9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="dog & cat">



        </div>
    </div>