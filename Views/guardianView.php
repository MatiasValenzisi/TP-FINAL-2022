<div class="">
              <div class="clearfix"></div>
              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2>Detalles del guardian</h2>
                              <div class="clearfix"></div>
                          </div>

                          <div class="form-horizontal form-label-left"><br>

                                  
                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Token
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $this->guardian->getToken(); ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $this->guardian->getFirstName(); ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $this->guardian->getLastName(); ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Documento
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $this->guardian->getDni(); ?>
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

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Años de experiencia
                                          &nbsp;</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label class="form-control col-md-7 col-xs-12"
                                              style="font-weight: normal;"><?php echo $this->guardian->getExperience(); ?>
                                          </label>
                                      </div>
                                  </div>

                                  <div class="form-group">

                                      <label class="col-md-3 col-sm-3 col-xs-12 control-label">Disponibilidad de
                                          estadías </label>
                                      <div class="col-md-9 col-sm-9 col-xs-12">

                                          <div class="checkbox">
                                              
                                            <label class="text-<?php if (!isset($serviceArray['Monday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Lunes </strong></label>
                                            <label class="text-<?php if (!isset($serviceArray['Tuesday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Martes</strong> </label>
                                            <label class="text-<?php if (!isset($serviceArray['Wednesday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Miércoles</strong> </label>
                                            <label class="text-<?php if (!isset($serviceArray['Thursday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Jueves</strong> </label>
                                            <label class="text-<?php if (!isset($serviceArray['Friday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Viernes</strong> </label>
                                            <label class="text-<?php if (!isset($serviceArray['Saturday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Sábado</strong> </label>
                                            <label class="text-<?php if (!isset($serviceArray['Sunday'])){ ?>danger"><?php } else{ ?>success"><?php } ?><strong>Domingo</strong> </label>
                                          
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">

                                    <br><button type="button" style="margin-left: 40%;" onclick="location.href='<?php echo FRONT_ROOT ?>/guardian/list'" class="btn btn-primary">Volver al listado</button>

                                    </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>