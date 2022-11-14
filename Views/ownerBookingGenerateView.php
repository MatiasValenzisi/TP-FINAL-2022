        <div>
            <div class="clearfix"></div>            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Datos de la reserva</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content"><br>

                        <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/booking/generateAction" method="POST">

                            <input type="hidden" name="tokenGuardian" value="<?php echo $tokenGuardian ?>">
                            <input type="hidden" name="tokenPet" value="<?php echo $tokenPet ?>">
                            <input type="hidden" name="startDate" value="<?php echo $startDate ?>">
                            <input type="hidden" name="endDate" value="<?php echo $endDate ?>">
                            <input type="hidden" name="priceTotal" value="<?php echo $priceTotal ?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de guardian &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $this->guardian->getFirstName()." ".$this->guardian->getLastName(); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de mascota &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $this->pet->getName(); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Raza de mascota &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $this->pet->getRace(); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tamaño de mascota &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $this->pet->getSize(); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha rango de reserva &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $startDate." - ".$endDate; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de días de la reserva &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $cant ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Precio por dia de reserva &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo "$ ".$priceService ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Precio total de la reserva &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo "$ ".$priceTotal ?></label>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                                          
                                    <button class="btn btn-primary" type="button" onclick="location.href='<?php echo FRONT_ROOT ?>/booking/consult/<?php echo $tokenGuardian; ?>'" style="width:40%;">Volver</button>
                                    <button type="submit" class="btn btn-success" style="width:40%;">Realizar reserva</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>