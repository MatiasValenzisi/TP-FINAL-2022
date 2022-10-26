<style>
.sideways {
    margin-top: 14px;
}

.title {
    text-align: center;
    font-size: 40px;
    margin-top: 50px;
    font-weight: 800;
    line-height: 50px;
}

.buttons {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    align-items: center;
    width: 30%;
    margin: 50px auto;

}

.buttons button {
    padding: 8px 60px;
}

@media screen and (max-width: 600px) {
    .title {
        font-size: 30px;


    }

    .buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        width: 100%;


    }

    .buttons button {

        width: 80%;
    }

}
</style>


<body class="login">


    <section>
        <div>
            <h2 class=" title">Registrarse como dueño</h2>
        </div>
        <form action="<?php echo FRONT_ROOT?>/sign/createUser" method="POST" class="register-container">
            <input type="hidden" name="typeUser" value="owner">



            <div class="container-fluid" style="width:60vw; height:50%;">

                <div class="row sideways">
                    <div class="col-md-12 col-xs-12">
                        <label class="form-label" for="typeUser">Tipo de usuario:</label>

                        <select class="form-control" id="typeUser" name="typeUser"
                            onchange="location='<?php echo FRONT_ROOT ?>/sign/register/'+this.value">
                            <option value="guardian">Guardian</option>
                            <option value="owner" selected>Dueño</option>
                        </select>
                    </div>


                </div>


                <div class="row sideways">
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="email"
                            required />
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="password">Contraseña:</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required />
                    </div>
                </div>

                <div class="row sideways">
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="firstName">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="firstName" required= />
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="lastName">Apellido:</label>
                        <input type="text" class="form-control" placeholder="Apellido" name="lastName" required />
                    </div>
                </div>
                <div class="row sideways">
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="dni">Documento:</label>
                        <input type="text" class="form-control" placeholder="Dni" name="dni" required />
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label" for="birthDate">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" name="birthDate" required />
                    </div>
                </div>

            </div>

            <div class="buttons">
                <button type="button" onclick="location.href='<?php echo FRONT_ROOT ?>'"
                    class="btn btn-primary ">Cancelar</button>

                <button type="submit" class="btn btn-success ">Registrarse</button>
            </div>

        </form>

    </section>