<!doctype html>
<html lang=en>
<head>
<title>Registration thank-you page</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p { text-align:center; }
table, tr, td, form { margin:auto;	width:180px; text-align:center; border:0; }
form input { margin:auto; }
img { border:0; }
input.fl-left { float:left; }
#submit { float:left; }
</style>
</head>
<body>
<div id="container">
<?php include("header-thanks.php"); ?>
<?php include("nav.php"); ?>
<?php include("info-col-cards.php"); ?>
	<div id="content"><!-- Start of the thank you page content. -->
<div id="midcol">
<h2>Thank you for registering</h2>
<h3>To confirm your registration please pay the membership fee now.<br>You can use 
PayPal or a credit/debit card.</h3>
<p>When you have completed your registration, and the membership secretary has confirmed that your payment has arrived,<br>you will then be able to login to the 
members-only pages</p>
<p>Membership classes: Standard 1 year: &pound;30, Standard 5years: &pound;125, Armed Forces 1 year: &pound;5<br>
Under 22 one year: &pound;2,  Other: If you can't afford &pound;30 please give what you can, minimum &pound;15 
</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="XXXXXXXXXXXXX">
<table>
<tr><td><input type="hidden" name="on0" value="Membership Class"><b>Membership Class</b></td></tr>
<tr><td>
<select name="os0">
	<option value="Standard 1 Year 30">Standard 1 Year 30.00 GBP</option>
	<option value="Standard 5 Year 125">Standard 5 Year 125.00 GBP</option>
	<option value="Armed Forces 1 Year ;5">Armed Forces 1 Year 5.00 GBP</option>
	<option value="Under 22 1 Year 2">Under 22 1 Year 2.00 GBP</option>
	<option value="Other 1 Year 15 Min">Other 1 Year 15.00 GBP</option>
</select> 
</td></tr>
</table>
<input type="hidden" name="currency_code" value="GBP">
<input style="margin:10px 0 0 40px" type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal  The safer, easier way to pay online.">
<img alt="" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
</div></div>
	<!-- End of the thankyou page content. -->
<?php include("footer.php"); ?>
</body>
</html>