<style>

.guardianownerview {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 10px;
    width: 100%;
}

.guardiandisplay {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;

    width: 100%;
    height: 100%;

}

.profile_view {
    margin: 20px;
}

</style>

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div>
                    <div class="guardianownerview">
                        <h2>Listado de guardianes</h2>
                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Filtrar guardianes</button>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="guardiandisplay">

                    <?php foreach($this->guardianList as $guardian) { ?>

                    <div class="col-md-5 col-sm- col-xs-12 profile_details">
                        <div class="profile_view">
                            <div class="col-sm-12">
                                
                                <h4 class="brief"><i><?php echo "Token: ". $guardian->getToken(); ?></i></h4>
                                
                                <div class="left col-xs-7">
                                    <h4><strong><?php echo $guardian->getFirstName()." ".$guardian->getLastName(); ?></strong></h4>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-envelope"></i> 
                                            Correo:<?php echo $guardian->getUserName().""; ?>
                                        </li>
                                        <li><i class="fa fa-calendar"></i> 
                                            Fecha de nacimiento:<?php echo date("d-m-Y", strtotime($guardian->getBirthDate())); ?>
                                        </li>
                                        <li><i class="fa fa-money"></i> Precio base del servicio por día: <?php echo "$".$guardian->getServicePrice(); ?>
                                        </li>
                                        <li><i class="fa fa-history"></i> Experiencia:
                                            <?php echo $guardian->getExperience() . " Año/s."; ?>
                                        </li>
                                    </ul>
                                </div>

                                <div class="right col-xs-5 text-center">

                                    <?php if (is_null($guardian->getProfilePicture())) { ?>

                                    <img src="<?php echo VIEWS_PATH ?>/images/user.png" alt="" class="img-circle"
                                        height="150" width="150">

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
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="location.href='<?php echo FRONT_ROOT ?>/guardian/view/<?php echo $guardian->getToken(); ?>';">
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Filtrar guardianes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Proximamente...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Filtrar guardianes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
