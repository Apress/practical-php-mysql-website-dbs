<!doctype html>
<html lang=en>
<head>
<title>Pay with check</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="birds.css" media="screen">
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style type="text/css">
label { margin-bottom:5px; }
label { width:570px; float:left; text-align:right; }
#button { text-align:center; }
.cntr { width: 655px; }
.sign { font-weight:bold; margin-left:200px; }
#content { 	font-weight:bold; color:#003300; }
</style>
</head>
<body>
<div id='container'>
<?php include('includes/header.php'); ?>
<?php include('includes/nav.php'); ?>
<?php include('includes/info-col.php'); ?>
	<div id='content'><!--Start of page content.-->
<div id="midcol">
<h2>Complete your Registration by Paying with a Check</h2>
<h3>Thank you for registering online, now please fill out this 
form.&nbsp; Asterisks indicate essential fields.<br>When you 
have filled out the form please print two copies by clicking the "Print This 
Form" button. <br>Sign one copy and keep one for reference, sign a check payable to &quot;The Devon Bird 
Reserves&quot;. <br>Mail the signed form and check to: <br>The Treasurer, The Devon Bird Reserves, 
99 The Street, The Village,&nbsp; EX99 99ZZ </h3>
<form>
<div id="fields"> 
    <label class="label" for="title">Title<span class="large-red">*</span>
	<input id="title" name="title" size="35"></label>
   <br><br><label class="label" for="firstname">First Name<span class="large-red">*</span>
	<input id="firstname" name="Firstname" size="35"></label><br>
   <br><label class="label" for="lastname">Last Name<span class="large-red">*</span>
	<input id="firstname" name="lastname" size="35"></label><br>
	<br><label class="label" for="useremail">Your Email Address<span class="large-red">*</span>
	<input id="useremail" name="useremail" size="35"></label><br>
</div>
</form><br><br>
<p class="sign">
 Signed____________________________&nbsp;Date_________________</p>
 <br>
<div id="button">
	<input type="button" value="Click to automatically print the form in black and white" onclick="window.print()" title="Print this Form"><br>
</div>
<!--End of content.-->
</div>
</div>	</div>
<?php include('includes/footer.php'); ?>
</body>
</html>