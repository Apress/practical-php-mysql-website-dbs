<?php
/* Contact form handler*/ 
// set to the email address to the recipient, eg 
//$mailto = "webmaster@myisp.com" ;
$mailto = "info@devonrealestate.co.uk" ;
$subject = "Message from the Devon Real Estate contact form" ; 
// list the pages to be displayed,
$formurl = "http://www.devonrealestate.co.uk/contact.php" ;
$errorurl = "http://www.devonrealestate.co.uk/error.html" ; 
$thankyouurl = "http://www.devonrealestate.co.uk/thankyou.html" ; 
$emailerrurl = "http://www.devonrealestate.co.uk/emailerr.html" ; 
$errorcommentturl =  "http://www.devonrealestate.co.uk/commenterror.html" ;
$uself = 0;
// Set the information received from the form as short variables
$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ; 
$username = $_POST['username'] ; 
$useremail = $_POST['useremail'] ; 
$phone = $_POST['phone']; 
$ref_num = $_POST['ref_num'];
$comment = $_POST['comment'] ; 
$http_referrer = getenv( "HTTP_REFERER" ); 
$errors = array(); // Initialize an error array.
//Check that all four essential fields are filled out
if (empty($username) || empty($useremail) || empty($phone)|| empty($comment)) { 
header( "Location: $errorurl" ); 
		exit ; }
//check that no URLs have been inserted in the username text field
if (strpos ($username, '://')||strpos($username, 'www') !==false){
    header( "Location: $errorsuggesturl" );
            exit ; }
//WHAT IS THIS?            
if (preg_match( "[\r\n]", $username ) || preg_match( "[\r\n]", $useremail )) { 
          header( "Location: $errorurl" ); 
          exit ; }
#remove any spaces from beginning and end of email address
$useremail = trim($useremail); 
#Check for permitted email address patterns 
$_name = "/^[-!#$%&\'*+\\.\/0-9=?A-Z^_`{|}~]+"; 
$_host = "([-0-9A-Z]+\.)+"; 
$_tlds = "([0-9A-Z]){2,4}$/i"; 
if(!preg_match($_name."@".$_host.$_tlds,$useremail)) { 
header( "Location: $emailerrurl" ); 
exit ; }
if (!empty($_POST['phone'])) {
//Remove spaces, hyphens, letters and brackets.
$phone = preg_replace('/\D+/', '', ($_POST['phone']));
}
if (!empty($_POST['ref_num'])) {
//Remove spaces, hyphens, letters and brackets.
$ref_num = preg_replace('/\D+/', '', ($_POST['ref_num']));
}
//check that no URLs have been inserted in the comment text area
if (strpos ($comment, '://')||strpos($comment, 'www') !==false){
    header( "Location: $errorcommenturl" );
            exit ; }
$messageproper = 
          "This message was sent from:\n" . 
          "$http_referrer\n" . 
          "------------------------------------------------------------\n" .
          "Name of sender: $username\n" . 
          "Email of sender: $useremail\n" . 
          "Telephone: $phone\n" . 
          "Reference Num: $ref_num\n" . 
          "------------------------- MESSAGE -------------------------\n\n" . 
          $comment . 
          "\n\n------------------------------------------------------------\n" ; 
mail($mailto, $subject, $messageproper, "From: \"$username\" <$useremail>" ); 
header( "Location: $thankyouurl" ); 
exit ;
?>