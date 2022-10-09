          <div class="">   
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Listado de guardianes</h2>    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="clearfix"></div>

                      <?php foreach($this->guardianList as $guardian) { ?>

                      <div class="col-md-4 col-sm- col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo "Token: ". $guardian->getToken(); ?></i></h4>
                            <div class="left col-xs-7">
                              <h4><strong><?php echo $guardian->getFirstName()." ".$guardian->getLastName(); ?></strong></h4>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-envelope"></i> Correo: <?php echo $guardian->getUserName().""; ?></li>
                                <li><i class="fa fa-calendar"></i> Fecha de nacimiento: <?php echo date("d-m-Y", strtotime($guardian->getBirthDate())); ?></li>
                                <li><i class="fa fa-history"></i> Experiencia: <?php echo $guardian->getExperience() . " Año/s."; ?></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">


                            <?php if (is_null($guardian->getProfilePicture())) { ?>

                            <img src="<?php echo VIEWS_PATH ?>/images/user.png" alt="" class="img-circle" height="150" width="150">

                            <?php } else { ?>

                            <img src="<?php echo VIEWS_PATH ?>/profile/<?php echo $guardian->getProfilePicture(); ?>"
                                alt="" class="img-circle" height="150" width="150">

                            <?php } ?>

                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a><span class="fa fa-star"></span></a>
                                <a><span class="fa fa-star"></span></a>
                                <a><span class="fa fa-star"></span></a>
                                <a><span class="fa fa-star"></span></a>
                                <a><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs" onclick="location.href='<?php echo FRONT_ROOT ?>/guardian/view/<?php echo $guardian->getToken(); ?>';">
                                <i class="fa fa-user"> </i> Visualizar guardian
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php } ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>