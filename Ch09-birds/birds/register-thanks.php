<!doctype html>
<html lang="en">
<head>
<title>Register-thanks. Alternaive payment methods.</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="birds.css">
<link rel="stylesheet" type="text/css" href="buttons.css">
<style type="text/css">
#container { min-width:960px; max-width:1100px; }
#midcol { margin-left:150px; margin-right:150px; color:#003300;  }
label {font-weight:bold; width:330px; float:left; text-align:right }
input, select { margin-bottom:5px; }
#submit { margin-left:330px; }
h2 { margin-bottom:0; margin-top:5px; color:#003300; }
h3.content { margin-top:0; color:#003300; }
.cntr { text-align:center; }
#mid-left-col { width:46%; float:left; 	height: 63px; }
#mid-right-col { width:46%; float:right; }
</style>
</head>
<body>
<div id="container">
<?php include("includes/header-thanks.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col-cards.php"); ?>
	<div id="content"><!-- Start of the thank you page content. -->
<div id="midcol">
<h2>Thank you for registering</h2>
<h3>To complete your registration please pay the membership fee now. <br></h3>
<p class="cntr">When you have completed your registration you will be able to login to the member's only pages</p>
<p class="cntr">Membership classes: Standard 1 year: £30, Standard 5years: £125, Under 21: 
one year: £2 
</p>
<div id="mid-left-col">
<div id="content-button">
	<ul class="btn">
		<li class="btn"><a href="pay-with-check.php">Pay by Check</a></li>
	</ul>
</div>
</div>
<!--</div>-->
<div id="mid-right-col">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="XXXXXXXXXXXXX">
	<table>
		<tr>
			<td><input type="hidden" name="on0" value="Membership Class"><b>
			PayPal or Debit/credit card<br>Select the Membership Class</b></td>
		</tr>
		<tr>
			<td><select name="os0">
			<option value="Standard 1 Year &pound;30">Standard 1 Year &pound;30
			</option>
			<option value="Standard 5 Year &pound;125">Standard 5 Year &pound;125 &pound;125.00 GBP
			</option>
			<option value="Under 21 1 Year &pound;2">Under 21 1 Year &pound;2 &pound;2.00 GBP
			</option>
			</select> </td>
		</tr>
	</table>
	<input type="hidden" name="currency_code" value="GBP">
	<input style="margin:10px 0 0 40px" type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal  The safer, easier way to pay online.">
	<img alt="" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
</div></div>
</div><br><br><br class="clear">
	<!-- End of the thankyou page content. -->
<?php include("includes/footer.php"); ?>
</body>
</html>