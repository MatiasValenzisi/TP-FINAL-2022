<style>
h6 {
    font-weight: 800;
    width: 180px;
}

.card {
    background-color: #f7f7f7;
    padding: 40px;

    height: 490px;
    margin-bottom: 50px;
}

.profile-section {
    line-height: 70px;
}

.profile-section img {
    margin-top: 25%;
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
</style>

<div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perfil Administrador</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>


                    <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/admin/profileEdit"
                        method="POST">
                        <div class="col-md-4 mb-3 col-sm-3 col-xs-12">
                            <div class="card profile-section">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center"> <img
                                            src="<?php echo VIEWS_PATH ?>/profile/<?php echo $_SESSION['userPH']->getProfilePicture() ?>"
                                            alt="user" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>Hola <b><?php echo $_SESSION['userPH']->getFirstName() ?></b> !</h4>
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
                                            <h6 class="mb-0">Nombre Completo &nbsp;</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION['userPH']->getFirstName() ?>
                                            <?php echo $_SESSION['userPH']->getLastName() ?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Email &nbsp;</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION['userPH']->getUserName() ?></div>
                                    </div>
                                    <hr>
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
                                            <h6 class="mb-0">Dni &nbsp;</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION['userPH']->getDni() ?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Fecha de nacimiento &nbsp;</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $_SESSION['userPH']->getBirthDate() ?></div>
                                    </div>
                                    <hr>

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