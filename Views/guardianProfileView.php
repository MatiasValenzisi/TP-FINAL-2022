<style>
h6 {
    font-weight: 800;
    width: 360px;
}

.card {
    background-color: #f7f7f7;
    padding: 40px;

    height: 500px;
    margin-bottom: 50px;
}

.profile-section {
    line-height: 70px;
}

.profile-section card-body {
    margin-bottom: 200px;
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
}

input[type="file"] {
    display: none;
}

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 0.5px 43px;
    cursor: pointer;
}

.rounded-circle {
    border-radius: 50%;
}

.checkbox label,
.radio label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
    font-size: 10px;
    margin-bottom: 20px;
}

@media screen and (min-width: 1620px) {
    .card {
        background-color: #f7f7f7;
        padding: 40px;

        height: 700px;
        margin-bottom: 50px;
    }
}
</style>

<div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perfil guardian</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>


                    <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/guardian/profileEdit"
                        method="POST">
                        <div class="col-md-4 mb-3 col-sm-3 col-xs-12">
                            <div class="card profile-section">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center"> <img
                                            src="<?php echo VIEWS_PATH ?>/profile/<?php echo $_SESSION['userPH']->getProfilePicture() ?>"
                                            alt="user" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>Hola <b><?php echo $_SESSION['userPH']->getFirstName() ?>
                                                    <?php echo $_SESSION['userPH']->getLastName() ?></b> !</h4>
                                            <h4> Dni: <b><?php echo $_SESSION['userPH']->getDni() ?></b></h4>
                                            <h4> Email: <b> <?php echo $_SESSION['userPH']->getUserName() ?></b></h4>
                                            <h4> Fecha de nacimiento:
                                                <b><?php echo $_SESSION['userPH']->getBirthDate() ?></b>
                                            </h4>
                                            <h3 class="text-secondary mb-1">
                                                Token: <?php echo $_SESSION['userPH']->getToken() ?></h3>

                                            <label class="custom-file-upload">
                                                <input type="file" id="newPhoto" name="newPhoto" />
                                                Custom Upload
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="card mb-3 ">
                                <div class="card-body">



                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Contraseña <span class="required">*</span></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control col-md-7 col-xs-12"
                                                placeholder="Contraseña" name="password" id="password"
                                                value="<?php echo $_SESSION['userPH']->getPassword() ?>" required />
                                        </div>
                                    </div>
                                    <hr>



                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Años de experiencia &nbsp;</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" class="form-control col-md-7 col-xs-12"
                                                placeholder="Años de experiencia" name="experience" id="experience"
                                                value="<?php echo $_SESSION['userPH']->getExperience() ?>" min="0"
                                                max="99" required />
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Tamaño de mascotas &nbsp;</h6>

                                        </div>

                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-control col-md-7 col-xs-12" id="petSize" name="petSize">

                                                <?php switch ($_SESSION['userPH']->getPetSize()) {

                                              case 'Grande':
                                                
                                                echo ('
                                                <option value="Grande" selected>Grande</option>
                                                <option value="Mediano">Mediano</option>
                                                <option value="Pequeño">Pequeño</option>
                                                ');

                                                break;

                                              case 'Mediano':

                                                echo ('
                                                <option value="Grande">Grande</option>
                                                <option value="Mediano"selected>Mediano</option>
                                                <option value="Pequeño">Pequeño</option>
                                                ');

                                                break;     

                                              case 'Pequeño':

                                                echo ('
                                                <option value="Grande">Grande</option>
                                                <option value="Mediano">Mediano</option>
                                                <option value="Pequeño" selected>Pequeño</option>
                                                ');

                                                break;

                                            } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Precio base por dia &nbsp;</h6>
                                        </div>

                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" class="form-control col-md-7 col-xs-12"
                                                placeholder="Precio diario por servicio en pesos" name="servicePrice"
                                                id="servicePrice"
                                                value="<?php echo $_SESSION['userPH']->getServicePrice() ?>" min="0"
                                                required />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">

                                            <h6 class="mb-0">Fecha rango de servicios</h6>



                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">

                                            <fieldset>
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="input-prepend input-group">
                                                            <span class="add-on input-group-addon"><i
                                                                    class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                            <input type="text" class="form-control col-md-7 col-xs-12"
                                                                name="serviceDate" id="reservation" class="form-control"
                                                                value="<?php echo $serviceDate ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <h6 class="mb-0">Disponibilidad de
                                            estadías para servicios</h6>
                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">

                                        <div class="checkbox">

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Monday'])){ echo "checked"; } ?>
                                                    value="Monday">&nbsp; Lunes</label>

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Tuesday'])){ echo "checked"; } ?>
                                                    value="Tuesday">&nbsp; Martes</label>

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Wednesday'])){ echo "checked"; } ?>
                                                    value="Wednesday">&nbsp; Miércoles</label>

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Thursday'])){ echo "checked"; } ?>
                                                    value="Thursday">&nbsp; Jueves</label>

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Friday'])){ echo "checked"; } ?>
                                                    value="Friday">&nbsp; Viernes</label>

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Saturday'])){ echo "checked"; } ?>
                                                    value="Saturday">&nbsp; Sábado</label>

                                            <label><input type="checkbox" class="flat" name="disp[]"
                                                    <?php if (isset($serviceArray['Sunday'])){ echo "checked"; } ?>
                                                    value="Sunday">&nbsp; Domingo</label>

                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 ">

                                        <button type="button" class="btn btn-primary col-md-5 col-sm-5 col-xs-12"
                                            onclick="location.href='<?php echo FRONT_ROOT ?>/home/administration'">Cancel</button>

                                        <button type="submit"
                                            class="btn btn-success col-md-5 col-sm-5 col-xs-12">Guardar
                                            cambios</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>