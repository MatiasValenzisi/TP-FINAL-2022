          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil guardian</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content"><br>
                    
                    <form class="form-horizontal form-label-left" action="<?php echo FRONT_ROOT?>/guardian/profileEdit" method="GET">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Token de usuario &nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $_SESSION['userPH']->getToken() ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo electrónico &nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $_SESSION['userPH']->getUserName() ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_edit">Contraseña <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" class="form-control col-md-7 col-xs-12" placeholder="Contraseña" name="password_edit" id="password_edit" value="<?php echo $_SESSION['userPH']->getPassword() ?>" required/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre &nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $_SESSION['userPH']->getFirstName() ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido &nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $_SESSION['userPH']->getLastName() ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI &nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $_SESSION['userPH']->getDni() ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento &nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-7 col-xs-12" style="font-weight: normal;"><?php echo $_SESSION['userPH']->getBirthDate() ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience_edit">Años de experiencia: <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" class="form-control col-md-7 col-xs-12" placeholder="Años de experiencia" name="experience_edit" id="experience_edit" value="<?php echo $_SESSION['userPH']->getExperience() ?>" min="0" max="99" required/>
                        </div>
                      </div>

                      <div class="form-group">

                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Disponibilidad de estadías <span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="checkbox">

                        <?php if (isset($serviceArray['Monday'])){ ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Monday" checked>&nbsp; Lunes</label>

                        <?php } else { ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Monday">&nbsp; Lunes</label>

                        <?php } if (isset($serviceArray['Tuesday'])){ ?> 

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Tuesday" checked>&nbsp; Martes</label>

                        <?php } else { ?>                     

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Tuesday">&nbsp; Martes</label>

                        <?php } if (isset($serviceArray['Wednesday'])){ ?> 

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Wednesday" checked>&nbsp; Miércoles</label>

                        <?php } else { ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Wednesday">&nbsp; Miércoles</label>

                        <?php } if (isset($serviceArray['Thursday'])){ ?> 

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Thursday" checked>&nbsp; Jueves</label>

                        <?php } else { ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Thursday">&nbsp; Jueves</label>

                        <?php } if (isset($serviceArray['Friday'])){ ?> 

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Friday" checked>&nbsp; Viernes</label>

                        <?php } else { ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Friday">&nbsp; Viernes</label>

                        <?php } if (isset($serviceArray['Saturday'])){ ?> 

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Saturday" checked>&nbsp; Sábado</label>

                        <?php } else { ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Saturday">&nbsp; Sábado</label>

                        <?php } if (isset($serviceArray['Saturday'])){ ?> 

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Sunday" checked>&nbsp; Domingo</label>   

                        <?php } else { ?>

                          <label><input type="checkbox" class="flat" name="disp_edit[]" value="Sunday">&nbsp; Domingo</label>   

                        <?php } ?>                          
                          
                          </div>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button class="btn btn-primary" type="button" onclick="location.href='<?php echo FRONT_ROOT ?>/home/administration'" style="width:20%;">Cancel</button>

                          <button type="submit" class="btn btn-success" style="width:20%;">Guardar cambios</button>

                        </div>
                      </div>                        
                    </form>
                  </div>
                </div>
              </div>
            </div>         
          </div>