<body class="login">
    <div style="position: relative; width:auto; padding-left: 35%; padding-right: 35%">
      <div class="form text">
        <section class="login_content">

          <form action="<?php echo FRONT_ROOT?>/sign/createUser" method="GET">
            <input type="hidden" name="type" value="owner">
            <div class="bg-primary text-center" style="padding-top: 3px; padding-bottom: 3px">
              <h2>Registrarse como dueño</h2>
            </div> 
            <br>
            
            <div class="form-outline text-left">
            <label class="form-label" for="type_new">Tipo de usuario:</label>
            <select class="form-control" id="type_new" name="type_new" onchange="location='<?php echo FRONT_ROOT ?>/sign/register/'+this.value">
                <?php
                    if(strcmp($type, "guardian") == 0){?>
                        <option value="guardian" selected>Guardian</option>
                        <option value="owner">Dueño</option> 
                    <?php } else { ?>
                                    <option value="guardian">Guardian</option>
                                    <option value="owner" selected>Dueño</option> 
                    <?php }
                ?>
              </select>
            </div>

            <br>

            <div class="form-outline text-left">
              <label class="form-label" for="email_new">Correo electrónico:</label>
              <input type="email" class="form-control" placeholder="Correo electrónico" name="email_new" required />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="password_new">Contraseña:</label>
              <input type="password" class="form-control" placeholder="Contraseña" name="password_new" required />
            </div>  

            <div class="form-outline text-left">
              <label class="form-label" for="firstName_new">Nombre:</label>
              <input type="text" class="form-control" placeholder="Nombre" name="firstName_new" required= />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="lastName_new">Apellido:</label>
              <input type="text" class="form-control" placeholder="Apellido" name="lastName_new" required />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="dni_new">Dni:</label>
              <input type="text" class="form-control" placeholder="Dni" name="dni_new" required />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="birthDate_new">Fecha de nacimiento:</label>
              <input type="date" class="form-control" name="birthDate_new" required />
            </div>        

            <br><br>

            <div class="form-group">

              <button type="button" style="width:40%;" onclick="location.href='<?php echo FRONT_ROOT ?>'" class="btn btn-primary">Cancelar</button>

              <button type="submit" style="width:40%" class="btn btn-success">Registrarse</button>

            </div>

            <br>

          </form>
        </section>
      </div>
    </div>
  </body>
</html>