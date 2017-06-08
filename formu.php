<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
	$file = $_POST['file'];
    $from = 'info@hpcsphere.com'; 
    $to = 'info@hpcsphere.com'; 
	$text = "Your email has been sent successfully ";
   
    //$human = $_POST['human'];
			
   if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && $emailErr=="") $emailErr = "Email id is not valid";

	if($emailErr == ""){
		$body = "From: $name\n  file: $file\n E-Mail: $email\n Message:\n $message";
		if ($_POST['submit'] ) {				 
			if (mail ($to, $subject, $body, $from)) { 
			echo "<script type='text/javascript'>alert('$text'); window.location = 'http://www.hpcsphere.com/hpcsphere/contact.html';</script>";

			} else { 
			echo '<p>Something went wrong, go back and try again!</p>'; 
			} 
		} else if ($_POST['submit'] ) {
			echo '<p>You answered the anti-spam question incorrectly!</p>';
		}
	}
	else
	{
		echo "<script type='text/javascript'> alert('.$emailErr.'); window.location = 'http://www.hpcsphere.com/hpcsphere/contact.html';</script>";
		
	}
?>