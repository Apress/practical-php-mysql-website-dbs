<!doctype html>
<html lang=en>
<head>
<title>Testing a simple email</title>
<meta charset=utf-8>
</head>
<body>
<?php
mail("me@myisp.co.uk", "This is a subject", "This is the body of the email", 
"From:me@myisp.co.uk\r\n");
?>
</body>
</html>
