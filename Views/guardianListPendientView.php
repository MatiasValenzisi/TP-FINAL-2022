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
                <th>Accion</th>
            </tr>

          </thead>
                <?php
                foreach($this->guardianList as $guardian) { ?>
                    <tr>
                        <td><?php echo $guardian->getToken();         ?></td>
                        <td><?php echo $guardian->getFirstName();     ?></td>
                        <td><?php echo $guardian->getLastName();      ?></td>
                        <td><?php echo $guardian->getUserName();      ?></td>
                        <td><?php echo $guardian->getDni();           ?></td>
                        <td><?php echo $guardian->getBirthDate();     ?></td>
                        <td><a href="<?php echo FRONT_ROOT ?>/guardian/confirmGuardian/<?php echo $guardian->getToken(); ?>"</a> <?php echo "Dar alta"                     ?></td>
                    </tr>
                <?php } ?>

          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>