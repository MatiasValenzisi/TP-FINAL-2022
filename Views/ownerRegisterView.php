<body class="login">
    <div style="position: relative; width:auto; padding-left: 35%; padding-right: 35%">
      <div class="form text">
        <section class="login_content">

          <form action="<?php echo FRONT_ROOT?>/sign/createUser" method="POST">
            <input type="hidden" name="type" value="owner">
            <div class="bg-primary text-center" style="padding-top: 3px; padding-bottom: 3px">
              <h2>Registrarse como dueño</h2>
            </div> 
            <br>
            
            <div class="form-outline text-left">

              <label class="form-label" for="typeUser">Tipo de usuario:</label>
              
              <select class="form-control" id="typeUser" name="typeUser" onchange="location='<?php echo FRONT_ROOT ?>/sign/register/'+this.value">
                <option value="guardian">Guardian</option>
                <option value="owner" selected>Dueño</option>          
              </select>

            </div>

            <br>

            <div class="form-outline text-left">
              <label class="form-label" for="email">Correo electrónico:</label>
              <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="password">Contraseña:</label>
              <input type="password" class="form-control" placeholder="Contraseña" name="password" required />
            </div>  

            <div class="form-outline text-left">
              <label class="form-label" for="firstName">Nombre:</label>
              <input type="text" class="form-control" placeholder="Nombre" name="firstName" required= />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="lastName">Apellido:</label>
              <input type="text" class="form-control" placeholder="Apellido" name="lastName" required />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="dni">Documento:</label>
              <input type="text" class="form-control" placeholder="Documento" name="dni" required />
            </div>

            <div class="form-outline text-left">
              <label class="form-label" for="birthDate">Fecha de nacimiento:</label>
              <input type="date" class="form-control" name="birthDate" required />
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