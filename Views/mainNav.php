<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <?php if (!isset($_SESSION['userPH'])){  
                          
                        header("Location: ".FRONT_ROOT);

                      } ?>

                    <!-- site title -->
                    <div class="navbar nav_title" style="border: 0;">
                        <a class="site_title"><i class="fa fa-paw" style="border:none"></i><span>
                                <b><?php echo PROJECT_NAME ?></b> </span></a>
                    </div>

                    <!-- /site title -->
                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">

                            <?php if (is_null($_SESSION['userPH']->getProfilePicture())) { ?>

                            <img src="<?php echo VIEWS_PATH ?>/images/user.png" alt="" class="img-circle profile_img">

                            <?php } else { ?>

                            <img src="<?php echo VIEWS_PATH ?>/profile/<?php echo $_SESSION['userPH']->getProfilePicture() ?>"
                                alt="" class="img-circle profile_img">

                            <?php } ?>

                        </div>
                        <div class="profile_info">
                            <span>Bienvenido</span>
                            <h2><b><?php echo $_SESSION['userPH']->getFirstName()." ".$_SESSION['userPH']->getLastName() ?></b>
                            </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">

                                <li>
                                    <a href="<?php echo FRONT_ROOT?>/home/administration"><i
                                            class="fa fa-home text-center"></i> Pagina principal</a>
                                </li>

                                <li>

                                    <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0){ ?>

                                    <a href=" <?php echo FRONT_ROOT ?>/admin/profile"><i
                                            class="fa fa-user-secret text-center"></i> Mi perfil</a>

                                    <?php } else if (strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0){ ?>

                                    <a href=" <?php echo FRONT_ROOT ?>/guardian/profile"><i
                                            class="fa fa-user-secret text-center"></i> Mi perfil</a>

                                    <?php } else if (strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>

                                    <a href=" <?php echo FRONT_ROOT ?>/owner/profile"><i
                                            class="fa fa-user-secret text-center"></i> Mi perfil</a>

                                    <?php } ?>

                                </li>

                                
                                <li>

                                    <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Guardian") == 0 || strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>

                                    <a href=" <?php echo FRONT_ROOT ?>/chat/contact"><i
                                            class="fa fa-comment text-center"></i> Chat</a>

                                    <?php } ?>

                                </li>


                                <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0 || strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>

                                <li>
                                    <a><i class="fa fa-briefcase text-center"></i> Guardianes<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">

                                        <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0){ ?>

                                        <li><a href="<?php echo FRONT_ROOT?>/guardian/list/pendient"> Guardianes
                                                pendientes</a></li>

                                        <?php } ?>

                                        <li><a href="<?php echo FRONT_ROOT?>/guardian/list"> Listado de guardianes</a>
                                        </li>

                                        <?php if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0){ ?>

                                        <li><a href="<?php echo FRONT_ROOT?>/guardian/list/downdate"> Guardianes dados
                                                de baja</a></li>

                                        <?php } ?>

                                    </ul>
                                </li>

                                <?php } if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") == 0){ ?>

                                <li>
                                    <a><i class="fa fa-user text-center"></i> Dueños<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo FRONT_ROOT?>/owner/list"> Listado de dueños</a></li>
                                        <li><a href="<?php echo FRONT_ROOT?>/owner/list/downdate"> Dueños dados de
                                                baja</a></li>
                                    </ul>
                                </li>

                                <?php } if (strcmp(get_class($_SESSION['userPH']), "Models\Owner") == 0){ ?>

                                <li>
                                    <a><i class="fa fa-paw text-center"></i> Mascotas<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo FRONT_ROOT?>/pet/add"> Añadir mascota</a></li>
                                        <li><a href="<?php echo FRONT_ROOT?>/pet/list"> Listado de mascotas</a></li>
                                    </ul>
                                </li>

                                <?php } if (strcmp(get_class($_SESSION['userPH']), "Models\Admin") != 0){ ?>

                                <li>
                                    <a><i class="fa fa-solid fa-book text-center"></i> Reservas<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">

                                        <li><a href="<?php echo FRONT_ROOT?>/booking/list"> Reservas actuales</a></li>

                                        <li><a href="<?php echo FRONT_ROOT?>/booking/history"> Historial de reservas</a>
                                        </li>

                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa fa-solid fa-credit-card text-center"></i></i> Pagos<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">

                                        <li><a href="<?php echo FRONT_ROOT?>/payment/list/pendient"> Pagos
                                                pendientes</a></li>

                                        <li><a href="<?php echo FRONT_ROOT?>/payment/list/paid"> Historial de pagos</a>
                                        </li>

                                    </ul>
                                </li>

                                <?php } ?>


                                <li>
                                    <a href=" <?php echo FRONT_ROOT ?>/sign/logout"><i
                                            class="fa fa-sign-out text-center"></i> Cerrar sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /sidebar menu -->
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu bg-white">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col bg-white" role="main">