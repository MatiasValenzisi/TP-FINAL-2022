<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Listado de reservas</h2>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
                <th>Token</th>
                <th>Dueño</th>
                <th>Mascota</th>
                <th>Raza</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acción</th> 
            </tr>
    
          </thead>

          <tbody>

          <?php foreach($this->bookingList as $booking){ 

              if(strcmp($booking->getState(), "Pendiente") == 0 || strcmp($booking->getState(), "Aceptado") == 0){ ?>

              <tr>

                <td><?php echo $booking->getToken();?></td>

                <?php foreach($this->ownerList as $owner){ 

                  if($owner->getToken() == $booking->getTokenOwner()){ ?>

                    <td><?php echo $owner->getFullName();   ?></td>
                
                <?php } }

                foreach($this->petList as $pet) { 

                  if($pet->getToken() == $booking->getTokenPet()){ ?>

                    <td><?php echo $pet->getName(); ?></td>
                    <td><?php echo $pet->getRace(); ?></td>

                <?php } } ?>

                  <td><?php echo $booking->getDateStart(); ?></td>
                  <td><?php echo $booking->getDateEnd(); ?></td>
                  <td><?php echo "$".$booking->getPrice(); ?></td>
                  <td><?php echo $booking->getState(); ?></td>

                  <td>

                  <?php if(strcmp($booking->getState(), "Pendiente") == 0){ ?>

                      <a class="text-success" href="<?php echo FRONT_ROOT ?>/booking/update/<?php echo $booking->getToken() ?>/Aceptado"><b>Aceptar</b></a>
                       / 
                      <a class="text-danger"href="<?php echo FRONT_ROOT ?>/booking/update/<?php echo $booking->getToken(); ?>/Rechazado"><b>Rechazar</b></a>

                  <?php } else {

                      echo "No disponible.";

                  } ?>

                  </td>

                </tr>
            
              <?php } } ?>

          </tbody>          
        </table>
      </div>
    </div>
  </div>
</div>