<!doctype html>
<html lang=en>
<head>
<title>Template for an interactive database</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="birds.css">
<style type="text/css">
#check_btn ul {
	width:200px;
}
#ppal ul {
	width:250px;
}

</style>


</head>
<body onload="FP_preloadImgs(/*url*/'buttonF.jpg',/*url*/'button10.jpg')">
<div id="container">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php include("includes/info-col.php"); ?>
<div id="content"><!-- Start of the home page content-->
<div id="midcol">
<br>
<h2>Join the Devon Bird Reserves</h2>
<div id="mid-left-col">
	<br>Join Devon Bird Reserves and pay your<br>membership fee with a cheque
<div id="check_btn">
	<p class="cntr"><b>Annual Membership Fees:</b> <br>Standard 1 year: &pound;30 <br>
	Standard 5years: &pound;125 <br>Under 21 one year: &pound;2&nbsp;
	</p>
	<p class="cntr">&nbsp;</p>
	
	<ul>
	<li class="btn"><a href="reg-chq.html" title="Join Devon Bird Reserves">Pay by Cheque</a></li>
	</ul>
	
	<p class="cntr">
</div></div>
<div id="mid-right-col">
	<br>Join The Devon Bird Reserves and pay your membership fee using PayPal or a credit/debit card
	<ul id="ppal_btn">
		<!--<li class="btn"><a href="members-paypal.php" title="Join UKIP"></li>-->
	<li class="btn"><a href="birdsdb-form.php" title="Join DBR">PayPal or 
	Cred/Deb Card</a>Sorry, but the PayPal method does not work at the 
	moment as we are still perfecting it.</li>
	</ul>
	<br><br><br><br><br><br><br>
</div>
</div>
</div>
<br class="clear">
<div id="footer">
<footer>
<?php include("includes/footer.php"); ?>
</footer></div></div>	
</body>
</html>