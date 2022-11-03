<?php 

	require_once 'PHPMailer.php';
	require_once '../../Config/Config.php';

    $mail = new PHPMailer();

    $mail->setFrom('petheroveterinary@gmail.com', 'Pet-Hero');

    $mail->addAddress("xxmatias94xx@gmail.com");

    $mail->isHTML(true);

    $mail->CharSet = 'UTF-8';

    $subject = "Subject";
                    
    $subject = utf8_decode($subject);
                    
    $mail->Subject = $subject;

    $mail->Body.="Body"; 

    $mail->Username = 'petheroveterinary@gmail.com';        
               
    $mail->Password = 'nizdjltmpklhyiuh';      
               
    $mail->SMTPDebug = 0;
        
    $mail->isSMTP();        
               
    $mail->Host = 'smtp.gmail.com';
        
    $mail->SMTPAuth = true; 

    $mail->SMTPSecure = 'tls';

    $mail->Port = 587;  

    $success = $mail->send();

?>