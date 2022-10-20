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
                            <th>Token</th>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Tamaño</th>
                            <th>Peso</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php foreach($this->petList as $pet) { 

                            if (strcmp($_SESSION['userPH']->getToken(), $pet->getTokenOwner()) == 0){ ?>

                        <tr>
                            <td><?php echo $pet->getToken(); ?></td>
                            <td><?php echo $pet->getName(); ?></td>
                            <td><?php echo $pet->getRace(); ?></td>
                            <td><?php echo $pet->getSize(); ?></td>
                            <td><?php echo $pet->getWeight()." kg"; ?></td>

                            <?php if (strcmp(get_class($pet), "Models\Dog") == 0) { ?>
                            <td>Perro</td>
                            <td><a class="text-info"
                                    href="<?php echo FRONT_ROOT ?>/pet/view/dog/<?php echo $pet->getToken(); ?>"><b>Visualizar</b></a>
                            </td>
                            <?php } elseif (strcmp(get_class($pet), "Models\Cat") == 0) { ?>
                            <td>Gato</td>
                            <td><a class="text-info"
                                    href="<?php echo FRONT_ROOT ?>/pet/view/cat/<?php echo $pet->getToken(); ?>"><b>Visualizar</b></a>
                            </td>
                            <?php } ?>
                        </tr>

                        <?php }
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>