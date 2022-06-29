<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


require_once ('PHPMailerAutoload.php');
    function sendOTP($emailUser,$subject,$body)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.office365.com';
        $mail->Port = '587';
        $mail->isHTML();
        $mail->Username = "217070554@tut4life.ac.za";
        $mail->Password = "Tut@2017";
        $mail->SetFrom("217070554@tut4life.ac.za");
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
        if(!$mail->send()) {
    		echo 'Message could not be sent.';
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
    		echo 'Message has been sent';
	}
    }


    $body = file_get_contents('php://input');


    $email = json_decode($body)->{'email'};
    $otp = json_decode($body)->{'otp'};

     $emailBody ="From Tshwane University of Technology This email is for verifying the email from the orientation system your one time pin is <br> <label style='color:blue;font-size:60px'>${otp}</label> "; 
     $emailTittle = "Tut Orientation OTP ";
    sendOTP($email,$emailTittle,$emailBody);
    
?>
