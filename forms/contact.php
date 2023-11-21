<?php
//Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
 
//validation for the email address
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
if (!preg_match($email_exp, $email)) {
	echo "<p style='color:red;'>The Email address you entered is not valid.</p>";
	exit;
}
 
//If everything is ok then send an email
$to = "ruben@rubenschadr.tech";  //recipient email address
$subject = "Contact Form";  //Subject of the email
 
//Message content to send in an email
$message = "Name: ".$name."<br>Email: ".$email."<br> Message: ".$message;
 
// Set content type as HTML
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
//Email headers
$headers .= "From:".$email."\r\n";
//$headers .= "CC: someone@example.com";
$headers .= "Reply-To:".$email."\r\n";
 
//Send email 
$sendmail = mail($to, $subject, $message, $headers);
 
if($sendmail == true){ 
	echo "<p style='color:green;'>Message has been sent successfully.</p>";
}else {
	echo "<p style='color:red;'>Message could not be sent.</p>";
}
?>