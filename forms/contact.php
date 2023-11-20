<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'rubenchadron+website@gmail.com';

// Check if the PHP Email Form library file exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create a new instance of PHP_Email_Form
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Set the email configuration
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. Enter your correct SMTP credentials
$contact->smtp = array(
    'host' => 'smtp.rubenschadron.tech	',
    'username' => 'ruben@rubenschadron.tech',
    'password' => 'uJtnnZw5',
    'port' => '587'
);


// Add form data to the email message
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send the email and echo the result
if ($contact->send()) {
    echo 'Message sent successfully';
} else {
    echo 'Error sending message';
}
?>