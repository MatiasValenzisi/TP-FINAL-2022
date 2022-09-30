<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>

<script type='text/javascript'>

    function sweet(title, description, type) {

        swal(title, description, type);
    }   

</script>

<?php  
    
    if (isset($type) && !is_null($type) && isset($action) && !is_null($action) && isset($specific) && !is_null($specific)) {   

        switch ($type) {

            case 'error':

                switch ($action) {

                    case 'login':   

                        switch ($specific) {

                            case 'user':

                                echo "<script>sweet('Error al iniciar sesión!','No se encontró el usuario dado.','error')</script>";

                            break;

                            case 'password':

                                echo "<script>sweet('Error al iniciar sesión!','La contraseña es incorrecta.','error')</script>";

                            break;

                            case 'unknown':

                                echo "<script>sweet('Error al iniciar sesión!','Error desconocido.','error')</script>";

                            break;
                        }

                    break;

                    case 'create':

                        if (isset($typeUser) && !is_null($typeUser)){

                            if (strcmp($typeUser, 'guardian') == 0){

                                switch ($specific) {

                                    case 'birthday':
                                       
                                        echo "<script>sweet('Error al registrar un guardián!','Error al cargar la fecha de nacimiento.','error')</script>";

                                    break;

                                    case 'dni':

                                        echo "<script>sweet('Error al registrar un guardián!','Error al cargar el DNI.','error')</script>";

                                    break;

                                   case 'password':

                                        echo "<script>sweet('Error al registrar un guardián!','La contraseña debe contener mínimamente una letra y un número.','error')</script>";

                                    break;                                    
                                  
                                }

                            } elseif (strcmp($typeUser, 'owner') == 0) {

                                switch ($specific) {

                                    case 'birthday':
                                       
                                        echo "<script>sweet('Error al registrar un dueño!','Error al cargar la fecha de nacimiento.','error')</script>";

                                    break;

                                    case 'dni':

                                        echo "<script>sweet('Error al registrar un dueño!','Error al cargar el DNI.','error')</script>";

                                    break;

                                   case 'password':

                                        echo "<script>sweet('Error al registrar un dueño!','La contraseña debe contener mínimamente una letra y un número.','error')</script>";

                                    break; 
                                }   
                            }
                        }

                    break;

                    case 'edit':
                        
                        if (strcmp($specific, 'save') == 0){

                            echo "<script>sweet('Error al actualizar el perfil','La contraseña debe contener mínimamente una letra y un número.','error')</script>";
                        }

                    break;
                }

            break;

            case 'success':

                switch ($action) {

                    case 'register':
                        
                        if (strcmp($specific, 'guardian') == 0){

                            echo "<script>sweet('Registro con éxito!','El usuario guardián fue creado correctamente.','success')</script>";


                        } elseif (strcmp($specific, 'owner') == 0) {
                           
                             echo "<script>sweet('Registro con éxito!','El usuario dueño fue creado correctamente.','success')</script>";
                        }

                    break;

                    case 'edit':

                        if (strcmp($specific, 'save') == 0){   

                            echo "<script>sweet('Perfil actualizado con éxito!','El perfil fue actualizado exitosamente.','success')</script>";
                        }

                    break;
                }

            break;

            case 'info':

                // Proximamente.

            break; 
        }
    }   
?>