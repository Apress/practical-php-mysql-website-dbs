<!doctype html>
<html lang=en>
<head>
<title>The feedback form</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<link rel="stylesheet" type="text/css" href="feedback_form.css">
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="feedback-ie8.css">
<![endif]-->
</head>
<body>
<div id='container'>
<div id='content'><!--Start of feedback form content.-->
<div id="form">
     <form action="feedback_handler.php" method="post" ><h2>Contact Us</h2>
     	<div class="cntr">
     <strong>Address:</strong> 1 The Street, Townsville, AA6 8PF, <b>Tel:</b> 01111 800777</div>
		 <p class="cntr">
	<strong>To email us:</strong> please use this form and click the Send button at the bottom.</p>
	<p class="cntr"><span class="small">Make a note of our email address:</span>
		 <img alt="Email Address" title="Email Address" src="images/fredbloggs.gif"> 
	</p>
	<h3 >Essential items are marked with an asterisk</h3>
<!--START OF TEXT FIELDS-->
			<label for="username" class="label"><span class="red">*</span>Your Name: </label>
       		<input id="username" name="username" size="30">
				
       		<label for="useremail" class="label"><span class="red">*</span>Your Email:</label>
       		<input id="useremail" name="useremail" size="30">
 
    		<label for="phone" class="label"><span class="red">*</span>Telephone:</label>
    		<input id="phone" name="phone" size="30"> 
<div class="chk1">
<input id="chkbox1" name="brochure" value="Yes" type="checkbox">
<label for =”chkbox1> Please send me a brochure (Tick box)</label>
</div>
<h3>Please enter your address if you ticked the box<span class="star">*</span></h3>
		 	<div>
		 	<label for="addrs1" class="label">&nbsp;&nbsp;&nbsp; Address: </label>
       		<input id="addrs1" name="addrs1" size="30">
       		
       		<label for="addrs2" class="label">&nbsp;&nbsp;&nbsp; Address: </label>
       		<input id="addrs2" name="addrs2" size="30">
	   		
	   		<label for="city" class="label">&nbsp;Town/city: </label>
	   		<input id="city" name="city" size="30">
	   		
	   		<label for="postcode" class="label">&nbsp;Post code:</label>
	   		<input id="postcode" name="postcode" size="30"></div>
		 <h3>Would you like to receive emailed newsletters?</h3>
<div id="rad"> 
    <input  checked="checked" id="radio1" name="letter" type="radio" value="yes">  
    <label for="radio1">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="radio2" name="letter" value="no" type="radio">
    <label for="radio2">No&nbsp;&nbsp;</label>
</div><br><br>
	<h3><span class="red">*</span>Please enter your message below</h3>
<textarea id="comment" name="comment" rows="12" cols="40"></textarea>
<br>
<!--THE SUBMIT BUTTON GOES HERE-->
<input id="sb" value="Send" title="Send" alt="Send" type="submit"><br>
</form>
</div><!--End of the feedback form content.-->
<div id="footer">
<?php include('includes/footer.php'); ?>
</div></div></div><br>
</body>
</html>