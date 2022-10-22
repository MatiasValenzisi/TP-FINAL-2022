<style>
.login {
    width: 100%;
    height: 100%;
    background: url("https://images.unsplash.com/photo-1519331379826-f10be5486c6f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80");
    background-repeat: no-repeat;
    background-size: cover;
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

button {
    border-radius: 20px;
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    transition: all .5s ease-in-out;
}

button:active {
    transform: scale(0.95);
}

button:focus {
    outline: none;
}



form {
    background-color: #3e5367;
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
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
    color: white;
}

.sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;

}


.overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}



.overlay {
    background: #FF416C;
    background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
    background: linear-gradient(to right, #FF4B2B, #FF416C);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}



.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}




.overlay-right {
    right: 0;

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

button:hover {
    opacity: 0.5;
}
</style>

<body class="login">

    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="<?php echo FRONT_ROOT ?>/sign/login" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>

                </div>
                <span>or use your account</span>
                <input type="text" placeholder="Usuario" name="username" />
                <input type="password" placeholder="Contraseña" name="password" />
                <a href="#" class="password">Forgot your password?</a>
                <button type="submit">Iniciar Sesion</button>
            </form>
        </div>
        <div class=" overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <img src=".profile/nicolas.jpg" alt="logo">
                    <img src="https://images.unsplash.com/photo-1563460716037-460a3ad24ba9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="dog & cat">

                </div>
            </div>
        </div>
    </div>