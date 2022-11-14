<div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos de la reserva</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>




                    <div class="col-md-5 mb-3 col-sm-5 col-xs-12">
                        <div class="container-fluid payment-card-size left-card profile-section payment-img">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center "> <img
                                        src="<?php echo VIEWS_PATH ?>/profile/<?php echo $this->guardian->getProfilePicture() ?>"
                                        alt="user" class="rounded-circle" width="150">
                                    <div class="mt-3 booking-card ">
                                        <h4>Nombre guardian:
                                            <b><?php echo $this->guardian->getFirstName()." ".$this->guardian->getLastName(); ?></b>
                                        </h4>
                                        <hr>
                                        <h4>Nombre dueño:
                                            <b><?php echo $this->owner->getFirstName()." ".$this->owner->getLastName(); ?></b>
                                        </h4>
                                        <hr>
                                        <h4>Nombre mascota:
                                            <b><?php echo $this->pet->getName(); ?></b>
                                        </h4>
                                        <hr>
                                        <h4>Fecha de inicio:
                                            <b><?php echo $this->booking->getDateStart(); ?></b>
                                        </h4>
                                        <hr>
                                        <h4>Fecha de final:
                                            <b><?php echo $this->booking->getDateEnd(); ?></b>
                                        </h4>
                                        <hr>
                                        <h4>Monto a pagar: &nbsp;<br>( Corresponde al 50% del monto final )
                                            <br><br>
                                            <span style="font-size:2rem;"><b><?php echo $this->booking->getPrice() / 2; ?>
                                                    $</b></span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-7 col-xs-12">
                        <div class="container-fluid payment-card-size mb-3 ">
                            <div class="card-body">


                                <form action="<?php echo FRONT_ROOT?>/payment/payAction" method="POST">

                                    <input type="hidden" name="tokenPayment" value="<?php echo $tokenPayment ?>">

                                    <div>

                                        <div>
                                            <h2 class="title">Ingrese los datos de su tarjeta</h2>
                                        </div>

                                        <div class="row sideways">
                                            <div class="col-md-12 col-xs-12">
                                                <label class="form-label" for="text">Nombre Completo:</label>
                                                <input type="text" class="form-control" placeholder="nombre completo"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="row sideways">
                                            <div class="col-md-12 col-xs-12">
                                                <label class="form-label" for="creditCardNumber"><i
                                                        class="fa fa-credit-card"></i> Numero de tarjeta
                                                    credito:</label>
                                                <div class="creditcard-number">
                                                    <input type="number" class="form-control"
                                                        placeholder="numero tarjeta de credito" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row sideways">

                                            <div class="col-md-12 col-xs-12">
                                                <label class="form-label" for="expireDate">Dni:</label>
                                                <input type="number" class="form-control" placeholder="Dni" required />
                                            </div>
                                        </div>
                                        <div class="row sideways">

                                            <div class="col-md-6 col-xs-12">
                                                <label class="form-label" for="expireDate">Fecha Expiración:</label>
                                                <input type="date" class="form-control" placeholder="Fecha expiracion"
                                                    name="expireDate" required />
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <label class="form-label" for="cvv">Clave de seguridad:</label>
                                                <input type="number" style="color:black;" class="form-control"
                                                    placeholder="CVV" name="cvv" maxlength="3" required />
                                            </div>
                                        </div>

                                        <div class="buttons ">
                                            <button type="button"
                                                onclick="location.href='<?php echo FRONT_ROOT."/payment/list/pendient"; ?>'"
                                                class="btn btn-primary col-md-5 col-sm-5 col-xs-12">Cancelar</button>
                                            <button type="submit"
                                                class="btn btn-success col-md-6 col-sm-6 col-xs-12">Realizar
                                                pago</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<br><br><br>