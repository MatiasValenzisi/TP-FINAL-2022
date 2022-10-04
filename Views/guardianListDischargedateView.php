<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Listado de guardianes</h2>
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
                <th>Experiencia</th>
                <?php
                  if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0) { ?>
                    <th>Fecha de alta</th>
                  <?php 
                } ?>
            </tr>

          </thead>
                <?php
                foreach($this->guardianList as $guardian) { ?>
                    <tr>
                        <td><?php echo $guardian->getToken();                 ?></td>
                        <td><?php echo $guardian->getFirstName();             ?></td>
                        <td><?php echo $guardian->getLastName();              ?></td>
                        <td><?php echo $guardian->getUserName();              ?></td>
                        <td><?php echo $guardian->getDni();                   ?></td>
                        <td><?php echo $guardian->getBirthDate();             ?></td>
                        <td><?php echo $guardian->getExperience() . " Año/s"; ?></td>
                        <?php
                          if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0) { ?>
                            <td><?php echo $guardian->getDischargeDate();     ?></td>
                          <?php 
                          } ?>
                    </tr>
                <?php } ?>

          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>