
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Chat</h2>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Token</th>
                            <th>Nombre del contacto</th>
                            <th>Acción</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($userList as $key => $user) { ?>

                        <tr>
                            <td><?php echo $user->getToken(); ?></td>
                            <td><?php echo $user->getFirstName()." ".$user->getLastName(); ?></td>
                            <td style="width:20%">

                                <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>

                                <a class="text-info" href="<?php echo FRONT_ROOT ?>/chat/app/<?php echo $_SESSION['userPH']->getToken(); ?>/<?php echo $user->getToken(); ?>">
                                    <b>Ingresar al chat online</b>
                                </a>

                                <?php } else if (strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0){ ?>

                                <a class="text-info" href="<?php echo FRONT_ROOT ?>/chat/app/<?php echo $user->getToken(); ?>/<?php echo $_SESSION['userPH']->getToken(); ?>">
                                    <b>Ingresar al chat online</b>
                                </a>

                                <?php } ?>

                            </td>
                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>