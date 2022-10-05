<div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Añadir perro</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>

                    <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/pet/createpet"
                        method="POST">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Nombre"
                                    name="name" id="name" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="race">Raza
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Raza"
                                    name="race" id="race" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observations">Observaciones
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Observacion"
                                    name="observations" id="observations" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="size">Tamaño

                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="tamaño"
                                    name="size" id="size" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Peso
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Plan vacunacion"
                                    name="weight" id="weight" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vaccinationplan">Plan
                                Vacunacion
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Plan vacunacion"
                                    name="vaccinationplan" id="vaccinationplan" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Foto</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="foto"
                                    name="photo" id="photo" value="" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Video</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="video"
                                    name="video" id="video" value="" required />
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                <button class="btn btn-primary" type="button"
                                    onclick="location.href='<?php echo FRONT_ROOT ?>/home/administration'"
                                    style="width:20%;">Cancel</button>

                                <button type="submit" class="btn btn-success" style="width:50%; ">Guardar
                                    cambios</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>