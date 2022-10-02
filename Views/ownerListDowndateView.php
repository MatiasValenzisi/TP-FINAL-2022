
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Listado de dueños</h2>
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
                <th>Fecha de alta</th>
                <th>Fecha de baja</th>
            </tr>

          </thead>
                <?php
                foreach($this->ownerList as $owner) { ?>
                    <tr>
                        <td><?php echo $owner->getToken();         ?></td>
                        <td><?php echo $owner->getFirstName();     ?></td>
                        <td><?php echo $owner->getLastName();      ?></td>
                        <td><?php echo $owner->getUserName();      ?></td>
                        <td><?php echo $owner->getDni();           ?></td>
                        <td><?php echo $owner->getBirthDate();     ?></td>
                        <td><?php echo $owner->getDischargeDate(); ?></td>
                        <td><?php echo $owner->getDownDate();       ?></td>
                    </tr>
                <?php } ?>

          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>