<?php 
	
	if (isset($_POST['submit'])){
		require 'phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail ->Host= 'smtp.gmail.com';
		$mail->port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';
		$mail->Username='patrickkeylargo@gmail.com';
		$mail->Password='scubadive2012';


		$mail->setFrom($_POST['email'], $_POST['name']);
		$mail->addAddress();
		$mail->addReplyTo($_POST['email'], $_POST['name']);

		$mail->isHTML(true);
		$mail-> Subject='Form Submission: '.$_POST['subject'];
		$mail->Body='<h1 align=center>Name :'.$_POST['name']. '<br>Email: '.$_POST['email']. '<br>Message: '.$_POST['message'].'</h1>';

		if(!$mail->send()){
			$result = 'Something went wrong';
		}
			else{
				$result = 'Thanks '.$_POST['name'].' for contacting me';
			}	
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sending emails</title>
</head>
<body>
	<main>
		<p>Send Email</p>
		<form class = 'contact-form' action = 'contactform.php' method = 'POST'>
			<input type="text" name="name" id = 'name' placeholder= 'Full Name'>
			<input type="text" name="email" id = 'email' placeholder= 'Your E-mail'>
			<input type="text" name="subject" id = 'subject' placeholder= 'Subject'>	
			<textarea name = 'message' id = 'message' placeholder = 'Message'></textarea>
			<button type = 'submit' name = 'submit' id = submit> Send mail</button>	
		</form>
	</main>
</body>
</html>