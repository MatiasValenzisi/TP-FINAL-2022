  <body class="nav-md">
      <div class="container body">
          <div class="main_container">
              <div class="col-md-3 left_col">
                  <div class="left_col scroll-view">
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
                              <img src="<?php echo VIEWS_PATH ?>/images/user.png" alt="..."
                                  class="img-circle profile_img">
                          </div>
                          <div class="profile_info">
                              <span>Bienvenido</span>
                              <h2><b>Matias Valenzisi</b></h2>
                          </div>
                      </div>
                      <!-- /menu profile quick info -->
                      <br>
                      <!-- sidebar menu -->
                      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                          <div class="menu_section">
                              <ul class="nav side-menu">
                                  <li><a href="home.html"><i class="fa fa-home text-center"></i> Pagina principal</a>
                                  </li>
                                  <li><a><i class="fa fa-user text-center"></i> Guardianes<span
                                              class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                          <li><a href="usuario.html"> Listado de guardianes activos</a></li>
                                          <li><a href="usuario2.html"> Guardianes dados de baja</a></li>
                                      </ul>
                                  </li>


                                  <li><a><i class="fa fa-user text-center"></i> Dueños<span
                                              class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                          <li><a href="usuario.html"> Listado de dueños activos</a></li>
                                          <li><a href="usuario2.html"> Dueños dados de baja</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="salir.html"><i class="fa fa-sign-out text-center"></i> Cerrar sesión</a>
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