<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Listado de guardianes pendientes</h2>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
                <th>Token</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Documento</th>
                <th>Fecha de nacimiento</th>

                <?php if (!empty($this->guardianList)) { ?>

                <th colspan="2">Guardian pendiente</th>

                <?php } ?>
            </tr>

          </thead>

          <tbody>

            <?php foreach($this->guardianList as $guardian) { ?>

              <tr>
                <td><?php echo $guardian->getToken(); ?></td>
                <td><?php echo $guardian->getFirstName(); ?></td>
                <td><?php echo $guardian->getLastName(); ?></td>
                <td><?php echo $guardian->getUserName(); ?></td>
                <td><?php echo $guardian->getDni(); ?></td>
                <td><?php echo $guardian->getBirthDate(); ?></td>

                <?php if (!empty($this->guardianList)) { ?>

                  <td><a class="text-success" href="<?php echo FRONT_ROOT ?>/guardian/confirmGuardian/<?php echo $guardian->getToken(); ?>"><b>Aceptar</b></a></td>
                  <td><a class="text-danger"href="<?php echo FRONT_ROOT ?>/guardian/declineGuardian/<?php echo $guardian->getToken(); ?>"><b>Rechazar</b></a></td>

                <?php } ?>

              </tr>

            <?php } ?> 

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>