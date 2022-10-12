<div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Visualizar perro</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>

                    <form class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Token: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;">
                                    <?php echo $this->dog->getToken() ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;">
                                    <?php echo $this->dog->getName() ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Plan de vacunación: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo VACCINATION.$this->dog->getVaccinationPlan() ?>" alt=""
                                    height="320" width="320">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Raza: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;">
                                    <?php echo $this->dog->getRace() ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tamaño: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;">
                                    <?php echo $this->dog->getSize()." cm" ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Peso: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;">
                                    <?php echo $this->dog->getWeight()." kg" ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" style="resize:none;"
                                    readonly><?php echo $this->dog->getObservations() ?></textarea>
                            </div>
                        </div>

                        <?php if (!is_null($this->dog->getPhoto()) && !empty($this->dog->getPhoto())){ ?>

                        <br>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="<?php echo PHOTO.$this->dog->getPhoto() ?>" alt="" height="320" width="320">
                            </div>
                        </div>

                        <?php } if (!is_null($this->dog->getVideo()) && !empty($this->dog->getVideo())){ ?>

                        <br>

                        <?php var_dump(VIDEO.$this->dog->getVideo())?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Video: &nbsp;</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <video width=320 height=320 controls>
                                    <source src="https://pixabay.com/es/videos/cachorro-perro-mascota-canino-1047/"
                                        type="video/mp4">
                                    Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.
                                </video>
                            </div>
                        </div>

                        <?php } ?>

                        <br>

                        <div class=" form-group">
                            <button type="button" style="margin-left: 30%;"
                                onclick="location.href='<?php echo FRONT_ROOT ?>/pet/list'"
                                class="btn btn-primary">Volver al listado de mascotas</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>