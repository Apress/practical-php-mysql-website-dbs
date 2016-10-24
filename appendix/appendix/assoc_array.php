<!doctype html>
<html lang=en>
<head>
<title>The associative array page</title>
<meta charset=utf-8>
<style type="text/css">
h2 { margin-left:150px; }
p {margin-left:250px; text-align:left; }
</style>
</head>
<body>
<h2 class="cntr">This is the associative array Page</h2>
<?php
$events = array(
'Monday' => 'Clean car',
'Tuesday' => 'Dental appointment',
'Wednesday' => 'Shopping',
'Thursday' => 'Gardening',
'Friday' => 'Fishing',
'Saturday' => 'Football match',
'Sunday' => 'Church'
);
foreach($events as $day => $event) {
echo "<p>$day: $event</p>\n";
}
?>
</body>
</html>