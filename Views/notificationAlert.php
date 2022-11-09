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

                                echo "<script>sweet('Error al iniciar sesión!','El usuario no se encuentra activo.','error')</script>";

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

                            echo "<script>sweet('Error al actualizar el perfil!','La contraseña debe contener mínimamente una letra y un número.','error')</script>";
                        }

                    break;

                    case 'check':
                        
                        if (strcmp($specific, 'user') == 0){

                            echo "<script>sweet('Se ha cerrado cerrado la sesión','Los datos de la sesión han caducado.','error')</script>";
                        }

                    break;

                    case 'vaccination':

                        switch ($specific) {

                            case 'format':

                                echo "<script>sweet('Error al cargar el plan de vacunación!','Solo se admiten formato JPG y PNG.','error')</script>";
                               
                            break;

                            case 'size':

                                echo "<script>sweet('Error al cargar el plan de vacunación!','El archivo es muy grande.','error')</script>";
                               
                            break;

                            case 'unknown':

                                echo "<script>sweet('Error al cargar el plan de vacunación!','No se pudo guardar el plan de vacunación.','error')</script>";
                                
                            break;                            
                        }

                    break;

                    case 'photo':

                        switch ($specific) {

                            case 'format':

                                echo "<script>sweet('Error al cargar la foto de la mascota!','Solo se admiten formato JPG y PNG.','error')</script>";
                               
                            break;

                            case 'size':

                                echo "<script>sweet('Error al cargar la foto de la mascota','El archivo es muy grande.','error')</script>";
                               
                            break;

                            case 'unknown':

                                echo "<script>sweet('Error al cargar la foto de la mascota','No se pudo guardar la foto de la mascota.','error')</script>";
                                
                            break;                            
                        }

                    break;

                    case 'video':

                        switch ($specific) {

                            case 'format':

                                echo "<script>sweet('Error al cargar el video de la mascota!','Solo se admiten formato MP4.','error')</script>";
                               
                            break;

                            case 'size':

                                echo "<script>sweet('Error al cargar el video de la mascota!','El archivo es muy grande.','error')</script>";
                               
                            break;

                            case 'unknown':

                                echo "<script>sweet('Error al cargar el video de la mascota!','No se pudo guardar el video de la mascota.','error')</script>";
                                
                            break;                            
                        }

                    break;

                    case 'filter':
                        
                        if (strcmp($specific, 'guardian') == 0){

                            echo "<script>sweet('Error al filtrar guardianes!','El rango de busqueda no debe tener fechas pasadas.','error')</script>";
                        }

                    break;

                    case 'consult':
                        
                        switch ($specific) {

                            case 'date':

                               echo "<script>sweet('Error al consultar reserva!','Las reservas deben consultarse con un mínimo de siete días previos.','error')</script>";

                            break;

                            case 'guardian':

                               echo "<script>sweet('Error al consultar reserva!','El guardian no provee de su servicio para ese rango de fechas. Por favor verifique el perfil del guardian.','error')</script>";

                            break;

                            case 'pet':

                               echo "<script>sweet('Error al consultar reserva!','El guardian seleccionado no provee servicio para ese tamaño de mascota. Por favor verifique el perfil del guardian.','error')</script>";

                            break;
                        }

                    break;

                    case 'update':
                        
                        if (strcmp($specific, 'state') == 0){

                            switch ($add) {

                                case 'race':
                                    echo "<script>sweet('Error al aceptar la reserva!','La reserva fue rechazada: ya tiene reservado uno de los días del servicio para otra raza de mascota.','error')</script>";
                                break;

                                case 'pet':
                                   echo "<script>sweet('Error al aceptar la reserva!','La reserva fue rechazada: ya tiene reservado un servicio con ese guardian y esa mascota en alguna de las fechas solicitadas.','error')</script>";
                                break;
                            }
                        }

                    break;

                    case 'pay':
                        
                        if (strcmp($specific, 'date') == 0){

                             echo "<script>sweet('Error al realizar el pago!','La tarjeta de credito utilizada se encuentra vencida.','error')</script>";
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


                    case 'update':
                        
                        if (strcmp($specific, 'booking') == 0){

                             echo "<script>sweet('Se ha actualizado el estado de la reserva con éxito!','La reserva fue actualizada exitosamente.','success')</script>";
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