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
                                <th>Token Booking</th>
                                <th>Monto</th>
                                <th>Fecha de pago</th>                                                    
                                <th>Metodo de pago</th>
                                <th>Tipo de pago</th>     
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach($this->paymentList as $payment) { ?>

                            <tr>
                                <td><?php echo $payment->getToken(); ?></td>
                                <td><?php echo $payment->getTokenBooking(); ?></td>
                                <td><?php echo "$ ".$payment->getAmount(); ?></td>
                                <td><?php echo $payment->getDateIssued(); ?></td>             
                                <td><?php echo $payment->getPaymentMethod(); ?></td>
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