<!doctype html>
<html lang=en>
<head>
<title>An email for multiple recipients</title>
<meta charset=utf-8>
</head>
<body>
<?php
$to = " me@myisp.co.uk, recipient-2@someisp.co.uk ";
$subject = "My email test.";
$message = "This is the body of the email";
$headers = "From: me@myisp.co.uk\r\n";
$headers .= "Reply-To: me@myisp.co.uk\r\n";
$headers .= "CC: recipient-3@someisp.co.uk\r\n";
$headers .= "BCC: recipient-4@someisp.com\r\n";
if ( mail($to,$subject,$message,$headers) ) {
   echo "The email has been sent!";
   } else {
   echo "The email has failed!";
   }
?>
</body>
</html>
