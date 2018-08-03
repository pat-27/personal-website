<?php 
	require 'phpmailer/PHPMailerAutoload.php';
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$phonenumber = $_POST['phone'];
		$mailFrom = $_POST['email'];
		$message = $_POST['message'];

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "patrickkeylargo@gmail.com";
		$mail->Password = "scubadive2012";
		$mail->SetFrom($mailFrom);
		$mail->Subject = $phonenumber;
		$mail->Body = $message;
		$mail->AddAddress("patrickkeylargo@gmail.com");

		 if(!$mail->Send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		 } else {
		    echo "Message has been sent";
		 }
	}
 ?> 