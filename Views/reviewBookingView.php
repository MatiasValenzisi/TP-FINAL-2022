<form action="<?php echo FRONT_ROOT?>/booking/reviewAction" method="POST">
    <div class="container-fluid" style="width:70%; height:50%;">

        <input type="hidden" name="guardianToken" value="<?php echo $this->guardian->getToken(); ?>">
        <input type="hidden" name="bookingToken" value="<?php echo $this->booking->getToken(); ?>">

        <div>
            <h2 class="title">¿Qué te pareció el servicio?</h2>
        </div>

        <div class="row sideways">
            <div class="col-md-12 col-xs-12">
                <label class="form-label">Guardian: </label>
                <input type="text" class="form-control"
                    value="<?php echo $this->guardian->getFirstName()." ".$this->guardian->getLastName(); ?>" readonly
                    required />
            </div>
        </div>

        <div class="row sideways">
            <div class="col-md-12 col-xs-12">
                <label class="form-label" for="score">Calificación:</label>

                <select class="form-control" id="score" name="score" required>
                    <option value=""> Seleccionar estrellas</option>
                    <option value="1">1 Estrella</option>
                    <option value="2">2 Estrella</option>
                    <option value="3">3 Estrella</option>
                    <option value="4">4 Estrella</option>
                    <option value="5">5 Estrella</option>
                </select>

            </div>
        </div>

        <div class="row sideways">
            <div class="col-md-12 col-xs-12">
                <label class="form-label" for="observations">Observacion:</label>
                <textarea class="form-control" id="observations" name="observations" style="resize:none;"></textarea>
            </div>
        </div>

        <div class="buttons ">
            <button type="button" onclick="location.href='<?php echo FRONT_ROOT."/booking/history" ?>'"
                class="btn btn-primary col-md-5 col-sm-5 col-xs-12">Cancelar</button>

            <button type="submit" class="btn btn-success col-md-6 col-sm-6 col-xs-12">Generar reseña</button>
        </div>

    </div>
</form>