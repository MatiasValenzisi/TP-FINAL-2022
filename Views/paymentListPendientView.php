    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pagos pendientes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Token Booking</th>
                                <th>Monto</th>
                                <th>Fecha de emisión</th>                                                   
                                <th>Tipo de pago</th>

                                <?php if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>  

                                    <th>Acción</th>

                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach($this->paymentList as $payment) { ?>

                            <tr>
                                <td><?php echo $payment->getToken(); ?></td>
                                <td><?php echo $payment->getTokenBooking(); ?></td>
                                <td><?php echo "$".$payment->getAmount(); ?></td>
                                <td><?php echo $payment->getDateGenerated(); ?></td>

                                <td><?php echo $payment->getType(); ?></td>

                                <?php if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?> 

                                    <td><a class="text-success" href="<?php echo FRONT_ROOT ?>/payment/pay/<?php echo $payment->getToken(); ?>"><b>Pagar</b></a></td>

                                <?php } ?> 

                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>