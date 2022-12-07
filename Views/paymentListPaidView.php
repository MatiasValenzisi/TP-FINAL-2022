
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Historial de pagos</h2>
                <ul class="nav navbar-right panel_toolbox"></ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token</th>
                            <?php if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) { ?>
                            <th>Dueño</th>
                            <?php } else {?>
                            <th>Guardian</th>
                            <?php } ?>
                            <th>Mascota</th>
                            <th>Monto</th>
                            <th>Fecha de pago</th>
                            <th>Tipo de pago</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($this->paymentList as $payment) { ?>

                        <tr>
                            <td><?php echo $payment->getToken(); ?></td>

                            <?php 
                                foreach($this->bookingList as $booking) {

                                    if($payment->getTokenBooking() == $booking->getToken()) { 
                                        if(strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0) {
                                            
                                            foreach($this->ownerList as $owner) {                                                
                                                if($owner->getToken() == $booking->getTokenOwner()) { ?>
                            <td><?php echo $owner->getFullName(); ?></td>
                            <?php
                                                }
                                            }
                                        } else {
                                            foreach($this->guardianList as $guardian) {                                                
                                                if($guardian->getToken() == $booking->getTokenGuardian()) { ?>
                            <td><?php echo $guardian->getFullName(); ?></td>
                            <?php
                                                }
                                            }
                                        }
                                    } 
                                } 

                                foreach($this->bookingList as $booking) {

                                    if($payment->getTokenBooking() == $booking->getToken()) { 

                                        foreach($this->petList as $pet) {

                                            if($booking->getTokenPet() == $pet->getToken()) { ?>
                            <td><?php echo $pet->getName(); ?></td>
                            <?php
                                            }
                                        }
                                    }
                                }

                                ?>

                            <td><?php echo "$ ".$payment->getAmount(); ?></td>
                            <td><?php echo $payment->getDateIssued(); ?></td>
                            <td><?php echo $payment->getType(); ?></td>

                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>