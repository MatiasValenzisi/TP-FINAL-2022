<div class="">
              <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Perfil dueño</h2>
                              <div class="clearfix"></div>
                          </div>

                          <div class="x_content"><br>

                              <form class="form-horizontal form-label-left"
                                  action="<?php echo FRONT_ROOT?>/owner/profileEdit" method="POST">

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Token de usuario
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $_SESSION['userPH']->getToken() ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo electrónico
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $_SESSION['userPH']->getUserName() ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Contraseña
                                          <span class="required">*</span></label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="password" class="form-control col-md-7 col-xs-12"
                                              placeholder="Contraseña" name="password" id="password"
                                              value="<?php echo $_SESSION['userPH']->getPassword() ?>" required />
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $_SESSION['userPH']->getFirstName() ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $_SESSION['userPH']->getLastName() ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $_SESSION['userPH']->getDni() ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $_SESSION['userPH']->getBirthDate() ?>
                                          </label>
                                      </div>
                                  </div>                            

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                          <button class="btn btn-primary" type="button"
                                              onclick="location.href='<?php echo FRONT_ROOT ?>/home/administration'"
                                              style="width:20%;">Cancel</button>

                                          <button type="submit" class="btn btn-success" style="width:20%;">Guardar
                                              cambios</button>

                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>