<?php
//Q1
	$yourName = "Nate Weber";
	
//Q2
	$assignmentName = "<h1>Assignment 3-1:PHP Basics</h1>";

//Q3
	$number1 = 16;
	$number2 = 22;
	$total = $number1 + $number2;
//Q5
	//Create Array in PHP (PHP,HTML,Javascript)
	//PHP loop through each item
	//Output into Javacript array
	//Use Javascript to display array on page

	$phpArray = array("PHP","HTML","Javascript");
	
	$javascriptOutput = "";

	foreach ($phpArray as $value) {
		//echo "$value" . " ";										//Testing Individual Outputs
		$javascriptOutput = $javascriptOutput . "$value" . ", ";	//Iterating through each array item and adding to to $javascriptOutput
	}

	//echo $javascriptOutput;
	
		
	



?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 3-1:PHP Basics</title>
</head>

<body>
	<?php echo $assignmentName; ?>
	
	<h2>Name:<?php echo $yourName;?></h2>
	
	<h3>Number 1: <?php echo $number1;?></h3>
	<h3>Number 2: <?php echo $number2;?></h3>
	<h3>Total: <?php echo $total;?></h3>
	
	<h4><?php echo $javascriptOutput?></h4>
</body>
</html>
