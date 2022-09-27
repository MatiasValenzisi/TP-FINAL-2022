        
  <body class="login">
    <div style="position: relative; width:auto; padding-left: 35%; padding-right: 35%">
      <div class="form text">
        <section class="login_content">

          <form action="<?php echo FRONT_ROOT?>/user/createUser" method="GET">
            <input type="hidden" name="type" value="guardian">
            <div class="bg-primary text-center" style="padding-top: 3px; padding-bottom: 3px">
              <h2>Registrarse como guardian</h2>
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

            <br>  

            <div class="form-outline text-left">
              <label class="form-label" for="experience_new">Años de experiencia:</label>
              <input type="number" class="form-control" placeholder="Años de experiencia" name="experience_new" min="0" max="99" required />
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