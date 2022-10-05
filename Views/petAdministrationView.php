<div class="clearfix">
</div>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listado de mascotas</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Tamaño</th>
                            <th>Peso</th>
                            <th>Observations</th>
                            <th>Plan de vacunacion</th>
                            <th>Foto</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php foreach($this->dogList as $pet) { ?>

                        <tr>
                            <td><?php echo $pet->getName();         ?></td>
                            <td><?php echo $pet->getRace();     ?></td>
                            <td><?php echo $pet->getSize()."cm" ;    ?></td>
                            <td><?php echo $pet->getWeight()."kg";     ?></td>
                            <td><?php echo $pet->getObservations();     ?></td>
                            <td><?php echo $pet->getVaccinationPlan();     ?></td>
                            <td><?php echo $pet->getPhoto();     ?></td>


                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>