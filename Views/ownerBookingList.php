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
                <th>Total</th>>
                <th>Estado</th>
            </tr>
    
          </thead>

          <tbody>

            <?php foreach($this->bookingList as $booking) { ?>

              <tr>
                <td><?php echo $booking->getToken();         ?></td>
                <td><?php echo $booking->getOwnerFullName(); ?></td>
                <td><?php echo $booking->getPet();           ?></td>
                <td><?php echo $booking->getRace();          ?></td>
                <td><?php echo $booking->getInitialDate();   ?></td>
                <td><?php echo $booking->getFinalDate();     ?></td>
                <td><?php echo $booking->getPrice();         ?></td>
                <td><?php echo $booking->getState();         ?></td>
              </tr>

            <?php } ?> 

          </tbody>
        </table>
        
        
      </div>
    </div>
  </div>
</div>