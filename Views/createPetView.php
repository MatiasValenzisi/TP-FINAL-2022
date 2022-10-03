<body class="login">
    <div style="position: relative; width:auto; padding-left: 35%; padding-right: 35%">
        <div class="form text">
            <section class="login_content">

                <form action="<?php echo FRONT_ROOT?>/pet/createPet" method="GET">
                    <input type="hidden" name="type" value="guardian">
                    <div class="bg-primary text-center" style="padding-top: 3px; padding-bottom: 3px">
                        <h2>Registrarse como mascota</h2>
                    </div>

                    <br>



                    <div class="form-group">


                        <button type="submit" style="width:40%" class="btn btn-success">Crear mascota</button>

                    </div>

                    <br>

                </form>
            </section>
        </div>
    </div>
</body>

</html>