<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once ('PHPMailerAutoload.php');
    function sendOTP($emailUser,$severEmail,$password,$subject,$body)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = $severEmail;
        $mail->Password = $password;
        $mail->SetFrom('no-reply@knine');
        $mail->Subject = $subject;
        $mail->addEmbeddedImage('R.jpg', 'tutSubLogo');
        $mail->Body = '
        <h3>Tshwane University Of Technology</h3> 
        <br>
        <h4>Orientation For First years (One Time Pin)</h4>
        <br>
        <h5>'.$body.'</h5>
        <br>
        <br>
        <img src="cid:tutSubLogo">';
        
 
	    $mail->AddAddress($emailUser);
        $mail->Send();
    }


    $body = file_get_contents('php://input');


    $email = json_decode($body)->{'email'};
    $otp = json_decode($body)->{'otp'};

     $emailBody ="From Tshwane University of Technology This email is for verifying the email from the orientation system your one time pin is <br> <label style='color:blue;font-size:60px'>${otp}</label> "; 
     $emailTittle = "Tut Orientation OTP ";
    sendOTP($email,"no.reply.k9nine@gmail.com","Tut@2017",$emailTittle,$emailBody);
    
?>