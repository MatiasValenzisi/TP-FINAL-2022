<style>
.container-fluid {
    background: linear-gradient(90deg, rgba(36, 91, 136, 1) 0%, rgba(32, 81, 122, 1), rgba(35, 87, 130, 1) 25%, rgba(46, 118, 179, 1) 50%, rgba(32, 81, 122, 1) 100%) !important;
    padding: 14px;
    color: white;
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.45),
        0 10px 10px rgba(0, 0, 0, 0.42);
}

.sideways {
    margin-top: 14px;
    width: 90%;
    margin: 0 auto;
}

label {
    margin-top: 15px;
}

.title {
    text-align: center;
    font-size: 40px;
    margin-top: 30px;
    margin-bottom: 30px;
    font-weight: 800;
    line-height: 50px;
}

.buttons {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    align-items: center;
    width: 80%;
    margin: 50px auto;
}

@media screen and (min-width: 1620px) {

    .container-fluid {

        margin-top: 5%;
    }

    label {
        font-size: 25px;
    }

    select,
    input {
        height: 40px !important;
        font-size: 20px !important;
    }

    .buttons button {
        font-size: 25px !important;
    }

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
        flex-direction: row;

    }

    .buttons button {
        text-align: center;

    }
}
</style>

<body>


    <form action="<?php echo FRONT_ROOT?>/sign/createUser" method="POST">
        <input type="hidden" name="typeUser" value="guardian">

        <div class="container-fluid" style="width:70%; height:50%;">
            <div>
                <h2 class="title">Registrarse como guardian</h2>
            </div>
            <div class="row sideways">
                <div class="col-md-6 col-xs-12">
                    <label class="form-label" for="typeUser">Tipo de usuario:</label>

                    <select class="form-control" id="typeUser" name="typeUser"
                        onchange="location='<?php echo FRONT_ROOT ?>/sign/register/'+this.value">
                        <option value="guardian" selected>Guardian</option>
                        <option value="owner">Dueño</option>
                    </select>
                </div>
                <div class="col-md-6 col-xs-12">
                    <label class="form-label" for="typeUser">Tamaño de la mascota:</label>

                    <select class="form-control" id="petSize" name="petSize">
                        <option value="Pequeño" selected>Pequeño</option>
                        <option value="Mediano">Mediano</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>
            </div>

            <div class="row sideways">
                <div class="col-md-6 col-xs-12">
                    <label class="form-label" for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required />
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

            <div class="row sideways">
                <div class="col-md-6 col-xs-12">
                    <label class="form-label" for="experience">Años de experiencia:</label>
                    <input type="number" class="form-control" placeholder="Años de experiencia" name="experience"
                        min="0" max="99" required />
                </div>
                <div class="col-md-6 col-xs-12">
                    <label class="form-label" for="experience">Precio base del servicio:</label>
                    <input type="number" class="form-control" placeholder="Precio base" name="servicePrice" min="0"
                        required />
                </div>
            </div>
            <div class="buttons ">
                <button type="button" onclick="location.href='<?php echo FRONT_ROOT ?>'"
                    class="btn btn-primary col-md-5 col-sm-5 col-xs-12">Cancelar</button>

                <button type="submit" class="btn btn-success col-md-6 col-sm-6 col-xs-12">Registrarse</button>
            </div>
        </div>

    </form>