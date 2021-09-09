<?php
	// Line comment

	/* 
		block comment
	*/

	//defind some PHP Vvariables

	$firstName	= "Nate";
	$lastName = "Weber";
	
	echo "<h1>$firstName</h1>"; // Pay attention to the variable within the quotes (spelled correctly)

	function processSalesPerson() {
		//code goes here
		
		global $firstName, $lastName;
		$salesName = $lastName ." , " . $firstName;
		return $salesName;
	}

	processSalesPerson();  //calls the function

	$totalSales = 134.56;
	//$fmt = numfmt_create( 'us_US' , Numberformater::Currency );
	//$formattedSales = numfmt_format_currency($fmt, $totalSales);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Syntax</title>
</head>

<body>
	<h1>WDV 341 Into to PHP</h1>
	<h2>PHP Syntax Examples</h2>
	
	<h3>Sales Person <?php echo $processSalesPerson  ?></h3>
	<h3>Salesperson: <?php echo $firstName . " " . $lastName ?> </h3>
	<p>Total Sales from Today: <?php echo $totalSales ?> </p>
</body>
</html>