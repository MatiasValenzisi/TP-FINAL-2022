<?php require_once 'PHPMailer.php';

    if (isset($email) && isset($subject) && isset($body)){

        $mail = new PHPMailer();

        $mail->setFrom('petheroveterinary@gmail.com', 'Pet-Hero');

        // ============== TEMPORAL ================
        
        $email = "xxmatias94xx@gmail.com";

        // ========================================

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->CharSet = 'UTF-8';
                        
        $subject = utf8_decode($subject);
                        
        $mail->Subject = $subject;

        $mail->Body.= $body; 

        $mail->Username = PHP_MAILER_USERNAME;        
                   
        $mail->Password = PHP_MAILER_PASSWORD;      
                   
        $mail->SMTPDebug = 0;
            
        $mail->isSMTP();        
                   
        $mail->Host = PHP_MAILER_HOST;
            
        $mail->SMTPAuth = true; 

        $mail->SMTPSecure = PHP_MAILER_SMTP_SECURE;

        $mail->Port = PHP_MAILER_PORT;  

        $success = $mail->send();

        if ($success != 1){

            echo "Ocurrio un error al enviar el mail.";
            exit();
        }

    } else {

        echo "Error faltan variables por declarar.";
        exit();
    }

?>