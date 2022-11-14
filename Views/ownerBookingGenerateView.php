<style>
.booking-card h4 {
    margin-bottom: 20px;
}

h6 {
    font-weight: 800;
    width: 360px;
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


.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 0.5px 43px;
    cursor: pointer;
}

.rounded-circle {
    border-radius: 50%;
}

.checkbox {
    font-size: 10px;
}
</style>

<div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos de la reserva</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>


                    <form class="form-horizontal form-label-left"
                        action="<?php echo FRONT_ROOT?>/booking/generateAction" method="POST">

                        <input type="hidden" name="tokenGuardian" value="<?php echo $tokenGuardian ?>">
                        <input type="hidden" name="tokenPet" value="<?php echo $tokenPet ?>">
                        <input type="hidden" name="startDate" value="<?php echo $startDate ?>">
                        <input type="hidden" name="endDate" value="<?php echo $endDate ?>">
                        <input type="hidden" name="priceTotal" value="<?php echo $priceTotal ?>">


                        <div class="col-md-4 mb-3 col-sm-3 col-xs-12">
                            <div class="card profile-section">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center"> <img
                                            src="<?php echo VIEWS_PATH ?>/profile/<?php echo $this->guardian->getProfilePicture() ?>"
                                            alt="user" class="rounded-circle" width="150">
                                        <div class="mt-3 booking-card ">
                                            <h4>Nombre guardian:
                                                <b><?php echo $this->guardian->getFirstName()." ".$this->guardian->getLastName(); ?></b>
                                            </h4>

                                            <h4>Cantidad de días de la reserva:
                                                <b><?php echo $cant ?></b>
                                            </h4>

                                            <h4>Precio por dia de reserva :
                                                <b><?php echo "$ ".$priceService ?></b>
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="card mb-3 ">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <h6 class="mb-0">Nombre de Mascota <span class="required">*</span></h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $this->pet->getName(); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <h6 class="mb-0">Raza de Mascota <span class="required">*</span></h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <?php echo $this->pet->getRace(); ?>

                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <h6 class="mb-0">Tamaño de Mascota <span class="required">*</span></h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <?php echo $this->pet->getSize(); ?>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <h6 class="mb-0">Fecha rango de reserva <span class="required">*</span></h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <?php echo $startDate." - ".$endDate; ?>

                                        </div>
                                    </div>
                                    <hr>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <h6 class="mb-0">Precio total de la reserva <span class="required">*</span>
                                            </h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <b><?php echo "$ ".$priceTotal ?></b>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                            <button class="btn btn-primary col-md-5 col-sm-5 col-xs-12" type="button"
                                                onclick="location.href='<?php echo FRONT_ROOT ?>/booking/consult/<?php echo $tokenGuardian; ?>'">
                                                Volver</button>
                                            <button type="submit"
                                                class="btn btn-success col-md-5 col-sm-5 col-xs-12">Realizar
                                                reserva</button>
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