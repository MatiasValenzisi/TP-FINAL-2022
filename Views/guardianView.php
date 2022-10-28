<style>
h6 {
    font-weight: 800;
    width: 150px;
}


.card {
    background-color: #f7f7f7;
    padding: 40px;

    height: 50%;
    margin-bottom: 50px;
}

.profile {
    line-height: 70px;
}

.profile img {
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

.days {


    font-size: 14px;
}

.form-group {
    margin-top: 50px;
}
</style>

<div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perfil Guardian</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>


                    <form class="form-horizontal form-label-left">
                        <div class="col-md-4 mb-3 col-sm-3 col-xs-12">
                            <div class="card profile">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center"> <img
                                            src="<?php echo VIEWS_PATH ?>/profile/<?php echo $this->guardian->getProfilePicture() ?>"
                                            alt="user" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>Nombre: <b><?php echo $this->guardian->getFirstName(); ?>
                                                    <?php echo $this->guardian->getLastName(); ?></b>
                                                !</h4>
                                            <h4>Dni: <?php echo $this->guardian->getDni(); ?></h4>
                                            <h3 class="text-secondary mb-1">
                                                Token: <?php echo $this->guardian->getToken(); ?></h3>

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
                                            <h6 class="mb-0">Experiencia &nbsp;</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo $this->guardian->getExperience(). " Año/s"; ?></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Inicio del servicio
                                                &nbsp;</h6>
                                        </div>

                                        <div class="col-sm-9 text-secondary">


                                            <?php if (!is_null($this->guardian->getServiceStartDate()) && !empty($this->guardian->getServiceStartDate())){

                                                echo $this->guardian->getServiceStartDate(); 

                                              } else {

                                                echo "No disponible.";

                                              } ?>


                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Finalización del servicio
                                                &nbsp;</h6>
                                        </div>

                                        <div class="col-sm-9 text-secondary">


                                            <?php if (!is_null($this->guardian->getServiceEndDate()) && !empty($this->guardian->getServiceEndDate())){

echo $this->guardian->getServiceEndDate(); 

} else {

echo "No disponible.";

} ?>


                                        </div>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12">
                                            <h6 class="mb-0">Precio diario por
                                                servicio
                                                &nbsp;</h6>
                                        </div>

                                        <div class="col-sm-9 text-secondary">


                                            <?php if (!is_null($this->guardian->getServicePrice()) && !empty($this->guardian->getServicePrice())){

echo "$".$this->guardian->getServicePrice(); 

} else {

echo "No disponible.";

} ?>


                                        </div>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <h6 class="mb-0">Estadias del servicio</h6>
                                        </div>



                                    </div>
                                    <div class="checkbox col-sm-12 col-xs-12 days">

                                        <label
                                            class="text-<?php if (!isset($serviceArray['Monday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Lunes
                                            </strong></label>
                                        <label
                                            class="text-<?php if (!isset($serviceArray['Tuesday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Martes</strong>
                                        </label>
                                        <label
                                            class="text-<?php if (!isset($serviceArray['Wednesday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Miércoles</strong>
                                        </label>
                                        <label
                                            class="text-<?php if (!isset($serviceArray['Thursday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Jueves</strong>
                                        </label>
                                        <label
                                            class="text-<?php if (!isset($serviceArray['Friday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Viernes</strong>
                                        </label>
                                        <label
                                            class="text-<?php if (!isset($serviceArray['Saturday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Sábado</strong>
                                        </label>
                                        <label
                                            class="text-<?php if (!isset($serviceArray['Sunday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Domingo</strong>
                                        </label>

                                    </div>

                                    <br>

                                    <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>

                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary col-md-5 col-sm-5 col-xs-12" type="button"
                                                onclick="location.href='<?php echo FRONT_ROOT ?>/guardian/list'">Volver
                                                al listado</button>
                                            <button type="button"
                                                onclick="location.href='<?php echo FRONT_ROOT ?>/booking/consult/<?php echo $this->guardian->getToken(); ?>'"
                                                class="btn btn-success col-md-5 col-sm-5 col-xs-12">Consultar
                                                reserva</button>
                                        </div>
                                    </div>

                                    <?php } else { ?>

                                    <div class="form-group">
                                        <button type="button"
                                            onclick="location.href='<?php echo FRONT_ROOT ?>/guardian/list'"
                                            class="btn btn-primary">Volver al listado</button>
                                    </div>

                                    <?php } ?>

                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>