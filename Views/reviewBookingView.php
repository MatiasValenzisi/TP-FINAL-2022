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

        select, input {
            height: 40px !important;
            font-size: 20px !important;
        }

        textarea {
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

    <form action="<?php echo FRONT_ROOT?>/booking/reviewAction" method="POST">
        <div class="container-fluid" style="width:70%; height:50%;">

            <input type="hidden" name="guardianToken" value="<?php echo $this->guardian->getToken(); ?>">
            
            <div>
                <h2 class="title">¿Qué te pareció el servicio?</h2>
            </div>

            <div class="row sideways">
                <div class="col-md-12 col-xs-12">
                    <label class="form-label">Guardian: </label>
                    <input type="text" class="form-control" value="<?php echo $this->guardian->getFirstName()." ".$this->guardian->getLastName(); ?>" readonly required />
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
                    <textarea class="form-control" id="observations" name="observations"
                        style="resize:none;"></textarea>
                </div>
            </div>

            <div class="buttons ">
                <button type="button" onclick="location.href='<?php echo FRONT_ROOT."/booking/history" ?>'" 
                    class="btn btn-primary col-md-5 col-sm-5 col-xs-12">Cancelar</button>

                <button type="submit" class="btn btn-success col-md-6 col-sm-6 col-xs-12">Generar reseña</button>
            </div>

        </div>
    </form>