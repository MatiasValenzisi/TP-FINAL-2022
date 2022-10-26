        <div>
            <div class="clearfix"></div>            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Consultar reserva</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content"><br>

                        <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/booking/consultAction" method="POST">

                            <input type="hidden" name="tokenGuardian" value="<?php echo $tokenGuardian ?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de guardian &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $nameGuardian; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del usuario &nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $nameOwner; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tokenPet">Seleccionar mascota <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="tokenPet" name="tokenPet" required>

                                        <option value="">Seleccionar mascota para la reserva</option>

                                        <?php foreach ($this->petList as $key => $pet) { 
                                           
                                           if (strcmp($_SESSION['userPH']->getToken(), $pet->getTokenOwner()) == 0){ ?>
                                            <option value="<?php echo $pet->getToken() ?>"><?php echo $pet->getName()." - Tamaño ".$pet->getSize() ?></option>

                                            <?php } 
                                        } ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reservation">Fecha rango de reserva: <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control col-md-7 col-xs-12" name="serviceDate" id="reservation" class="form-control" value="<?php echo $date ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                                          
                                    <button class="btn btn-primary" type="button" onclick="location.href='<?php echo FRONT_ROOT ?>/guardian/view/<?php echo $tokenGuardian; ?>'" style="width:40%;">Cancelar reserva</button>
                                    <button type="submit" class="btn btn-success" style="width:40%;">Realizar consulta</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>