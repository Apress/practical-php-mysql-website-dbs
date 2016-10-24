<!doctype html>
<html lang=en>
<head>
<title>Text Area</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
echo ($_POST['comments']);
}
?>
<form action="text-area.php" method="post">
<p>
<textarea name="comments" cols="30" rows="5">
</textarea>
<input type="submit" value="Send"></p>
</form>
</body>
</html>