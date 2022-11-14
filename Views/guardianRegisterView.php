    <form action="<?php echo FRONT_ROOT?>/sign/createUserGuardian" method="POST">
        
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