<?php 
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
 
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'mail.emperosoverseas.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'buddypets-admin@emperosoverseas.com';       // SMTP username 
$mail->Password = '123@BuddyPets';         // SMTP password 
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('buddypets-admin@emperosoverseas.com', 'Buddy Pets'); 
$mail->addReplyTo('buddypets-admin@emperosoverseas.com', 'Buddy Pets'); 
 
// Add a recipient 
//$mail->addAddress('kalpesh915@gmail.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 

function sendTransactionalEmail($receiverEmail, $subject, $title, $content){
    // Mail subject 
    global $mail;
    $mail->addAddress($receiverEmail); 
    $mail->Subject = $subject; 

    // Mail body content 
    $bodyContent = "<h3>$title</h3>"; 
    $bodyContent .= "<p>$content</p>"; 
    $mail->Body    = $bodyContent; 

    // Send email 
    if(!$mail->send()) { 
        //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
        //echo 'Message has been sent.'; 
    }
}

    //sendTransactionalEmail("kalpesh915@gmail.com", "Testing", "Demo", "EMail Testing");

?>