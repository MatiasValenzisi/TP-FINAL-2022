<div class="clearfix">
</div>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php $titulo = (strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0) ? "Lista pagos pendientes" : "Lista pagos emitidos"; ?>
                <h2><?php echo $titulo ?></h2>
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
                            <th>Fecha de emision</th>                         
                            <th>Fecha de pago</th>                            
                            <th>Metodo de pago</th>
                            <th>Tipo</th>
                            <?php if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>                              
                                <th>Accion</th>
                            <?php } ?>
                        </tr>
                    </thead>


                    <tbody>

                        <?php foreach($this->paymentList as $payment) { ?>

                        <tr>
                            <td><?php echo $payment->getToken();          ?></td>
                            <td><?php echo $payment->getTokenBooking();   ?></td>
                            <td><?php echo $payment->getAmount();         ?></td>
                            <td><?php echo $payment->getDateGenerated();  ?></td>

                            <?php if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ 
                                    if($payment->getDateIssued() == null) { ?>
                                        <td>Pendiente</td>
                                    <?php 
                                    } else {?>
                                            <td>Pagado</td>
                             <?php  } 
                                  } else {?>
                                          <td><?php echo $payment->getDateIssued(); ?></td>
                                   <?php } ?>

                            <td><?php echo $payment->getPaymentMethod();  ?></td>
                            <td><?php echo $payment->getType();           ?></td>

                            <?php if(strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>                              
                                <td><a class="text-success" href="<?php echo FRONT_ROOT ?>//<?php echo $payment->getToken(); ?>"><b>Pagar</b></a></td>
                            <?php } ?>                           
                        </tr>

                        <?php 
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>