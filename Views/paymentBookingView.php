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

        margin-top: 7%;
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

    <div class="container-fluid" style="width:70%; height:50%;">

        <div>
            <h2 class="title">Datos de la reserva</h2>
        </div>

        <div class="row sideways">
            <div class="col-md-4 col-xs-12">
                <label class="form-label">Guardian:</label>
                <input type="text" class="form-control" value="<?php echo $this->guardian->getFirstName()." ".$this->guardian->getLastName(); ?>" readonly required />
            </div>
            <div class="col-md-4 col-xs-12">
                <label class="form-label">Dueño:</label>
                <input type="text" class="form-control" value="<?php echo $this->owner->getFirstName()." ".$this->owner->getLastName(); ?>" readonly required />
            </div>
            <div class="col-md-4 col-xs-12">
                <label class="form-label">Mascota:</label>
                <input type="text" class="form-control" value="<?php echo $this->pet->getName(); ?>" readonly required />
            </div>
        </div>

        <div class="row sideways">
            <div class="col-md-6 col-xs-12">
                <label class="form-label">Fecha de inicio:</label>
                <input type="text" class="form-control" value="<?php echo $this->booking->getDateStart(); ?>" readonly required />
            </div>
            <div class="col-md-6 col-xs-12">
                <label class="form-label">Fecha final:</label>
                <input type="text" class="form-control" value="<?php echo $this->booking->getDateEnd(); ?>" readonly required />
            </div>
        </div>

        <div class="row sideways">
            <div class="col-md-12 col-xs-12">
                <label class="form-label">Monto a pagar: &nbsp; ( Corresponde al 50% del monto final )</label>
                <input type="text" class="form-control" value="<?php echo $this->booking->getPrice() / 2; ?>" readonly required />
            </div>
        </div>

        <br><br><br><br>

    </div>

    <form action="<?php echo FRONT_ROOT?>/payment/payAction" method="POST">

        <input type="hidden" name="tokenPayment" value="<?php echo $tokenPayment ?>">

        <div class="container-fluid" style="width:70%; height:50%;">

            <div>
                <h2 class="title">Ingrese los datos de su tarjeta</h2>
            </div>

            <div class="row sideways">
                <div class="col-md-12 col-xs-12">
                    <label class="form-label" for="text">Nombre Completo:</label>
                    <input type="text" class="form-control" placeholder="nombre completo" required />
                </div>
            </div>

            <div class="row sideways">
                <div class="col-md-12 col-xs-12">
                    <label class="form-label" for="creditCardNumber"><i
                            class="fa fa-credit-card"></i> Numero de tarjeta credito:</label>
                    <div class="creditcard-number">
                        <input type="number" class="form-control" placeholder="numero tarjeta de credito" required />
                    </div>
                </div>
            </div>

            <div class="row sideways">
                <div class="col-md-4 col-xs-12">
                    <label class="form-label" for="expireDate">Dni:</label>
                    <input type="number" class="form-control" placeholder="Dni" required />
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="form-label" for="expireDate">Fecha Expiración:</label>
                    <input type="date" class="form-control" placeholder="Fecha expiracion" name="expireDate" required />
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="form-label" for="cvv">Clave de seguridad:</label>
                    <input type="number" style="color:black;" class="form-control" placeholder="CVV" name="cvv" maxlength="3" required />
                </div>
            </div>

            <div class="buttons ">
                <button type="button" onclick="location.href='<?php echo FRONT_ROOT."/payment/list/pendient"; ?>'"
                    class="btn btn-primary col-md-5 col-sm-5 col-xs-12">Cancelar</button>
                <button type="submit" class="btn btn-success col-md-6 col-sm-6 col-xs-12">Realizar pago</button>
            </div>
        </div>
    </form>


    <br><br><br>
