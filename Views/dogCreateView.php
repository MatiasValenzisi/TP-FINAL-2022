<div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Añadir nuevo perro</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content"><br>

                    <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/pet/createPet"
                        method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="typePet" value="dog">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="size">Tipo <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="typePet" name="typePet"
                                    onchange="location='<?php echo FRONT_ROOT ?>/pet/add/'+this.value">
                                    <option value="dog" selected>Perro</option>
                                    <option value="cat">Gato</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Nombre"
                                    name="name" id="name" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="race">Raza <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="race" name="race" required>

                                    <option value="" selected>Seleccionar raza de perro</option>

                                    <?php foreach ($this->petTypeList as $value) { ?>

                                    <option value="<?php echo $value->getName() ?>"><?php echo $value->getName() ?>
                                    </option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="size">Tamaño <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="size" name="size">
                                    <option value="Grande" selected>Grande</option>
                                    <option value="Mediano">Mediano</option>
                                    <option value="Pequeño">Pequeño</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Peso <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" class="form-control col-md-7 col-xs-12" name="weight" id="weight"
                                    placeholder="Peso" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vaccinationPlan">Plan
                                Vacunación <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" class="form-control col-md-7 col-xs-12" name="vaccinationPlan"
                                    id="vaccinationPlan" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Foto <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" class="form-control col-md-7 col-xs-12" name="photo" id="photo"
                                    required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Video <span
                                    class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" class="form-control col-md-7 col-xs-12" placeholder="video"
                                    name="video" id="video" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observations">Observaciones
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" id="observations" name="observations"
                                    style="resize:none;"></textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                <button class="btn btn-primary" type="button"
                                    onclick="location.href='<?php echo FRONT_ROOT ?>/home/administration'"
                                    style="width:40%;">Cancel</button>

                                <button type="submit" class="btn btn-success" style="width:40%; ">Guardar
                                    cambios</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>