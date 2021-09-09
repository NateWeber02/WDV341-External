<?php
	//PHP Processing Area

	$currentDate;	//define a new variable
	
	//Date format: MM-DD-YYYY
	$date = date_create();   //create current DateTime obj
	$outputDate = date_format($date,"m-d-Y"); 
	
	$midTermDate = date_create("2021-10-20");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Dates</title>
</head>

<body>
	<h1>WDV341 Into to PHP</h1>
	<h2>UNIT 4 Functions and Dates</h2>
	
	<p>The current date is: <b><?php echo $outputDate; ?> </b></p>
	
	<p>The MidTerm date is: <?php echo $date_Format($midTermDate, "L F jS Y"); ?></p>
	
</body>
</html>